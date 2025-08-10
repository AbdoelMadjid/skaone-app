@props([
    'can' => null,
    'route',
    'label' => 'Tambah',
    'icon' => 'ri-add-fill',
    'size' => 'btn-sm',
    'class' => '', // tambahan class opsional
    'title' => null,
    'dinamisBtn' => false, // default false
])

@php
    $classes = "btn btn-soft-primary d-inline-flex align-items-center waves-effect waves-light add-btn action {$size} {$class}";
@endphp

@can($can)
    @if ($dinamisBtn && $title)
        <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $title }}">
    @endif

    <a href="{{ route($route) }}" {{ $attributes->merge([
        'class' => $classes,
    ]) }}>
        @if ($dinamisBtn)
            <i class="{{ $icon }} align-middle fs-14"></i>
            <span class="d-none d-sm-inline ms-2">{{ $label }}</span>
        @else
            <i class="{{ $icon }} align-middle fs-14 me-2"></i>
            {{ $label }}
        @endif
    </a>

    @if ($dinamisBtn && $title)
        </span>
    @endif
@endcan
