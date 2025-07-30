@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-per-guru')
@endsection
@section('css')
    <style>
        .no-click {
            pointer-events: none;
            cursor: not-allowed;
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.data-kbm')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('kurikulum.datakbm.jadwal-mingguan.index') }}" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <form method="GET" id="formRombel">
                <div class="row g-3">
                    <div class="col-lg">
                    </div>

                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="tahunajaran" id="idThnAjaran">
                                <option value="" selected>Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaranOptions as $thnajar)
                                    <option value="{{ $thnajar }}"
                                        {{ request('tahunajaran') == $thnajar ? 'selected' : '' }}>{{ $thnajar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="semester" id="idSemester">
                                <option value="" selected>Pilih Semester</option>
                                <option value="Ganjil" {{ request('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil
                                </option>
                                <option value="Genap" {{ request('semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="kompetensikeahlian" id="idKodeKK">
                                <option value="" selected>Pilih Kompetensi Keahlian</option>
                                @foreach ($kompetensiKeahlianOptions as $id => $kode_kk)
                                    <option value="{{ $id }}"
                                        {{ request('kompetensikeahlian') == $id ? 'selected' : '' }}>
                                        {{ $kode_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="tingkat" id="idTingkat">
                                <option value="" selected>Pilih Tingkat</option>
                                <option value="10" {{ request('tingkat') == '10' ? 'selected' : '' }}>10</option>
                                <option value="11" {{ request('tingkat') == '11' ? 'selected' : '' }}>11</option>
                                <option value="12" {{ request('tingkat') == '12' ? 'selected' : '' }}>12</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto me-2">
                        <div>
                            <select class="form-select form-select-sm" name="kode_rombel" id="idRombel" disabled>
                                <option value="" selected>Pilih Rombel</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto me-2">
                        <button type="button" id="btn-tampil-jadwal"
                            class="btn btn-soft-primary btn-sm w-100 mb-4">Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body p-1">
            @include('pages.kurikulum.datakbm.jadwal-mingguan-tabel-guru')
        </div>
    </div>

    @include('pages.kurikulum.datakbm.jadwal-mingguan-modal-guru')
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        // Function untuk mengecek apakah dropdown rombel harus di-disable atau tidak
        function checkDisableRombel() {
            var tahunAjaran = $('#idThnAjaran').val();
            var kodeKK = $('#idKodeKK').val();
            var tingKat = $('#idTingkat').val();
            var semester = $('#idSemester').val();

            // Jika salah satu dari Tahun Ajaran atau Kompetensi Keahlian belum dipilih
            if (tahunAjaran === '' || semester === '' || kodeKK === '' || tingKat === '') {
                // Disable dropdown Rombel
                $('#idRombel').attr('disabled', true);
                $('#idRombel').empty().append('<option value="all" selected>Rombel</option>'); // Kosongkan pilihan Rombel
            } else {
                // Jika sudah dipilih keduanya, enable dropdown Rombel dan muat datanya
                $('#idRombel').attr('disabled', false);
                loadRombelData(tahunAjaran, kodeKK, tingKat); // Panggil AJAX untuk load data
            }
        }

        // Function untuk load data rombel sesuai pilihan Tahun Ajaran dan Kompetensi Keahlian
        function loadRombelData(tahunAjaran, kodeKK, tingKat) {
            $.ajax({
                url: "{{ route('kurikulum.datakbm.getRombel') }}",
                type: "GET",
                data: {
                    tahun_ajaran: tahunAjaran,
                    kode_kk: kodeKK,
                    tingkat: tingKat
                },
                success: function(data) {
                    var rombelSelect = $('#idRombel');
                    var selectedKodeRombel =
                        "{{ request()->get('kode_rombel') ?? '' }}"; // Ambil dari request (blade)

                    rombelSelect.empty();
                    rombelSelect.append('<option value="all">Pilih Rombel</option>');

                    if (Object.keys(data).length > 0) {
                        $.each(data, function(key, value) {
                            const isSelected = key === selectedKodeRombel ? 'selected' : '';
                            rombelSelect.append('<option value="' + key + '" ' + isSelected + '>' +
                                value + '</option>');
                        });
                    } else {
                        rombelSelect.append('<option value="none">Tidak ada rombel tersedia</option>');
                    }

                    // Re-enable select
                    rombelSelect.prop('disabled', false);
                },
                error: function(xhr) {
                    console.error('Error pada AJAX:', xhr.responseText);
                }
            });
        }


        // Inisialisasi DataTable
        $(document).ready(function() {

            // Event listener ketika dropdown Tahun Ajaran atau Kompetensi Keahlian berubah
            $('#idThnAjaran, #idSemester, #idKodeKK, #idTingkat').on('change', function() {
                checkDisableRombel(); // Panggil fungsi untuk mengecek apakah Rombel harus di-disable
            });

            // Cek status Rombel saat halaman pertama kali dimuat
            checkDisableRombel();

            $('#btn-tampil-jadwal').on('click', function() {
                // Cek apakah semua select sudah dipilih
                if ($('#idThnAjaran').val() &&
                    $('#idSemester').val() &&
                    $('#idKodeKK').val() &&
                    $('#idTingkat').val() &&
                    $('#idRombel').val() &&
                    $('#idRombel').val() !== 'all' &&
                    $('#idRombel').val() !== 'none') {

                    // Submit form
                    $('#formRombel').submit();
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Lengkapi Filter',
                        text: 'Silakan lengkapi semua pilihan filter terlebih dahulu!',
                    });
                }
            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('modalInputJadwal'));

            document.querySelectorAll('.cell-jadwal').forEach(cell => {
                cell.addEventListener('click', function() {
                    // Ambil nilai dari filter form
                    const tahunajaran = document.getElementById('idThnAjaran').value;
                    const semester = document.getElementById('idSemester').value;
                    const kompetensikeahlian = document.getElementById('idKodeKK').value;
                    const tingkat = document.getElementById('idTingkat').value;
                    const rombel = document.getElementById('idRombel').value;

                    // Cek apakah semua filter telah dipilih
                    if (!tahunajaran || !semester || !kompetensikeahlian || !tingkat || !rombel) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Lengkapi Filter!',
                            text: 'Silakan pilih Tahun Ajaran, Semester, Kompetensi Keahlian, Tingkat, dan Rombel terlebih dahulu.',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                        return; // Hentikan eksekusi, jangan tampilkan modal
                    }

                    // Buka modal jika filter lengkap
                    const jam = this.dataset.jam;
                    const hari = this.dataset.hari;
                    const guru = this.dataset.id || '';
                    const mapel = this.dataset.mapel || '';

                    document.getElementById('modalJamKe').value = jam;
                    document.getElementById('modalHari').value = hari;
                    document.getElementById('modalGuru').value = guru;
                    document.getElementById('modalMapel').value = mapel;
                    document.getElementById('labelJamKe').textContent = jam;
                    document.getElementById('labelHari').textContent = hari;

                    modal.show();
                });
            });
        });
    </script>
    <script>
        const mapelPerGuru = @json($mapelPerGuru);

        document.addEventListener('DOMContentLoaded', function() {
            const guruSelect = document.getElementById('modalGuru');
            const mapelSelect = document.getElementById('modalMapel');

            guruSelect.addEventListener('change', function() {
                const selectedGuruId = this.value;
                mapelSelect.innerHTML = '<option value="">-- Pilih Mata Pelajaran --</option>';

                if (mapelPerGuru[selectedGuruId]) {
                    mapelPerGuru[selectedGuruId].forEach(item => {
                        const opt = document.createElement('option');
                        opt.value = item.kode_mapel_rombel;
                        opt.textContent = item.mata_pelajaran;
                        mapelSelect.appendChild(opt);
                    });
                    mapelSelect.disabled = false;
                } else {
                    mapelSelect.disabled = true;
                }
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
