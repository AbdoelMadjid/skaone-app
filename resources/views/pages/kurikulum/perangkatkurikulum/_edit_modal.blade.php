@foreach ($data as $judul)
    <!-- Modal Edit -->
    <div class="modal zoomIn" id="editModal-{{ $judul->id }}" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form method="POST" action="{{ route('kurikulum.perangkatkurikulum.pengumuman.update', $judul->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pengumuman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body"
                        style="max-height: calc(100vh - 225px); overflow-y: auto; margin-top:5px; margin-bottom:15px;">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label class="form-label">Judul Utama</label>
                                    <input type="text" name="judul" class="form-control"
                                        value="{{ $judul->judul }}" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select" required>
                                        <option value="Y" {{ $judul->status == 'Y' ? 'selected' : '' }}>Tampil
                                        </option>
                                        <option value="N" {{ $judul->status == 'N' ? 'selected' : '' }}>Sembunyi
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="editPengumumanWrapper-{{ $judul->id }}">
                            @foreach ($judul->pengumumanTerkiniAktif as $i => $item)
                                <div class="border p-3 rounded mb-3 pengumuman-item" data-index="{{ $i }}">
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <label>Judul Grup</label>
                                            <input type="text" name="pengumuman[{{ $i }}][judul]"
                                                class="form-control" value="{{ $item->judul }}" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Urutan</label>
                                            <input type="number" name="pengumuman[{{ $i }}][urutan]"
                                                class="form-control" value="{{ $item->urutan }}" required>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label>Poin</label>
                                        <div class="poin-wrapper">
                                            @foreach ($item->poin as $p)
                                                <div class="input-group mb-2">
                                                    <input type="text"
                                                        name="pengumuman[{{ $i }}][poin][]"
                                                        class="form-control" value="{{ $p->isi }}" required>
                                                    <button type="button" class="btn btn-soft-danger btn-sm"
                                                        onclick="removeElement(this)"><i
                                                            class="ri-delete-bin-2-fill fs-16"></i></button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-sm btn-soft-primary"
                                            onclick="addPoin(this, {{ $i }})">+ Tambah Poin</button>
                                    </div>

                                    <div class="text-end">
                                        <button type="button" class="btn btn-soft-danger btn-sm"
                                            onclick="removeGroup(this)">Hapus Grup</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-outline-primary btn-sm mt-2"
                            onclick="addPengumumanGroup({{ $judul->id }})">Tambah Grup Pengumuman</button>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-soft-success btn-label"><i
                                class="ri-save-2-fill label-icon align-middle fs-16 me-2"></i>Simpan</button>
                        <button type="button" class="btn btn-soft-secondary btn-label" data-bs-dismiss="modal"><i
                                class="ri-shut-down-line label-icon align-middle fs-16 me-2"></i>Tutup</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach


<script>
    function addPengumumanGroup(id) {
        const wrapper = document.getElementById(`editPengumumanWrapper-${id}`);
        const index = wrapper.querySelectorAll('.pengumuman-item').length;

        const html = `
        <div class="border p-3 rounded mb-3 pengumuman-item" data-index="${index}">
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>Judul Grup</label>
                    <input type="text" name="pengumuman[${index}][judul]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Urutan</label>
                    <input type="number" name="pengumuman[${index}][urutan]" class="form-control" value="0" required>
                </div>
            </div>
            <div class="mb-2">
                <label>Poin</label>
                <div class="poin-wrapper"></div>
                <button type="button" class="btn btn-sm btn-soft-primary" onclick="addPoin(this, ${index})"><i
                            class="ri-add-fill"></i> Tambah Poin</button>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-soft-danger btn-sm" onclick="removeGroup(this)">Hapus Grup</button>
            </div>
        </div>`;

        wrapper.insertAdjacentHTML('beforeend', html);
    }

    function addPoin(button, index) {
        const container = button.closest('.pengumuman-item').querySelector('.poin-wrapper');
        container.insertAdjacentHTML('beforeend', `
            <div class="input-group mb-2">
                <input type="text" name="pengumuman[${index}][poin][]" class="form-control" required>
                <button type="button" class="btn btn-soft-danger btn-sm" onclick="removeElement(this)"><i
                            class="ri-delete-bin-2-fill fs-16"></i></button>
            </div>
        `);
    }

    function removeElement(button) {
        button.closest('.input-group').remove();
    }

    function removeGroup(button) {
        button.closest('.pengumuman-item').remove();
    }
</script>
