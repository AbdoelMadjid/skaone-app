@props(['label' => null, 'value' => '', 'id' => 'select_' . rand(), 'placeholder' => $label, 'options' => []])

<div class="mb-3">
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif
    <select {{ $attributes->merge(['class' => 'form-select mb-3']) }} id="{{ $id }}"
        aria-label="{{ $id }}">
        <option selected value="">{{ $placeholder }}</option>
        @foreach ($options as $key => $item)
            <option value="{{ $key }}" @selected($value == $key)>{{ $item }}</option>
        @endforeach
        {{ $slot }}
    </select>
</div>
