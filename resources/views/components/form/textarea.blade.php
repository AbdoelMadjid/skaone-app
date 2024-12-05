@props(['name', 'label' => null, 'value' => '', 'id' => $name, 'rows' => 3])

<div class="mb-3">
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif
    <textarea id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }} name="{{ $name }}"
        rows="{{ $rows }}">{{ $value }}</textarea>
</div>
