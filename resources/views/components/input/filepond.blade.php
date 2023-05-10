<div wire:ignore
     x-data
     x-init="
     FilePond.registerPlugin(FilePondPluginImagePreview);
     FilePond.setOptions({
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
            },
            revert: (fileName, load, error) => {
                @this.removeUpload('{{ $attributes['wire:model'] }}', fileName, error);
            },
        }
     })
     FilePond.create( $refs.input );
    "
>
    {{ $slot }}
    <!-- We'll transform this input into a pond -->
    <input x-ref="input" type="file" class="filepond">
</div>

@push('styles')
<!-- Filepond stylesheet -->
<link href="https://cdn.bootcdn.net/ajax/libs/filepond/4.22.1/filepond.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush
@push('scripts')
<!-- Load FilePond library -->
<script src="https://cdn.bootcdn.net/ajax/libs/filepond/4.22.1/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
@endpush