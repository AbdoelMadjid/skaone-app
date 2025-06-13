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
                            {{--  --}}
                        </div>

                        <div class="col-lg-auto">
                            <div class="mb-3 d-flex align-items-center gap-2">
                                <select class="form-control mb-3" name="tahunajaran" id="tahunajaran" required>
                                    <option value="All" selected>Pilih TA</option>
                                    @foreach ($tahunAjaranOption as $tahunajaran => $thajar)
                                        <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-auto">
                            <select class="form-control mb-3" name="kode_kk" id="kode_kk" required>
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
                            <select class="form-control" name="kode_rombel" id="idRombel" disabled>
                                <option value="All" selected>Pilih Rombel</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Card 2: Nama Wali dan Dokumen -->
            <div class="card">
                <div class="card-body">
                    <div class="row g-3 align-items-end">
                        <!-- Nama Wali -->
                        <div class="col-lg">
                            <h3><i class="ri-file-user-line text-muted align-bottom me-1"></i> Wali Kelas :</h3>
                            <div id="nama-wali-kelas"></div>
                        </div>

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
        $(document).ready(function() {

            // Reload tabel setiap dropdown filter berubah
            $(".form-control").on("change", function() {
                simpanPilihanKeDatabase();
            });

            function simpanPilihanKeDatabase() {
                const tahunajaran = $('#tahunajaran').val();
                const kode_kk = $('#kode_kk').val();
                const tingkat = $('#idTingkat').val();
                const kode_rombel = $('#idRombel').val();
                const ganjilgenap = $('#GanjilGenap').val();
                const pilih_dokumen = $('#dokumenWaliKelas').val();


                if (!tahunajaran || !kode_kk || !tingkat || !kode_rombel || !ganjilgenap || !pilih_dokumen) {
                    // Minimal validasi sebelum kirim
                    return;
                }

                $.ajax({
                    url: '/kurikulum/dokumenguru/simpan-pilihan-walas', // Buat route untuk ini
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        tahunajaran: tahunajaran,
                        kode_kk: kode_kk,
                        tingkat: tingkat,
                        kode_rombel: kode_rombel,
                        ganjilgenap: ganjilgenap,
                        pilih_dokumen: pilih_dokumen,
                    },
                    success: function(response) {
                        console.log('Pilihan berhasil disimpan atau diperbarui.');
                    },
                    error: function(xhr) {
                        console.error('Gagal menyimpan data:', xhr.responseText);
                    }
                });
            }

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
                            rombelSelect.innerHTML = '';
                            rombelSelect.disabled = false;

                            const defaultOption = document.createElement('option');
                            defaultOption.value = 'All';
                            defaultOption.text = 'Pilih Rombel';
                            rombelSelect.appendChild(defaultOption);

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

            $('#idRombel').on('change', function() {
                const tahunajaran = $('#tahunajaran').val();
                const kode_kk = $('#kode_kk').val();
                const tingkat = $('#idTingkat').val();
                const kode_rombel = $(this).val();

                if (tahunajaran !== 'All' && kode_kk !== 'All' && tingkat !== 'All' && kode_rombel !==
                    'All') {
                    fetch(
                            `/kurikulum/dokumenguru/get-wali-kelas?tahunajaran=${tahunajaran}&id_kk=${kode_kk}&tingkat=${tingkat}&kode_rombel=${kode_rombel}`
                        )
                        .then(response => response.text())
                        .then(html => {
                            $('#nama-wali-kelas').html(html);
                            $('#dokumenWaliKelas').show();
                            $('#GanjilGenap').show();
                        });
                } else {
                    $('#nama-wali-kelas').html('');
                }
            });

            function loadWaliKelasDokumen() {
                const dokumen = $('#dokumenWaliKelas').val();
                const semester = $('#GanjilGenap').val();
                const tahunajaran = $('#tahunajaran').val();
                const kode_kk = $('#kode_kk').val();
                const tingkat = $('#idTingkat').val();
                const kode_rombel = $('#idRombel').val();

                const isValid = dokumen !== '' && semester !== '' &&
                    tahunajaran !== 'All' && kode_kk !== 'All' && tingkat !== 'All' && kode_rombel !== 'All';

                if (isValid) {
                    fetch(
                            `/kurikulum/dokumenguru/get-dokumen-walas?dokumen=${dokumen}&semester=${semester}&tahunajaran=${tahunajaran}&kode_kk=${kode_kk}&tingkat=${tingkat}&kode_rombel=${kode_rombel}`
                        )
                        .then(res => res.text())
                        .then(html => {
                            $('#data-wali-kelas').html(html);
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            $('#data-wali-kelas').html(
                                '<div class="alert alert-danger">Gagal memuat data.</div>');
                        });
                } else {
                    $('#data-wali-kelas').html('');
                }
            }

            ['tahunajaran', 'kode_kk', 'idTingkat', 'idRombel', 'GanjilGenap', 'dokumenWaliKelas'].forEach(id => {
                $(`#${id}`).on('change', function() {
                    loadWaliKelasDokumen();
                });
            });

            ['GanjilGenap', 'idRombel'].forEach(id => {
                $(`#${id}`).on('change', function() {
                    $('#dokumenWaliKelas').val('');
                    $('#data-wali-kelas').html('');
                });
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
