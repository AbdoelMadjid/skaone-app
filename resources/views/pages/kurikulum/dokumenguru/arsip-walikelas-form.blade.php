<form id="form-walikelas" action="{{ route('kurikulum.dokumenguru.simpanpilihwalas') }}" method="post">
    @csrf
    <div class="card-body p-0">
        <div class="row g-3">
            <div class="col-lg">
            </div>
            <input type="hidden" name="id_personil" id="id_personil" value="{{ $personal_id }}">
            <div class="col-lg-auto">
                <x-form.select size="sm" name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOption"
                    value="{{ old('tahunajaran', isset($dataPilWalas) ? $dataPilWalas->tahunajaran : '') }}"
                    id="tahun_ajaran" />
            </div>
            <div class="col-lg-auto">
                <x-form.select size="sm" name="ganjilgenap" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']"
                    value="{{ old('ganjilgenap', isset($dataPilWalas) ? $dataPilWalas->ganjilgenap : '') }}"
                    label="Semester" id="ganjilgenap" />
            </div>
            <div class="col-lg-auto">
                <x-form.select size="sm" name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlianOptions"
                    value="{{ old('kode_kk', isset($dataPilWalas) ? $dataPilWalas->kode_kk : '') }}" id="kode_kk" />
            </div>
            <div class="col-lg-auto">
                <x-form.select size="sm" name="tingkat" :options="['10' => '10', '11' => '11', '12' => '12']"
                    value="{{ old('tingkat', isset($dataPilWalas) ? $dataPilWalas->tingkat : '') }}" label="Tingkat"
                    id="tingkat" />
            </div>
            <div class="col-lg-auto">
                <x-form.select size="sm" name="kode_rombel" :options="$rombonganBelajar"
                    value="{{ old('kode_rombel', isset($dataPilWalas) ? $dataPilWalas->kode_rombel : '') }}"
                    label="Kode Rombel" id="kode_rombel" />
            </div>
            <div class="col-lg-auto">
                <label>Tombol Action</label>
                <button type="button" id="btn-data-walikelas"
                    class="btn btn-soft-primary btn-sm w-100">Confirm</button>
            </div>
        </div>
    </div>
</form>

<script>
    // JavaScript untuk menangani perubahan dan permintaan AJAX
    document.addEventListener('DOMContentLoaded', function() {
        const tahunAjaranSelect = document.getElementById('tahun_ajaran');
        const kodeKkSelect = document.getElementById('kode_kk');
        const tingkatSelect = document.getElementById('tingkat');
        const kodeRombelSelect = document.getElementById('kode_rombel');

        // Get selected NIS value from data-selected attribute
        //const selectedNis = nisSelect.dataset.selected || '';

        // Load initial data for both kode_rombel and nis
        fetchKodeRombel(true);

        // Event listener untuk semua elemen yang memengaruhi kode_rombel dan nis
        [tahunAjaranSelect, kodeKkSelect, tingkatSelect, kodeRombelSelect].forEach(select => {
            select.addEventListener('change', function() {
                if (select === tahunAjaranSelect || select === kodeKkSelect || select ===
                    tingkatSelect) {
                    // Reset kode_rombel jika tahunajaran, kode_kk, atau tingkat berubah
                    kodeRombelSelect.innerHTML =
                        '<option value="">Pilih Rombel</option>';
                    fetchKodeRombel();
                }
            });
        });

        function fetchKodeRombel(initialLoad = false) {
            const tahunAjaran = tahunAjaranSelect.value;
            const kodeKk = kodeKkSelect.value;
            const tingkat = tingkatSelect.value;
            const selectedKodeRombel = kodeRombelSelect.value;

            console.log('Selected Kode Rombel:', selectedKodeRombel);

            if (!tahunAjaran || !kodeKk || !tingkat) return;

            fetch(
                    `/kurikulum/dokumenguru/get-kode-rombel?tahunajaran=${tahunAjaran}&kode_kk=${kodeKk}&tingkat=${tingkat}`
                )
                .then(response => response.json())
                .then(data => {
                    kodeRombelSelect.innerHTML = '<option value="">Pilih Rombel</option>';
                    data.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.kode_rombel;
                        option.textContent = item.rombel;
                        if (initialLoad && item.kode_rombel === selectedKodeRombel) {
                            option.selected = true;
                        }
                        kodeRombelSelect.appendChild(option);
                    });

                    if (initialLoad && selectedKodeRombel) {
                        kodeRombelSelect.value = selectedKodeRombel;
                    }
                })
                .catch(error => console.error('Error fetching kode rombel:', error));
        }
    });
