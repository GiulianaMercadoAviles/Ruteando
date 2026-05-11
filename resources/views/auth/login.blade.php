<x-guest-layout>
    
    <div class="flex justify-between items-center mb-4">
        <div class="lg:hidden">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Ruteando" class="h-10 w-auto" />
            </a>
        </div>
        <div class="hidden lg:block"></div> 
    </div>

    <div class="flex-1 flex flex-col justify-center mx-2 sm:mx-6 md:mx-8">
        
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-3">¡Bienvenido de vuelta!</h2>
            <p class="text-sm md:text-base text-slate-500 dark:text-slate-400">Por favor, ingresa tus datos para acceder a tu cuenta.</p>
        </div>

        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input 
                    id="email" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
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
                    autocomplete="current-password" 
                    placeholder="Mínimo 8 caracteres"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between pt-2">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-slate-300 dark:border-slate-700 text-[#DB8814] shadow-sm focus:ring-[#DB8814] dark:bg-slate-900">
                    <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">{{ __('Recordar usuario') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-[#DB8814] dark:text-[#DB8814] transition-colors">
                        {{ __('¿Olvidaste la contraseña?') }}
                    </a>
                @endif
            </div>

            <div class="pt-4 my-6 flex justify-center">
                <x-primary-button type="submit">
                    <span class="relative flex items-center justify-center gap-2 group-hover:text-white transition-colors duration-300">
                        {{ __('Iniciar sesión') }}
                        <span class="material-symbols-outlined">arrow_right_alt</span>
                    </span>
                </x-primary-button>
            </div>
            
        </form>

        <div class="text-sm text-slate-600 dark:text-slate-400 flex justify-center items-center">
            {{ __('¿No tienes cuenta?') }}
            <a href="{{ route('register') }}" class="font-semibold text-[#DB8814] dark:text-[#DB8814] ml-1.5 transition-colors">
                {{ __('Regístrate aquí') }}
            </a>
        </div>
    </div>

    <div class="flex justify-between text-xs text-slate-400 dark:text-slate-500 pt-4 border-t border-slate-100 dark:border-slate-800">
        <p>© {{ date('Y') }} Ruteando</p>
        <div class="space-x-4">
            <a href="#" class="hover:text-slate-600 dark:hover:text-slate-300 transition-colors">Privacidad</a>
            <a href="#" class="hover:text-slate-600 dark:hover:text-slate-300 transition-colors">Soporte</a>
        </div>
    </div>

</x-guest-layout>