@extends('layouts.master')
@section('title')
    @lang('translation.peserta-ujian')
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
            @lang('translation.perangkat-ujian')
        @endslot
        @slot('li_3')
            @lang('translation.administrasi-ujian')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0 me-2">
                    <x-btn-action label="Tambah" icon="ri-add-fill" data-bs-toggle="modal"
                        data-bs-target="#pesertaUjianModal" />
                </div>
                <div class="flex-shrink-0">
                    <x-btn-group-dropdown>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.ruang-ujian.index') }}"
                            class="dropdown-item">Ruang Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.peserta-ujian.index') }}"
                            class="dropdown-item">Peserta
                            Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.jadwal-ujian.index') }}"
                            class="dropdown-item">Jadwal
                            Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.pengawas-ujian.index') }}"
                            class="dropdown-item">Pengawas
                            Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.index') }}"
                            class="dropdown-item">Kembali</a>
                    </x-btn-group-dropdown>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.kurikulum.perangkatujian.adminujian.crud-peserta-ujian-tambah')
@endsection
@section('script')
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
