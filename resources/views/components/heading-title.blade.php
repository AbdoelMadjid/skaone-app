@props([
    'tag' => 'h5',
    'class' => 'card-title mb-0 flex-grow-1 text-primary-emphasis',
])

<{{ $tag }} {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
    </{{ $tag }}>
