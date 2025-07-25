@props(['title'])

<div class="card-header">
    <div class="d-flex align-items-center">
        <x-heading-title>{{ $title ?? $slot }}</x-heading-title>
        {{ $actions ?? '' }}
    </div>
</div>
