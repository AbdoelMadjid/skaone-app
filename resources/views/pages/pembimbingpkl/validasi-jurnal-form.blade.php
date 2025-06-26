<x-form.modal size="lg" title="{{ __('translation.validasi-jurnal') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="id_penempatan" label="Id Penempatan"
                value="{{ $penempatan->nama_lengkap }} - {{ $penempatan->rombel_nama }} ({{ $penempatan->nama_dudi }} - {{ $penempatan->nama_pembimbing }})"
                id="id_penempatan" readonly />
            <input type="hidden" name="id_penempatan" value="{{ $penempatan->id }}">
            <input type="hidden" id="idKodeKK" value="{{ $penempatan->kode_kk }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <x-form.input type="date" name="tanggal_kirim" label="Tanggal Kirim" value="{{ $data->tanggal_kirim }}"
                id="tgl_kirim" />
        </div>
        <div class="col-md-8">
            <x-form.select name="element" label="Element CP" :options="$elemenCPOptions" value="{{ $data->element }}"
                id="element" onchange="updateTujuanPembelajaran(this.value)" readonly />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Tujuan Pembelajaran</label>
                <textarea id="exampleFormControlTextarea1" class="form-control" name="id_tp" aria-label="With textarea" rows="5"
                    readonly>{{ $isi_tp }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                <textarea id="exampleFormControlTextarea1" class="form-control" name="keterangan" aria-label="With textarea"
                    rows="10" readonly>{{ $data->keterangan }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12 mb-2">
                <strong>Gambar Bukti Kegiatan</strong>
            </div>
            <div class="col-md-6">
                <img id="image-preview"
                    src="{{ $data->gambar && file_exists(base_path('images/jurnal-2024-2025/' . $data->gambar)) ? asset('images/jurnal-2024-2025/' . $data->gambar) : asset('images/noimagejurnal.jpg') }}"
                    width="250" alt="Photo" />
            </div>
        </div>
        <input type="hidden" name="validasi" id="validasi" value="{{ $data->validasi }}">

        <div class="col-lg-12">
            <hr>
            <div class="gap-2 hstack justify-content-end">
                <div class="form-check form-switch form-switch-lg" dir="ltr">
                    <input type="checkbox" class="form-check-input" id="customSwitchsizelg"
                        {{ $data->validasi === 'Sudah' ? 'checked' : '' }}
                        onchange="saveValidasi(this, {{ $data->id }})">
                    <label class="form-check-label" for="customSwitchsizelg">Validasi Jurnal</label>
                </div>
            </div>
            <hr>
        </div>
    </div>
</x-form.modal>
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('image-preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result; // Set the src of the img to the file's data URL
            }
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            preview.src =
                '{{ asset('images/sakola/ujikom2.jpg') }}'; // Reset to default if no file is selected
        }
    }

    function saveValidasi(checkbox, id) {
        const validasiValue = checkbox.checked ? 'Sudah' : 'Belum';

        // Kirim data ke server melalui fetch
        fetch(`{{ route('pembimbingpkl.validasi-jurnal.update', '') }}/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    validasi: validasiValue
                }),
            })
            .then(response => {
                if (response.ok) {
                    // Tampilkan pesan sukses
                    showToast('success', 'Validasi berhasil diperbarui.');

                    // Reload DataTable setelah berhasil
                    $('#validasijurnal-table').DataTable().ajax.reload(null, false); // Tidak reset paging
                } else {
                    throw new Error('Gagal memperbarui validasi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);

                // Tampilkan pesan error
                showToast('error', 'Terjadi kesalahan, coba lagi.');

                // Kembalikan status checkbox jika gagal
                checkbox.checked = !checkbox.checked;
            });
    }
</script>
