<x-form.modal size="lg" title="{{ __('translation.jurnal-siswa') }}" action="{{ $action ?? null }}">
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
            <x-form.select name="element" label="Element Capaian Pembelajaran" :options="$elemenCPOptions"
                value="{{ $data->element }}" id="element" onchange="updateTujuanPembelajaran(this.value)" />
        </div>
    </div>
    <div class="row">
        <!-- Tujuan Pembelajaran -->
        <div class="col-md-12">
            <div class="mb-3">
                <label for="id_tp" class="form-label">Tujuan Pembelajaran</label>
                <select id="id_tp" name="id_tp" class="form-control">
                    <option value="">Pilih Tujuan Pembelajaran</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                <textarea id="exampleFormControlTextarea1" class="form-control" name="keterangan" aria-label="With textarea"
                    rows="10">{{ $data->keterangan }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <x-form.input type="file" name="gambar" label="Gambar" onchange="previewImage(event)" />
            </div>
            <div class="col-md-6">
                <img id="image-preview"
                    src="{{ $data->gambar && file_exists(base_path('images/jurnal-2024-2025/' . $data->gambar)) ? asset('images/jurnal-2024-2025/' . $data->gambar) : asset('images/noimagejurnal.jpg') }}"
                    width="250" alt="Photo" />
            </div>
        </div>
        <input type="hidden" name="validasi" value="Belum">
        <input type="hidden" name="komentar" value="{{ $data->komentar }}">
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
                '{{ asset('images/noimagejurnal.jpg') }}'; // Reset to default if no file is selected
        }
    }
</script>
