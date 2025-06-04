<?php

namespace App\Http\Controllers;

use App\Models\RoadWork;
use App\Models\Province;
use App\Models\Assignment;
use App\Http\Requests\StoreRoadWorkRequest;
use App\Http\Requests\UpdateRoadWorkRequest;
use Illuminate\Http\Request;
use App\Http\Requests\DeleteRoadWorkRequest;
use App\Models\EndReason;

use PhpParser\Node\Expr\Assign;

class RoadWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roadWorks = RoadWork::with('province')->simplePaginate(3);
        $provinces = Province::all();
        
        return view('roadWorks.read', compact('roadWorks', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();

        return view('roadWorks.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoadWorkRequest $request)
    {
        RoadWork::create($request->validated());

        return redirect()->route('roadWorks')->with('success', 'La obra vial fue registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($roadWork_id)
    {
        $roadWork = RoadWork::with('province', 'assignment')->findOrFail($roadWork_id);
        
        $assignmentsActive = Assignment::with('machine')->where('roadwork_id', $roadWork_id)->where('end_date', null)->get();

        $assignmentsInactive = Assignment::with('machine')->where('roadwork_id', $roadWork_id)->whereNotNull('end_date')->get();

        return view('roadWorks.show', compact('roadWork', 'assignmentsActive', 'assignmentsInactive'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $province = $request->input('province');

        $roadWorks = RoadWork::query()
            ->when($searchTerm, function($query, $searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%");
            })
            ->when($province, function($query, $province) {
                $query->where('province_id', $province);
            })
            ->simplePaginate(10);

        $provinces = Province::all();

        if ($roadWorks->isEmpty()) {
            return redirect()->route('roadWorks')->with('error', 'No se encontraron Obras Viales.');
        }

        return view('roadWorks.read', compact('roadWorks', 'provinces'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($roadWork_id)
    {
        $roadWork = RoadWork::findOrFail($roadWork_id);

        $provinces = Province::all();
        return view('roadWorks.update', compact('roadWork', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoadWorkRequest $request, $roadWork_id)
    {
        $roadWork = RoadWork::findOrFail($roadWork_id);
        $roadWork->update($request->validated());

        return redirect()->route('roadWorks')->with('success', 'La obra vial fue actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(RoadWork $roadWork, $roadWork_id)
    {
        $roadWork = RoadWork::with('assignment', 'province')->findOrFail($roadWork_id);

        $provinces = Province::all();

        return view('roadWorks.delete', compact('roadWork', 'provinces'));
    }

    public function destroy(RoadWork $roadWork, $roadWork_id, DeleteRoadWorkRequest $request)
    {
        RoadWork::where('id', $roadWork_id)->update($request->validated());

        $statusId = config('constants.unassigned_status_id');

        $assignments = Assignment::where('roadwork_id', $roadWork_id)->get();
        foreach ($assignments as $assignment) {
            $assignment->update(['end_date' => now(), 'end_reason_id' => $request->end_reason_id]);
            $assignment->machine()->update(['status_id' => $statusId]);
        }

        return redirect()->route('roadWorks')->with('success', 'La Obra Vial fue finalizada correctamente.');
    }
}
