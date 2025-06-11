@extends('layouts.master')
@section('title')
    @lang('translation.arsip-wali-kelas')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.dokumen-guru')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom-dashed border-bottom">
                    <div class="row g-3">
                        <div class="col-lg">
                            {{-- <h3><i class="ri-file-user-line text-muted align-bottom me-1"></i> Wali Kelas</h3>
                            <p>Silakan untuk pilih tahun ajaran.</p> --}}
                        </div>
                        <!--end col-->
                        @php
                            $selected = $pilihan ?? null;
                        @endphp
                        <div class="col-lg-auto">
                            <select class="form-control" name="tahunajaran" id="tahunajaran" required>
                                <option value="All" {{ $pilihanTerakhir?->tahunajaran === 'All' ? 'selected' : '' }}>
                                    Pilih TA
                                </option>
                                @foreach ($tahunAjaranOption as $tahunajaran => $thajar)
                                    <option value="{{ $tahunajaran }}"
                                        {{ isset($pilihanTerakhir) && $pilihanTerakhir->tahunajaran == $tahunajaran ? 'selected' : '' }}>
                                        {{ $thajar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-auto">
                            <select class="form-control" name="kode_kk" id="kode_kk" required>
                                <option value="All"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->kode_kk === 'All' ? 'selected' : '' }}>
                                    Pilih
                                    Konsentrasi Keahlian</option>
                                @foreach ($kompetensiKeahlianOptions as $id => $nama_kk)
                                    <option value="{{ $id }}"
                                        {{ isset($pilihanTerakhir) && $pilihanTerakhir->kode_kk == $id ? 'selected' : '' }}>
                                        {{ $nama_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-auto">
                            <select class="form-control" name="tingkat" id="idTingkat">
                                <option value="All"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->tingkat === 'All' ? 'selected' : '' }}>
                                    Pilih
                                    Tingkat
                                </option>
                                <option value="10"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->tingkat == '10' ? 'selected' : '' }}>10
                                </option>
                                <option value="11"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->tingkat == '11' ? 'selected' : '' }}>11
                                </option>
                                <option value="12"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->tingkat == '12' ? 'selected' : '' }}>12
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-auto">
                            <select class="form-control" name="kode_rombel" id="idRombel"
                                {{ empty(isset($pilihanTerakhir) && $pilihanTerakhir->kode_kk) || empty(isset($pilihanTerakhir) && $pilihanTerakhir->tahunajaran) || empty(isset($pilihanTerakhir) && $pilihanTerakhir->tingkat) ? 'disabled' : '' }}>
                                <option value="All">Pilih Rombel</option>
                                @if (!empty(isset($pilihanTerakhir) && $pilihanTerakhir->kode_rombel))
                                    <option value="{{ $pilihanTerakhir->kode_rombel }}" selected>
                                        {{ $pilihanTerakhir->kode_rombel }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg">
                            <h3><i class="ri-file-user-line text-muted align-bottom me-1"></i> Wali Kelas : </h3>
                            <div id="nama-wali-kelas"></div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-auto">
                            <select class="form-control mb-3" name="ganjilgenap" id="GanjilGenap"
                                style="{{ isset($pilihanTerakhir) && $pilihanTerakhir->kode_rombel ? '' : 'display: none;' }}">
                                <option value=""
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->ganjilgenap === '' ? 'selected' : '' }}>
                                    Pilih
                                    Semester</option>
                                <option value="Ganjil"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->ganjilgenap == 'Ganjil' ? 'selected' : '' }}>
                                    Ganjil
                                </option>
                                <option value="Genap"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->ganjilgenap == 'Genap' ? 'selected' : '' }}>
                                    Genap
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-auto">
                            <select class="form-control mb-3" name="dokumenwalas" id="dokumenWaliKelas"
                                style="{{ isset($pilihanTerakhir) && $pilihanTerakhir->kode_rombel ? '' : 'display: none;' }}">
                                <option value=""
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->pilih_dokumen === '' ? 'selected' : '' }}>
                                    Pilih
                                    Dokumen</option>
                                <option value="dataKelas"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->pilih_dokumen == 'dataKelas' ? 'selected' : '' }}>
                                    Data Kelas</option>
                                <option value="absensiSiswa"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->pilih_dokumen == 'absensiSiswa' ? 'selected' : '' }}>
                                    Absensi
                                </option>
                                <option value="eskulSiswa"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->pilih_dokumen == 'eskulSiswa' ? 'selected' : '' }}>
                                    Ekstrakurikuler
                                </option>
                                <option value="prestasiSiswa"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->pilih_dokumen == 'prestasiSiswa' ? 'selected' : '' }}>
                                    Prestasi
                                    Siswa
                                </option>
                                <option value="catatanWalas"
                                    {{ isset($pilihanTerakhir) && $pilihanTerakhir->pilih_dokumen == 'catatanWalas' ? 'selected' : '' }}>
                                    Catatan Wali
                                    Kelas
                                </option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div id="data-wali-kelas"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tahunajaranSelect = document.getElementById('tahunajaran');
            const kodeKkSelect = document.getElementById('kode_kk');
            const tingkatSelect = document.getElementById('idTingkat');
            const rombelSelect = document.getElementById('idRombel');

            function fetchRombelOptions() {
                const tahunajaran = tahunajaranSelect.value;
                const kode_kk = kodeKkSelect.value;
                const tingkat = tingkatSelect.value;

                if (tahunajaran !== 'All' && kode_kk !== 'All' && tingkat !== 'All') {
                    fetch(
                            `/kurikulum/dokumenguru/get-rombels?tahunajaran=${tahunajaran}&kode_kk=${kode_kk}&tingkat=${tingkat}`
                        )
                        .then(response => response.json())
                        .then(data => {
                            // Clear existing options
                            rombelSelect.innerHTML = '';
                            rombelSelect.disabled = false;

                            // Default option
                            const defaultOption = document.createElement('option');
                            defaultOption.value = 'All';
                            defaultOption.text = 'Pilih Rombel';
                            rombelSelect.appendChild(defaultOption);

                            // Add new options
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.kode_rombel;
                                option.text = item.rombel;
                                rombelSelect.appendChild(option);
                            });
                        });
                } else {
                    rombelSelect.innerHTML = '<option value="All" selected>Pilih Rombel</option>';
                    rombelSelect.disabled = true;
                }
            }

            tahunajaranSelect.addEventListener('change', fetchRombelOptions);
            kodeKkSelect.addEventListener('change', fetchRombelOptions);
            tingkatSelect.addEventListener('change', fetchRombelOptions);
        });
    </script>

    <script>
        document.getElementById('idRombel').addEventListener('change', function() {
            const tahunajaran = document.getElementById('tahunajaran').value;
            const kode_kk = document.getElementById('kode_kk').value;
            const tingkat = document.getElementById('idTingkat').value;
            const kode_rombel = this.value;

            if (tahunajaran !== 'All' && kode_kk !== 'All' && tingkat !== 'All' && kode_rombel !== 'All') {
                fetch(
                        `/kurikulum/dokumenguru/get-wali-kelas?tahunajaran=${tahunajaran}&id_kk=${kode_kk}&tingkat=${tingkat}&kode_rombel=${kode_rombel}`
                    )
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('nama-wali-kelas').innerHTML = html;
                        $('#dokumenWaliKelas').show();
                        $('#GanjilGenap').show();
                    });
            } else {
                document.getElementById('nama-wali-kelas').innerHTML = '';
            }
        });
    </script>
    <script>
        ['tahunajaran', 'kode_kk', 'idTingkat', 'idRombel', 'GanjilGenap', 'dokumenWaliKelas'].forEach(id => {
            document.getElementById(id).addEventListener('change', function() {
                loadWaliKelasDokumen(); // akan reload data jika semua sudah lengkap
            });
        });
    </script>

    <script>
        function loadWaliKelasDokumen() {
            const dokumen = document.getElementById('dokumenWaliKelas').value;
            const semester = document.getElementById('GanjilGenap').value;
            const tahunajaran = document.getElementById('tahunajaran').value;
            const kode_kk = document.getElementById('kode_kk').value;
            const tingkat = document.getElementById('idTingkat').value;
            const kode_rombel = document.getElementById('idRombel').value;

            const isValid = dokumen !== '' &&
                semester !== '' &&
                tahunajaran !== 'All' &&
                kode_kk !== 'All' &&
                tingkat !== 'All' &&
                kode_rombel !== 'All';

            if (isValid) {
                fetch(
                        `/kurikulum/dokumenguru/get-dokumen-walas?dokumen=${dokumen}&semester=${semester}&tahunajaran=${tahunajaran}&kode_kk=${kode_kk}&tingkat=${tingkat}&kode_rombel=${kode_rombel}`
                    )
                    .then(res => res.text())
                    .then(html => {
                        document.getElementById('data-wali-kelas').innerHTML = html;
                    })
                    .catch(err => {
                        console.error('Error:', err);
                        document.getElementById('data-wali-kelas').innerHTML =
                            '<div class="alert alert-danger">Gagal memuat data.</div>';
                    });
            } else {
                document.getElementById('data-wali-kelas').innerHTML = '';
            }
        }
    </script>
    <script>
        ['GanjilGenap', 'idRombel'].forEach(id => {
            document.getElementById(id).addEventListener('change', function() {
                document.getElementById('dokumenWaliKelas').value = '';
                document.getElementById('data-wali-kelas').innerHTML = '';
            });
        });
    </script>
    <script>
        function autoSavePilihan(id_user) {
            const tahunajaran = document.getElementById('tahunajaran').value;
            const kode_kk = document.getElementById('kode_kk').value;
            const tingkat = document.getElementById('idTingkat').value;
            const kode_rombel = document.getElementById('idRombel').value;
            const ganjilgenap = document.getElementById('GanjilGenap').value;
            const pilih_dokumen = document.getElementById('dokumenWaliKelas').value;

            fetch('/kurikulum/dokumenguru/simpan-pilihan', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id_user,
                    tahunajaran,
                    kode_kk,
                    tingkat,
                    kode_rombel,
                    ganjilgenap,
                    pilih_dokumen
                })
            }).then(res => {
                if (!res.ok) throw new Error('Gagal menyimpan pilihan.');
            }).catch(err => console.error(err));
        }

        const userId = {{ json_encode($id_user) }};
        ['tahunajaran', 'kode_kk', 'idTingkat', 'idRombel', 'GanjilGenap', 'dokumenWaliKelas'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('change', () => autoSavePilihan(userId));
            }
        });
    </script>


    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
