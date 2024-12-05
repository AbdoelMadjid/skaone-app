@props(['name', 'label', 'id' => $name])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input type="file" id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }}
        name="{{ $name }}">
</div>
