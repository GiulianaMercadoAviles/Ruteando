@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-[#ED9E14] hover:bg-[#DB8814] dark:bg-[#ED9E14] dark:hover:bg-[#D48700] rounded-md transition-all duration-200 border-[none] py-2 px-5 text-white text-sm leading-normal text-center pointer font-bold tracking-wide inline-flex items-center transition-all duration-200 ease-out'
            : 'inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg text-white dark:text-white hover:text-[#DB8814] dark:hover:text-white transition-all duration-200 ease-out leading-normal text-center pointer font-bold tracking-wide';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
