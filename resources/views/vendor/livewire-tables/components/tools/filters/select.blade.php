@php
    $theme = $component->getTheme();
    $filterLayout = $component->getFilterLayout();
    $tableName = $component->getTableName();
@endphp
<div>
    @if($filter->hasCustomFilterLabel())
        @include($filter->getCustomFilterLabel(),['filter' => $filter, 'theme' => $theme, 'filterLayout' => $filterLayout, 'tableName' => $tableName  ])
    @else
        <x-livewire-tables::tools.filter-label :filter="$filter" :theme="$theme" :filterLayout="$filterLayout" :tableName="$tableName" />
    @endif
        @if ($theme === 'tailwind')
        <div class="rounded shadow-sm">
            <select
                wire:model.stop="{{ $tableName }}.filters.{{ $filter->getKey() }}"
                wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                id="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                class="py-1.5 block w-full text-sm rounded shadow-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 cursor-pointer focus:border-[#42a692] focus:outline-none focus:ring-0 ease-in-out"
            >
                @foreach($filter->getOptions() as $key => $value)
                    @if (is_iterable($value))
                        <optgroup label="{{ $key }}">
                            @foreach ($value as $optionKey => $optionValue)
                                <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                            @endforeach
                        </optgroup>
                    @else
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    @elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
        <select
            wire:model.stop="{{ $tableName }}.filters.{{ $filter->getKey() }}"
            wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
            id="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
            class="{{ $theme === 'bootstrap-4' ? 'form-control' : 'form-select' }}"
        >
            @foreach($filter->getOptions() as $key => $value)
                @if (is_iterable($value))
                    <optgroup label="{{ $key }}">
                        @foreach ($value as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                        @endforeach
                    </optgroup>
                @else
                    <option value="{{ $key }}">{{ $value }}</option>
                @endif
            @endforeach
        </select>
    @endif
</div>
