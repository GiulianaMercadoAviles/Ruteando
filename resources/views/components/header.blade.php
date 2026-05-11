<header class="fixed top-0 w-full z-50 transition-all duration-300 bg-[#252525]/80 dark:bg-slate-950/70 backdrop-blur-md  border-none">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-3">
            <img src="{{ asset('img/logoclaro.png') }}" alt="Ruteando Logo" class="h-10 w-auto object-contain">
        </div>
            {{ $slot }}        
    </div>
</header>