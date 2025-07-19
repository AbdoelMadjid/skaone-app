<div>
    <h5 class="mt-4 text-info"><strong>C. Komponen Inti</strong></h5>
</div>

<div class="container mt-4 border border-dashed p-2 rounded">
    <label for="pemahaman-bermakna" class="form-label"><strong>Pemahaman
            Bermakna</strong></label>
    <textarea id="pemahaman-bermakna" rows="7" placeholder="" class="form-control">Belajar bahasa Prancis bertujuan untuk memiliki keterampilan komunikasi, bukan semata untuk mengetahui "tentang Bahasa Prancis" dan tindak tutur perkenalan merupakan langkah awal dari keterampilan dasar berkomunikasi. Dengan posisi Bahasa Prancis sebagai bahasa yang digunakan sebagai bahasa resmi di 29 negara, bahasa resmi PBB, dan bahasa resmi Uni Eropa, maka penguasaan keterampilan komunikasi dengan Bahasa Prancis akan meningkatkan peluang karir, bisnis, serta meningkatkan daya saing global karena membuka kesempatan berkomunikasi dengan lebih banyak orang dan terhubung dengan berbagai budaya.</textarea>
</div>

<div class="container mt-4 border border-dashed p-2 rounded">
    <label class="form-label"><strong>Pertanyaan Pemantik</strong></label>
    <div id="pertanyaan-container">
        {{-- Tiga pertanyaan awal dengan value contoh --}}
        <div class="pertanyaan-row mb-2 d-flex">
            <input type="text" name="pertanyaan[]" class="form-control me-2"
                value="Kosakata Bahasa Prancis apakah yang sudah pernah kalian dengar dan tahu artinya?"
                placeholder="Pertanyaan 1">
            <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-tanya">X</button>
        </div>
        <div class="pertanyaan-row mb-2 d-flex">
            <input type="text" name="pertanyaan[]" class="form-control me-2"
                value="Menurut kalian, negara apa sajakah yang menggunakan Bahasa Prancis?" placeholder="Pertanyaan 2">
            <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-tanya">X</button>
        </div>
        <div class="pertanyaan-row mb-2 d-flex">
            <input type="text" name="pertanyaan[]" class="form-control me-2"
                value="Adakah yang sudah tahu bagaimana menyapa dan memperkenalkan diri dalam Bahasa Prancis?"
                placeholder="Pertanyaan 3">
            <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-tanya">X</button>
        </div>
    </div>
    <!-- Rounded with Label -->
    <div class="d-flex align-items-start gap-3 mt-4 mb-2">
        <button type="button" class="btn btn-sm btn-outline-info btn-label right ms-auto" id="tambah-pertanyaan"><i
                class="ri-add-line label-icon align-middle fs-18 ms-2"></i>tambah pertanyaan</button>
    </div>
</div>
<script>
    function reindexPertanyaan() {
        const rows = document.querySelectorAll('.pertanyaan-row');
        rows.forEach((row, index) => {
            const input = row.querySelector('input[name="pertanyaan[]"]');
            if (input) {
                input.placeholder = `Pertanyaan ke-${index + 1}`;
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        const containerTanya = document.getElementById('pertanyaan-container');
        const tambahBtnTanya = document.getElementById('tambah-pertanyaan');

        // Tambah baris pertanyaan baru
        tambahBtnTanya.addEventListener('click', function() {
            const jumlah = containerTanya.querySelectorAll('.pertanyaan-row').length;
            const row = document.createElement('div');
            row.classList.add('pertanyaan-row', 'mb-2', 'd-flex');

            row.innerHTML = `
                <input type="text" name="pertanyaan[]" class="form-control me-2" placeholder="Pertanyaan ke-${jumlah + 1}">
                <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-tanya">X</button>
            `;

            containerTanya.appendChild(row);
        });

        // Hapus baris pertanyaan
        containerTanya.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('btn-remove-tanya')) {
                e.target.closest('.pertanyaan-row').remove();
                reindexPertanyaan(); // <- panggil di sini
            }
        });
    });
</script>

