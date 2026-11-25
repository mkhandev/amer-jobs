@props(['id', 'name', 'label' => null, 'value' => '', 'placeholder' => '', 'rows' => '7', 'cols' => '30'])

@php
    $customClass = $attributes->get('class', '');
    $labelClass = str_contains($customClass, 'form-control') ? 'form-label' : 'block text-gray-700';
@endphp

<div class="mb-4">
    @if ($label)
        <label class="{{ $labelClass }}" for="{{ $id }}">{{ $label }}</label>
    @endif
    <textarea cols="{{ $cols }}" rows="{{ $rows }}" id="{{ $id }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'w-full px-2 py-2 border rounded focus:outline-none' . ($errors->has($name) ? ' border-red-500' : ''),
        ]) }}>{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
