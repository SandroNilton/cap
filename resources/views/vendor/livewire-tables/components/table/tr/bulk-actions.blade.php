@aware(['component'])
@props(['rows'])

@if ($component->bulkActionsAreEnabled() && $component->hasBulkActions() && $component->hasSelected())
    @php
        $table = $component->getTableName();
        $theme = $component->getTheme();
        $colspan = $component->getColspanCount();
        $selected = $component->getSelectedCount();
        $selectAll = $component->selectAllIsEnabled();
        $simplePagination = ($component->paginationMethod == "simple") ? true : false;
    @endphp

    @if ($theme === 'tailwind')
        <x-livewire-tables::table.tr.plain
            wire:key="bulk-select-message-{{ $table }}"
            class="bg-indigo-50"
        >
            <x-livewire-tables::table.td.plain :colspan="$colspan">
                @if ($selectAll)
                    <div wire:key="all-selected-{{ $table }}">
                        <span>
                            @lang('Actualmente estás seleccionando todo')
                            @if(!$simplePagination) <strong>{{ number_format($rows->total()) }}</strong> @endif
                            @lang('filas').
                        </span>

                        <button
                            wire:click="clearSelected"
                            wire:loading.attr="disabled"
                            type="button"
                            class="ml-1 text-[#42a692] hover:text-[#2c6f62] text-sm leading-5 font-medium focus:outline-none focus:underline transition duration-150 ease-in-out"
                        >
                            @lang('Deseleccionar todo')
                        </button>
                    </div>
                @else
                    <div wire:key="some-selected-{{ $table }}">
                        <span>
                            @lang('Usted ha seleccionado')
                            <strong>{{ $selected }}</strong>
                            @lang('filas, ¿quieres seleccionar todas?')
                            @if(!$simplePagination) <strong>{{ number_format($rows->total()) }}</strong> @endif
                        </span>

                        <button
                            wire:click="setAllSelected"
                            wire:loading.attr="disabled"
                            type="button"
                            class="ml-1 text-[#42a692] hover:text-[#2c6f62] text-sm leading-5 font-medium focus:outline-none focus:text-gray-800 focus:underline transition duration-150 ease-in-out"
                        >
                            @lang('Seleccionar todo')
                        </button>

                        <button
                            wire:click="clearSelected"
                            wire:loading.attr="disabled"
                            type="button"
                            class="ml-1 text-[#42a692] hover:text-[#2c6f62] text-sm leading-5 font-medium focus:outline-none focus:text-gray-800 focus:underline transition duration-150 ease-in-out"
                        >
                            @lang('Deseleccionar todo')
                        </button>
                    </div>
                @endif
            </x-livewire-tables::table.td.plain>
        </x-livewire-tables::table.tr.plain>
    @elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
        <x-livewire-tables::table.tr.plain
            wire:key="bulk-select-message-{{ $table }}"
        >
            <x-livewire-tables::table.td.plain :colspan="$colspan">
                @if ($selectAll)
                    <div wire:key="all-selected-{{ $table }}">
                        <span>
                            @lang('You are currently selecting all')
                            @if(!$simplePagination) <strong>{{ number_format($rows->total()) }}</strong> @endif
                            @lang('rows').
                        </span>

                        <button
                            wire:click="clearSelected"
                            wire:loading.attr="disabled"
                            type="button"
                            class="btn btn-primary btn-sm"
                        >
                            @lang('Deselect All')
                        </button>
                    </div>
                @else
                    <div wire:key="some-selected-{{ $table }}">
                        <span>
                            @lang('You have selected')
                            <strong>{{ $selected }}</strong>
                            @lang('rows, do you want to select all')
                            @if(!$simplePagination) <strong>{{ number_format($rows->total()) }}</strong> @endif
                        </span>

                        <button
                            wire:click="setAllSelected"
                            wire:loading.attr="disabled"
                            type="button"
                            class="btn btn-primary btn-sm"
                        >
                            @lang('Select All')
                        </button>

                        <button
                            wire:click="clearSelected"
                            wire:loading.attr="disabled"
                            type="button"
                            class="btn btn-primary btn-sm"
                        >
                            @lang('Deselect All')
                        </button>
                    </div>
                @endif
            </x-livewire-tables::table.td.plain>
        </x-livewire-tables::table.tr.plain>
    @endif
@endif