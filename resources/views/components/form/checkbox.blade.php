@props(['value' => '', 'justify' => 'form-check-inline', 'label' => null, 'id' => 'id_'.rand(), 'checked' => false])
<div class="form-check {{ $justify }}">
    <input {{ $attributes->merge(['class' => "form-check-input"]) }} {{ $checked }} type="checkbox" id="{{ $id }}"
        value="{{ $value }}">
        @if ($label)
            <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
        @endif
</div>