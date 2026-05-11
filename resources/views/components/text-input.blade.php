@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'block mt-1.5  w-full border border-[#BFC3CC] dark:border-gray-700 dark:bg-gray-900 text-black text-sm dark:text-gray-300 focus:border-[#E2B631] focus:ring-[#E2B631] dark:focus:border-indigo-600  dark:focus:ring-indigo-600 rounded-md pl-2 py-2']) }}> 
                    