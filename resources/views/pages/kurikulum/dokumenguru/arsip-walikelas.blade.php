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

                        <div class="col-lg-auto">
                            <select class="form-control" name="tahunajaran" id="tahunajaran" required>
                                <option value="All" selected>Pilih TA</option>
                                @foreach ($tahunAjaranOption as $tahunajaran => $thajar)
                                    <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-auto">
                            <select class="form-control" name="kode_kk" id="kode_kk" required>
                                <option value="All" selected>Pilih Konsentrasi Keahlian</option>
                                @foreach ($kompetensiKeahlianOptions as $id => $kode_kk)
                                    <option value="{{ $id }}">{{ $kode_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-auto">
                            <select class="form-control" name="tingkat" id="idTingkat">
                                <option value="All" selected>Pilih Tingkat</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-lg-auto">
                            <select class="form-control" name="rombel" id="idRombel" disabled>
                                <option value="All" selected>Pilih Rombel</option>
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
                            <select class="form-control mb-3" name="ganjilgenap" id="GanjilGenap" style="display: none;">
                                <option value="" selected>Pilih Semester</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                        <div class="col-lg-auto">
                            <select class="form-control mb-3" name="dokumenwalas" id="dokumenWaliKelas"
                                style="display: none;">
                                <option value="" selected>Pilih Dokumen</option>
                                <option value="dataKelas">Data Kelas</option>
                                <option value="absensiSiswa">Absensi</option>
                                <option value="eskulSiswa">Ekstrakurikuler</option>
                                <option value="prestasiSiswa">Prestasi Siswa</option>
                                <option value="catatanWalas">Catatan Wali Kelas</option>
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
        document.getElementById('dokumenWaliKelas').addEventListener('change', function() {
            const dokumen = this.value;
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
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
