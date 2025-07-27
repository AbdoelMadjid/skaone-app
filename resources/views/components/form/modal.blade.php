@props(['size' => 'lg', 'title', 'action' => null, 'enctype' => null])
<div class="modal-dialog modal-{{ $size }}">
    <div class="modal-content">
        <form id="form_action" action="{{ $action }}" method="post" {{ $enctype ? 'enctype=' . $enctype : '' }}>
            @csrf
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                @if ($action)
                    <button type="submit" class="btn btn-soft-primary btn-label"><i
                            class="ri-save-2-fill label-icon align-middle fs-16 me-2"></i>Simpan</button>
                @endif
                <button type="button" class="btn btn-soft-secondary btn-label" data-bs-dismiss="modal"><i
                        class="ri-shut-down-line label-icon align-middle fs-16 me-2"></i>Tutup</button>
            </div>
        </form>
    </div>
</div>
