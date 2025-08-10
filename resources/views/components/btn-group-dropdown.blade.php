@props([
    'label' => 'Action',
    'class' => 'btn-soft-primary', // warna tombol
    'size' => 'md',
    'padding' => 'p-2',
])

<div class="dropdown card-header-dropdown dropstart">
    <a class="text-reset dropdown-btn" href="#" title="Action Menu" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <span class="text-primary fs-18"><i class="ri-more-2-fill"></i></span>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-{{ $size }} {{ $padding }}">
        <div class="d-grid gap-2">
            {{ $slot }}
        </div>
    </div>
</div>
