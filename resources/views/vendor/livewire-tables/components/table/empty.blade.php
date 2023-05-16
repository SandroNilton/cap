@aware(['component'])

@php
    $attributes = $attributes->merge(['wire:key' => 'empty-message-'.$component->id]);
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <tr {{ $attributes }}>
        <td colspan="{{ $component->getColspanCount() }}">
            <div class="flex justify-center items-center space-x-2">
                <span class="py-2 text-gray-400 text-sm flex">
                  No se encontraron artículos. Intenta ampliar tu búsqueda.
                </span>
            </div>
        </td>
    </tr>
@elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
     <tr {{ $attributes }}>
        <td colspan="{{ $component->getColspanCount() }}">
            {{ $component->getEmptyMessage() }}
        </td>
    </tr>
@endif
