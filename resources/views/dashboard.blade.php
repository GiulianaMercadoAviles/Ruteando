<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg rounded-xl">
                <div class="p-6 text-gray-900 dark:text-gray-60">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Gestiona tus Máquinas Viales de manera rápida y eficiente
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-8xl my-8 mx-auto px-14 sm:px-16 lg:px-20 flex gap-6">
        <div class="p-6 sm:p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col items-center overflow-x-auto w-full">
            <a href="{{ route('machines') }}" class="flex flex-col items-center gap-4">
                <img src="{{ asset('img/maquinas_viales.png') }}" alt="Maquinas Viales" class="w-48 h-48">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Máquinas Viales') }}
                </h2>
            </a>
        </div>

        <div class="p-6 sm:p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col items-center overflow-x-auto w-full">
            <a href="{{ route('roadWorks') }}" class="flex flex-col items-center gap-4">
                <img src="{{asset('img/obra_vial.png')}}" alt="Imagen de obras viales" class="w-48 h-48">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Obras Viales') }}
                </h2>
            </a>
        </div>

        <div class="p-6 sm:p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col items-center overflow-x-auto w-full">
            <a href="{{ route('maintenances') }}" class="flex flex-col items-center gap-4">
                <img src="{{asset('img/mantenimiento_vial.png')}}" alt="Imagen de mantenimiento vial" class="w-48 h-48">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Mantenimientos') }}
                </h2>
            </a>
        </div>

        <div class="p-6 sm:p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-col items-center overflow-x-auto w-full">
            <a href="{{ route('assignments') }}" class="flex flex-col items-center gap-4">
                <img src="{{asset('img/asignacion_vial.png')}}" alt="Imagen de asignación vial" class="w-48 h-48">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Asignaciones') }}
                </h2>
            </a>
        </div>
    </div>
</x-app-layout>
