<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Actualizar información sobre la Obra Vial") }} 
        </h2>
        <a href="{{ route('roadWorks') }}" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Listado de Obras</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('roadWorks.update', $roadWork->id) }}" method="POST">
                        @csrf
                        @method('PUT')  

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                            <input type="text" name="name" id="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('name', $roadWork->name) }}" >
                        </div>

                        <div class="mb-4">
                            <label for="province_id" class="block text-gray-700 text-sm font-bold mb-2">Provincia:</label>
                            <select name="province_id" id="province_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" required>
                                <option value="{{ old('name', $roadWork->province->id) }}">{{ old('province_id', $roadWork->province->name) }}</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Inicio:</label>
                            <input type="date" name="start_date" id="start_date" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('start_date', $roadWork->start_date) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="planned_end_date" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Fin:</label>
                            <input type="date" name="planned_end_date" id="planned_end_date" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" value="{{ old('planned_end_date', $roadWork->planned_end_date) }}">
                        </div>

                        <button type="submit" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">
                            Actualizar
                        </button>
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
