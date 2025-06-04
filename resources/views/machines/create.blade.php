<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Registrar nueva de Maquina Vial") }}
        </h2>
        <a href="{{ route('machines') }}" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Listado de Maquinas</a>
    </x-slot>

    <div class="py-10 px-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route( 'machines.store') }}" method="POST">
                    @csrf
                        <div class="mb-4">
                            <label for="serial_number" class="block text-gray-800 text-sm font-bold mb-2">Serial Number:</label>
                            <input type="text" name="serial_number" id="serial_number" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                        </div>

                        <div class="mb-4">
                            <label for="type_machine_id" class="block text-gray-800 text-sm font-bold mb-2">Tipo de Maquina:</label>
                            <select name="type_machine_id" id="type_machine_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                                <option value=" ">-- Seleccione el Tipo de Maquina --</option>
                                @foreach ($type_machines as $type_machine)
                                    <option value="{{ $type_machine->id }}">{{ $type_machine->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="model" class="block text-gray-800 text-sm font-bold mb-2">Modelo:</label>
                            <input type="text" name="model" id="model" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                        </div>

                        <div class="mb-4">
                            <label for="brand" class="block text-gray-800 text-sm font-bold mb-2">Marca:</label>
                            <input type="text" name="brand" id="brand" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                        </div>

                        <div class="mb-4">
                            <label for="current_kilometers" class="block text-gray-800 text-sm font-bold mb-2">Kilometros Actuales:</label>
                            <input type="number" name="current_kilometers" id="current_kilometers" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                        </div>

                        <div class="mb-4">
                            <label for="maintenance_kilometers_limit" class="block text-gray-800 text-sm font-bold mb-2">Kilometros de Mantenimiento:</label>
                            <input type="number" name="maintenance_kilometers_limit" id="maintenance_kilometers_limit" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                        </div>

                        <button type="submit" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
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
