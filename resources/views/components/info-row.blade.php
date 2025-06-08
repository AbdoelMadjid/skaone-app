@props(['label', 'content', 'textColor' => 'text-info'])

<div class="row mb-2">
    <div class="col-md-4">{{ $label }}</div>
    <div class="col-md-8">
        <p class="mb-0 fs-12 {{ $textColor }}"><strong>{{ $content }}</strong></p>
    </div>
</div>

{{-- <div class="d-flex mb-2">
    <div class="flex-grow-1">
        <p class="text-truncate text-muted fs-14 mb-0">
            <i class="mdi mdi-circle align-middle {{ $iconColor }} me-2"></i> {{ $label }}
        </p>
    </div>
    <div class="flex-shrink-0">
        <p class="mb-0">{{ $content }}</p>
    </div>
</div> --}}
