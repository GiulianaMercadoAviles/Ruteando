<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mantenimientos') }}
        </h2>
        <a href="read" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Listado de Mantenimientos</a>
    </x-slot>

    <div class="py-12 bg-[#EFEFEF] ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                      {{ __("Registrar un nuevo Mantenimiento") }}  
                    </div>

                    <form action="{{ route('maintenances.update', $maintenances->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="machine_id" class="block text-gray-200 text-sm font-bold mb-2">Maquina:</label>
                            <select name="machine_id" id="machine_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                                <option value=" ">{{ old('serial_number', $maintenances->machine->serial_number) }}</option>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id }}">{{ $machine->serial_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="type_maintenance_id" class="block text-gray-200 text-sm font-bold mb-2">Tipo de Mantenimiento:</label>
                            @foreach ($types as $type)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="type_maintenance_id[]" value="{{ $type->id }}"
                                        @if($type->id == $maintenances->type_maintenance_id) checked @endif>
                                    <span>{{ $type->name }}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="mb-4">
                            <label for="maintenance_kilometers" class="block text-gray-200 text-sm font-bold mb-2">Kilometros:</label>
                            <input type="number" name="maintenance_kilometers" id="maintenance_kilometers" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('maintenance_kilometers', $maintenances->maintenance_kilometers) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="maintenance_date" class="block text-gray-200 text-sm font-bold mb-2">Fecha del mantenimiento:</label>
                            <input type="date" name="maintenance_date" id="maintenance_date" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('maintenance_date', $maintenances->maintenance_date) }}" required>
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

