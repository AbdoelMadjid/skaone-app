<div>
    <h5 class="mt-4 text-info"><strong>B. Kerangka dan Tujuan</strong></h5>
</div>

<div class="container mt-4 border border-dashed p-2 rounded">
    <label class="form-label"><strong>Elemen</strong></label>
    <div id="elemen-container">
        <!-- Elemen pertama -->
        <div class="row mb-2 elemen-item">
            <div class="col-11">
                <textarea class="form-control" name="elemen[]" rows="2">Menyimak</textarea>
            </div>
            <div class="col-1 d-flex align-items-start">
                <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-elemen">X</button>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-start gap-3 mt-4 mb-2">
        <button type="button" class="btn btn-sm btn-outline-info btn-label right ms-auto" id="btn-tambah-elemen"><i
                class="ri-add-line label-icon align-middle fs-18 ms-2"></i> Tambah Elemen</button>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.getElementById("elemen-container");
        const btnTambah = document.getElementById("btn-tambah-elemen");

        // Tambah elemen baru
        btnTambah.addEventListener("click", function() {
            const item = document.createElement("div");
            item.classList.add("row", "mb-2", "elemen-item");
            item.innerHTML = `
                <div class="col-11">
                    <textarea class="form-control" name="elemen[]" rows="2"></textarea>
                </div>
                <div class="col-1 d-flex align-items-start">
                    <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-elemen">X</button>
                </div>
            `;
            container.appendChild(item);
        });

        // Hapus elemen (event delegation)
        container.addEventListener("click", function(e) {
            if (e.target.classList.contains("btn-remove-elemen")) {
                e.target.closest(".elemen-item").remove();
            }
        });
    });
</script>

{{-- Capai Pembelajaran --}}
<div class="container mt-4 border border-dashed p-2 rounded">
    <label class="form-label"><strong>Capaian Pembelajaran Elemen</strong></label>
    <div id="capaian-container">
        <!-- Capaian pertama -->
        <div class="row mb-2 capaian-item">
            <div class="col-11">
                <textarea class="form-control" name="capaian[]" rows="3">
Peserta didik dapat menemukan informasi umum dan terperinci dari teks lisan sederhana tentang perkenalan diri sendiri dan seseorang
                </textarea>
            </div>
            <div class="col-1 d-flex align-items-start">
                <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-capaian">X</button>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-start gap-3 mt-4 mb-2">
        <button type="button" class="btn btn-sm btn-outline-info btn-label right ms-auto" id="btn-tambah-capaian"><i
                class="ri-add-line label-icon align-middle fs-18 ms-2"></i> Tambah Capaian Pembelajaran</button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Untuk Capaian Pembelajaran
        const capaianContainer = document.getElementById("capaian-container");
        const btnTambahCapaian = document.getElementById("btn-tambah-capaian");

        btnTambahCapaian.addEventListener("click", function() {
            const item = document.createElement("div");
            item.classList.add("row", "mb-2", "capaian-item");
            item.innerHTML = `
                <div class="col-11">
                    <textarea class="form-control" name="capaian[]" rows="3"></textarea>
                </div>
                <div class="col-1 d-flex align-items-start">
                    <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-capaian">X</button>
                </div>
            `;
            capaianContainer.appendChild(item);
        });

        capaianContainer.addEventListener("click", function(e) {
            if (e.target.classList.contains("btn-remove-capaian")) {
                e.target.closest(".capaian-item").remove();
            }
        });
    });
</script>

