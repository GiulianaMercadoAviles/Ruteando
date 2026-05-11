<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('img/logoclaro.png') }}" class="w-full">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Instrument Sans', sans-serif; }
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        </style>
    </head>
    <body >
        <x-header>
        
        @if (Route::has('login'))
            <nav class="flex items-center gap-4">
                @auth
                    <x-link href="{{ url('/dashboard') }}">
                                Dashboard
                            </x-link >
                        @else
                            <x-link  href="{{ route('login') }}">
                                Iniciar Sesión
                            </x-link>

                            @if (Route::has('register'))
                                <x-link-button href="{{ route('register') }}">
                                    Registrarse
                                </x-link-button>
                            @endif
                        @endauth
                    </nav>
                @endif
        </x-header>

        <main class="flex-grow flex flex-col items-center justify-center relative overflow-hidden pt-28 pb-16 px-6">

            <div class="w-full max-w-5xl mx-auto flex flex-col items-center text-center animate-fade-in-up">
                
                <div class="relative group mb-8">
                    <img src="{{ asset('img/logoclaro.png') }}" alt="Logo Ruteando" class="relative h-40 md:h-56 w-auto object-contain drop-shadow-2xl transform transition-transform duration-500 group-hover:scale-105">
                </div>

                <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-[#5E5E5E] dark:from-white dark:to-slate-400 mb-6 drop-shadow-sm">
                    Máquinas en Orden,
                    <span class="text-black dark:text-black">Rutas en Marcha</span>
                </h1>
                
                <p class="text-md md:text-lg text-slate-600 dark:text-slate-400 max-w-2xl mb-12 mt-6 leading-relaxed">
                    Gestiona tu flota, optimiza tus rutas y mantén el control total de tus operaciones logísticas en una plataforma intuitiva y moderna.
                </p>
                
                @if (Route::has('login'))
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                    <x-primary-button href="{{ route('login') }}">
                        <span class="relative flex items-center justify-center gap-2 group-hover:text-white transition-colors duration-300">
                            Comenzar Ahora
                        <span class="material-symbols-outlined">arrow_right_alt</span>
                        </span>
                    </x-primary-button>
                        
                        @if (Route::has('register'))
                            <x-secondary-button href="{{ route('register') }}">
                                Crear una Cuenta
                            </x-secondary-button>
                        @endif
                    </div>
                @endif
                
                <!-- Cards de Características -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-20 text-left w-full">
                    <x-card>
                        <div class="w-12 h-8 rounded-xl bg-amber-100 dark:bg-amber-900/50 flex items-center justify-center text-[#ED9E14] dark:text-amber-400 mb-4 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined">
                                map
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Rutas Optimizadas</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Planificación inteligente para reducir tiempos de entrega, costos y maximizar la eficiencia.</p>
                    </x-card>
                    
                    <x-card>
                        <div class="w-12 h-12 rounded-xl bg-amber-100 dark:bg-amber-900/50 flex items-center justify-center text-[#ED9E14] dark:text-amber-400 mb-4 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined">
                                schedule
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Control en Tiempo Real</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Monitorea tu flota, visualiza la ubicación y estado de cada entrega en cada momento.</p>
                    </x-card>
                    
                    <x-card>
                        <div class="w-12 h-12 rounded-xl bg-amber-100 dark:bg-amber-900/50 flex items-center justify-center text-[#ED9E14] dark:text-amber-400 mb-4 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined">
                                auto_towing
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Gestión de Flota</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Administración completa de vehículos, mantenimientos preventivos y conductores.</p>
                    </x-card>
                </div>

            </div>
        </main>
        
        <!-- Footer -->
        <footer class="w-full py-6 text-center border-t border-transparent dark:border-t-transparent mt-auto bg-[#252525]/70 dark:bg-slate-950">
            <p class="text-white dark:text-slate-400 text-sm font-medium">
                &copy; {{ date('Y') }} Ruteando. Todos los derechos reservados.
            </p>
        </footer>
    </body>
</html>