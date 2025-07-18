<div>
    <h5 class="mb-1">C. Komponen Inti</h5>
</div>

<div class="container mt-4 border border-dashed p-2 rounded">
    <label for="pemahaman-bermakna" class="form-label">Pemahaman
        Bermakna</label>
    <textarea id="pemahaman-bermakna" rows="7" placeholder="" class="form-control">Belajar bahasa Prancis bertujuan untuk memiliki keterampilan komunikasi, bukan semata untuk mengetahui "tentang Bahasa Prancis" dan tindak tutur perkenalan merupakan langkah awal dari keterampilan dasar berkomunikasi. Dengan posisi Bahasa Prancis sebagai bahasa yang digunakan sebagai bahasa resmi di 29 negara, bahasa resmi PBB, dan bahasa resmi Uni Eropa, maka penguasaan keterampilan komunikasi dengan Bahasa Prancis akan meningkatkan peluang karir, bisnis, serta meningkatkan daya saing global karena membuka kesempatan berkomunikasi dengan lebih banyak orang dan terhubung dengan berbagai budaya.</textarea>

</div>
<div class="container mt-4 border border-dashed p-2 rounded">
    <label class="form-label">Pertanyaan Pemantik</label>
    <div id="pertanyaan-container">
        {{-- Tiga pertanyaan awal dengan value contoh --}}
        <div class="pertanyaan-row mb-2 d-flex">
            <input type="text" name="pertanyaan[]" class="form-control me-2"
                value="Kosakata Bahasa Prancis apakah yang sudah pernah kalian dengar dan tahu artinya?"
                placeholder="Pertanyaan 1">
            <button type="button" class="btn btn-danger btn-sm btn-remove-tanya">X</button>
        </div>
        <div class="pertanyaan-row mb-2 d-flex">
            <input type="text" name="pertanyaan[]" class="form-control me-2"
                value="Menurut kalian, negara apa sajakah yang menggunakan Bahasa Prancis?" placeholder="Pertanyaan 2">
            <button type="button" class="btn btn-danger btn-sm btn-remove-tanya">X</button>
        </div>
        <div class="pertanyaan-row mb-2 d-flex">
            <input type="text" name="pertanyaan[]" class="form-control me-2"
                value="Adakah yang sudah tahu bagaimana menyapa dan memperkenalkan diri dalam Bahasa Prancis?"
                placeholder="Pertanyaan 3">
            <button type="button" class="btn btn-danger btn-sm btn-remove-tanya">X</button>
        </div>
    </div>
    <button type="button" id="tambah-pertanyaan" class="btn btn-sm btn-outline-primary mt-2">+ Tambah
        Pertanyaan</button>
</div>

