@aware(['component'])
@props(['row'])

@if ($component->bulkActionsAreEnabled() && $component->hasBulkActions())
    @php
        $theme = $component->getTheme();
    @endphp

    @if ($theme === 'tailwind')
        <x-livewire-tables::table.td.plain>
            <div class="inline-flex rounded-md shadow-sm">
                <input
                    wire:model="selected"
                    wire:loading.attr.delay="disabled"
                    value="{{ $row->{$this->getPrimaryKey()} }}"
                    type="checkbox"
                    class="rounded-sm border-[#cfd7df] cursor-pointer text-[#42a692] shadow-sm transition duration-150 ease-in-out focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                />
            </div>
        </x-livewire-tables::table.td.plain>
    @elseif ($theme === 'bootstrap-4')
        <x-livewire-tables::table.td.plain>
            <input
                wire:model="selected"
                wire:loading.attr.delay="disabled"
                value="{{ $row->{$this->getPrimaryKey()} }}"
                type="checkbox"
            />
        </x-livewire-tables::table.td.plain>
    @elseif ($theme === 'bootstrap-5')
        <x-livewire-tables::table.td.plain>
            <div class="form-check">
                <input
                    wire:model="selected"
                    wire:loading.attr.delay="disabled"
                    value="{{ $row->{$this->getPrimaryKey()} }}"
                    type="checkbox"
                    class="form-check-input"
                />
            </div>
        </x-livewire-tables::table.td.plain>
    @endif
@endif