<div class="container mt-4 border border-dashed p-2 rounded">
    <label class="form-label"><strong>Kegiatan Pembelajaran</strong></label>
    <div id="kegiatan-pembelajaran-container">
        <div class="kegiatan-pembelajaran" data-index="1">
            <div class="card kegiatan-item mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <label class="form-label mb-0"><strong>Judul Pertemuan 1</strong></label>
                            <input type="text" class="form-control" name="kegiatan[0][judul]" value="Pertemuan 1" />
                        </div>
                        <button type="button" class="btn btn-danger rounded-pill btn-sm btn-hapus-kegiatan fs-16">
                            X
                        </button>
                    </div>

                    <div class="mb-3">
                        <label class="form-label me-3"><strong>Tahapan:</strong></label>
                        <div class="form-check form-check-inline me-3">
                            <input class="form-check-input" type="checkbox" name="kegiatan[0][tahapan][]"
                                value="Memahami" id="tahapan-memahami" />
                            <label class="form-check-label" for="tahapan-memahami">Memahami</label>
                        </div>
                        <div class="form-check form-check-inline me-3">
                            <input class="form-check-input" type="checkbox" name="kegiatan[0][tahapan][]"
                                value="Mengaplikasi" id="tahapan-mengaplikasi" />
                            <label class="form-check-label" for="tahapan-mengaplikasi">Mengaplikasi</label>
                        </div>
                        <div class="form-check form-check-inline me-3">
                            <input class="form-check-input" type="checkbox" name="kegiatan[0][tahapan][]"
                                value="Merefleksi" id="tahapan-merefleksi" />
                            <label class="form-check-label" for="tahapan-merefleksi">Merefleksi</label>
                        </div>
                    </div>

                    <!-- Item kegiatan -->
                    <div class="kegiatan-item mb-4" data-index="0">
                        <!-- Pembukaan -->
                        <div class="row kegiatan-row mb-4">
                            <div class="col-md-8">
                                <div class="form-check mb-2">
                                    <input class="form-check-input kegiatan-check" type="checkbox" checked
                                        data-target="pembukaan-0" id="kegiatan-pembukaan" />
                                    <label class="form-check-label fw-bold" for="kegiatan-pembukaan">Pembukaan</label>
                                </div>
                                <div class="kegiatan-target pembukaan-0">
                                    <textarea class="form-control kegiatan-deskripsi" name="kegiatan[0][pembukaan][deskripsi]" rows="4"
                                        placeholder="Deskripsi pembukaan"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4 kegiatan-target pembukaan-0">
                                <label>Durasi</label>
                                <input type="text" class="form-control" name="kegiatan[0][pembukaan][durasi]"
                                    value="" placeholder="10 menit" />
                            </div>
                        </div>

                        <!-- Asesmen Awal -->
                        <div class="row kegiatan-row mb-4">
                            <div class="col-md-8">
                                <div class="form-check mb-2">
                                    <input class="form-check-input kegiatan-check" type="checkbox" checked
                                        data-target="asesmen-0" id="kegiatan-asesmen-awal" />
                                    <label class="form-check-label fw-bold" for="kegiatan-asesmen-awal">Asesmen
                                        Awal</label>
                                </div>
                                <div class="kegiatan-target asesmen-0">
                                    <textarea class="form-control kegiatan-deskripsi" name="kegiatan[0][asesmen][deskripsi]" rows="4"
                                        placeholder="Deskripsi asesmen awal"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4 kegiatan-target asesmen-0">
                                <label>Durasi</label>
                                <input type="text" class="form-control" name="kegiatan[0][asesmen][durasi]"
                                    value="" placeholder="15 menit" />
                            </div>
                        </div>

                        <!-- Kegiatan Inti -->
                        <div class="row kegiatan-row mb-4">
                            <div class="col-md-8">
                                <div class="form-check mb-2">
                                    <input class="form-check-input kegiatan-check" type="checkbox" checked
                                        data-target="inti-0" id="kegiatan-kegiataninti" />
                                    <label class="form-check-label fw-bold" for="kegiatan-kegiataninti">Kegiatan
                                        Inti</label>
                                </div>
                                <div class="kegiatan-target inti-0">
                                    <textarea class="form-control kegiatan-deskripsi" name="kegiatan[0][inti][deskripsi]" rows="4"
                                        placeholder="Deskripsi kegiatan inti"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4 kegiatan-target inti-0">
                                <label>Durasi</label>
                                <input type="text" class="form-control" name="kegiatan[0][inti][durasi]"
                                    value="" placeholder="50 menit" />
                            </div>
                        </div>

                        <!-- Penutup -->
                        <div class="row kegiatan-row mb-4">
                            <div class="col-md-8">
                                <div class="form-check mb-2">
                                    <input class="form-check-input kegiatan-check" type="checkbox" checked
                                        data-target="penutup-0" id="kegiatan-penutup" />
                                    <label class="form-check-label fw-bold" for="kegiatan-penutup">Penutup</label>
                                </div>
                                <div class="kegiatan-target penutup-0">
                                    <textarea class="form-control kegiatan-deskripsi" name="kegiatan[0][penutup][deskripsi]" rows="4"
                                        placeholder="Deskripsi penutup"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4 kegiatan-target penutup-0">
                                <label>Durasi</label>
                                <input type="text" class="form-control" name="kegiatan[0][penutup][durasi]"
                                    value="" placeholder="15 menit" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Tambah -->
    <div class="text-center mb-3">
        <!-- Buttons with Label -->
        <button type="button" class="btn btn-sm btn-outline-info btn-label waves-effect waves-light"
            id="btn-tambah-pertemuan"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Tambah
            Pertemuan</button>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('kegiatan-pembelajaran-container');
        const btnTambah = document.getElementById('btn-tambah-pertemuan');

        // Simpan template asli dari item pertama
        let templateAsli = container.querySelector('.kegiatan-pembelajaran')?.outerHTML;

        // Toggle deskripsi + durasi per pertemuan
        container.addEventListener('change', function(e) {
            if (e.target.classList.contains('kegiatan-check')) {
                const target = e.target.dataset.target;
                const kegiatanItem = e.target.closest(
                    '.kegiatan-item'); // ⬅️ batasi ke 1 pertemuan saja

                if (target && kegiatanItem) {
                    const targetElements = kegiatanItem.querySelectorAll(`.kegiatan-target.${target}`);
                    targetElements.forEach(el => {
                        el.style.display = e.target.checked ? 'block' : 'none';
                    });
                }
            }
        });
        // Inisialisasi tampil/sembunyi per checkbox dalam masing-masing pertemuan
        container.querySelectorAll('.kegiatan-item').forEach(kegiatanItem => {
            kegiatanItem.querySelectorAll('.kegiatan-check').forEach(checkbox => {
                const target = checkbox.dataset.target;
                const targetElements = kegiatanItem.querySelectorAll(
                    `.kegiatan-target.${target}`);
                targetElements.forEach(el => {
                    el.style.display = checkbox.checked ? 'block' : 'none';
                });
            });
        });

        // Hapus pertemuan
        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-hapus-kegiatan')) {
                const item = e.target.closest('.kegiatan-pembelajaran');
                if (item) {
                    item.remove();
                    reindexPertemuan();
                }
            }
        });

        // Tambah pertemuan baru
        btnTambah.addEventListener('click', function() {
            let jumlah = container.querySelectorAll('.kegiatan-pembelajaran').length;
            let nextIndex = jumlah;

            // Gunakan template asli kalau sudah tidak ada item
            const htmlSource = jumlah > 0 ?
                container.querySelector('.kegiatan-pembelajaran').outerHTML :
                templateAsli;

            if (!htmlSource) return;

            const newHtml = htmlSource
                .replaceAll(/\[kegiatan\]\[\d+\]/g, `[kegiatan][${nextIndex}]`)
                .replaceAll(/value="Pertemuan \d+"/g, `value="Pertemuan ${nextIndex + 1}"`)
                .replaceAll(/>Pertemuan \d+</g, `>Pertemuan ${nextIndex + 1}<`)
                .replaceAll(/id="tahapan-memahami"/g, `id="tahapan-memahami-${nextIndex}"`)
                .replaceAll(/for="tahapan-memahami"/g, `for="tahapan-memahami-${nextIndex}"`)
                .replaceAll(/id="tahapan-mengaplikasi"/g, `id="tahapan-mengaplikasi-${nextIndex}"`)
                .replaceAll(/for="tahapan-mengaplikasi"/g, `for="tahapan-mengaplikasi-${nextIndex}"`)
                .replaceAll(/id="tahapan-merefleksi"/g, `id="tahapan-merefleksi-${nextIndex}"`)
                .replaceAll(/for="tahapan-merefleksi"/g, `for="tahapan-merefleksi-${nextIndex}"`)
                .replaceAll(/id="kegiatan-pembukaan"/g, `id="kegiatan-pembukaan-${nextIndex}"`)
                .replaceAll(/for="kegiatan-pembukaan"/g, `for="kegiatan-pembukaan-${nextIndex}"`)
                .replaceAll(/id="kegiatan-asesmen-awal"/g, `id="kegiatan-asesmen-awal-${nextIndex}"`)
                .replaceAll(/for="kegiatan-asesmen-awal"/g, `for="kegiatan-asesmen-awal-${nextIndex}"`)
                .replaceAll(/id="kegiatan-kegiataninti"/g, `id="kegiatan-kegiataninti-${nextIndex}"`)
                .replaceAll(/for="kegiatan-kegiataninti"/g, `for="kegiatan-kegiataninti-${nextIndex}"`)
                .replaceAll(/id="kegiatan-penutup"/g, `id="kegiatan-penutup-${nextIndex}"`)
                .replaceAll(/for="kegiatan-penutup"/g, `for="kegiatan-penutup-${nextIndex}"`);

            // Perbarui semua data-target dan class kegiatan-target (pembukaan-0, asesmen-0, dll)
            const keys = ['pembukaan', 'asesmen', 'inti', 'penutup'];
            let finalHtml = newHtml;

            keys.forEach(k => {
                const regexClass = new RegExp(`${k}-\\d+`,
                    'g'); // pembukaan-0, pembukaan-1, dst
                finalHtml = finalHtml.replaceAll(regexClass, `${k}-${nextIndex}`);
            });

            const div = document.createElement('div');
            div.innerHTML = finalHtml;
            container.appendChild(div.firstElementChild);
            reindexPertemuan();
        });

        // Reindex label dan name
        function reindexPertemuan() {
            const items = container.querySelectorAll('.kegiatan-pembelajaran');
            items.forEach((el, i) => {
                const index = i;
                el.setAttribute('data-index', index + 1);

                // Ubah label dan nilai input judul
                const label = el.querySelector('label.form-label strong');
                const inputJudul = el.querySelector('input[name^="kegiatan"]');
                if (label) label.innerText = `Judul Pertemuan ${index + 1}`;
                if (inputJudul) inputJudul.value = `Pertemuan ${index + 1}`;

                // Ubah semua atribut name
                el.querySelectorAll('[name]').forEach(input => {
                    input.name = input.name.replace(/\[kegiatan\]\[\d+\]/g,
                        `[kegiatan][${index}]`);
                });
            });
        }
    });
