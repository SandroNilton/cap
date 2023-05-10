@props([
'placeholder' => null,
'trailingAddOn' => null,
])

<div class="flex">
  <select {{ $attributes->merge(['class' => 'rounded peer bg-white block form-select block w-full pl-3 pr-10 py-1.5 text-xs text-base leading-6 sm:leading-5 border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0' . ($trailingAddOn ? ' rounded-r-none' : '')]) }}>
    @if ($placeholder)
      <option disabled value="">{{ $placeholder }}</option>
    @endif
    {{ $slot }}
  </select>
  @if ($trailingAddOn)
    {{ $trailingAddOn }}
  @endif
</div>