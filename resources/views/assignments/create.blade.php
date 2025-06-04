<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignaciones') }}
        </h2>
        <a href="read" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Listado de Asignaciones</a>
    </x-slot>

    <div class="py-12 bg-[#EFEFEF] ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                      {{ __("Registrar nueva de Maquina Vial") }}  
                    </div>
                    
                    <form action="{{ route( 'assignments.store') }}" method="POST">
                    @csrf

                        <div class="mb-4">
                            <label for="machine_id" class="block text-gray-200 text-sm font-bold mb-2">Maquina:</label>
                            <select name="machine_id" id="machine_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                                <option value=" ">-- Seleccione la Maquina --</option>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id }}">{{ $machine->serial_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="roadwork_id" class="block text-gray-200 text-sm font-bold mb-2">Obra Vial:</label>
                            <select name="roadwork_id" id="roadwork_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                                <option value=" ">-- Seleccione la Obra --</option>
                                @foreach ($roadWorks as $roadWork)
                                    <option value="{{ $roadWork->id }}">{{ $roadWork->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="start_date" class="block text-gray-200 text-sm font-bold mb-2">Fecha de Inicio:</label>
                            <input type="date" name="start_date" id="start_date" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                        </div>

                        <button type="submit" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Registrar</button>                    
                </form>

                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

