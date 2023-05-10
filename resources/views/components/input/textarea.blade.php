@props([''])

<div class="max-w-lg flex rounded-md shadow-sm">
    <textarea {{ $attributes }} class="@isset($leadingAddOn) rounded-none rounded-r-md @endif flex-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
</div>