@props([
    'id' => null,
    'label' => 'Simpan',
    'icon' => 'ri-save-2-fill',
    'type' => 'submit',
])


<button type="{{ $type }}" class="btn btn-soft-success btn-label" {{ $id ? "id=$id" : '' }}>
    <i class="{{ $icon }} label-icon align-middle fs-16 me-2"></i>{{ $label }}
</button>
<button type="button" class="btn btn-soft-secondary btn-label" data-bs-dismiss="modal">
    <i class="ri-shut-down-line label-icon align-middle fs-16 me-2"></i>Tutup
</button>
