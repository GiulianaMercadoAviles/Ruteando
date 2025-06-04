<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Maquinas Viales') }}
        </h2>
        <a href="create" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Registrar Nueva Maquina</a>
    </x-slot>

    <x-alerts
        :success="session('success')"
        :error="session('error')"
        :info="session('info')"
    />

    <div class="px-20 bg-[#EFEFEF] flex items-center justify-center py-4 gap-4">
        <form action="{{ route('machines.search') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-4 w-full max-w-4xl">
            <input type="text" name="search" id="search" placeholder="Busca por número de serie" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" aria-label="Buscar por número de serie">
            <select name="type" id="type" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-grey-600 sm:text-sm/6" aria-label="Seleccionar el tipo de máquina">
                <option value="">-- Seleccione el tipo de máquina --</option>
                @foreach ($machines as $machine)
                    <option value="{{ $machine->type_machine->id }}">{{ $machine->type_machine->name }}</option>
                @endforeach
            </select>
            <button id="searchButton" type="submit" class="bg-[#686D76] text-white text-sm px-4 py-2 rounded hover:bg-[#45474B] mt-2 sm:mt-0">Buscar </button>
            <a href="{{ route('machines') }}" class="bg-[#686D76] text-white text-sm py-2 rounded hover:bg-[#45474B] mt-2 sm:mt-0 w-96 text-center">Limpiar Filtros</a>
        </form>
    </div>

    <div class="py-4 px-20 space-y-6">
        <div class="mb-6 flex justify-center space-x-4">
            <button onclick="filterMachines()" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Todas</button>
            <button onclick="filterMachines('Asignado')" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Asignadas</button>
            <button onclick="filterMachines('No asignado')" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">No Asignadas</button>
            <button onclick="filterMachines('En mantenimiento')" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">En Mantenimiento</button>
            <button onclick="filterMachines('Fuera de servicio')" class="bg-[#686D76] text-white px-3 py-2 text-sm rounded hover:bg-[#45474B]">Fuera de Servicio</button>
        </div>

        @if ($machines->isEmpty() && $notAvailableMachines->isEmpty())
            <div class="text-center py-8">
                <p class="text-gray-600">No hay máquinas registradas.</p>
            </div>
        @endif

        @if ($machines->isNotEmpty() || $notAvailableMachines->isNotEmpty())
            <div id="machines-list" class="py-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-10">
                @foreach ($machines as $machine)
                    @include('components.machine-card', ['machine' => $machine])
                @endforeach
            </div>
            <div id="machines-list" class="py-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-10">
                @foreach ($notAvailableMachines as $machine)
                    @include('components.machine-card', ['machine' => $machine])
                @endforeach
            </div> 
        </div>

        <script>
            function filterMachines(status = '') {
                document.querySelectorAll('.machine-card').forEach(card => {
                    card.style.display = status === '' || card.dataset.status === status ? 'flex' : 'none';
                });
            }
        </script>
        @endif

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
