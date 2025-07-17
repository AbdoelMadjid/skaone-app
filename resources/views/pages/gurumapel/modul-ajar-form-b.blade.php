<div>
    <h5 class="mb-1">B. Kerangka dan Tujuan</h5>
    <p class="text-muted mb-4">Menentukan Kerangka dan Tujuan Modul Ajar</p>
</div>
<div class="container mt-2">
    <label class="form-label"><strong>Elemen</strong></label>
    <div id="elemen-container">
        <!-- Elemen pertama -->
        <div class="row mb-2 elemen-item">
            <div class="col-11">
                <textarea class="form-control" name="elemen[]" rows="2">Menyimak</textarea>
            </div>
            <div class="col-1 d-flex align-items-start">
                <button type="button" class="btn btn-sm btn-danger btn-remove-elemen">X</button>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-outline-primary btn-sm" id="btn-tambah-elemen">+ Tambah Elemen</button>
</div>
<div class="container mt-4">
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
                <button type="button" class="btn btn-sm btn-danger btn-remove-capaian">X</button>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-outline-primary btn-sm" id="btn-tambah-capaian">+ Tambah Capaian
        Pembelajaran</button>
</div>

<div class="container mt-4">
    <label class="form-label"><strong>Tujuan Pembelajaran & KKTP</strong></label>
    <div id="tujuan-wrapper">
        <!-- Tujuan Pembelajaran pertama -->
        <div class="card p-3 mb-3 tujuan-item border border-secondary-subtle">
            <textarea class="form-control mb-2" name="tujuan[]" placeholder="Tuliskan Tujuan Pembelajaran..."></textarea>

            <div class="mb-2">
                <label class="form-label">Kriteria Ketercapaian (KKTP)</label>
                <div class="kkpt-container">
                    <div class="input-group mb-2 kkpt-item">
                        <textarea class="form-control" name="kkpt[0][]" placeholder="Tuliskan KKTP..."></textarea>
                        <button type="button" class="btn btn-outline-danger btn-remove-kkpt">✖</button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-link text-primary btn-tambah-kkpt">➕ Tambah KKTP</button>
            </div>

            <button type="button" class="btn btn-outline-danger btn-sm btn-remove-tujuan">✖</button>
        </div>
    </div>

    <button type="button" class="btn btn-outline-secondary w-100 mt-2" id="btn-tambah-tujuan">➕ Tambah Tujuan
        Pembelajaran</button>
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
                    <button type="button" class="btn btn-sm btn-danger btn-remove-elemen">X</button>
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
                    <button type="button" class="btn btn-sm btn-danger btn-remove-capaian">X</button>
                </div>
            `;
            capaianContainer.appendChild(item);
        });

        capaianContainer.addEventListener("click", function(e) {
            if (e.target.classList.contains("btn-remove-capaian")) {
                e.target.closest(".capaian-item").remove();
            }
        });



        let tujuanIndex = 1; // Mulai dari 1 karena 0 sudah ada

        const wrapper = document.getElementById("tujuan-wrapper");
        const btnTambahTujuan = document.getElementById("btn-tambah-tujuan");

        btnTambahTujuan.addEventListener("click", function() {
            const card = document.createElement("div");
            card.className = "card p-3 mb-3 tujuan-item border border-secondary-subtle";
            card.innerHTML = `
                <textarea class="form-control mb-2" name="tujuan[]" placeholder="Tuliskan Tujuan Pembelajaran..."></textarea>

                <div class="mb-2">
                    <label class="form-label">Kriteria Ketercapaian (KKTP)</label>
                    <div class="kkpt-container">
                        <div class="input-group mb-2 kkpt-item">
                            <textarea class="form-control" name="kkpt[${tujuanIndex}][]" placeholder="Tuliskan KKTP..."></textarea>
                            <button type="button" class="btn btn-outline-danger btn-remove-kkpt">✖</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-link text-primary btn-tambah-kkpt">➕ Tambah KKTP</button>
                </div>

                <button type="button" class="btn btn-outline-danger btn-sm btn-remove-tujuan">✖</button>
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
