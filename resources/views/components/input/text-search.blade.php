
@props(['disabled' => false])
<span class="absolute">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-3 ml-5 text-gray-400 dark:text-gray-600">
    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
  </svg>
</span>
<input type="text" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-xs rounded peer bg-white block w-full py-1.5 pl-9 rtl:pr-11 border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0']) !!}>
