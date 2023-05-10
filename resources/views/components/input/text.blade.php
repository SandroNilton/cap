@props(['disabled' => false])

<input type="text" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-xs rounded peer bg-white block w-full py-1.5 border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0']) !!}>
@props([
'leadingAddOn',

])

<!--
<div class="max-w-lg flex rounded-md shadow-sm">
    @isset ($leadingAddOn)
        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">{{ $leadingAddOn }}</span>
    @endif
    <input {{ $attributes }} autocomplete="off" class="@isset($leadingAddOn) rounded-none rounded-r-md @endif flex-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
</div>-->