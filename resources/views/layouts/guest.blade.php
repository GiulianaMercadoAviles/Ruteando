<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('img/logoclaro.png') }}" class="w-full">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Instrument Sans', sans-serif; }
        </style>
    </head>
    <body class="font-sans antialiased bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-50 selection:bg-indigo-500 selection:text-white">
        
        <div class="min-h-screen flex">
            
            <!-- Columna de Imagen -->
            <div class="hidden lg:flex lg:w-1/2 relative bg-slate-900 overflow-hidden">
                
                <img src="{{ asset('img/maquinas_viales.png') }}" alt="Maquinaria vial trabajando" class="absolute inset-0 w-full h-full object-cover opacity-50 transition-transform duration-1000 hover:scale-105">

                <!-- Gradientes Superpuestos -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/60 to-indigo-900/40 mix-blend-multiply"></div>
                <div class="absolute top-1/4 left-1/4 w-[400px] h-[400px] bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col justify-end items-center text-center p-12 w-full h-full pb-20">
                </div>
            </div>

            <!-- Columna del Formulario -->
            <div class="w-full lg:w-1/2 flex flex-col bg-white dark:bg-slate-950 relative">
                
                <!-- Decoración de Fondo (Modo Oscuro/Claro) -->
                <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-purple-500/5 dark:bg-purple-500/10 rounded-full blur-3xl -z-10 pointer-events-none translate-x-1/3 -translate-y-1/3"></div>

                <div class="flex-1 flex flex-col w-full max-w-xl mx-auto px-6 py-0 sm:px-8 sm:py-0 justify-center z-10">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </body>
</html>