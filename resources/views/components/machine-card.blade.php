@php
$colorClass = match ($machine->status->situation) {
    'Asignado' => 'bg-green-100 text-green-800',
    'No asignado' => 'bg-blue-100 text-blue-800',
    'En mantenimiento' => 'bg-orange-100 text-orange-800',
    'Fuera de servicio' => 'bg-red-100 text-red-800',
    default => 'bg-gray-100 text-gray-800',
};
@endphp

<div class="machine-card px-6 py-4 bg-white dark:bg-gray-700 rounded-lg shadow flex justify-between items-center gap-x-4 overflow-hidden transition duration-300 ease-in-out hover:shadow-lg" data-status="{{ $machine->status->situation }}">
    <div>
        <a href="{{ route('machines.show', $machine->id) }}" class="text-lg font-semibold">{{ $machine->serial_number }}</a>
        <p class="text-sm text-gray-500 dark:text-gray-300">{{ $machine->type_machine->name }} - {{ $machine->model }} - {{ $machine->brand }}</p>
        <p class="mt-2 text-sm px-2 py-1 rounded {{ $colorClass }}">Estado: {{ $machine->status->situation }}</p>

        <div class="mt-4 flex space-x-3">
            <a href="{{ route('machines.edit', $machine->id) }}" class="bg-[#686D76] text-white px-4 py-2 items-center rounded hover:bg-[#45474B]"><span class="material-symbols-outlined relative top-0.5">edit</span></a>
            <a href="{{ route('machines.destroy', $machine->id) }}" class="bg-[#686D76] text-white px-4 py-2 items-center rounded hover:bg-[#45474B]"><span class="material-symbols-outlined relative top-0.5">delete</span></a>
        </div>
    </div>
    <div class="flex flex-col justify-end items-center">
        <img src="{{ asset($machine->type_machine->image) }}" alt="Imagen de la Máquina" >
    </div>
</div>