</script>


<!-- ASESMEN -->
<div class="container mt-4 border border-dashed p-2 rounded">
    <h5>Asesmen</h5>

    <div class="form-check mb-2">
        <input class="form-check-input toggle-section" type="checkbox" id="asesmen_formatif_cb" checked>
        <label class="form-check-label" for="asesmen_formatif_cb">Asesmen Formatif</label>
    </div>

    <!-- ASESMEN FORMATIF -->

    <div id="asesmen_formatif_section" class="mb-3">
        <div class="container me-4">
            <div id="formatif-container">
                {{-- Tiga pertanyaan awal dengan value contoh --}}
                <div class="formatif-row mb-2 d-flex">
                    <input type="text" name="formatif[]" class="form-control me-2"
                        value="Asesmen Awal: Kuis/peta konsep (lampiran 1)." placeholder="Asesmen Formatif 1">
                    <button type="button" class="btn btn-danger rounded-pill btn-sm btn-remove-formatif">X</button>
                </div>
                <div class="formatif-row mb-2 d-flex">
                    <input type="text" name="formatif[]" class="form-control me-2"
                        value="Selama Proses: Observasi keaktifan diskusi (lembar observasi), penilaian proposal rencana investigasi (rubrik sederhana)."
                        placeholder=" Asesmen Formatif 2">
                    <button type="button" class="btn btn-danger rounded-pill btn-sm btn-remove-formatif">X</button>
                </div>
            </div>
            <div class="d-flex align-items-start gap-3 mt-4 mb-2">
                <button type="button" class="btn btn-sm btn-outline-info btn-label right ms-auto"
                    id="tambah-assesment-formatif"><i class="ri-add-line label-icon align-middle fs-18 ms-2"></i>
                    Tambah Asesmen Formatif</button>
            </div>
        </div>
    </div>
    <script>
        function reindexFormatif() {
            const rows = document.querySelectorAll('.formatif-row');
            rows.forEach((row, index) => {
                const input = row.querySelector('input[name="formatif[]"]');
                if (input) {
                    input.placeholder = `Asesmen Formatif ${index + 1}`;
                }
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            const containerFormatif = document.getElementById('formatif-container');
            const tambahBtnFormatif = document.getElementById('tambah-assesment-formatif');

            // Tambah baris pertanyaan baru
            tambahBtnFormatif.addEventListener('click', function() {
                const jumlah = containerFormatif.querySelectorAll('.formatif-row').length;
                const row = document.createElement('div');
                row.classList.add('formatif-row', 'mb-2', 'd-flex');

                row.innerHTML = `
                <input type="text" name="formatif[]" class="form-control me-2"
                        value="" placeholder="Asesmen Formatif ${jumlah + 1}">
                    <button type="button" class="btn btn-danger rounded-pill btn-sm btn-remove-formatif">X</button>
            `;

                containerFormatif.appendChild(row);
            });

            // Hapus baris pertanyaan
            containerFormatif.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('btn-remove-formatif')) {
                    e.target.closest('.formatif-row').remove();
                    reindexFormatif();
                }
            });
        });
    </script>
    <!-- ASESMEN SUMATIF -->

    <div class="form-check mb-2">
        <input class="form-check-input toggle-section" type="checkbox" id="asesmen_sumatif_cb" checked>
        <label class="form-check-label" for="asesmen_sumatif_cb">Asesmen Sumatif</label>
    </div>
    <div id="asesmen_sumatif_section" class="mb-3">
        <div class="container me-4">
            <div id="sumatif-container">
                {{-- Tiga pertanyaan awal dengan value contoh --}}
                <div class="sumatif-row mb-2 d-flex">
                    <input type="text" name="sumatif[]" class="form-control me-2"
                        value="Penilaian produk akhir (poster, video, atau presentasi) menggunakan rubrik penilaian proyek (lampiran 2)."
                        placeholder="Asesmen Sumatif 1">
                    <button type="button" class="btn btn-danger rounded-pill btn-sm btn-remove-sumatif">X</button>
                </div>
                <div class="sumatif-row mb-2 d-flex">
                    <input type="text" name="sumatif[]" class="form-control me-2"
                        value="Rubrik mencakup kriteria ketercapaian tujuan pembelajaran sesuai capaian dan profil lulusan yang diharapkan"
                        placeholder=" Asesmen Sumatif 2">
                    <button type="button" class="btn btn-danger rounded-pill btn-sm btn-remove-sumatif">X</button>
                </div>
            </div>
            <div class="d-flex align-items-start gap-3 mt-4 mb-2">
                <button type="button" class="btn btn-sm btn-outline-info btn-label right ms-auto"
                    id="tambah-assesment-sumatif"><i class="ri-add-line label-icon align-middle fs-18 ms-2"></i>
                    Tambah Asesmen Sumatif</button>
            </div>
        </div>
    </div>

    <script>
        function reindexSumatif() {
            const rows = document.querySelectorAll('.sumatif-row');
            rows.forEach((row, index) => {
                const input = row.querySelector('input[name="sumatif[]"]');
                if (input) {
                    input.placeholder = `Asesmen Sumatif ${index + 1}`;
                }
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            const containerSumatif = document.getElementById('sumatif-container');
            const tambahBtnSumatif = document.getElementById('tambah-assesment-sumatif');

            // Tambah baris pertanyaan baru
            tambahBtnSumatif.addEventListener('click', function() {
                const jumlah = containerSumatif.querySelectorAll('.sumatif-row').length;
                const row = document.createElement('div');
                row.classList.add('sumatif-row', 'mb-2', 'd-flex');

                row.innerHTML = `
                <input type="text" name="sumatif[]" class="form-control me-2"
                        value="" placeholder="Asesmen Sumatif ${jumlah + 1}">
                    <button type="button" class="btn btn-danger rounded-pill btn-sm btn-remove-sumatif">X</button>
            `;

                containerSumatif.appendChild(row);
            });

            // Hapus baris pertanyaan
            containerSumatif.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('btn-remove-sumatif')) {
                    e.target.closest('.sumatif-row').remove();
                    reindexSumatif();
                }
            });
        });
    </script>

