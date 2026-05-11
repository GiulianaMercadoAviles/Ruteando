<x-guest-layout>
    <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Recuperar contraseña</h2>
            <p class="text-sm md:text-base text-slate-500 dark:text-slate-400">¿Olvidaste tu contraseña? No hay problema. Envíanos tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.'</p>
        </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-12">
            <x-primary-button>
                {{ __('Enviar enlace de restablecimiento') }}
            </x-primary-button>
        </div>
        <div class="text-sm text-slate-600 dark:text-slate-400 flex justify-center items-center mt-6">
            <a href="{{ route('login') }}" class="font-semibold text-[#DB8814] dark:text-[#DB8814] ml-1.5 transition-colors">
                {{ __('Volver al inicio de sesión') }}
            </a>
        </div>
    </form>
</x-guest-layout>