<div class="container mt-4 border border-dashed p-2 rounded">
    <label class="form-label">Kegiatan Pembelajaran</label>
    <div id="daftar-pertemuan">
        <div class="kegiatan-container" data-index="0" id="kegiatan-container-0">
            <div class="row mb-3">
                <div class="col-11">
                    <label class="form-label">Judul Pertemuan 1</label>
                    <input type="text" class="form-control" name="judul[0]" value="Pertemuan 1">
                </div>
                <div class="col-1 d-flex align-items-start">
                    <button type="button" class="btn btn-danger btn-sm btn-remove-pertemuan">X</button>
                </div>
            </div>

            <!-- Tahapan -->
            <div class="mb-3">
                <label class="form-label">Tahapan :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tahap[0][]" value="memahami"
                        id="tahap-0-memahami">
                    <label class="form-check-label" for="tahap-0-memahami">Memahami</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tahap[0][]" value="mengaplikasi"
                        id="tahap-0-mengaplikasi">
                    <label class="form-check-label" for="tahap-0-mengaplikasi">Mengaplikasi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tahap[0][]" value="merefleksi"
                        id="tahap-0-merefleksi">
                    <label class="form-check-label" for="tahap-0-merefleksi">Merefleksi</label>
                </div>
            </div>

            <!-- Aktivitas (checkbox dan konten) -->
            <!-- Gunakan struktur yang bisa dikenali oleh JS untuk clone dan toggle -->
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input aktivitas-check" type="checkbox" checked
                        name="aktivitas[0][pembukaan]" id="aktivitas-0-pembukaan">
                    <label class="form-check-label" for="aktivitas-0-pembukaan">Pembukaan</label>
                </div>
                <div class="row container p-2" id="aktivitas-pembukaan">
                    <div class="col-md-10">
                        <label class="form-label" for="deskripsi-aktivitas-pembukaan">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi[0][pembukaan]" rows="2" id="deskripsi-aktivitas-pembukaan">Deskripsikan aktivitas pembukaan.</textarea>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="durasi-waktu-pembukaan">Durasi</label>
                        <input type="text" class="form-control" name="durasi[0][pembukaan]" value="10 menit"
                            id="durasi-waktu-pembukaan">
                    </div>
                </div>
            </div>

            <!-- Aktivitas lain (asesmenAwal, kegiatanInti, penutup) sama pola seperti pembukaan -->
            <!-- ASESMEN AWAL -->
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input aktivitas-check" type="checkbox" checked
                        name="aktivitas[0][asesmenAwal]" id="aktivitas-0-asesmenAwal">
                    <label class="form-check-label" for="aktivitas-0-asesmenAwal">Asesmen Awal</label>
                </div>
                <div class="row container p-2" id="aktivitas-asesmenAwal">
                    <div class="col-md-10">
                        <label class="form-label" for="deskripsi-aktivitas-asesmenAwal">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi[0][asesmenAwal]" rows="2" id="deskripsi-aktivitas-asesmenAwal">Deskripsikan aktivitas asesmen awal.</textarea>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="durasi-waktu-asesmenAwal">Durasi</label>
                        <input type="text" class="form-control" name="durasi[0][asesmenAwal]" value="15 menit"
                            id="durasi-waktu-asesmenAwal">
                    </div>
                </div>
            </div>

            <!-- KEGIATAN INTI -->
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input aktivitas-check" type="checkbox" checked
                        name="aktivitas[0][kegiatanInti]" id="aktivitas-0-kegiatanInti">
                    <label class="form-check-label" for="aktivitas-0-kegiatanInti">Kegiatan Inti</label>
                </div>
                <div class="row container p-2" id="aktivitas-kegiatanInti">
                    <div class="col-md-10">
                        <label class="form-label" for="deskripsi-aktivitas-kegiatanInti">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi[0][kegiatanInti]" rows="2"
                            id="deskripsi-aktivitas-kegiatanInti">Deskripsikan aktivitas kegiatan inti.</textarea>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="durasi-waktu-kegiatanInti">Durasi</label>
                        <input type="text" class="form-control" name="durasi[0][kegiatanInti]" value="50 menit"
                            id="durasi-waktu-kegiatanInti">
                    </div>
                </div>
            </div>

            <!-- PENUTUP -->
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input aktivitas-check" type="checkbox" checked
                        name="aktivitas[0][penutup]" id="aktivitas-0-penutup">
                    <label class="form-check-label" for="aktivitas-0-penutup">Penutup</label>
                </div>
                <div class="row container p-2" id="aktivitas-penutup">
                    <div class="col-md-10">
                        <label class="form-label" for="deskripsi-aktivitas-penutup">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi[0][penutup]" rows="2" id="deskripsi-aktivitas-penutup">Deskripsikan aktivitas kegiatan inti.</textarea>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="durasi-waktu-penutup">Durasi</label>
                        <input type="text" class="form-control" name="durasi[0][penutup]" value="15 menit"
                            id="durasi-waktu-penutup">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol tambah -->
    <button type="button" class="btn btn-primary mt-3" id="btn-tambah-pertemuan">Tambah Pertemuan</button>
</div>

