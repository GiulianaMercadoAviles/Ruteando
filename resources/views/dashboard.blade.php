<x-app-layout>

    <!-- Welcome / Header Section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-xl overflow-hidden relative">
                <!-- Background decoration -->
                <div class="absolute inset-0 bg-white/10" style="clip-path: polygon(10% 0, 100% 0%, 100% 100%, 0% 100%);"></div>
                
                <div class="p-8 sm:p-10 relative z-10">
                    <h2 class="font-extrabold text-3xl sm:text-4xl text-white tracking-tight drop-shadow-sm">
                        Bienvenido a Ruteando
                    </h2>
                    <p class="mt-6 text-md font-semibold text-[#4B4B4B] max-w-2xl">
                        Gestiona tus máquinas viales, obras, mantenimientos y asignaciones de manera rápida y eficiente en un solo lugar.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 xl:gap-8">
            
            <!-- Card 1: Máquinas Viales -->
            <x-card-modules href="{{ route('machines') }}">
                
                <div class="flex flex-col items-center gap-5 relative z-10">
                    <div class="p-4 rounded-full group-hover:scale-100 transition-all duration-300">
                        <img src="{{ asset('img/maquinas_viales.png') }}" alt="Maquinas Viales" class="w-32 h-32 object-contain drop-shadow-md group-hover:drop-shadow-xl transition-all duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="font-bold text-xl text-gray-800 dark:text-gray-100 group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors duration-300">
                            {{ __('Máquinas Viales') }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 font-medium">
                            Ver y administrar la flota
                        </p>
                    </div>
                </div>
            </x-card-modules>

            <!-- Card 2: Obras Viales -->
            <x-card-modules href="{{ route('roadWorks') }}">
                
                <div class="flex flex-col items-center gap-5 relative z-10">
                    <div class="p-4 rounded-full group-hover:scale-100 transition-all duration-300">
                        <img src="{{ asset('img/obra_vial.png') }}" alt="Imagen de obras viales" class="w-32 h-32 object-contain drop-shadow-md group-hover:drop-shadow-xl transition-all duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="font-bold text-xl text-gray-800 dark:text-gray-100 group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors duration-300">
                            {{ __('Obras Viales') }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 font-medium">
                            Gestión de proyectos activos
                        </p>
                    </div>
                </div>
            </x-card-modules>

            <!-- Card 3: Mantenimientos -->
            <x-card-modules href="{{ route('maintenances') }}">
                
                <div class="flex flex-col items-center gap-5 relative z-10">
                    <div class="p-4 rounded-full group-hover:scale-100 transition-all duration-300">
                        <img src="{{ asset('img/mantenimiento_vial.png') }}" alt="Imagen de mantenimiento vial" class="w-32 h-32 object-contain drop-shadow-md group-hover:drop-shadow-xl transition-all duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="font-bold text-xl text-gray-800 dark:text-gray-100 group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors duration-300">
                            {{ __('Mantenimientos') }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 font-medium">
                            Control de revisiones
                        </p>
                    </div>
                </div>
            </x-card-modules>

            <!-- Card 4: Asignaciones -->
            <x-card-modules href="{{ route('assignments') }}">
                
                <div class="flex flex-col items-center gap-5 relative z-10">
                    <div class="p-4 rounded-full group-hover:scale-100 transition-all duration-300">
                        <img src="{{ asset('img/asignacion_vial.png') }}" alt="Imagen de asignación vial" class="w-32 h-32 object-contain drop-shadow-md group-hover:drop-shadow-xl transition-all duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="font-bold text-xl text-gray-800 dark:text-gray-100 group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors duration-300">
                            {{ __('Asignaciones') }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 font-medium">
                            Distribución de tareas
                        </p>
                    </div>
                </div>
            </x-card-modules>

        </div>
    </div>
</x-app-layout>
