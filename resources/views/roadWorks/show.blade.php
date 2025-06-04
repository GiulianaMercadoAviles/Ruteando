<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Detalles de la Obra") }}
        </h2>
         <a href="{{ route('roadWorks')}}" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Listado de Obras</a>
    </x-slot>

    <div class="py-12 space-y-6">
        <!-- Información General -->
        <div class="max-w-8xl mx-auto px-14 sm:px-16 lg:px-20 grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <h2 class="text-2xl font-semibold mb-2">{{ $roadWork->name }}</h2>
                <p class="text-gray-600 dark:text-gray-300"><strong>Provincia:</strong> {{ $roadWork->province->name }}</p>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg flex flex-col justify-center">
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    <strong>Fecha de inicio:</strong> {{ $roadWork->start_date }}
                </p>
                <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                    <strong>Fecha de fin estimada:</strong> {{ $roadWork->planned_end_date }}
                </p>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    <strong>Cantidad de Maquinas Asignadas:</strong> {{ $assignmentsActive->count() }}
                </p>
            </div>
        </div>

        <div class="max-w-8xl mx-auto px-14 sm:px-16 lg:px-20">
            <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col items-center">
                <div class="overflow-x-auto w-full">
                    <h2 class="text-xl font-semibold mb-4">Asignaciones Activas</h2>
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numero de Serie</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Máquina</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Inicio</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kilometros Recorridos</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($assignmentsActive as $assignment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->machine->serial_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->machine->type_machine->name }} {{ $assignment->machine->brand }} {{ $assignment->machine->model }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->start_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->kilometers_travelled }}</td>
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
                    <h2 class="text-xl font-semibold mb-4">Asignaciones Pasadas</h2>
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numero de Serie</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Máquina</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Inicio</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Fin</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kilometros Recorridos</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($assignmentsInactive as $assignment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->machine->serial_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->machine->type_machine->name }} {{ $assignment->machine->brand }} {{ $assignment->machine->model }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->start_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->end_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->kilometers_traveled }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="max-w-8xl mx-auto px-14 sm:px-16 lg:px-20">
                <div class="alert alert-danger p-4 bg-red-100 text-red-700 rounded-lg">
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
