<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-[#ED9E14] hover:bg-[#DB8814] dark:bg-[#ED9E14] dark:hover:bg-[#D48700] rounded-md transition-all duration-200 border-[none] py-2 px-4 p-3 text-white text-sm leading-normal text-center pointer font-bold tracking-wide']) }}>
    {{ $slot }}
</button>