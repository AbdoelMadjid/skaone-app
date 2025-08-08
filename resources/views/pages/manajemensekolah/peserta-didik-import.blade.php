<!-- Modal untuk Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('manajemensekolah.uploadpesertadidik') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Peserta Didik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file_excel" class="form-label">Upload File Excel</label>
                        <input type="file" class="form-control" name="file_excel" id="file_excel" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-form.modal-footer-button label="Import" icon="ri-upload-fill" />
                </div>
            </form>
        </div>
    </div>
</div>
