@props(['name', 'label', 'value' => '', 'id' => $name, 'type' => 'text'])
<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }} name="{{ $name }}" value="{{ $value }}">
</div>