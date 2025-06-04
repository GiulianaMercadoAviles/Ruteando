<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Mantenimiento") }}
        </h2>
        <a href="{{ route('maintenances') }}" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">
            Listado de Mantenimientos
        </a>
    </x-slot>

    <div class="py-12 space-y-6">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-16 ">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg items-center">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        Detalles del Mantenimiento
                    </h2>
                </div>

            <div>
                <div class="px-6 flex flex-col">
                    <p class="text-lg text-gray-800 font-bold dark:text-gray-400 py-4">Información de la Máquina</p>
                    <p class="text-gray-500 dark:text-gray-400"><strong>Número de Serie:</strong> {{ $maintenances->machine->serial_number }}</p>
                    <p class="text-gray-500 dark:text-gray-400"><strong>Tipo:</strong> {{ $maintenances->machine->type_machine->name }}</p>
                    <p class="text-gray-500 dark:text-gray-400"><strong>Modelo:</strong> {{ $maintenances->machine->brand }} {{ $maintenances->machine->model }}</p>
                </div>
            </div>
            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
                <p class="text-lg text-gray-800 font-bold dark:text-gray-400 py-4">Información del Mantenimiento</p>
                <p class="text-gray-600 dark:text-gray-300"><strong>Tipo:</strong> {{ $maintenances->typesMaintenance->name }}</p>
                <p class="text-gray-600 dark:text-gray-300"><strong>Descripción:</strong> {{ $maintenances->typesMaintenance->description }}</p>
                <p class="text-gray-600 dark:text-gray-300"><strong>Fecha:</strong> {{ $maintenances->maintenance_date }}</p>
                <p class="text-gray-600 dark:text-gray-300"><strong>Kilómetros:</strong> {{ $maintenances->maintenance_kilometers }}</p>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex items-center justify-center">
                <a href="{{ route('maintenances.edit', $maintenances->id) }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                    ✏️ Editar Mantenimiento
                </a>
            </div>
        </div>

        @if ($errors->any())
            <div class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-16">
                <div class="p-4 bg-red-100 text-red-700 rounded-lg shadow-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
