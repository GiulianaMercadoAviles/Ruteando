<?php

namespace App\Http\Controllers;

use App\Events\MaintenanceNotification;
use App\Models\Assignment;
use App\Models\Machine;
use App\Models\RoadWork;
use App\Models\EndReason;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Http\Requests\DeleteAssignmentRequest;
use App\Models\Status;
use PhpParser\Node\Expr\AssignOp;
use Barryvdh\DomPDF\Facade\Pdf;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = Assignment::with('machine', 'roadWork', 'endReason')->where('end_date', null)->simplePaginate(5);

        $finishedAssignments = Assignment::with('machine', 'roadWork', 'endReason')
            ->whereNotNull('end_date')
            ->get();

        return view('assignments.read', compact('assignments', 'finishedAssignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statusId = config('constants.unassigned_status_id');

        $machines = Machine::where('status_id', '=', $statusId)->get();
        $roadWorks = RoadWork::all();
        $endReasons = EndReason::all();

        return view('assignments.create', compact('machines', 'roadWorks', 'endReasons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignmentRequest $request)
    {
        $statusId = config('constants.assigned_status_id');

        Assignment::create($request->validated());
        Machine::where('id', $request->machine_id)->update(['status_id' => $statusId]);

        return redirect()->route('assignments')->with('success', 'La asignación se ha creado correctamente.');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment, $assignment_id)
    {
        $assignments = Assignment::with('machine', 'roadWork', 'endReason')->findOrFail($assignment_id);

        $machines = Machine::all();
        $roadWorks = RoadWork::all();
        $endReasons = EndReason::all();

        return view('assignments.update', compact('assignments', 'machines', 'roadWorks','endReasons'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssignmentRequest $request, $assignment_id) 
    {
        Assignment::where('id', $assignment_id)->update($request->validated());

        return redirect()->route('assignments')->with('success', 'Se ha actualizado la asignación correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Assignment $assignment, $assignment_id)
    {
        $assignments = Assignment::with('machine', 'roadWork', 'endReason')->findOrFail($assignment_id);

        $endReasons = EndReason::all();

        return view('assignments.delete', compact('assignments', 'endReasons'));
    }

    public function destroy(Assignment $assignment, $assignment_id, DeleteAssignmentRequest $request)
    {
        Assignment::where('id', $assignment_id)->update($request->validated());

        $statusId = config('constants.unassigned_status_id');

        $machine = Machine::find($request->machine_id);
        $machine->update(['status_id' => $statusId]);
        $machine->current_kilometers += $request->kilometers_travelled;
        $machine->life_kilometers += $request->kilometers_travelled;
        $machine->save();

        if ($machine->current_kilometers >= $machine->maintenance_kilometers_limit) {
            event(new MaintenanceNotification($machine));
        }

        return redirect()->route('assignments')->with('success', 'La asignacion se ha finalizado correctamente.');
    }

    public function history(Request $request)
    {
        $request->validate(['month' => 'required|date_format:Y-m',]);

        $month = $request->input('month');
        $start = $month . '-01';
        $end = date("Y-m-t", strtotime($start));

        $assignments = Assignment::with('machine', 'roadWork', 'endReason', 'machine.type_machine', 'roadWork.province')->whereBetween('start_date', [$start, $end])->get();

        $pdf = Pdf::loadView('historyAssignment', compact('assignments', 'month'));

        return $pdf->download('resumen_asignaciones_' . $month . '.pdf');
    }
}
