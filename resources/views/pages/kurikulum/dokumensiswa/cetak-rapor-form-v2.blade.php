<form action="{{ route('kurikulum.dokumentsiswa.simpanpilihcetakrapor') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <x-form.input size="sm" name="id_personil" value="{{ $personal_id }}" label="ID Personil" id="id_personil"
                readonly />
        </div>
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

    <div class="col-lg-12">
        <div class="gap-2 hstack justify-content-end">
            <button type="submit" id="btn-data-rapor" class="btn btn-soft-primary">
                @if ($dataPilCR)
                    Update
                @else
                    Simpan
                @endif
            </button>
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
    document.addEventListener('DOMContentLoaded', function() {
        const btnRapor = document.getElementById('btn-tampil-rapor');

        btnRapor.addEventListener('click', function(e) {
            e.preventDefault();

            const nis = document.getElementById('nis').value;

            if (!nis) {
                alert('Silakan pilih peserta didik terlebih dahulu.');
                return;
            }

            document.getElementById('siswa-detail').innerHTML = '<p>Memuat data siswa...</p>';

            fetch(`/kurikulum/dokumentsiswa/tampil-rapor/${nis}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data siswa.');
                    }
                    return response.text();
                })
                .then(html => {
                    document.getElementById('siswa-detail').innerHTML = html;
                })
                .catch(error => {
                    console.error(error);
                    document.getElementById('siswa-detail').innerHTML =
                        '<div class="alert alert-danger">Gagal memuat data siswa.</div>';
                });
        });
    });
</script>
