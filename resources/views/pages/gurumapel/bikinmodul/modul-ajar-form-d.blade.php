<div>
    <h5 class="mt-4 text-info"><strong>D. Lampiran</strong></h5>
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

{{-- <div class="container mt-4 border border-dashed p-2 rounded">
    <label for="glosarium" class="form-label"><strong>Glosarium</strong></label>
    <textarea id="glosarium" rows="7" placeholder="Isi beberapa glosarium jika di perlukan" class="form-control"></textarea>
</div> --}}

<div class="container mt-4 border border-dashed p-2 rounded">
    <label class="form-label"><strong>Glosarium</strong></label>
    <div id="glosarium-container">
        <div class="glosarium-row mb-2">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="glosarium-judul[]" class="form-control" value="Literasi Digital"
                        placeholder="Judul 1">
                </div>
                <div class="col-md-8">
                    <input type="text" name="glosarium-desk[]" class="form-control"
                        value="Kemampuan menggunakan teknologi secara kritis" placeholder="Glosarium Deskripsi 1">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-glosarium">X</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Rounded with Label -->
    <div class="d-flex align-items-start gap-3 mt-4 mb-2">
        <button type="button" class="btn btn-sm btn-outline-info btn-label right ms-auto" id="tambah-glosarium"><i
                class="ri-add-line label-icon align-middle fs-18 ms-2"></i>tambah glosarium</button>
    </div>
</div>

<script>
    function reindexGlosarium() {
        const rows = document.querySelectorAll('.glosarium-row');
        rows.forEach((row, index) => {
            const inputJudul = row.querySelector('input[name="glosarium-judul[]"]');
            const inputDesk = row.querySelector('input[name="glosarium-desk[]"]');
            if (inputJudul) {
                inputJudul.placeholder = `Glosarium Judul ${index + 1}`;
            }
            if (inputDesk) {
                inputDesk.placeholder = `Glosarium Deskripsi ${index + 1}`;
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const containerglosarium = document.getElementById('glosarium-container');
        const tambahBtnglosarium = document.getElementById('tambah-glosarium');

        // Tambah baris glosarium baru
        tambahBtnglosarium.addEventListener('click', function() {
            const jumlah = containerglosarium.querySelectorAll('.glosarium-row').length;
            const row = document.createElement('div');
            row.classList.add('glosarium-row', 'mb-2');

            row.innerHTML = `
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="glosarium-judul[]" class="form-control" value=""
                        placeholder="Glosarium Judul ${jumlah + 1}">
                </div>
                <div class="col-md-8">
                    <input type="text" name="glosarium-desk[]" class="form-control" value=""
                        placeholder="Glosarium Deskripsi ${jumlah + 1}">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-glosarium">X</button>
                </div>
            </div>
            `;
            containerglosarium.appendChild(row);
        });

        // Hapus baris glosarium
        containerglosarium.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('btn-remove-glosarium')) {
                e.target.closest('.glosarium-row').remove();
                reindexGlosarium(); // <-- update placeholder setelah hapus
            }
        });
    });
</script>


<div class="container mt-4 border border-dashed p-2 rounded">
    <label class="form-label"><strong>Daftar Pustaka</strong></label>
    <div id="daftarpustaka-container">
        {{-- Tiga daftarpustaka awal dengan value contoh --}}
        <div class="daftarpustaka-row mb-2 d-flex">
            <input type="text" name="daftarpustaka[]" class="form-control me-2" value="(1) Daftar Pustaka"
                placeholder="(1) Daftar Pustaka">
            <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-daftarpustaka">X</button>
        </div>
        <div class="daftarpustaka-row mb-2 d-flex">
            <input type="text" name="daftarpustaka[]" class="form-control me-2" value="(2) Daftar Pustaka"
                placeholder="(2) Daftar Pustaka">
            <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-daftarpustaka">X</button>
        </div>
    </div>
    <!-- Rounded with Label -->
    <div class="d-flex align-items-start gap-3 mt-4 mb-2">
        <button type="button" class="btn btn-sm btn-outline-info btn-label right ms-auto" id="tambah-daftarpustaka"><i
                class="ri-add-line label-icon align-middle fs-18 ms-2"></i>tambah daftar
            pustaka</button>
    </div>
</div>
<script>
    function reindexDaftarPustaka() {
        const rows = document.querySelectorAll('.daftarpustaka-row');
        rows.forEach((row, index) => {
            const input = row.querySelector('input[name="daftarpustaka[]"]');
            if (input) {
                input.placeholder = `(${index + 1}) Daftar Pustaka`;
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        const containerdaftarpustaka = document.getElementById('daftarpustaka-container');
        const tambahBtndaftarpustaka = document.getElementById('tambah-daftarpustaka');

        // Tambah baris daftarpustaka baru
        tambahBtndaftarpustaka.addEventListener('click', function() {
            const jumlah = containerdaftarpustaka.querySelectorAll('.daftarpustaka-row').length;
            const row = document.createElement('div');
            row.classList.add('daftarpustaka-row', 'mb-2', 'd-flex');

            row.innerHTML = `
                <input type="text" name="daftarpustaka[]" class="form-control me-2" placeholder="(${jumlah + 1}) Daftar Pustaka">
                <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-daftarpustaka">X</button>
            `;

            containerdaftarpustaka.appendChild(row);
        });

        // Hapus baris daftarpustaka
        containerdaftarpustaka.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('btn-remove-daftarpustaka')) {
                e.target.closest('.daftarpustaka-row').remove();
                reindexDaftarPustaka();
            }
        });
    });
</script>
