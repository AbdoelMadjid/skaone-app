<div>
    <h5 class="mt-4 text-info"><strong>D. Lampiran</strong></h5>
</div>
<div class="container mt-4 mb-4 border border-dashed p-2 rounded">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="kepsek" class="form-label">Kepala Sekolah</label>
                <input type="text" class="form-control" id="kepsek" placeholder="nama kepala sekolah"
                    value="{{ $kepsek->nama }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="nip-kepsek" class="form-label">NIP Kepala Sekolah</label>
                <input type="text" class="form-control" id="nip-kepsek" placeholder="nip kepala sekolah"
                    value="{{ $kepsek->nip }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="guru-mapel" class="form-label">Guru Mata Pelajaran</label>
                <input type="text" class="form-control" id="guru-mapel" placeholder="nama guru mapel"
                    value="{{ $fullName }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="nip-gurumapel" class="form-label">NIP Guru Mata Pelajaran</label>
                <input type="text" class="form-control" id="nip-gurumapel" placeholder="nip guru mata pelajaran"
                    value="{{ $personil->nip }}">
            </div>
        </div>
    </div>
</div>
<div class="container mt-4 border border-dashed p-2 rounded">
    <label class="form-label"><strong>Lampiran-lampiran</strong></label>
    <div id="lampiran-container">
        {{-- Tiga lampiran awal dengan value contoh --}}
        <div class="lampiran-row mb-2 d-flex">
            <input type="text" name="lampiran[]" class="form-control me-2" value="Lampiran 1: Asesmen Awal"
                placeholder="Lampiran 1 : .......">
            <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-lampiran">X</button>
        </div>
        <div class="lampiran-row mb-2 d-flex">
            <input type="text" name="lampiran[]" class="form-control me-2" value="Lampiran 2: Materi Ajar"
                placeholder="Lampiran 2 : .......">
            <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-lampiran">X</button>
        </div>
        <div class="lampiran-row mb-2 d-flex">
            <input type="text" name="lampiran[]" class="form-control me-2"
                value="Lampiran 3: Lembar Kerja Peserta Didik (LKPD)." placeholder="Lampiran 3 : .......">
            <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-lampiran">X</button>
        </div>
        <div class="lampiran-row mb-2 d-flex">
            <input type="text" name="lampiran[]" class="form-control me-2"
                value="Lampiran 4: Rubrik Penilaian Proyek Kartu Nama Professional." placeholder="Lampiran 4 : .......">
            <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-lampiran">X</button>
        </div>
    </div>
    <!-- Rounded with Label -->
    <div class="d-flex align-items-start gap-3 mt-4 mb-2">
        <button type="button" class="btn btn-sm btn-outline-info btn-label right ms-auto" id="tambah-lampiran"><i
                class="ri-add-line label-icon align-middle fs-18 ms-2"></i>tambah lampiran</button>
    </div>
</div>
<script>
    function reindexLampiran() {
        const rows = document.querySelectorAll('.lampiran-row');
        rows.forEach((row, index) => {
            const input = row.querySelector('input[name="lampiran[]"]');
            if (input) {
                input.placeholder = `Lampiran ${index + 1} : ......`;
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        const containerlampiran = document.getElementById('lampiran-container');
        const tambahBtnlampiran = document.getElementById('tambah-lampiran');

        // Tambah baris lampiran baru
        tambahBtnlampiran.addEventListener('click', function() {
            const jumlah = containerlampiran.querySelectorAll('.lampiran-row').length;
            const row = document.createElement('div');
            row.classList.add('lampiran-row', 'mb-2', 'd-flex');

            row.innerHTML = `
                <input type="text" name="lampiran[]" class="form-control me-2" placeholder="Lampiran ${jumlah + 1} : ......">
                <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-lampiran">X</button>
            `;

            containerlampiran.appendChild(row);
        });

        // Hapus baris lampiran
        containerlampiran.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('btn-remove-lampiran')) {
                e.target.closest('.lampiran-row').remove();
                reindexLampiran();
            }
        });
    });
</script>
