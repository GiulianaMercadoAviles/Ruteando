<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use APP\Models\TypesMaintenance;
use Illuminate\Http\Request;
use App\Models\TypesMachine;
use App\Models\Status;
use Mockery\Matcher\Type;
use Illuminate\Support\Facades\Log;
use function Illuminate\Log\log;
use App\Events\MaintenanceNotification;
use Barryvdh\DomPDF\Facade\Pdf;
class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statusId = config('constants.not_available_status_id');
        $notAvailableMachines = Machine::where('status_id', $statusId)->get();

        $machines = Machine::with('type_machine', 'status')->where('status_id', '!=', $statusId)
            ->orderBy('status_id', 'asc')
            ->get();
            
        return view('machines.read', compact('machines', 'notAvailableMachines'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_machines = TypesMachine::all();

        return view('machines.create', compact('type_machines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMachineRequest $request)
    {
        $statusId = config('constants.unassigned_status_id');

        Machine::create(array_merge(
            $request->validated(),
            ['status_id' => $statusId]
        ));

        return redirect()->route('machines')->with('success', 'La maquina fue registrada exitosamente.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $type = $request->input('type');

        $machines = Machine::query()
            ->when($searchTerm, function($query, $searchTerm) {
                $query->where('serial_number', 'like', "%{$searchTerm}%");
            })
            ->when($type, function($query, $type) {
                $query->where('type_machine_id', $type);
            })
            ->simplePaginate(10);

        $statusId = env('NOTAVAILABLE_STATUS_ID');
        $notAvailableMachines = Machine::where('status_id', $statusId)->get();

        $types = TypesMachine::all();

        return view('machines.read', compact('machines', 'types', 'notAvailableMachines'));
    }

    /**
     * Display the specified resource.
     */
    public function show($machine_id)
    {
        $machine = Machine::with('type_machine', 'status', 'maintenance', 'maintenance.typesMaintenance')->where('id', $machine_id)->firstOrFail();

        $assignmentActive = $machine->assignments()->with('roadwork', 'roadwork.province')->where('end_date', '=', null)->orderby('start_date', 'asc')->first();

        $assignments = $machine->assignments()->with('roadwork', 'roadwork.province', 'endReason')->where('end_date', '!=', null)->get();

        return view('machines.show', compact('machine', 'assignments', 'assignmentActive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($machine_id)
    {
        $machine = Machine::findOrFail($machine_id); 
        $statusId = config('constants.not_available_status_id');

        if ($machine->status_id == $statusId) {
            return redirect()->route('machines')->with('error', 'No es posible editar máquinas fuera de servicio.');
        }

        $type_machines = TypesMachine::all();
        $statuses = Status::all();

        return view('machines.update', compact('machine', 'type_machines', 'statuses'));
}
        
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMachineRequest $request, $machine_id)
    {
        $machine = Machine::findOrFail($machine_id);
        $machine->update($request->validated());

        if ($machine->current_kilometers >= $machine->maintenance_kilometers_limit) {
            event(new MaintenanceNotification($machine));
        }

        return redirect()->route('machines')->with('success', 'La máquina fue editada exitosamente.');
    }

    public function delete(Machine $machine, $machine_id)
    {
        $machine = Machine::with('type_machine', 'status', 'maintenance', 'maintenance.typesMaintenance')->findOrFail($machine_id);

        return view('machines.delete', compact('machine'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($machine_id)
    {
        $machine = Machine::findOrFail($machine_id);
        $statusId = config('constants.not_available_status_id');

        $machine->status_id = $statusId;
        $machine->save();

        return redirect()->route('machines')->with('success', 'La máquina fue dada de baja.');
    }

    public function history($machine_id)
    { 
        $machines = Machine::with('type_machine', 'status', 'maintenance', 'maintenance.typesMaintenance')->where('id', $machine_id)->firstOrFail();
        
        $pdf = Pdf::loadView('history', compact('machines'));
        return $pdf->download('historial_mantenimiento.pdf');
    }

}
