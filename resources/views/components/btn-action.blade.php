@props([
    'href' => null,
    'type' => 'button',
    'label' => '',
    'icon' => null,
    'size' => 'btn-sm',
    'disabled' => false,
    'title' => null,
    'dinamisBtn' => false, // default false
])

@php
    $classes = "btn btn-soft-primary d-inline-flex align-items-center waves-effect waves-light {$size}";
@endphp

@if ($href)
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' => $classes,
            'title' => $title,
        ]) }}>
        @if ($dinamisBtn)
            @if ($icon)
                <i class="{{ $icon }} align-middle fs-14"></i>
            @endif
            <span class="d-none d-sm-inline ms-2">{{ $label }}</span>
        @else
            @if ($icon)
                <i class="{{ $icon }} align-middle fs-14 me-2"></i>
            @endif
            {{ $label }}
        @endif
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->merge([
            'class' => $classes,
            'title' => $title,
        ]) }}
        @if ($disabled) disabled @endif>
        @if ($dinamisBtn)
            @if ($icon)
                <i class="{{ $icon }} align-middle fs-14"></i>
            @endif
            <span class="d-none d-sm-inline ms-2">{{ $label }}</span>
        @else
            @if ($icon)
                <i class="{{ $icon }} align-middle fs-14 me-2"></i>
            @endif
            {{ $label }}
        @endif
    </button>
@endif
