@props(['id', 'name', 'label' => null, 'value' => '', 'options' => []])

@php
    $customClass = $attributes->get('class', '');

    $labelClass = str_contains($customClass, 'form-select') ? 'form-label' : 'block text-gray-700';
@endphp

<div class="mb-4">
    @if ($label)
        <label class="{{ $labelClass }}" for="{{ $id }}">{{ $label }}</label>
    @endif
    <select id="{{ $id }}" name="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'w-full px-2 py-2 border rounded focus:outline-none' . ($errors->has($name) ? ' border-red-500' : ''),
        ]) }}>

        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach

    </select>
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