<div class="container mt-4 border border-dashed p-2 rounded">
    <label class="form-label"><strong>Tujuan Pembelajaran & KKTP</strong></label>
    <div id="tujuan-wrapper">
        <!-- Tujuan Pembelajaran pertama -->
        <div class="card p-3 mb-3 tujuan-item border border-secondary-subtle">
            <div class="row">
                <div class="col-11">
                    <textarea class="form-control mb-2" name="tujuan[]" placeholder="Tuliskan Tujuan Pembelajaran...">Menemukan Informasi Umum dari teks lisan sederhana tentang perkenalan diri sendiri</textarea>
                </div>
                <div class="col-1 d-flex align-items-start">
                    <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-tujuan">✖</button>
                </div>
            </div>
            <div class="container mb-2">
                <label class="form-label">Kriteria Ketercapaian (KKTP)</label>
                <div class="kkpt-container">
                    <div class="input-group mb-2 kkpt-item">
                        <textarea class="form-control" name="kkpt[0][]" rows="4" placeholder="Tuliskan KKTP...">
Memahami informasi umum yang didengar secara utuh meliputi kosakata, tata bahasa dan sosiokultural terkait tindak tutur perkenalan diri sendiri dalam bahasa Prancis.
                        </textarea>
                        <button type="button" class="btn btn-outline-danger btn-remove-kkpt">✖</button>
                    </div>
                    <div class="input-group mb-2 kkpt-item">
                        <textarea class="form-control" name="kkpt[0][]" rows="4" placeholder="Tuliskan KKTP...">
Memberikan apresiasi dan tanggapan kepada lawan bicara dengan kosakata, tata bahasa dan sosiokultural terkait tindak tutur perkenalan diri sendiri dalam bahasa Prancis.
                        </textarea>
                        <button type="button" class="btn btn-outline-danger btn-remove-kkpt">✖</button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-outline-info btn-label btn-tambah-kkpt"><i
                        class="ri-add-line label-icon align-middle fs-18 ms-2"></i> Tambah
                    KKTP</button>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-soft-info w-100 mt-2" id="btn-tambah-tujuan">➕ Tambah Tujuan
        Pembelajaran</button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let tujuanIndex = 1; // Mulai dari 1 karena 0 sudah ada

        const wrapper = document.getElementById("tujuan-wrapper");
        const btnTambahTujuan = document.getElementById("btn-tambah-tujuan");

        btnTambahTujuan.addEventListener("click", function() {
            const card = document.createElement("div");
            card.className = "card p-3 mb-3 tujuan-item border border-secondary-subtle";
            card.innerHTML = `
                <div class="row">
                    <div class="col-11">
                        <textarea class="form-control mb-2" name="tujuan[]" placeholder="Tuliskan Tujuan Pembelajaran..."></textarea>
                    </div>
                    <div class="col-1 d-flex align-items-start">
                        <button type="button" class="btn rounded-pill btn-danger btn-sm btn-remove-tujuan">✖</button>
                    </div>
                </div>
                <div class="container mb-2">
                    <label class="form-label">Kriteria Ketercapaian (KKTP)</label>
                    <div class="kkpt-container">
                        <div class="input-group mb-2 kkpt-item">
                            <textarea class="form-control" rows="4" name="kkpt[${tujuanIndex}][]" placeholder="Tuliskan KKTP..."></textarea>
                            <button type="button" class="btn btn-outline-danger btn-remove-kkpt">✖</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-soft-info btn-tambah-kkpt">➕ Tambah KKTP</button>
                </div>
            `;
            wrapper.appendChild(card);
            tujuanIndex++;
        });

        // Tambah & hapus KKTP + hapus tujuan
        wrapper.addEventListener("click", function(e) {
            if (e.target.classList.contains("btn-remove-tujuan")) {
                e.target.closest(".tujuan-item").remove();
            }

            if (e.target.classList.contains("btn-remove-kkpt")) {
                e.target.closest(".kkpt-item").remove();
            }

            if (e.target.classList.contains("btn-tambah-kkpt")) {
                const container = e.target.previousElementSibling;
                const tujuanIdx = Array.from(wrapper.children).indexOf(e.target.closest(
                    ".tujuan-item"));
                const kkptItem = document.createElement("div");
                kkptItem.className = "input-group mb-2 kkpt-item";
                kkptItem.innerHTML = `
                    <textarea class="form-control" name="kkpt[${tujuanIdx}][]" placeholder="Tuliskan KKTP..."></textarea>
                    <button type="button" class="btn btn-outline-danger btn-remove-kkpt">✖</button>
                `;
                container.appendChild(kkptItem);
            }
        });
    });
