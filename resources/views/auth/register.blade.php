<x-guest-layout>
    
    <div class="flex justify-between items-center">
        <div class="lg:hidden">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Ruteando" class="h-10 w-auto" />
            </a>
        </div>
        <div class="hidden lg:block"></div>
    </div>

    <div class="flex-1 flex flex-col justify-center mx-2 sm:mx-4 md:mx-8">
        
        <div class="text-center mb-6">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-3">Crea tu cuenta</h2>
            <p class="text-sm md:text-base text-slate-500 dark:text-slate-400">Completa tus datos para comenzar a usar la plataforma.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input 
                    id="name" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    required 
                    autofocus 
                    autocomplete="name" 
                    placeholder="Ej. Juan Pérez"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input 
                    id="email" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autocomplete="username" 
                    placeholder="tucorreo@ejemplo.com"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Contraseña')"/>
                <x-text-input 
                    id="password" 
                    type="password"
                    name="password"
                    required 
                    autocomplete="new-password" 
                    placeholder="Mínimo 8 caracteres"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')"/>
                <x-text-input 
                    id="password_confirmation" 
                    type="password"
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" 
                    placeholder="Repite tu contraseña"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="pt-4 my-6 flex justify-center">
                <x-primary-button type="submit">
                    <span class="relative flex items-center justify-center gap-2 group-hover:text-white transition-colors duration-300">
                        {{ __('Registrarse') }}
                        <span class="material-symbols-outlined">arrow_right_alt</span>
                    </span>
                </x-primary-button>
            </div>
        </form>

        <div class="text-sm text-slate-600 dark:text-slate-400 flex justify-center items-center">
            {{ __('¿Ya tienes cuenta?') }}
            <a href="{{ route('login') }}" class="font-semibold text-[#DB8814] dark:text-[#DB8814] ml-1.5 transition-colors">
                {{ __('Inicia sesión aquí') }}
            </a>
        </div>
    </div>

    <div class="flex justify-between text-xs text-slate-400 dark:text-slate-500 pt-2 border-t border-slate-100 dark:border-slate-800">
        <p>© {{ date('Y') }} Ruteando</p>
        <div class="space-x-4">
            <a href="#" class="hover:text-slate-600 dark:hover:text-slate-300 transition-colors">Privacidad</a>
            <a href="#" class="hover:text-slate-600 dark:hover:text-slate-300 transition-colors">Soporte</a>
        </div>
    </div>
</x-guest-layout>