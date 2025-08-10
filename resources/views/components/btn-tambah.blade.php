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
    <a href="{{ route($route) }}"
        {{ $attributes->merge([
            'class' => $classes,
            'title' => $title,
            'data-bs-toggle' => $dinamisBtn ? 'tooltip' : null,
            'data-bs-placement' => $dinamisBtn ? 'left' : null,
        ]) }}>

        @if ($dinamisBtn)
            <i class="{{ $icon }} align-middle fs-14"></i>
            <span class="d-none d-sm-inline ms-2">{{ $label }}</span>
        @else
            <i class="{{ $icon }} align-middle fs-14 me-2"></i>
            {{ $label }}
        @endif
    </a>
@endcan
