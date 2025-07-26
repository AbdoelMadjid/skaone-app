@props([
    'can' => null,
    'route',
    'label' => 'Tambah',
    'icon' => 'ri-add-line',
    'size' => 'btn-sm',
    'class' => '', // tambahan class opsional
])

@can($can)
    <a href="{{ route($route) }}"
        {{ $attributes->merge(['class' => "btn btn-soft-primary btn-label waves-effect waves-light $size add-btn action $class"]) }}>
        <i class="{{ $icon }} label-icon align-middle fs-16 me-2"></i> {{ $label }}
    </a>
@endcan
