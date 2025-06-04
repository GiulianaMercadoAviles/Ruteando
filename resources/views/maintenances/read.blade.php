<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mantenimientos') }}
        </h2>
        <a href="create" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Registrar Mantenimiento</a>
    </x-slot>

    <x-alerts
        :success="session('success')"
        :error="session('error')"
        :info="session('info')"
    />

    <div class="px-20 bg-[#EFEFEF] flex items-center justify-center py-4 gap-4">
        <form action="{{ route('maintenances.search') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-4 w-full max-w-4xl">
            <input type="text" name="search" id="search" placeholder="Busca por número de serie" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" aria-label="Buscar por número de serie">
            <select name="type" id="type" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" aria-label="Seleccionar el tipo de mantenimiento">
                <option value="">-- Seleccione el tipo de mantenimiento --</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <button id="searchButton" type="submit" class="bg-[#686D76] text-white text-sm px-4 py-2 rounded hover:bg-[#45474B] mt-2 sm:mt-0">Buscar</button>
            <a href="{{ route('maintenances') }}" class="bg-[#686D76] text-white text-sm py-2 rounded hover:bg-[#45474B] mt-2 sm:mt-0 w-96 text-center">Limpiar Filtros</a>
        </form>
    </div>

    @if ($maintenances->isEmpty())
        <div class="text-center py-8">
            <p class="text-gray-600">No hay mantenimientos registrados.</p>
        </div>
    
    @endif

    @if ($maintenances->isNotEmpty())

    <div class="py-8 px-12 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 bg-[#EFEFEF] items-center">
        @foreach ($maintenances as $maintenance)
            <div class="max-w-5xl px-10 sm:px-10 lg:px-6 py-2">
                <div class="max-w-5xl px-10 sm:px-10 lg:px-6">
                    <div class="px-6 py-4 bg-white dark:bg-gray-700 rounded-lg shadow flex justify-between items-center gap-x-4 overflow-hidden transition duration-300 ease-in-out hover:shadow-lg">
                        <div class="max-w-xl">
                            <button onclick="showMachineDetails(
                                '{{ $maintenance->machine->serial_number }}',
                                '{{ $maintenance->machine->type_machine->name }}',
                                '{{ $maintenance->typesMaintenance->name }}',
                                '{{ $maintenance->typesMaintenance->description }}',
                                '{{ $maintenance->maintenance_kilometers }}',
                                '{{ $maintenance->maintenance_date }}',
                            )" 
                            class="text-lg font-semibold text-gray-500 hover:text-gray-900">{{ $maintenance->machine->serial_number }}</button>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-200">{{ $maintenance->typesMaintenance->name }}</p>
                            <p class="mt-2 text-sm {{ $maintenance->is_active == 1 ? 'text-green-800' : ' text-orange-800' }}">
                                {{ $maintenance->is_active == 1 ? 'Finalizado' : 'En proceso' }}
                            </p>

                        </div>
                        <div class="px-4 py-2 flex space-x-4 items-center">
                            <a href="{{ route('maintenances.edit', $maintenance->id) }}" class="bg-[#686D76] text-white px-4 py-2 rounded hover:bg-[#45474B]"><span class="material-symbols-outlined relative top-1">edit</span></a>
                            <a href="{{ route('maintenances.destroy', $maintenance->id) }}" class="bg-[#686D76] text-white px-4 py-2 rounded hover:bg-[#45474B]"><span class="material-symbols-outlined relative top-1">delete</span></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach 
    </div>

    <div class="max-w-7xl mx-auto pb-8 sm:px-16 lg:px-20 bg-[#EFEFEF]">
        {{ $maintenances->links() }}
    </div>

    <div id="machineDetailsModal" class="modal-overlay hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="modal-content bg-white p-6 rounded-lg shadow-lg max-w-2xl">
            @include('components.card')
        </div>
    </div>
    
    <script>
        function showMachineDetails(serial, type, typeName, description, kilometers, date) {
            document.getElementById('modalSerialNumber').innerText = serial;
            document.getElementById('modalType').innerText = type;
            document.getElementById('modalTypeName').innerText = typeName;
            document.getElementById('modalDescription').innerText = description;
            document.getElementById('modalKilometers').innerText = kilometers;
            document.getElementById('modalDate').innerText = date;

            document.getElementById('machineDetailsModal').classList.remove('hidden');
        }

        function hideMachineDetails() {
            document.getElementById('machineDetailsModal').classList.add('hidden');
        }
    </script>
    @endif
</x-app-layout>

