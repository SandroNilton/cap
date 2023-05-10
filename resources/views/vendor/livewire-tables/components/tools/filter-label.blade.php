@aware(['component'])
@props(['filter', 'theme' => 'tailwind', 'filterLayout' => 'popover', 'tableName' => 'table'])

<label for="{{ $tableName }}-filter-{{ $filter->getKey() }}" 
    @class([
        'block text-sm leading-5 text-[#212529] dark:text-white' => $theme === 'tailwind',
        'd-block' => $theme === 'bootstrap-4' && $filterLayout == 'slide-down',
        'mb-2' => $theme === 'bootstrap-4' && $filterLayout == 'popover',
        'd-block' => $theme === 'bootstrap-5' && $filterLayout == 'slide-down',
        'mb-2' => $theme === 'bootstrap-5' && $filterLayout == 'popover',
    ])
>
    {{ $filter->getName() }}
</label>
