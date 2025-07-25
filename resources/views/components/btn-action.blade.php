@props([
    'href' => null,
    'type' => 'button',
    'label' => '',
    'icon' => null,
    'size' => 'btn-sm',
    'disabled' => false,
    'title' => null,
])

@php
    $classes = "btn btn-light btn-label waves-effect waves-light {$size}";
@endphp

@if ($href)
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' => $classes,
            'title' => $title,
        ]) }}>
        @if ($icon)
            <i class="{{ $icon }} label-icon align-middle fs-16 me-2"></i>
        @endif
        {{ $label }}
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->merge([
            'class' => $classes,
            'title' => $title,
        ]) }}
        @if ($disabled) disabled @endif>
        @if ($icon)
            <i class="{{ $icon }} label-icon align-middle fs-16 me-2"></i>
        @endif
        {{ $label }}
    </button>
@endif
