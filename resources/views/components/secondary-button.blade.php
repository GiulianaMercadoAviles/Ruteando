@props(['href' => null])

@php
    $classes = 'group relative px-8 py-4 bg-white dark:bg-slate-900 text-black dark:text-white font-semibold rounded-lg overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md hover:border-[#ED9E14] dark:hover:border-[#ED9E14] hover:bg-[#ED9E14] dark:hover:bg-[#ED9E14] transition-all duration-300 flex items-center justify-center gap-2';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif