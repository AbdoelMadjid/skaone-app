@props([
    'label' => 'Action',
    'class' => 'btn-soft-primary', // warna tombol
    'size' => 'btn-sm',
])

<div class="btn-group dropstart">
    <button type="button" class="btn {{ $class }} {{ $size }} dropdown-toggle" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ $label }}
    </button>
    <div class="dropdown-menu dropdown-menu-md p-3">
        <div class="d-grid gap-2">
            {{ $slot }}
        </div>
    </div>
</div>
