@props(['href' => null])

@php
    $classes = 'group relative px-8 py-4 bg-black dark:bg-white text-white dark:text-black font-semibold rounded-lg overflow-hidden shadow-lg hover:shadow-xl ark:hover:border-[#4B4B4B] hover:bg-[#4B4B4B] transition-all duration-300';
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