@props(['id', 'name', 'label' => null, 'required' => false])

@php
    $customClass = $attributes->get('class', '');

    $labelClass = str_contains($customClass, 'form-control') ? 'form-label' : 'block text-gray-700';
@endphp

<div class="mb-4">
    @if ($label)
        <label class="{{ $labelClass }}" for="{{ $id }}">{{ $label }}</label>
    @endif
    <input {{ $required ? 'required' : '' }} id="{{ $id }}" type="file" name="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-2 border rounded focus:outline-none' . ($errors->has($name) ? ' border-red-500' : ''),
        ]) }} />
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
