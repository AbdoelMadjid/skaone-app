@props([
    'label' => 'Action',
    'class' => 'btn-soft-primary', // warna tombol
    'size' => 'md',
])

{{-- <div class="btn-group dropstart">
    <button type="button" class="btn {{ $class }} {{ $size }} dropdown-toggle" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ $label }}
    </button>
    <div class="dropdown-menu dropdown-menu-md p-3">
        <div class="d-grid gap-2">
            {{ $slot }}
        </div>
    </div>
</div> --}}

<div class="dropdown card-header-dropdown dropstart">
    <a class="text-reset dropdown-btn" href="#" title="Action Menu" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-{{ $size }} p-2">
        <div class="d-grid gap-2">
            {{ $slot }}
        </div>
    </div>
</div>
