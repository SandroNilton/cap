@php
    $theme = $component->getTheme();
    $filterLayout = $component->getFilterLayout();
    $tableName = $component->getTableName();
@endphp
<div>
    @if($filter->hasCustomFilterLabel())
        @include($filter->getCustomFilterLabel(),['filter' => $filter, 'theme' => $theme, 'filterLayout' => $filterLayout, 'tableName' => $tableName])
    @else
        <x-livewire-tables::tools.filter-label :filter="$filter" :theme="$theme" :filterLayout="$filterLayout" :tableName="$tableName" />
    @endif
    @if ($theme === 'tailwind')
        <div class="rounded shadow-sm">
            <input
                wire:model.stop="{{ $tableName }}.filters.{{ $filter->getKey() }}"
                wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                id="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                type="date"
                @if($filter->hasConfig('min')) min="{{ $filter->getConfig('min') }}" @endif
                @if($filter->hasConfig('max')) max="{{ $filter->getConfig('max') }}" @endif
                class="py-1.5 text-sm block w-full border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] cursor-pointer focus:outline-none focus:ring-0 rounded shadow-sm ease-in-out"
            />
        </div>
    @elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
        <div class="mb-3 mb-md-0 input-group">
            <input
                wire:model.stop="{{ $tableName }}.filters.{{ $filter->getKey() }}"
                wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                id="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                type="date"
                @if($filter->hasConfig('min')) min="{{ $filter->getConfig('min') }}" @endif
                @if($filter->hasConfig('max')) max="{{ $filter->getConfig('max') }}" @endif
                class="form-control"
            />
        </div>
    @endif
</div>
