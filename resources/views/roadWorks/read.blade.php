<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Obras Viales') }}
        </h2>
        <a href="create" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Registrar Nueva Obra</a>
    </x-slot>

    <x-alerts
        :success="session('success')"
        :error="session('error')"
        :info="session('info')"
    />

    <div class="px-20 bg-[#EFEFEF] flex items-center justify-center py-4 gap-4">
        <form action="{{ route('roadWorks.search') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-4 w-full max-w-4xl">
            <input type="text" name="search" id="search" placeholder="Busca por nombre" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" aria-label="Buscar por número de serie">
            <select name="province" id="province" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" aria-label="Seleccionar la provincia">
                <option value="">-- Seleccione la provincia --</option> <!-- Corrección aquí -->
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach
            </select>
            <button id="searchButton" type="submit" class="bg-[#686D76] text-white text-sm px-4 py-2 rounded hover:bg-[#45474B] mt-2 sm:mt-0">Buscar</button>
            <a href="{{ route('roadWorks') }}" class="bg-[#686D76] text-white text-sm py-2 rounded hover:bg-[#45474B] mt-2 sm:mt-0 w-96 text-center">Limpiar Filtros</a>
        </form>
    </div>

    <div class="py-12 space-y-6" >
        @foreach ($roadWorks as $roadWork)
            <div class="max-w-6xl mx-auto px-12 sm:px-16 lg:px-20">
                <div class="px-6 py-4 bg-white dark:bg-gray-700 rounded-lg shadow flex justify-between items-center gap-x-4 overflow-hidden transition duration-300 ease-in-out hover:shadow-lg">
                    <div class="max-w-xl">
                        <a href="{{ route('roadWorks.show', $roadWork->id) }}" class="text-lg font-semibold">{{ $roadWork->name }}</a>
                        <p class="text-sm py-2"><strong>Provincia:</strong> {{ $roadWork->province->name }}</p>
                    </div>
                    <div class="px-4 py-2 flex space-x-4 items-center">
                        <a href="{{ route('roadWorks.edit', $roadWork->id) }}" class="bg-[#686D76] text-white px-4 py-2 rounded hover:bg-[#45474B]"><span class="material-symbols-outlined relative top-1">edit</span></a>
                        <a href="{{ route('roadWorks.delete', $roadWork->id) }}" class="bg-[#686D76] text-white px-4 py-2 rounded hover:bg-[#45474B]"><span class="material-symbols-outlined relative top-1">delete</span></a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="max-w-6xl mx-auto px-12 sm:px-16 lg:px-20">
            {{ $roadWorks->links() }}
        </div>
    </div>
</x-app-layout>
