<div class="d-flex">
    <div class="flex-shrink-0 text-{{ $colorClass ?? 'success' }} me-1 mt-1">
        <i class="ri-checkbox-circle-fill fs-18 align-middle"></i>
    </div>
    <div class="flex-grow-1 fs-6 mt-2">
        {{ $slot }}
    </div>
</div>
