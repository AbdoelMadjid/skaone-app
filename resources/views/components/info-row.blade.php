@props(['label', 'content', 'textColor' => 'text-dark', 'labelCol' => 'col-md-4', 'contentCol' => 'col-md-8'])

<div class="row mb-0">
    <div class="{{ $labelCol }}">{{ $label }}</div>
    <div class="{{ $contentCol }}">
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
