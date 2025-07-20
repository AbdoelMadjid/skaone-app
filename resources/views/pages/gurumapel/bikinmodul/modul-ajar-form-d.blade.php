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

<div class="container mt-4 border border-dashed p-2 rounded">
    <label for="glosarium" class="form-label"><strong>Glosarium</strong></label>
    <textarea id="glosarium" rows="7" placeholder="Isi beberapa glosarium jika di perlukan" class="form-control">-</textarea>
</div>



<div class="container mt-4 border border-dashed p-2 rounded">
    <label for="daftar-pustaka" class="form-label"><strong>Daftar Pustaka</strong></label>
    <textarea id="daftar-pustaka" rows="7" placeholder="isi beberapa daftar pustaka jika di perlukan"
        class="form-control">-</textarea>
</div>

<div class="alert alert-warning alert-dismissible alert-additional fade show mb-2 mt-4" role="alert">
    <div class="alert-body">
        <div class="d-flex">
            <div class="flex-shrink-0 me-3">
                <i class="ri-alert-line display-6 align-middle"></i>
            </div>
            <div class="flex-grow-1">
                <h5 class="alert-heading">Mohon Maaf !!. <br><span class="text-danger-emphasis">Halaman
                        @yield('title')</span></h5>
                <p class="mb-0">Masih proses scripting. </p>
            </div>
        </div>
    </div>
</div>
