@props([
    'label' => null,
    'value' => '',
    'id' => 'select_' . rand(),
    'placeholder' => $label,
    'options' => [],
    'size' => null,
])

@php
    $sizeClass = $size ? 'form-select-' . $size : '';
@endphp

<div class="mb-3">
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif
    <select {{ $attributes->merge(['class' => "form-select $sizeClass mb-3"]) }} id="{{ $id }}"
        aria-label="{{ $id }}">
        <option selected value="">{{ $placeholder }}</option>
        @foreach ($options as $key => $item)
            <option value="{{ $key }}" @selected($value == $key)>{{ $item }}</option>
        @endforeach
        {{ $slot }}
    </select>
</div>
