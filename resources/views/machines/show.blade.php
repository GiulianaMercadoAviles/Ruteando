<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Detalles de la Maquina") }}
        </h2>
        <a href="{{ route('machines') }}" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Listado de Maquinas</a>
    </x-slot>

    <div class="py-8 space-y-6">
        <div class="max-w-8xl mx-auto px-14 sm:px-16 lg:px-20 grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <h1 class="pb-2 text-xl font-semibold">{{ $machine->serial_number }}</h1>
                    <p class="block text-gray-800 text-sm mb-2">{{ $machine->type_machine->name }}</p>
                    <p class="block text-gray-800 text-sm mb-2">{{ $machine->brand }} {{ $machine->model }}</p>
                </div>

                <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg flex flex-col justify-center">
                    <p class="block text-gray-800 text-sm mb-2">Kilometros: {{ $machine->life_kilometers }}</p>
                    <p class="block text-gray-800 text-sm mb-2">Kilometros de Mantenimiento: {{ $machine->maintenance_kilometers_limit }}</p>
                </div>

                <div class="py-6 bg-white dark:bg-gray-800 shadow rounded-lg flex justify-center items-center">
                     <img src="{{ asset($machine->type_machine->image) }}" alt="Imagen de la Máquina" class="w-32">
                </div>
            </div>

        @if($assignmentActive)
            <div class="max-w-8xl mx-auto px-14 sm:px-16 lg:px-20">
                <div class="p-4 sm:p-10 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col">
                    <div>
                        <div class="px-4 sm:px-0">
                            <h2 class="pb-3 text-lg font-semibold">Asignación Actual</h2>
                            <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Detalles de la asignación.</p>
                        </div>
                        <div class="mt-4 border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">Nombre de la Obra Vial</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $assignmentActive->roadwork->name }}</dd>
                            </div>
                            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">Provincia</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $assignmentActive->roadwork->province->name }}</dd>
                            </div>
                            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">Fecha de inicio</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $assignmentActive->start_date }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="max-w-8xl mx-auto px-14 sm:px-16 lg:px-20">
                <div class="p-4 sm:p-10 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col">
                    <div>
                        <p>No hay asignación activa para esta máquina.</p>
                    </div>
                </div>
            </div>
            
        @endif
        
        <div class="max-w-8xl mx-auto px-14 sm:px-16 lg:px-20">
            <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col items-center">        
                <div class="overflow-x-auto w-full mt-3">
                    <h2 class="pb-3 text-lg font-semibold">Asignaciones Pasadas</h2>
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Inicio</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Fin</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Razón de Fin</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($assignments as $assignment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->roadwork->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->roadwork->province->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->start_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->end_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->endReason->motive }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="max-w-8xl mx-auto px-14 sm:px-16 lg:px-20">
            <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col items-center">
                <div class="overflow-x-auto w-full">
                    <div class="px-6 py-4 bg-white dark:bg-gray-700 rounded-lg shadow flex justify-between items-center gap-x-4 overflow-hidden transition duration-300 ease-in-out hover:shadow-lg">
                        <h2 class="pb-3 text-lg font-semibold">Historial de Mantenimientos</h2>
                        <a href="{{ route('history', $machine->id) }}" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Generar Historial en PDF</a>
                    </div>
                    <table class="min-w-full ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kilometros</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white ">
                            @foreach ($machine->maintenance as $maintenance)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $maintenance->maintenance_date }}</td>
                                    <td class="px-6 py-4 whitespace-wrap ">{{ $maintenance->maintenance_kilometers }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $maintenance->typesMaintenance->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
