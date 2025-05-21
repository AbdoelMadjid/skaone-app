@extends('layouts.master')
@section('title')
    @lang('translation.ruang-ujian')
@endsection
@section('css')
    {{-- --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.perangkat-ujian')
        @endslot
        @slot('li_3')
            @lang('translation.administrasi-ujian')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Peserta Ujian</h5>
                    <div>
                        {{-- @can('create kurikulum/perangkatujian/administrasi-ujian/peserta-ujian')
                            <a class="btn btn-soft-primary action"
                                href="{{ route('kurikulum.perangkatujian.administrasi-ujian.peserta-ujian.create') }}">Tambah</a>
                        @endcan --}}
                        <button type="button" class="btn btn-sm btn-soft-primary" data-bs-toggle="modal"
                            data-bs-target="#pesertaUjianModal">
                            Tambah Peserta
                        </button>
                        <a class="btn btn-sm btn-soft-danger"
                            href="{{ route('kurikulum.perangkatujian.administrasi-ujian.index') }}">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    @include('pages.kurikulum.perangkatujian.adminujian.crud-peserta-ujian-tambah')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'pesertaujian-table';

        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif

        $('#nomor_ruang').on('change', function() {
            var nomorRuang = $(this).val();

            if (nomorRuang) {
                $.ajax({
                    url: '{{ url('kurikulum/perangkatujian/get-ruang-ujian') }}/' + nomorRuang,
                    type: 'GET',
                    success: function(data) {
                        $('#kelas_kiri').val(data.kelas_kiri);
                        $('#kelas_kanan').val(data.kelas_kanan);
                        $('#kode_kelas_kiri').val(data.kode_kelas_kiri);
                        $('#kode_kelas_kanan').val(data.kode_kelas_kanan);

                        // Panggil dua tabel
                        loadSiswaTable(data.kelas_kiri, 'kiri');
                        loadSiswaTable(data.kelas_kanan, 'kanan');
                    },
                    error: function() {
                        $('#kelas_kiri').val('');
                        $('#kelas_kanan').val('');
                        $('#kode_kelas_kiri').val('');
                        $('#kode_kelas_kanan').val('');
                        $('#siswa-table-kiri tbody').empty();
                        $('#siswa-table-kanan tbody').empty();
                        alert('Gagal mengambil data ruang ujian.');
                    }
                });
            } else {
                $('#kelas_kiri').val('');
                $('#kelas_kanan').val('');
                $('#kode_kelas_kiri').val('');
                $('#kode_kelas_kanan').val('');
                $('#siswa-table-kiri tbody').empty();
                $('#siswa-table-kanan tbody').empty();
            }
        });

        function loadSiswaTable(kodeKelas, posisi = 'kiri') {
            $.ajax({
                url: '{{ url('kurikulum/perangkatujian/get-siswa-kelas') }}/' + kodeKelas,
                type: 'GET',
                success: function(data) {
                    let tbody = posisi === 'kiri' ? $('#siswa-table-kiri tbody') : $(
                        '#siswa-table-kanan tbody');
                    tbody.empty();

                    if (data.length === 0) {
                        tbody.append('<tr><td colspan="4" class="text-center">Tidak ada data siswa</td></tr>');
                        return;
                    }

                    // Set info rombel di atas tabel
                    if (posisi === 'kiri') {
                        $('#kiri_kode_rombel').text(data[0].kode_rombel);
                        $('#kiri_kode_kk').text(data[0].kode_kk);
                        $('#kiri_tingkat').text(data[0].rombel_tingkat);
                        $('#kiri_rombel_nama').text(data[0].rombel_nama);
                        $('#kiri_nama_kk').text(data[0].nama_kk);
                    } else {
                        $('#kanan_kode_rombel').text(data[0].kode_rombel);
                        $('#kanan_kode_kk').text(data[0].kode_kk);
                        $('#kanan_tingkat').text(data[0].rombel_tingkat);
                        $('#kanan_rombel_nama').text(data[0].rombel_nama);
                        $('#kanan_nama_kk').text(data[0].nama_kk);
                    }

                    data.forEach(function(item, index) {
                        tbody.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.nis}</td>
                        <td>${item.nama_lengkap}</td>
                        <td class="text-center">
                            <input type="checkbox"
                                class="siswa-checkbox-${posisi}"
                                name="siswa_${posisi}[]"
                                value="${item.nis}">
                        </td>
                    </tr>
                `);
                    });
                },
                error: function() {
                    alert('Gagal mengambil data siswa.');
                }
            });
        }

        // Ceklist semua siswa - KIRI
        $('#check-all-kiri').on('change', function() {
            const checked = $(this).is(':checked');
            $('#check-ganjil-kiri').prop('checked', false); // reset ganjil
            $('#siswa-table-kiri tbody input[type="checkbox"]').prop('checked', checked);
        });

        // Ceklist nomor ganjil saja - KIRI
        $('#check-ganjil-kiri').on('change', function() {
            const checked = $(this).is(':checked');
            $('#check-all-kiri').prop('checked', false); // reset semua
            $('#siswa-table-kiri tbody input[type="checkbox"]').each(function(index) {
                $(this).prop('checked', checked && ((index + 1) % 2 === 1)); // hanya ganjil
            });
        });

        // Ceklist semua siswa - KANAN
        $('#check-all-kanan').on('change', function() {
            const checked = $(this).is(':checked');
            $('#check-ganjil-kanan').prop('checked', false); // reset ganjil
            $('#siswa-table-kanan tbody input[type="checkbox"]').prop('checked', checked);
        });

        // Ceklist nomor ganjil saja - KANAN
        $('#check-ganjil-kanan').on('change', function() {
            const checked = $(this).is(':checked');
            $('#check-all-kanan').prop('checked', false); // reset semua
            $('#siswa-table-kanan tbody input[type="checkbox"]').each(function(index) {
                $(this).prop('checked', checked && ((index + 1) % 2 === 1)); // hanya ganjil
            });
        });

        // Ceklist setengah siswa - KIRI
        $('#check-setengah-kiri').on('change', function() {
            const checked = $(this).is(':checked');
            $('#check-all-kiri').prop('checked', false);
            $('#check-ganjil-kiri').prop('checked', false);

            const checkboxes = $('#siswa-table-kiri tbody input[type="checkbox"]');
            const total = checkboxes.length;
            const batas = Math.ceil(total / 2);

            checkboxes.each(function(index) {
                $(this).prop('checked', checked && (index < batas)); // index dimulai dari 0
            });
        });

        // Ceklist setengah siswa - KANAN
        $('#check-setengah-kanan').on('change', function() {
            const checked = $(this).is(':checked');
            $('#check-all-kanan').prop('checked', false);
            $('#check-ganjil-kanan').prop('checked', false);

            const checkboxes = $('#siswa-table-kanan tbody input[type="checkbox"]');
            const total = checkboxes.length;
            const batas = Math.ceil(total / 2);

            checkboxes.each(function(index) {
                $(this).prop('checked', checked && (index < batas));
            });
        });

        $('form').on('submit', function() {
            // Tambahkan siswa yang dicentang sebagai input hidden jika perlu (tidak wajib jika checkbox sudah dalam form)
            const siswaKiri = $('.siswa-checkbox-kiri:checked');
            const siswaKanan = $('.siswa-checkbox-kanan:checked');

            if (siswaKiri.length === 0 && siswaKanan.length === 0) {
                alert('Silakan pilih minimal satu siswa.');
                return false; // cegah submit
            }

            return true;
        });

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
