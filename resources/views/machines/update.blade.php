<x-app-layout>
    <x-slot name="header">
        <h2 class="py-3 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Actualizar información sobre Maquina Vial') }}
        </h2>
        <a href="{{ route('machines') }}" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Listado de Maquinas</a>
    </x-slot>

    <div class="py-10 px-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <form action="{{ route('machines.update', $machine->id) }}" method="POST">
                        @csrf
                        @method('PUT')  

                        <div class="mb-4">
                            <label for="serial_number" class="block text-gray-800 text-sm font-bold mb-2">Serial Number:</label>
                            <input type="text" name="serial_number" id="serial_number" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('serial_number', $machine->serial_number) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="type_machine_id" class="block text-gray-800 text-sm font-bold mb-2">Tipo de Maquina:</label>
                            <select name="type_machine_id" id="type_machine_id" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" required>
                             @foreach ($type_machines as $type_machine)
                                <option value="{{ $type_machine->id }}">{{ $type_machine->name }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="model" class="block text-gray-800 text-sm font-bold mb-2">Modelo:</label>
                            <input type="text" name="model" id="model" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('model', $machine->model) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="brand" class="block text-gray-800 text-sm font-bold mb-2">Marca:</label>
                            <input type="text" name="brand" id="brand" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('brand', $machine->brand) }}" required>
                        </div>


                        <div class="mb-4">
                            <label for="status" class="block text-gray-800 text-sm font-bold mb-2">Estado:</label>
                            <select name="status_id" id="status_id" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" required> 
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->situation }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="current_kilometers" class="block text-gray-800 text-sm font-bold mb-2">Kilometros Actuales:</label>
                            <input type="number" name="current_kilometers" id="current_kilometers" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('current_kilometers', $machine->current_kilometers) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="maintenance_kilometers_limit" class="block text-gray-800 text-sm font-bold mb-2">Kilometros de Mantenimiento:</label>
                            <input type="text" name="maintenance_kilometers_limit" id="maintenance_kilometers_limit" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('maintenance_kilometers_limit', $machine->maintenance_kilometers_limit) }}" required>
                        </div>

                        <button type="submit" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Actualizar</button>
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
