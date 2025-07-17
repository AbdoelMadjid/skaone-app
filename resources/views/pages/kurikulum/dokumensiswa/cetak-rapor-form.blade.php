<form id="form-rapor" action="{{ route('kurikulum.dokumentsiswa.simpanpilihcetakrapor') }}" method="post">
    @csrf
    <div class="row">
        <input type="hidden" name="id_personil" id="id_personil" value="{{ $personal_id }}">
        <div class="col-md-6">
            <x-form.select size="sm" name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions"
                value="{{ old('tahunajaran', isset($dataPilCR) ? $dataPilCR->tahunajaran : '') }}" id="tahun_ajaran" />
        </div>
        <div class="col-md-6">
            <x-form.select size="sm" name="semester" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']"
                value="{{ old('semester', isset($dataPilCR) ? $dataPilCR->semester : '') }}" label="Semester"
                id="semester" />
        </div>
        <div class="col-md-12">
            <x-form.select size="sm" name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlianOptions"
                value="{{ old('kode_kk', isset($dataPilCR) ? $dataPilCR->kode_kk : '') }}" id="kode_kk" />
        </div>
        <div class="col-md-6">
            <x-form.select size="sm" name="tingkat" :options="['10' => '10', '11' => '11', '12' => '12']"
                value="{{ old('tingkat', isset($dataPilCR) ? $dataPilCR->tingkat : '') }}" label="Tingkat"
                id="tingkat" />
        </div>
        <div class="col-md-6">
            <x-form.select size="sm" name="kode_rombel" :options="$rombonganBelajar"
                value="{{ old('kode_rombel', isset($dataPilCR) ? $dataPilCR->kode_rombel : '') }}" label="Kode Rombel"
                id="kode_rombel" />
        </div>
        <div class="col-md-12">
            <x-form.select size="sm" name="nis" :options="$pesertadidikOptions"
                value="{{ old('nis', isset($dataPilCR) ? $dataPilCR->nis : '') }}" label="Peserta Didik" id="nis"
                data-selected="{{ old('nis', isset($dataPilCR) ? $dataPilCR->nis : '') }}" />
        </div>
    </div>

    <button type="button" id="btn-data-rapor" class="btn btn-soft-primary btn-sm w-100 mb-4">Confirm</button>
</form>
<script>
    // JavaScript untuk menangani perubahan dan permintaan AJAX
    document.addEventListener('DOMContentLoaded', function() {
        const tahunAjaranSelect = document.getElementById('tahun_ajaran');
        const kodeKkSelect = document.getElementById('kode_kk');
        const tingkatSelect = document.getElementById('tingkat');
        const kodeRombelSelect = document.getElementById('kode_rombel');
        const nisSelect = document.getElementById('nis');

        // Get selected NIS value from data-selected attribute
        const selectedNis = nisSelect.dataset.selected || '';

        // Load initial data for both kode_rombel and nis
        fetchKodeRombel(true);
        fetchPesertaDidik(true);

        // Event listener untuk semua elemen yang memengaruhi kode_rombel dan nis
        [tahunAjaranSelect, kodeKkSelect, tingkatSelect, kodeRombelSelect].forEach(select => {
            select.addEventListener('change', function() {
                if (select === tahunAjaranSelect || select === kodeKkSelect || select ===
                    tingkatSelect) {
                    // Reset kode_rombel jika tahunajaran, kode_kk, atau tingkat berubah
                    kodeRombelSelect.innerHTML =
                        '<option value="">-- Pilih Kode Rombel --</option>';
                    nisSelect.innerHTML = '<option value="">-- Pilih Peserta Didik --</option>';
                    fetchKodeRombel();
                }

                if (select === kodeRombelSelect) {
                    // Reset Peserta Didik saat kode_rombel berubah
                    nisSelect.innerHTML = '<option value="">-- Pilih Peserta Didik --</option>';
                    fetchPesertaDidik();
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
                    `/kurikulum/dokumentsiswa/get-kode-rombel?tahunajaran=${tahunAjaran}&kode_kk=${kodeKk}&tingkat=${tingkat}`
                )
                .then(response => response.json())
                .then(data => {
                    kodeRombelSelect.innerHTML = '<option value="">-- Pilih Kode Rombel --</option>';
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

        // Fetch Peserta Didik function
        function fetchPesertaDidik(initialLoad = false) {
            const tahunAjaran = tahunAjaranSelect.value;
            const kodeKk = kodeKkSelect.value;
            const tingkat = tingkatSelect.value;
            const kodeRombel = kodeRombelSelect.value;

            console.log('Selected nis :', selectedNis);

            if (!tahunAjaran || !kodeKk || !tingkat || !kodeRombel) return;

            fetch(
                    `/kurikulum/dokumentsiswa/get-peserta-didik?tahunajaran=${tahunAjaran}&kode_kk=${kodeKk}&tingkat=${tingkat}&kode_rombel=${kodeRombel}`
                )
                .then(response => response.json())
                .then(data => {
                    nisSelect.innerHTML =
                        '<option value="">-- Pilih Peserta Didik --</option>'; // Reset the options first
                    data.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.nis;
                        option.textContent = `${item.nis} - ${item.nama_lengkap}`;

                        // Set the selected option if it's the initial load and the nis matches
                        if (initialLoad && item.nis === selectedNis) {
                            option.selected = true;
                        }

                        nisSelect.appendChild(option);
                    });

                    // If initialLoad is true and selectedNis is set, update the select value
                    if (initialLoad && selectedNis) {
                        nisSelect.value = selectedNis;
                    }
                })
                .catch(error => console.error('Error fetching peserta didik:', error));
        }
    });
</script>
<script>
    function tampilkanInfoWaliDanSiswa() {
        fetch(`/kurikulum/dokumentsiswa/info-wali-siswa`)
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

    function tampilkanDataCeklist() {
        fetch(`/kurikulum/dokumentsiswa/data-ceklist`)
            .then(response => {
                if (!response.ok) throw new Error('Gagal memuat data ceklist.');
                return response.text();
            })
            .then(html => {
                document.getElementById('data-ceklist').innerHTML = html;
            })
            .catch(error => {
                console.error(error);
            });
    }

    function tampilkanRapor(nis) {
        const detailDiv = document.getElementById('siswa-detail');
        detailDiv.innerHTML =
            '<div class="position-absolute top-50 start-50 translate-middle"><div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading... </span></div></div>';

        fetch(`/kurikulum/dokumentsiswa/tampil-rapor/${nis}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal mengambil data siswa.');
                }
                return response.text();
            })
            .then(html => {
                detailDiv.innerHTML = html;
            })
            .catch(error => {
                console.error(error);
                detailDiv.innerHTML =
                    '<div class="alert alert-danger">Gagal memuat data siswa.</div>';
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('btn-data-rapor');
        const form = document.getElementById('form-rapor');

        btn.addEventListener('click', function() {
            // 1. Kirim form via fetch (submit manual)
            const formData = new FormData(form);
            const nis = formData.get('nis');

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
                    const coverTabTrigger = document.querySelector('.nav-link[href="#cover"]');
                    if (coverTabTrigger) {
                        const coverTab = new bootstrap.Tab(coverTabTrigger);
                        coverTab.show();
                    }

                    // 3. Tampilkan data siswa
                    tampilkanRapor(nis);
                    tampilkanInfoWaliDanSiswa();
                    tampilkanDataCeklist();
                })
                .catch(error => {
                    console.error(error);
                    document.getElementById('siswa-detail').innerHTML =
                        '<div class="alert alert-danger">Gagal menyimpan atau menampilkan rapor.</div>';
                });
        });
    });
</script>
