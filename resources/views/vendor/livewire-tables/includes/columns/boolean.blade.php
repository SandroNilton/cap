@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    @if ($status)
        @if ($type === 'icons')
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 @if ($successValue === true) text-[#42a692] @else text-red-600 @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @elseif ($type === 'yes-no')
            @if ($successValue === true)
                <span>Yes</span>
            @else
                <span>No</span>
            @endif
        @endif
    @else
        @if ($type === 'icons')
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 @if ($successValue === false) text-[#42a692] @else text-red-600 @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @elseif ($type === 'yes-no')
            @if ($successValue === false)
                <span>Yes</span>
            @else
                <span>No</span>
            @endif
        @endif
    @endif
@elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
    @if ($status)
        @if ($type === 'icons')
            <svg xmlns="http://www.w3.org/2000/svg" style="width:1.2em;height:1.2em;" class="d-inline-block @if ($successValue === true) text-success @else text-danger @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @elseif ($type === 'yes-no')
            @if ($successValue === true)
                <span>Yes</span>
            @else
                <span>No</span>
            @endif
        @endif
    @else
        @if ($type === 'icons')
            <svg xmlns="http://www.w3.org/2000/svg" style="width:1.2em;height:1.2em;" class="d-inline-block @if ($successValue === false) text-success @else text-danger @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @elseif ($type === 'yes-no')
            @if ($successValue === false)
                <span>Yes</span>
            @else
                <span>No</span>
            @endif
        @endif
    @endif
@endif