</script>

<div class="container mt-4 border border-dashed p-2 rounded">
    <label for="kompetensi-awal" class="form-label"><strong>Kompetensi Awal</strong></label>
    <input type="text" class="form-control" id="kompetensi-awal" placeholder="Isi Kompetensi Awal"
        value="Peserta didik telah memahami .................................................">
</div>

<div class="container mt-4 border border-dashed p-2 rounded">
    <label for="target-peserta-didik" class="form-label">Target Peserta Didik</label>
    <input type="text" class="form-control" id="target-peserta-didik" placeholder="Isi Target Peserta Didik"
        value="Peserta didik reguler dengan tingkat pemahaman yang beragam (akan didiferensiasi).">
</div>

<div class="container mt-4 border border-dashed p-2 rounded">
    @php
        $profilList = [
            'Keimanan dan Ketakwaan',
            'Kewargaan',
            'Penalaran Kritis',
            'Kreativitas',
            'Kolaborasi',
            'Kemandirian',
            'Kesehatan',
            'Komunikasi',
        ];
    @endphp
    <label for="profil-kelulusan" class="form-label mb-2"><strong>Profil Kelulusan</strong></label>
    <div id="profil-container">
        @foreach ($profilList as $profil)
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="profil-{{ $loop->index }}" name="profil[]"
                    value="{{ $profil }}">
                <label class="form-check-label" for="profil-{{ $loop->index }}">{{ $profil }}</label>

                <textarea id="profil-desc-{{ $loop->index }}" name="deskripsi[{{ $profil }}]" class="form-control mt-2"
                    style="display: none;" placeholder="Deskripsi untuk {{ $profil }}..."></textarea>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Untuk Profil
        document.querySelectorAll('input[type="checkbox"][name="profil[]"]').forEach(function(checkbox, index) {
            checkbox.addEventListener('change', function() {
                const desc = document.getElementById(`profil-desc-${index}`);
                if (desc) {
                    desc.style.display = this.checked ? 'block' : 'none';
                }
            });
        });
    });
</script>

<div class="container mt-4 border border-dashed p-2 rounded">
    @php
        $items = [
            'Praktik Pedagogis' => 'praktik_pedagogis',
            'Lingkungan Pembelajaran' => 'lingkungan_pembelajaran',
            'Pemanfaatan Digital' => 'pemanfaatan_digital',
            'Kemitraan Pembelajaran' => 'kemitraan_pembelajaran',
        ];
    @endphp
    <label for="kerangka-pembelajaran" class="form-label mb-2"><strong>Kerangka Pembelajaran</strong></label>
    <div id="kerangka-container">
        @foreach ($items as $label => $key)
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="kerangka-{{ $loop->index }}" name="kerangka[]"
                    value="{{ $key }}">
                <label class="form-check-label" for="kerangka-{{ $loop->index }}">{{ $label }}</label>

                <textarea id="kerangka-desc-{{ $loop->index }}" name="deskripsi[{{ $key }}]" class="form-control mt-2"
                    style="display: none;" placeholder="Deskripsi {{ $label }}..."></textarea>
            </div>
        @endforeach
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Untuk Kerangka Pembelajaran
        document.querySelectorAll('input[type="checkbox"][name="kerangka[]"]').forEach(function(checkbox,
            index) {
            checkbox.addEventListener('change', function() {
                const desc = document.getElementById(`kerangka-desc-${index}`);
                if (desc) {
                    desc.style.display = this.checked ? 'block' : 'none';
                }
            });
        });
    });
</script>

<div class="container mt-4 border border-dashed p-2 rounded">
    <label for="alokasi-waktu" class="form-label"><strong>Alokasi Waktu</strong></label>
    <input type="text" class="form-control" id="alokasi-waktu" placeholder="Isi Alokasi Waktu"
        value="4 JP x @45 menit (180 menit)">
</div>
