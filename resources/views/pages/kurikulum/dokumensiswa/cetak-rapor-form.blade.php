<div class="row">
    <div class="col-md-12">
        <x-form.input name="id_personil" value="{{ $personal_id }}" label="ID Personil" id="id_personil" readonly />
    </div>
    <div class="col-md-3">
        <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions"
            value="{{ old('tahunajaran', isset($dataPilCR) ? $dataPilCR->tahunajaran : '') }}" id="tahun_ajaran" />
    </div>
    <div class="col-md-3">
        <x-form.select name="semester" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']"
            value="{{ old('semester', isset($dataPilCR) ? $dataPilCR->semester : '') }}" label="Semester"
            id="semester" />
    </div>
    <div class="col-md-6">
        <x-form.select name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlianOptions"
            value="{{ old('kode_kk', isset($dataPilCR) ? $dataPilCR->kode_kk : '') }}" id="kode_kk" />
    </div>
    <div class="col-md-2">
        <x-form.select name="tingkat" :options="['10' => '10', '11' => '11', '12' => '12']"
            value="{{ old('tingkat', isset($dataPilCR) ? $dataPilCR->tingkat : '') }}" label="Tingkat" id="tingkat" />
    </div>
    <div class="col-md-3">
        <x-form.select name="kode_rombel" :options="$rombonganBelajar"
            value="{{ old('kode_rombel', isset($dataPilCR) ? $dataPilCR->kode_rombel : '') }}" label="Kode Rombel"
            id="kode_rombel" />
    </div>
    <div class="col-md-7">
        <x-form.select name="nis" :options="$pesertadidikOptions"
            value="{{ old('nis', isset($dataPilCR) ? $dataPilCR->nis : '') }}" label="Peserta Didik" id="nis" />
    </div>
</div>
<div class="col-lg-12">
    <div class="gap-2 hstack justify-content-end">
        <button type="submit" class="btn btn-soft-success">Simpan</button>
    </div>
</div>

<script>
    // JavaScript untuk menangani perubahan dan permintaan AJAX
    document.addEventListener('DOMContentLoaded', function() {
        const kodeKkSelect = document.getElementById('kode_kk');
        const tingkatSelect = document.getElementById('tingkat');
        const kodeRombelSelect = document.getElementById('kode_rombel');
        const tahunAjaranSelect = document.getElementById('tahun_ajaran');

        // Load initial data for kode_rombel based on current values
        fetchKodeRombel(true);

        kodeKkSelect.addEventListener('change', function() {
            tingkatSelect.selectedIndex = 0;
            kodeRombelSelect.innerHTML = '<option value="">-- Pilih Kode Rombel --</option>';
            fetchKodeRombel();
        });

        tingkatSelect.addEventListener('change', function() {
            kodeRombelSelect.innerHTML = '<option value="">-- Pilih Kode Rombel --</option>';
            fetchKodeRombel();
        });

        tahunAjaranSelect.addEventListener('change', function() {
            tingkatSelect.selectedIndex = 0;
            kodeRombelSelect.innerHTML = '<option value="">-- Pilih Kode Rombel --</option>';
            fetchKodeRombel();
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
    });
</script>
