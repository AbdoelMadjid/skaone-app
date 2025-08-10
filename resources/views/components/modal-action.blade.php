@props(['action', 'data', 'title'])

<div class="modal-dialog">
    <form id="form-action" action="{{ $action }}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <x-form.modal-footer-button label="Simpan" icon="ri-save-2-fill" />
            </div>
        </div>
    </form>
</div>
