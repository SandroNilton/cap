@aware(['component'])
@props(['customAttributes' => []])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <tr {{ $attributes
        ->merge($customAttributes)
        ->class(['bg-white' => $customAttributes['default'] ?? true])
        ->except('default')
    }}>
        {{ $slot }}
    </tr>
@elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
    <tr {{ $attributes
        ->merge($customAttributes)
        ->class(['' => $customAttributes['default'] ?? true])
        ->except('default')
    }}>
        {{ $slot }}
    </tr>
@endif
