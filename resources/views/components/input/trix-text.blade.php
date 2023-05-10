@props([
    'initialValue' => ''
])
<div wire:ignore
     {{ $attributes->whereDoesntStartWith('wire:model') }}
     x-data="{
        value: @entangle($attributes->wire('model')),
        isFocused() { return document.activeElement !== this.$refs.trix },
        setValue() { this.$refs.trix.editor.loadHTML(this.value) },
     }"
     x-init="setValue(); $watch('value', () => isFocused() && setValue())"
     @trix-change="value = $event.target.value"
     class="rounded-md shadow-sm">
    <input id="x" type="hidden" value="{{ $initialValue }}">
    <trix-editor x-ref="trix" input="x" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></trix-editor>
</div>

@push('styles')
<link href="https://cdn.bootcdn.net/ajax/libs/trix/1.3.0/trix.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.bootcdn.net/ajax/libs/trix/1.3.0/trix.min.js"></script>
@endpush
