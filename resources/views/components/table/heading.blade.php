@props([
  'sortable' => null,
  'direction' => null,
])

<th {{ $attributes->merge(['class' => 'px-6 py-1.5 bg-[#f5f7f9] text-xs whitespace-nowrap text-gray-500'])->only('class') }}>
  @unless ($sortable)
    <span class="text-left text-xs leading-4 font-medium tracking-wider">{{ $slot }}</span>
  @else
    <button {{ $attributes->except('class') }} class="flex items-center space-x-1 text-left text-xs leading-4 font-medium">
      <span>{{ $slot }}</span>
      <span class="relative flex items-center">
        @if ($direction === 'asc')
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
          </svg>
        @elseif ($direction === 'desc')
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        @else
          <svg class="w-3 h-3 opacity-0 hover:opacity-100 transition-opacity duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
          </svg>
        @endif
      </span>
    </button>
  @endif
</th>