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

{{-- @if ($dinamisBtn && $title)
    <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $title }}">
@endif --}}

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge([
        'class' => $classes,
    ]) }}>
        @if ($icon)
            <i class="{{ $icon }} align-middle fs-14 {{ $dinamisBtn ? '' : 'me-2' }}"></i>
        @endif
        @if ($dinamisBtn)
            <span class="d-none d-sm-inline ms-2">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge([
        'class' => $classes,
    ]) }}
        @if ($disabled) disabled @endif>
        @if ($icon)
            <i class="{{ $icon }} align-middle fs-14 {{ $dinamisBtn ? '' : 'me-2' }}"></i>
        @endif
        @if ($dinamisBtn)
            <span class="d-none d-sm-inline ms-2">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
    </button>
@endif

{{-- @if ($dinamisBtn && $title)
    </span>
@endif
 --}}
