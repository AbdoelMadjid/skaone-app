@props([
    'name',
    'label',
    'value' => '',
    'id' => $name,
    'type' => 'text',
    'size' => null, // Tambahan: sm, lg
])

@php
    $sizeClass = $size ? 'form-control-' . $size : '';
@endphp

<div class="mb-3">
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
        {{ $attributes->merge(['class' => "form-control $sizeClass"]) }}>
</div>