</script>
<script>
    function tampilkanInfoWaliDanSiswa() {
        fetch(`/kurikulum/dokumenguru/info-wali-siswa`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal memuat info wali dan siswa.');
                }
                return response.text();
            })
            .then(html => {
                document.getElementById('info-wali-siswa').innerHTML = html;
            })
            .catch(error => {
                console.error(error);
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('btn-data-walikelas');
        const form = document.getElementById('form-walikelas');

        btn.addEventListener('click', function() {
            // 1. Kirim form via fetch (submit manual)
            const formData = new FormData(form);
            const kodeRombel = formData.get('kode_rombel');

            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal menyimpan data.');
                    }
                    return response.text(); // biarkan respons apapun
                })
                .then(() => {
                    // 2. Setelah form disimpan, paksa aktifkan tab cover (jika ada)
                    const dataKelasTabTrigger = document.querySelector(
                        '.nav-link[href="#dataKelas"]');
                    if (dataKelasTabTrigger) {
                        const dataKelasTab = new bootstrap.Tab(dataKelasTabTrigger);
                        dataKelasTab.show();
                    }

                    // 3. Tampilkan data siswa
                    tampilkanWaliKelas(kodeRombel);
                    tampilkanInfoWaliDanSiswa();
                })
                .catch(error => {
                    console.error(error);
                    document.getElementById('walikelas-detail').innerHTML =
                        '<div class="alert alert-danger">Gagal menyimpan atau menampilkan rapor.</div>';
                });
        });

        function tampilkanWaliKelas(kodeRombel) {
            const detailDiv = document.getElementById('walikelas-detail');
            detailDiv.innerHTML =
                '<div class="position-absolute top-50 start-50 translate-middle"><div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading... </span></div></div>';

            fetch(`/kurikulum/dokumenguru/tampil-walikelas/${kodeRombel}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data walikelas.');
                    }
                    return response.text();
                })
                .then(html => {
                    detailDiv.innerHTML = html;
                    // Re-bind tombol cetak setelah konten AJAX selesai dimuat
                    const btnCetak = document.getElementById('btn-cetak-ranking');
                    if (btnCetak) {
                        btnCetak.addEventListener('click', printRanking);
                    }
                })
                .catch(error => {
                    console.error(error);
                    detailDiv.innerHTML =
                        '<div class="alert alert-danger">Gagal memuat data walikelas.</div>';
                });
        }
    });
</script>

<script>
    function printRanking() {
        const content = document.getElementById("cetak-ranking-walikelas");
        const ttdWali = document.getElementById("ttd-wali");

        if (!content) {
            showToast('error', 'Data ranking belum tersedia. silakan pilih rombel terlebih dahulu. dan Confirmasi.');
            return;
        }

        const tambahan = ttdWali ? ttdWali.innerHTML : "";

        const printWindow = window.open("", "", "width=800,height=600");
        printWindow.document.write(`
        <html>
            <head>
                <title>Cetak Ranking</title>
                <style>
                    body { font-family: 'Times New Roman', serif; font-size: 12px; }
                        table { width: 100%; border-collapse: collapse; }
                        table, th, td { border: 1px solid black; }
                        th { padding: 4px; text-align: center; }
                        h4 { margin: 5px 0; text-align: center; }
                </style>
            </head>
            <body onload="window.print(); window.close();">
                <h4>RANKING SISWA KELAS {{ $waliKelas->rombel }}</h4>
                <h4>TAHUN AJARAN {{ $dataPilWalas->tahunajaran }} - SEMESTER {{ $dataPilWalas->ganjilgenap }}</h4>
                ${content.innerHTML}
                <br><br>
                ${tambahan}
            </body>
        </html>
    `);
        printWindow.document.close();
    }
</script>

{{-- <script>
    document.getElementById('btn-ranking-pertk').addEventListener('click', function() {
        const btn = this;
        btn.innerText = 'Memuat...';
        btn.disabled = true;

        fetch("{{ route('kurikulum.dokumenguru.ranking.tingkat') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error("Gagal memuat data ranking.");
                }
                return response.text();
            })
            .then(html => {
                document.getElementById('tampil-ranking').innerHTML = html;
            })
            .catch(error => {
                alert(error.message);
            })
            .finally(() => {
                btn.innerText = 'Ranking pertingkat';
                btn.disabled = false;
            });
    });
</script> --}}
<script>
    document.getElementById('btn-ranking-pertk').addEventListener('click', function() {
        const btn = this;
        btn.innerText = 'Memuat...';
        btn.disabled = true;

        fetch("{{ route('kurikulum.dokumenguru.ranking.tingkat') }}")
            .then(response => {
                if (!response.ok) throw new Error("Gagal memuat data ranking.");
                return response.text();
            })
            .then(html => {
                document.getElementById('tampil-ranking').innerHTML = html;
                const modal = new bootstrap.Modal(document.getElementById('modal-ranking-pertk'));
                modal.show();
            })
            .catch(error => {
                alert(error.message);
            })
            .finally(() => {
                btn.innerText = 'Ranking pertingkat';
                btn.disabled = false;
            });
    });
</script>
{{-- <script>
    document.getElementById('btn-ranking-pertkkk').addEventListener('click', function() {
        const btn = this;
        btn.innerText = 'Memuat...';
        btn.disabled = true;

        fetch("{{ route('kurikulum.dokumenguru.ranking.tingkat.kk') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error("Gagal memuat data ranking.");
                }
                return response.text();
            })
            .then(html => {
                document.getElementById('tampil-ranking').innerHTML = html;
            })
            .catch(error => {
                alert(error.message);
            })
            .finally(() => {
                btn.innerText = 'Ranking pertingkat per kk';
                btn.disabled = false;
            });
    });
</script> --}}
<script>
    document.getElementById('btn-ranking-pertkkk').addEventListener('click', function() {
        const btn = this;
        btn.innerText = 'Memuat...';
        btn.disabled = true;

        fetch("{{ route('kurikulum.dokumenguru.ranking.tingkat.kk') }}")
            .then(response => {
                if (!response.ok) throw new Error("Gagal memuat data ranking.");
                return response.text();
            })
            .then(html => {
                document.getElementById('tampil-ranking-kk').innerHTML = html;
                const modal = new bootstrap.Modal(document.getElementById('modal-ranking-pertk-kk'));
                modal.show();
            })
            .catch(error => {
                alert(error.message);
            })
            .finally(() => {
                btn.innerText = 'Ranking pertingkat per kk';
                btn.disabled = false;
            });
    });
</script>