</div>


<!-- REFLEKSI -->

<div class="container mt-4 border border-dashed p-2 rounded">
    <h5>Refleksi Pendidik & Peserta Didik</h5>

    <!-- REFLEKSI PENDIDIK -->
    <div class="form-check mb-2">
        <input class="form-check-input toggle-section" type="checkbox" id="refleksi_pendidik_cb" checked
            value="">
        <label class="form-check-label" for="refleksi_pendidik_cb">Untuk Pendidik</label>
    </div>
    <div id="refleksi_pendidik_section" class="mb-3">
        <div class="container me-4">
            <div id="refleksi-pendidik-container">
                {{-- Tiga pertanyaan awal dengan value contoh --}}
                <div class="refleksi-pendidik-row mb-2 d-flex">
                    <input type="text" name="refleksi-pendidik[]" class="form-control me-2"
                        value="Apakah kegiatan pembelajaran berhasil menumbuhkan penalaran kritis dan kepedulian siswa?"
                        placeholder="Refleksi Pendidik 1">
                    <button type="button"
                        class="btn btn-danger rounded-pill btn-sm btn-remove-refleksi-pendidik">X</button>
                </div>
                <div class="refleksi-pendidik-row mb-2 d-flex">
                    <input type="text" name="refleksi-pendidik[]" class="form-control me-2"
                        value="Apakah diferensiasi yang dilakukan efektif menjawab kebutuhan belajar yang beragam?"
                        placeholder="Refleksi Pendidik 2">
                    <button type="button"
                        class="btn btn-danger rounded-pill btn-sm btn-remove-refleksi-pendidik">X</button>
                </div>
            </div>
            <div class="d-flex align-items-start gap-3 mt-4 mb-2">
                <button type="button" class="btn btn-sm btn-outline-info btn-label right ms-auto"
                    id="tambah-refleksi-pendidik"><i class="ri-add-line label-icon align-middle fs-18 ms-2"></i>
                    Tambah Refleksi Pendidik</button>
            </div>
        </div>
    </div>

    <script>
        function reindexPendidik() {
            const rows = document.querySelectorAll('.refleksi-pendidik-row');
            rows.forEach((row, index) => {
                const input = row.querySelector('input[name="refleksi-pendidik[]"]');
                if (input) {
                    input.placeholder = `Refleksi Pendidik ${index + 1}`;
                }
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            const containerPendidik = document.getElementById('refleksi-pendidik-container');
            const tambahBtnPendidik = document.getElementById('tambah-refleksi-pendidik');

            // Tambah baris pertanyaan baru
            tambahBtnPendidik.addEventListener('click', function() {
                const jumlah = containerPendidik.querySelectorAll('.refleksi-pendidik-row').length;
                const row = document.createElement('div');
                row.classList.add('refleksi-pendidik-row', 'mb-2', 'd-flex');

                row.innerHTML = `
                <input type="text" name="refleksi-pendidik[]" class="form-control me-2"
                        value="" placeholder="Refleksi Pendidik ${jumlah + 1}">
                    <button type="button" class="btn btn-danger rounded-pill btn-sm btn-remove-refleksi-pendidik">X</button>
            `;

                containerPendidik.appendChild(row);
            });

            // Hapus baris pertanyaan
            containerPendidik.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('btn-remove-refleksi-pendidik')) {
                    e.target.closest('.refleksi-pendidik-row').remove();
                    reindexPendidik();
                }
            });
        });
    </script>

    <!-- REFLEKSI PESERTA DIDIK -->
    <div class="form-check mb-2">
        <input class="form-check-input toggle-section" type="checkbox" id="refleksi_peserta_cb" checked>
        <label class="form-check-label" for="refleksi_peserta_cb">Untuk Peserta Didik</label>
    </div>
    <div id="refleksi_peserta_section" class="mb-3">
        <div class="container me-4">
            <div id="refleksi-pesertadidik-container">
                {{-- Tiga pertanyaan awal dengan value contoh --}}
                <div class="refleksi-pesertadidik-row mb-2 d-flex">
                    <input type="text" name="refleksi-pesertadidik[]" class="form-control me-2"
                        value="Apa pemahaman baru yang paling berkesan bagi saya tentang berkenalan dengan Bahasa Prancis?"
                        placeholder="Refleksi Peserta Didik 1">
                    <button type="button"
                        class="btn btn-danger rounded-pill btn-sm btn-remove-refleksi-pesertadidik">X</button>
                </div>
                <div class="refleksi-pesertadidik-row mb-2 d-flex">
                    <input type="text" name="refleksi-pesertadidik[]" class="form-control me-2"
                        value="Apa tantangan terbesar yang saya hadapi saat bekerja dalam kelompok?"
                        placeholder="Refleksi Peserta Didik 2">
                    <button type="button"
                        class="btn btn-danger rounded-pill btn-sm btn-remove-refleksi-pesertadidik">X</button>
                </div>
            </div>
            <div class="d-flex align-items-start gap-3 mt-4 mb-2">
                <button type="button" class="btn btn-sm btn-outline-info btn-label right ms-auto"
                    id="tambah-refleksi-pesertadidik"><i class="ri-add-line label-icon align-middle fs-18 ms-2"></i>
                    Tambah Refleksi Peserta Didik</button>
            </div>
        </div>
    </div>

    <script>
        function reindexPesertaDidik() {
            const rows = document.querySelectorAll('.refleksi-pesertadidik-row');
            rows.forEach((row, index) => {
                const input = row.querySelector('input[name="refleksi-pesertadidik[]"]');
                if (input) {
                    input.placeholder = `Refleksi Peserta Didik ${index + 1}`;
                }
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            const containerPesertaDidik = document.getElementById('refleksi-pesertadidik-container');
            const tambahBtnPesertaDidik = document.getElementById('tambah-refleksi-pesertadidik');

            // Tambah baris pertanyaan baru
            tambahBtnPesertaDidik.addEventListener('click', function() {
                const jumlah = containerPesertaDidik.querySelectorAll('.refleksi-pesertadidik-row').length;
                const row = document.createElement('div');
                row.classList.add('refleksi-pesertadidik-row', 'mb-2', 'd-flex');

                row.innerHTML = `
                <input type="text" name="refleksi-pesertadidik[]" class="form-control me-2"
                        value="" placeholder="Refleksi Peserta Didik ${jumlah + 1}">
                    <button type="button" class="btn btn-danger rounded-pill btn-sm btn-remove-refleksi-pesertadidik">X</button>
            `;

                containerPesertaDidik.appendChild(row);
            });

            // Hapus baris pertanyaan
            containerPesertaDidik.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('btn-remove-refleksi-pesertadidik')) {
                    e.target.closest('.refleksi-pesertadidik-row').remove();
                    reindexPesertaDidik();
                }
            });
        });
    </script>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleMap = {
            asesmen_formatif_cb: 'asesmen_formatif_section',
            asesmen_sumatif_cb: 'asesmen_sumatif_section',
            refleksi_pendidik_cb: 'refleksi_pendidik_section',
            refleksi_peserta_cb: 'refleksi_peserta_section'
        };

        Object.keys(toggleMap).forEach(id => {
            const checkbox = document.getElementById(id);
            const target = document.getElementById(toggleMap[id]);

            // Tampilkan langsung jika sudah tercentang saat load
            target.style.display = checkbox.checked ? 'block' : 'none';

            checkbox.addEventListener('change', () => {
                target.style.display = checkbox.checked ? 'block' : 'none';
            });
        });
    });
</script>
