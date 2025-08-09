@props([
    'can' => null,
    'route',
    'label' => 'Tambah',
    'icon' => 'ri-add-line',
    'size' => 'btn-sm',
    'class' => '', // tambahan class opsional
    'dinamisBtn' => false, // default false
])

@can($can)
    <a href="{{ route($route) }}"
        {{ $attributes->merge(['class' => "btn btn-soft-primary d-inline-flex align-items-center waves-effect waves-light $size add-btn action $class"]) }}>

        @if ($dinamisBtn)
            <i class="{{ $icon }} align-middle fs-14"></i>
            <span class="d-none d-sm-inline ms-2">{{ $label }}</span>
        @else
            <i class="{{ $icon }} align-middle fs-14 me-2"></i>
            {{ $label }}
        @endif
    </a>
@endcan
