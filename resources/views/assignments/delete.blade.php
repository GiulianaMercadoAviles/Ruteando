<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Finalizar Asignaciones') }}
        </h2>
    </x-slot>
    
    <div class="py-12 bg-[#EFEFEF] ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>

                    <form action="{{ route( 'assignments.destroy', $assignments->id) }}" method="POST">
                    @csrf

                        <div class="mb-4">
                            <label for="roadWork_id" class="block text-gray-200 text-sm font-bold mb-2">Obra Vial:</label>
                            <select name="roadWork_id" id="roadWork_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value=" {{ old('name', $assignments->roadwork_id) }}">{{ old('roadWork', $assignments->roadWork->name) }}</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="machine_id" class="block text-gray-200 text-sm font-bold mb-2">Maquina:</label>
                            <select name="machine_id" id="machine_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value=" {{ old('name', $assignments->machine_id) }}">{{ old('machine', $assignments->machine->serial_number) }}</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="kilometers_traveled" class="block text-gray-200 text-sm font-bold mb-2">Kilometros recorridos:</label>
                            <input type="number" name="kilometers_traveled" id="kilometers_traveled" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('kilometers_travelled', $assignments->kilometers_traveled) }}">
                        </div>

                        <div class="mb-4">
                            <label for="start_date" class="block text-gray-200 text-sm font-bold mb-2">Fecha de Inicio:</label>
                            <input type="date" name="start_date" id="start_date" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('start_date', $assignments->start_date) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="end_date" class="block text-gray-200 text-sm font-bold mb-2">Fecha de Fin Estimada:</label>
                            <input type="date" name="end_date" id="end_date" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('end_date', $assignments->end_date) }}">
                        </div>
                        
                        <div class="mb-4">
                            <label for="end_reason_id" class="block text-gray-200 text-sm font-bold mb-2">Razón de Fin:</label>
                            <select name="end_reason_id" id="end_reason_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"required>
                                <option value="">-- Seleccione la Razón de Fin--</option>
                                @foreach ($endReasons as $endReason)
                                    <option value="{{ $endReason->id }}">{{ $endReason->motive }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Finalizar</button>
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
