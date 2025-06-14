<!-- Modal Tambah Pengumuman -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form method="POST" action="{{ route('kurikulum.perangkatkurikulum.pengumuman.store') }}">
            @csrf
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Judul Pengumuman</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <!-- Judul Pengumuman -->
                    <div class="mb-3">
                        <label class="form-label">Judul Utama</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="Y">Tampilkan</option>
                            <option value="N">Sembunyikan</option>
                        </select>
                    </div>

                    <!-- Container Grup Pengumuman -->
                    <hr>
                    <h5 class="text-info">Grup Pengumuman</h5>
                    <div id="grup-container"></div>
                    <button type="button" id="addGrup" class="btn btn-outline-light mt-3">+ Tambah Grup</button>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    let grupIndex = 0;

    function poinInput(grupIdx) {
        return `
        <div class="input-group mb-2 poin-item">
            <input type="text" name="pengumuman[${grupIdx}][poin][]" class="form-control" placeholder="Isi Poin" required>
            <button type="button" class="btn btn-danger btn-sm remove-poin">×</button>
        </div>
    `;
    }

    function grupTemplate(index) {
        return `
        <div class="border rounded p-3 mb-4 bg-secondary-subtle" data-grup-index="${index}">
            <h6 class="text-light">Grup #${index + 1}</h6>
            <div class="mb-2">
                <label>Judul Grup Pengumuman</label>
                <input type="text" name="pengumuman[${index}][judul]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Urutan</label>
                <input type="number" name="pengumuman[${index}][urutan]" class="form-control" required min="1">
            </div>
            <div class="mb-2">
                <label>Poin</label>
                <div class="poin-container">
                    ${poinInput(index)}
                </div>
                <button type="button" class="btn btn-outline-light btn-sm add-poin">+ Tambah Poin</button>
            </div>
        </div>
    `;
    }

    document.getElementById('addGrup').addEventListener('click', function() {
        const container = document.getElementById('grup-container');
        container.insertAdjacentHTML('beforeend', grupTemplate(grupIndex));
        grupIndex++;
    });

    document.addEventListener('click', function(e) {
        if (e.target.matches('.add-poin')) {
            const grup = e.target.closest('[data-grup-index]');
            const idx = grup.dataset.grupIndex;
            grup.querySelector('.poin-container').insertAdjacentHTML('beforeend', poinInput(idx));
        }

        if (e.target.matches('.remove-poin')) {
            e.target.closest('.poin-item').remove();
        }
    });
</script>
