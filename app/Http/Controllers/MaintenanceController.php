<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Machine;
use App\Http\Requests\StoreMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use App\Models\TypesMaintenance;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;


class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::with('machine', 'typesMaintenance', 'machine.type_machine', 'machine.status')->simplePaginate(6);

        $types = TypesMaintenance::all();
            
        return view('maintenances.read', compact('maintenances', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statusId = config('constants.maintenance_status_id');
        $notAvailableStatusId = config('constants.not_available_status_id');

        $machines = Machine::whereNotIn('status_id', [$notAvailableStatusId, $statusId])->get();
        $types = TypesMaintenance::all();

        return view('maintenances.create', compact('machines', 'types'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaintenanceRequest $request)
    {
        foreach ($request->type_maintenance_id as $type) {
            Maintenance::create([
                'machine_id' => $request->machine_id,
                'maintenance_date' => $request->maintenance_date,
                'maintenance_kilometers' => $request->maintenance_kilometers,
                'type_maintenance_id' => $type,
                'is_active' => config( 'constants.inprogress')
            ]);
        }

        $statusId = config('constants.maintenance_status_id');

        Machine::where('id', $request->machine_id)->update(['status_id' => $statusId]);

        return redirect()->route('maintenances')->with('success', 'El mantenimiento fue registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($maintenance_id)
    {
        $maintenances = Maintenance::with('machine.type_machine', 'typesMaintenance')->findOrFail($maintenance_id);
        $maintenances->load('machine', 'typesMaintenance');

        return view('maintenances.show', compact('maintenances'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $type = $request->input('type');

        $maintenances = Maintenance::query()
            ->when($searchTerm, function($query, $searchTerm) {
                $query->whereHas('machine', function($q) use ($searchTerm) {
                    $q->where('serial_number', 'like', "%{$searchTerm}%");
                });
            })
            ->when($type, function($query, $type) {
                $query->where('type_maintenance_id', $type);
            })
            ->simplePaginate(10);

        $types = TypesMaintenance::all();

        return view('maintenances.read', compact('maintenances', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($maintenance_id)
    {
        $maintenance = Maintenance::with('machine', 'typesMaintenance')->findOrFail($maintenance_id);

        $machines = Machine::all();
        $types = TypesMaintenance::all();

        return view('maintenances.update', compact('maintenance', 'machines', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaintenanceRequest $request, Maintenance $maintenance)
    {
        Maintenance::where('id', $maintenance->id)->update($request->validated());

        return redirect()->route('maintenances')->with('success', 'El mantenimiento fue actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance, $maintenance_id)
    {
        $maintenance = Maintenance::findOrFail($maintenance_id);
        $maintenance->update(['is_active' => false]);
        $maintenance->save();

        $statusId = config('constants.unassigned_status_id');

        $machine = Machine::find($maintenance->machine_id);
        $machine->update(['status_id' => $statusId]);
        $machine->current_kilometers = 0;
        $machine->save();

        return redirect()->route('maintenances')->with('success', 'El mantenimiento fue eliminado exitosamente.');
    }
}
