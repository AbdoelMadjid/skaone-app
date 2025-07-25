@props([
    'href',
    'class' => 'btn-soft-primary', // warna default
    'title' => 'Kembali',
])

<a href="{{ $href }}"
    {{ $attributes->merge([
        'class' => "btn $class btn-sm btn-icon",
        'data-bs-toggle' => 'tooltip',
        'data-bs-placement' => 'left',
        'title' => $title,
    ]) }}>
    <i class="ri-share-forward-fill fs-16"></i>
</a>