<script>
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
                <button type="button" class="btn btn-danger btn-sm btn-remove-tanya">X</button>
            `;

            containerTanya.appendChild(row);
        });

        // Hapus baris pertanyaan
        containerTanya.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('btn-remove-tanya')) {
                e.target.closest('.pertanyaan-row').remove();
            }
        });
    });
</script>
{{-- <script>
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('aktivitas-check')) {
            const checkbox = e.target;
            const inputId = checkbox.id; // contoh: aktivitas-0-pembukaan
            const aktivitasName = inputId.split('-').slice(2).join('-'); // pembukaan, asesmenAwal, dst

            // Ambil index pertemuan dari ID
            const pertemuanIndex = inputId.split('-')[1];

            // Targetkan div yang sesuai berdasarkan index
            const targetDiv = document.getElementById(`aktivitas-${aktivitasName}`);

            if (checkbox.checked) {
                targetDiv.style.display = 'flex';
            } else {
                targetDiv.style.display = 'none';
            }
        }
    });

    // Saat load awal, pastikan semua div ditampilkan/ disembunyikan sesuai checkbox
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.aktivitas-check');
        checkboxes.forEach(checkbox => {
            checkbox.dispatchEvent(new Event('change'));
        });
        // Tambahan: hapus elemen dengan id="kegiatan-container" saat tombol X ditekan
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-remove-pertemuan')) {
                const kegiatanContainer = document.getElementById('kegiatan-container');
                if (kegiatanContainer) {
                    kegiatanContainer.remove();
                }
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const daftarPertemuan = document.getElementById('daftar-pertemuan');
        const btnTambah = document.getElementById('btn-tambah-pertemuan');

        btnTambah.addEventListener('click', function() {
            const semuaPertemuan = daftarPertemuan.querySelectorAll('.kegiatan-container');
            const lastIndex = semuaPertemuan.length ? parseInt(semuaPertemuan[semuaPertemuan.length - 1]
                .dataset.index) : -1;
            const newIndex = lastIndex + 1;

            // Clone elemen pertemuan pertama
            const clone = semuaPertemuan[0].cloneNode(true);
            clone.dataset.index = newIndex;
            clone.id = `kegiatan-container-${newIndex}`;

            // Update semua atribut name, id, for, dan label agar sesuai index baru
            clone.querySelectorAll('[name], [id], [for], label').forEach(el => {
                ['name', 'id', 'for'].forEach(attr => {
                    if (el.hasAttribute(attr)) {
                        el.setAttribute(attr, el.getAttribute(attr).replace(/\[?0\]?/g,
                            `[${newIndex}]`).replace(/-0-/g, `-${newIndex}-`));
                    }
                });
            });

            // Update label judul
            const label = clone.querySelector('label.form-label');
            if (label) {
                label.textContent = `Judul Pertemuan ${newIndex + 1}`;
            }

            // Kosongkan nilai input/textarea
            clone.querySelectorAll('input[type="text"], textarea').forEach(input => {
                if (input.tagName === 'TEXTAREA') {
                    input.value =
                        `Deskripsikan aktivitas ${input.name.split('[')[2]?.replace(']', '') || ''}.`;
                } else {
                    input.value = input.name.includes('durasi') ? '10 menit' :
                        `Pertemuan ${newIndex + 1}`;
                }
            });

            // Tambahkan ke DOM
            daftarPertemuan.appendChild(clone);

            // Trigger ulang script awal agar checkbox show/hide tetap jalan
            clone.querySelectorAll('.aktivitas-check').forEach(cb => {
                cb.dispatchEvent(new Event('change'));
            });
        });
    });
</script>
 --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const daftarPertemuan = document.getElementById('daftar-pertemuan');
        const btnTambah = document.getElementById('btn-tambah-pertemuan');

        function bindAktivitasCheck(container) {
            const checkboxes = container.querySelectorAll('.aktivitas-check');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const inputId = checkbox.id; // contoh: aktivitas-0-asesmenAwal
                    const parts = inputId.split('-'); // ['aktivitas', '0', 'asesmenAwal']
                    const pertemuanIndex = parts[1];
                    const aktivitasName = parts[2];
                    const targetDiv = container.querySelector(
                        `#aktivitas-${pertemuanIndex}-${aktivitasName}`);
                    if (targetDiv) {
                        targetDiv.style.display = checkbox.checked ? 'flex' : 'none';
                    }
                });

                // Trigger langsung saat load
                checkbox.dispatchEvent(new Event('change'));
            });
        }

        // Bind awal (pertemuan pertama)
        bindAktivitasCheck(document.querySelector('.kegiatan-container'));

        btnTambah.addEventListener('click', function() {
            const semuaPertemuan = daftarPertemuan.querySelectorAll('.kegiatan-container');
            const lastIndex = semuaPertemuan.length ? parseInt(semuaPertemuan[semuaPertemuan.length - 1]
                .dataset.index) : 0;
            const newIndex = lastIndex + 1;

            const clone = semuaPertemuan[0].cloneNode(true);
            clone.dataset.index = newIndex;
            clone.id = `kegiatan-container-${newIndex}`;

            // Ganti semua atribut name, id, for
            clone.querySelectorAll('[name], [id], [for], label').forEach(el => {
                ['name', 'id', 'for'].forEach(attr => {
                    if (el.hasAttribute(attr)) {
                        el.setAttribute(attr,
                            el.getAttribute(attr)
                            .replace(/\[\d+\]/g, `[${newIndex}]`)
                            .replace(/-\d+-/g, `-${newIndex}-`)
                        );
                    }
                });
            });

            // Update label judul
            const label = clone.querySelector('label.form-label');
            if (label) label.textContent = `Judul Pertemuan ${newIndex + 1}`;

            // Kosongkan nilai input/textarea
            clone.querySelectorAll('input[type="text"], textarea').forEach(input => {
                input.value = input.name.includes('durasi') ? '10 menit' :
                    input.tagName === 'TEXTAREA' ?
                    `Deskripsikan aktivitas ${input.name.split('[')[2]?.replace(']', '') || ''}.` :
                    `Pertemuan ${newIndex + 1}`;
            });

            // Sembunyikan semua aktivitas div dulu
            clone.querySelectorAll('.aktivitas-div').forEach(div => {
                div.style.display = 'none';
            });

            daftarPertemuan.appendChild(clone);

            // Bind ulang checkbox listener untuk pertemuan baru
            bindAktivitasCheck(clone);
        });

        // Hapus pertemuan
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-remove-pertemuan')) {
                const container = e.target.closest('.kegiatan-container');
                if (container) container.remove();
            }
        });
    });
</script>
