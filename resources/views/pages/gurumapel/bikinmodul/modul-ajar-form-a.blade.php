<div>
    <h5 class="mt-4 text-info"><strong>A. Informasi Umum</strong></h5>
</div>
<div class="container mt-4 mb-4 border border-dashed p-2 rounded">
    <input type="hidden" id="personal_id" value="{{ $personal_id ?? 'pgw_001' }}">
    <div class="row">
        <div class="col-md-3">
            <div class="mb-3">
                <label for="tahunajaran" class="form-label">Tahun Ajaran</label>
                <select class="form-select" id="tahunajaran" name="tahunajaran">
                    <option value="">Pilih TA</option>
                    @foreach ($tahunAjaranOptions as $thnajar)
                        <option value="{{ $thnajar }}">{{ $thnajar }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select class="form-select" id="semester" name="semester">
                    <option value="">Pilih semester </option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="id-modulajar" class="form-label">Id Modul Ajar</label>
                <input type="text" class="form-control" id="id-modulajar" name="idmodulajar" value="" readonly>
            </div>
        </div>

    </div>
</div>

<hr>
<div class="container mt-4 mb-4 border border-dashed p-2 rounded">
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="jenjang" class="form-label">Jenjang</label>
                <select class="form-select" id="jenjang">
                    <option value="">Pilih jenjang...</option>
                    <option selected>SMK</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="fase" class="form-label">Fase</label>
                <select class="form-select" id="fase">
                    <option value="">Pilih Fase...</option>
                    <option value="E">Fase E</option>
                    <option value="F">Fase F</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" id="kelas" disabled>
                    <option value="">Pilih Kelas...</option>
                </select>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faseSelect = document.getElementById('fase');
            const kelasSelect = document.getElementById('kelas');

            const kelasOptions = {
                'E': ['10'],
                'F': ['11', '12']
            };

            function updateKelasOptions(fase) {
                // Kosongkan dan reset opsi
                kelasSelect.innerHTML = '<option value="">Pilih Kelas...</option>';

                if (!fase) {
                    kelasSelect.disabled = true;
                    if (kelasSelect.choices) {
                        kelasSelect.choices.setChoices(
                            [{
                                value: '',
                                label: 'Pilih Kelas...',
                                selected: true
                            }],
                            'value',
                            'label',
                            true
                        );
                    }
                    return;
                }

                // Enable kelas jika fase sudah dipilih
                kelasSelect.disabled = false;

                const options = kelasOptions[fase] || [];
                options.forEach(kelas => {
                    const option = document.createElement('option');
                    option.value = kelas;
                    option.textContent = kelas;
                    kelasSelect.appendChild(option);
                });

                // Update jika pakai Choices.js
                if (kelasSelect.choices) {
                    const newChoices = [{
                        value: '',
                        label: 'Pilih Kelas...',
                        selected: true
                    }];
                    options.forEach(k => {
                        newChoices.push({
                            value: k,
                            label: 'Kelas ' + k
                        });
                    });
                    kelasSelect.choices.setChoices(newChoices, 'value', 'label', true);
                }
            }

            // Saat halaman dimuat, buat kelas nonaktif dulu
            updateKelasOptions('');

            // Saat fase berubah
            faseSelect.addEventListener('change', function() {
                updateKelasOptions(this.value);
            });

            // ✅ Tambahan untuk enable bidang keahlian saat kelas dipilih
            kelasSelect.addEventListener('change', function() {
                const bidangKeahlian = document.getElementById('bidang_keahlian');
                if (this.value !== '') {
                    bidangKeahlian.disabled = false;
                } else {
                    bidangKeahlian.disabled = true;
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#bidang_keahlian').prop('disabled', false).on('change', function() {
                const idbk = $(this).val();
                $('#program_keahlian').html('<option value="">Memuat data...</option>').prop('disabled',
                    true);
                $('#konsentrasi_keahlian').html('<option value="">Pilih Konsentrasi Keahlian...</option>')
                    .prop('disabled', true);

                if (idbk) {
                    $.ajax({
                        url: '/gurumapel/adminguru/get-program-keahlian/' + idbk,
                        type: 'GET',
                        success: function(data) {
                            let opsi = '<option value="">Pilih Program Keahlian...</option>';
                            data.forEach(d => {
                                opsi +=
                                    `<option value="${d.idpk}">${d.nama_pk}</option>`;
                            });
                            $('#program_keahlian').html(opsi).prop('disabled', false);
                        }
                    });
                }
            });

            $('#program_keahlian').on('change', function() {
                const idpk = $(this).val();
                $('#konsentrasi_keahlian').html('<option value="">Memuat data...</option>').prop('disabled',
                    true);

                if (idpk) {
                    $.ajax({
                        url: '/gurumapel/adminguru/get-konsentrasi-keahlian/' + idpk,
                        type: 'GET',
                        success: function(data) {
                            let opsi =
                                '<option value="">Pilih Konsentrasi Keahlian...</option>';
                            data.forEach(d => {
                                opsi +=
                                    `<option value="${d.idkk}">${d.nama_kk}</option>`;
                            });
                            $('#konsentrasi_keahlian').html(opsi).prop('disabled', false);
                        }
                    });
                }
            });
        });
    </script>


    <div class="row">
        <div class="col-md-4">
            <label for="bidang_keahlian" class="form-label">Bidang Keahlian</label>
            <select class="form-select" id="bidang_keahlian" disabled>
                <option value="">Pilih Bidang Keahlian...</option>
                @foreach ($bidangKeahlianList as $bk)
                    <option value="{{ $bk->idbk }}">{{ $bk->nama_bk }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="program_keahlian" class="form-label">Program Keahlian</label>
            <select class="form-select" id="program_keahlian" disabled>
                <option value="">Pilih Program Keahlian...</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="konsentrasi_keahlian" class="form-label">Konsentrasi Keahlian</label>
            <select class="form-select" id="konsentrasi_keahlian" disabled>
                <option value="">Pilih Konsentrasi Keahlian...</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
            <select class="form-select" id="mata_pelajaran" name="ma_mata_pelajaran" disabled>
                <option value="">Pilih Mata Pelajaran...</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <label for="topik-modul" class="form-label">Topik Modul</label>
            <input type="text" class="form-control" id="topik-modul" placeholder="isi topik"
                value="ini adalah topik modul ajar, silakan di sesuaikan">
        </div>
    </div>
</div>

<script>
    const kodeKkSelect = document.getElementById('konsentrasi_keahlian');
    const tingkatSelect = document.getElementById('kelas');
    const mapelSelect = document.getElementById('mata_pelajaran');

    function updateMataPelajaran() {
        const kodeKk = kodeKkSelect.value;
        const tingkat = tingkatSelect.value;

        if (kodeKk !== '' && tingkat !== '') {
            fetch(`/gurumapel/adminguru/get-mata-pelajaran/${kodeKk}/${tingkat}`)
                .then(res => res.json())
                .then(data => {
                    mapelSelect.innerHTML = '';

                    if (data.length > 0) {
                        mapelSelect.disabled = false;
                        mapelSelect.innerHTML = '<option value="">Pilih Mata Pelajaran...</option>';
                        data.forEach(item => {
                            const opt = document.createElement('option');
                            opt.value = item.kode_mapel;
                            opt.text = item.mata_pelajaran;
                            mapelSelect.appendChild(opt);
                        });
                    } else {
                        mapelSelect.disabled = true;
                        mapelSelect.innerHTML =
                            '<option value="">Anda tidak mengajar di tingkat dan konsentrasi keahlian ini.</option>';
                    }
                });
        } else {
            mapelSelect.disabled = true;
            mapelSelect.innerHTML = '<option value="">Pilih Mata Pelajaran...</option>';
        }
    }

    kodeKkSelect.addEventListener('change', updateMataPelajaran);
    tingkatSelect.addEventListener('change', updateMataPelajaran);
</script>

<div class="container mt-4 mb-4 border border-dashed p-2 rounded">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="kepsek" class="form-label">Kepala Sekolah</label>
                <input type="text" class="form-control" id="kepsek" placeholder="nama kepala sekolah"
                    value="{{ $kepsek->nama }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="guru-mapel" class="form-label">Guru Mata Pelajaran</label>
                <input type="text" class="form-control" id="guru-mapel" placeholder="nama guru mapel"
                    value="{{ $fullName }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nip-kepsek" class="form-label">NIP Kepala Sekolah</label>
                <input type="text" class="form-control" id="nip-kepsek" placeholder="nip kepala sekolah"
                    value="{{ $kepsek->nip }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="nip-gurumapel" class="form-label">NIP Guru Mata Pelajaran</label>
                <input type="text" class="form-control" id="nip-gurumapel" placeholder="nip guru mata pelajaran"
                    value="{{ $personil->nip }}">
            </div>
        </div>
    </div>
</div>
