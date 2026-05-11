<a href="{{ $href }}" {{ $attributes->merge(['class' => 'group block bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-2xl border border-gray-100 dark:border-gray-700 hover:border-amber-600/50 dark:hover:border-amber-400/50 transition-all duration-300 transform hover:-translate-y-2 relative overflow-hidden']) }}>
        {{ $slot }}
</a>