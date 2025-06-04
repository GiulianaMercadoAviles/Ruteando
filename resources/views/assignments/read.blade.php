<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignaciones') }}
        </h2>
        <a href="create" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Registrar Asignación</a>
    </x-slot>

    <x-alerts
        :success="session('success')"
        :error="session('error')"
        :info="session('info')"
    />
    
    <div class="max-w-8xl my-8 mx-auto px-14 sm:px-16 lg:px-20">
        <div class="p-5 sm:p-10 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col items-center overflow-x-auto w-full">
            <h2 class="pb-6 text-lg font-semibold">Asignaciones Activas</h2>
            <table class="min-w-full table-fixed">
                <thead class="bg-[#efefef]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maquina</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contrucción Vial</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kilometros Recorridos</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Inicio</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($assignments as $assignment)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->machine->serial_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->roadWork->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->kilometers_traveled }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->start_date }}</td>
                            <td class=" py-4 whitespace-nowrap">
                                <a href="{{ route('assignments.edit', $assignment->id) }}"  class="bg-[#686D76] text-white px-4 py-2 rounded hover:bg-[#45474B]"><span class="material-symbols-outlined relative top-1.5">edit</span></a>
                                <a href="{{ route('assignments.delete', $assignment->id) }}"  class="bg-[#686D76] text-white px-4 py-2 rounded hover:bg-[#45474B]"><span class="material-symbols-outlined relative top-1.5">delete</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="max-w-8xl mx-auto px-14 sm:px-16 lg:px-20">
        <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col items-center overflow-x-auto w-full">
            <h2 class="pb-6 text-lg font-semibold">Asignaciones Pasadas</h2>
                <table class="min-w-full">
                <thead class="bg-[#efefef]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maquina</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contrucción Vial</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kilometros Recorridos</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Inicio</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Fin</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Razón de Fin</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($finishedAssignments as $assignment)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->machine->serial_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->roadWork->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->kilometers_traveled }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->start_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->end_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->endReason->motive }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="max-w-8xl mx-auto py-8 x-14 sm:px-16 lg:px-20">
        <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex items-center overflow-x-auto w-full">
            <form action="{{ route('assignments.history') }}" method="POST">
            @csrf
                <h2 class="py-2">Generar resumen mensual</h2>
                <label for="month"></label>
                <input type="month" id="month" name="month" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                <button class="bg-[#686D76] text-white my-4 px-3 py-2 text-sm rounded hover:bg-[#45474B]">Generar</button>
            </form>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ $assignments->links() }}
    </div>
        
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif    
</x-app-layout>
