@extends('layouts.master')
@section('title')
    @lang('translation.ekstrakulikuler')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.walikelas')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>Nilai @yield('title')
                    <span class="d-none d-lg-inline"> - </span>
                    <br class="d-inline d-lg-none">
                    {{ $waliKelas->rombel }}
                </x-heading-title>
                <div class="flex-shrink-0 me-2">
                    @if (!$ekstrakulikulerExists)
                        <form action="{{ route('walikelas.ekstrakulikuler.generateeskul') }}" method="POST">
                            @csrf
                            <x-btn-action type="submit" label="Generate" icon="ri-share-circle-fill" />
                        </form>
                    @else
                        <div></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'ekstrakurikuler-table';

        $(document).on('change', '.wajib-select', function() {
            var id = $(this).data('id'); // Ambil ID dari tabel
            var wajibValue = $(this).val(); // Ambil nilai wajib yang dipilih
            var penilaianValue = $('.penilaian-select[data-id="' + id + '"]').val(); // Ambil nilai penilaian

            // Jika ada penilaian, buat kalimat wajib_desk
            var wajibDesk = '';
            if (penilaianValue) {
                wajibDesk = penilaianValue + ' melaksanakan kegiatan ' + wajibValue;
            }

            // Kirim AJAX untuk menyimpan nilai wajib dan wajib_desk
            $.ajax({
                url: '/walikelas/ekstrakulikuler/' + id + '/save-eskul-wajib', // Route untuk update
                method: 'POST',
                data: {
                    id: id, // Kirim ID dari tabel
                    wajib: wajibValue, // Nilai Eskul Wajib
                    wajib_desk: wajibDesk, // Kalimat yang digabungkan
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    showToast('success', 'Data Pilihan Wajib berhasil diperbarui!');
                    // Jika wajib_desk diperbarui, tampilkan di kolom desk
                    $('.wajib-desk[data-id="' + id + '"]').text(wajibDesk)
                        .removeClass('alert-danger') // Hapus kelas alert-danger
                        .addClass('alert-info') // Tambahkan kelas alert-info
                        .show(); // Tampilkan kalimat
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat menyimpan data');
                }
            });
        });

        $(document).on('change', '.penilaian-select', function() {
            var id = $(this).data('id'); // Ambil ID dari tabel
            var penilaianValue = $(this).val(); // Ambil nilai penilaian
            var wajibValue = $('.wajib-select[data-id="' + id + '"]').val(); // Ambil nilai dari select wajib

            // Jika penilaian dipilih, buat kalimat wajib_desk
            var wajibDesk = '';
            if (penilaianValue && wajibValue) {
                wajibDesk = penilaianValue + ' melaksanakan kegiatan ' + wajibValue;
            }

            // Kirim AJAX untuk menyimpan nilai penilaian dan wajib_desk
            $.ajax({
                url: '/walikelas/ekstrakulikuler/' + id + '/save-eskul-wajib', // Route untuk update
                method: 'POST',
                data: {
                    id: id, // Kirim ID dari tabel
                    wajib_n: penilaianValue, // Nilai penilaian
                    wajib_desk: wajibDesk, // Kalimat yang digabungkan
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    showToast('success', 'Penilaian dan Deskripsi berhasil diperbarui!');
                    // Tampilkan wajib_desk setelah disimpan
                    $('.wajib-desk[data-id="' + id + '"]').text(wajibDesk)
                        .removeClass('alert-danger') // Hapus kelas alert-danger
                        .addClass('alert-info') // Tambahkan kelas alert-info
                        .show(); // Tampilkan kalimat
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat menyimpan penilaian');
                }
            });
        });

        //pilihan 1
        $(document).on('change', '.pilihan1-select', function() {
            var id = $(this).data('id'); // Ambil id dari atribut data-id
            var pilihan1Value = $(this).val(); // Ambil nilai yang dipilih
            var penilaian1Value = $('.penilaian1-select[data-id="' + id + '"]').val(); // Ambil nilai penilaian1

            // Buat kalimat desk berdasarkan penilaian dan pilihan jika penilaian ada
            var pilihan1Desk = '';
            if (penilaian1Value) {
                pilihan1Desk = penilaian1Value + ' melaksanakan kegiatan ' + pilihan1Value;
            }

            // Kirim AJAX untuk menyimpan nilai pilihan1 dan desk
            $.ajax({
                url: '/walikelas/ekstrakulikuler/' + id + '/save-eskul-pilihan1', // Route untuk update
                method: 'POST',
                data: {
                    id: id, // Kirim ID dari tabel
                    pilihan1: pilihan1Value, // Nilai pilihan1
                    pilihan1_desk: pilihan1Desk, // Nilai desk jika sudah lengkap
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    showToast('success', 'Data Eskul Pilihan 1 berhasil diperbarui!');
                    // Jika desk diperbarui, tampilkan di kolom desk
                    $('.pilihan1-desk[data-id="' + id + '"]').text(pilihan1Desk)
                        .removeClass('alert-danger')
                        .addClass('alert-info')
                        .show();
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat menyimpan data');
                }
            });
        });


        $(document).on('change', '.penilaian1-select', function() {
            var id = $(this).data('id'); // Ambil id dari atribut data-id
            var penilaian1Value = $(this).val(); // Ambil nilai yang dipilih
            var pilihan1Value = $('.pilihan1-select[data-id="' + id + '"]').val(); // Ambil nilai pilihan1

            // Buat kalimat desk berdasarkan penilaian dan pilihan jika ada penilaian
            var pilihan1Desk = '';
            if (penilaian1Value && pilihan1Value) {
                pilihan1Desk = penilaian1Value + ' melaksanakan kegiatan ' + pilihan1Value;
            }

            // Kirim AJAX untuk menyimpan nilai penilaian1 dan desk
            $.ajax({
                url: '/walikelas/ekstrakulikuler/' + id + '/save-eskul-pilihan1', // Route untuk update
                method: 'POST',
                data: {
                    id: id, // Kirim ID dari tabel
                    pilihan1_n: penilaian1Value, // Nilai penilaian1
                    pilihan1_desk: pilihan1Desk, // Nilai desk yang dibuat
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    showToast('success', 'Penilaian dan Deskripsi berhasil diperbarui!');
                    // Jika desk diperbarui, tampilkan di kolom desk
                    $('.pilihan1-desk[data-id="' + id + '"]').text(pilihan1Desk)
                        .removeClass('alert-danger')
                        .addClass('alert-info')
                        .show();
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat menyimpan penilaian');
                }
            });
        });


        //pilihan 2
        $(document).on('change', '.pilihan2-select', function() {
            var id = $(this).data('id'); // Ambil id dari atribut data-id
            var pilihan2Value = $(this).val(); // Ambil nilai yang dipilih
            var penilaian2Value = $('.penilaian2-select[data-id="' + id + '"]').val(); // Ambil nilai penilaian2

            // Buat kalimat desk berdasarkan penilaian dan pilihan jika penilaian ada
            var pilihan2Desk = '';
            if (penilaian2Value) {
                pilihan2Desk = penilaian2Value + ' melaksanakan kegiatan ' + pilihan2Value;
            }

            // Kirim AJAX untuk menyimpan nilai pilihan2 dan desk
            $.ajax({
                url: '/walikelas/ekstrakulikuler/' + id + '/save-eskul-pilihan2', // Route untuk update
                method: 'POST',
                data: {
                    id: id, // Kirim ID dari tabel
                    pilihan2: pilihan2Value, // Nilai pilihan2
                    pilihan2_desk: pilihan2Desk, // Nilai desk jika sudah lengkap
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    showToast('success', 'Data Eskul Pilihan 2 berhasil diperbarui!');
                    // Jika desk diperbarui, tampilkan di kolom desk
                    $('.pilihan2-desk[data-id="' + id + '"]').text(pilihan2Desk)
                        .removeClass('alert-danger')
                        .addClass('alert-info')
                        .show();
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat menyimpan data');
                }
            });
        });

        $(document).on('change', '.penilaian2-select', function() {
            var id = $(this).data('id'); // Ambil id dari atribut data-id
            var penilaian2Value = $(this).val(); // Ambil nilai yang dipilih
            var pilihan2Value = $('.pilihan2-select[data-id="' + id + '"]').val(); // Ambil nilai pilihan2

            // Buat kalimat desk berdasarkan penilaian dan pilihan jika ada penilaian
            var pilihan2Desk = '';
            if (penilaian2Value && pilihan2Value) {
                pilihan2Desk = penilaian2Value + ' melaksanakan kegiatan ' + pilihan2Value;
            }

            // Kirim AJAX untuk menyimpan nilai penilaian2 dan desk
            $.ajax({
                url: '/walikelas/ekstrakulikuler/' + id + '/save-eskul-pilihan2', // Route untuk update
                method: 'POST',
                data: {
                    id: id, // Kirim ID dari tabel
                    pilihan2_n: penilaian2Value, // Nilai penilaian2
                    pilihan2_desk: pilihan2Desk, // Nilai desk yang dibuat
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    showToast('success', 'Penilaian dan Deskripsi berhasil diperbarui!');
                    // Jika desk diperbarui, tampilkan di kolom desk
                    $('.pilihan2-desk[data-id="' + id + '"]').text(pilihan2Desk)
                        .removeClass('alert-danger')
                        .addClass('alert-info')
                        .show();
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat menyimpan penilaian');
                }
            });
        });



        //pilihan 3
        $(document).on('change', '.pilihan3-select', function() {
            var id = $(this).data('id'); // Ambil id dari atribut data-id
            var pilihan3Value = $(this).val(); // Ambil nilai yang dipilih
            var penilaian3Value = $('.penilaian3-select[data-id="' + id + '"]').val(); // Ambil nilai penilaian3

            // Buat kalimat desk berdasarkan penilaian dan pilihan jika penilaian sudah dipilih
            var pilihan3Desk = '';
            if (penilaian3Value) {
                pilihan3Desk = penilaian3Value + ' melaksanakan kegiatan ' + pilihan3Value;
            }

            // Kirim AJAX untuk menyimpan nilai pilihan3 dan desk
            $.ajax({
                url: '/walikelas/ekstrakulikuler/' + id + '/save-eskul-pilihan3', // Route untuk update
                method: 'POST',
                data: {
                    id: id, // Kirim ID dari tabel
                    pilihan3: pilihan3Value, // Nilai pilihan3
                    pilihan3_desk: pilihan3Desk, // Nilai desk jika penilaian sudah dipilih
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    showToast('success', 'Data Eskul Pilihan 3 berhasil diperbarui!');
                    // Jika desk diperbarui, tampilkan di kolom desk
                    $('.pilihan3-desk[data-id="' + id + '"]').text(pilihan3Desk)
                        .removeClass('alert-danger')
                        .addClass('alert-info')
                        .show();
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat menyimpan data');
                }
            });
        });


        $(document).on('change', '.penilaian3-select', function() {
            var id = $(this).data('id'); // Ambil id dari atribut data-id
            var penilaian3Value = $(this).val(); // Ambil nilai yang dipilih
            var pilihan3Value = $('.pilihan3-select[data-id="' + id + '"]').val(); // Ambil nilai pilihan3

            // Buat kalimat desk berdasarkan penilaian dan pilihan jika keduanya sudah dipilih
            var pilihan3Desk = '';
            if (penilaian3Value && pilihan3Value) {
                pilihan3Desk = penilaian3Value + ' melaksanakan kegiatan ' + pilihan3Value;
            }

            // Kirim AJAX untuk menyimpan nilai penilaian3 dan desk
            $.ajax({
                url: '/walikelas/ekstrakulikuler/' + id + '/save-eskul-pilihan3', // Route untuk update
                method: 'POST',
                data: {
                    id: id, // Kirim ID dari tabel
                    pilihan3_n: penilaian3Value, // Nilai penilaian3
                    pilihan3_desk: pilihan3Desk, // Nilai desk yang dibuat
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    showToast('success', 'Penilaian dan Deskripsi berhasil diperbarui!');
                    // Jika desk diperbarui, tampilkan di kolom desk
                    $('.pilihan3-desk[data-id="' + id + '"]').text(pilihan3Desk)
                        .removeClass('alert-danger')
                        .addClass('alert-info')
                        .show();
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat menyimpan penilaian');
                }
            });
        });



        //pilihan 4
        $(document).on('change', '.pilihan4-select', function() {
            var id = $(this).data('id'); // Ambil id dari atribut data-id
            var pilihan4Value = $(this).val(); // Ambil nilai yang dipilih
            var penilaian4Value = $('.penilaian4-select[data-id="' + id + '"]').val(); // Ambil nilai penilaian4

            // Buat kalimat desk berdasarkan penilaian dan pilihan jika penilaian sudah dipilih
            var pilihan4Desk = '';
            if (penilaian4Value) {
                pilihan4Desk = penilaian4Value + ' melaksanakan kegiatan ' + pilihan4Value;
            }

            // Kirim AJAX untuk menyimpan nilai pilihan4 dan desk
            $.ajax({
                url: '/walikelas/ekstrakulikuler/' + id + '/save-eskul-pilihan4', // Route untuk update
                method: 'POST',
                data: {
                    id: id, // Kirim ID dari tabel
                    pilihan4: pilihan4Value, // Nilai pilihan4
                    pilihan4_desk: pilihan4Desk, // Nilai desk jika penilaian sudah dipilih
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    showToast('success', 'Data Eskul Pilihan 4 berhasil diperbarui!');
                    // Jika desk diperbarui, tampilkan di kolom desk
                    $('.pilihan4-desk[data-id="' + id + '"]').text(pilihan4Desk)
                        .removeClass('alert-danger')
                        .addClass('alert-info')
                        .show();
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat menyimpan data');
                }
            });
        });


        $(document).on('change', '.penilaian4-select', function() {
            var id = $(this).data('id'); // Ambil id dari atribut data-id
            var penilaian4Value = $(this).val(); // Ambil nilai yang dipilih
            var pilihan4Value = $('.pilihan4-select[data-id="' + id + '"]').val(); // Ambil nilai pilihan4

            // Buat kalimat desk berdasarkan penilaian dan pilihan jika keduanya sudah dipilih
            var pilihan4Desk = '';
            if (penilaian4Value && pilihan4Value) {
                pilihan4Desk = penilaian4Value + ' melaksanakan kegiatan ' + pilihan4Value;
            }

            // Kirim AJAX untuk menyimpan nilai penilaian4 dan desk
            $.ajax({
                url: '/walikelas/ekstrakulikuler/' + id + '/save-eskul-pilihan4', // Route untuk update
                method: 'POST',
                data: {
                    id: id, // Kirim ID dari tabel
                    pilihan4_n: penilaian4Value, // Nilai penilaian4
                    pilihan4_desk: pilihan4Desk, // Nilai desk yang dibuat
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    showToast('success', 'Penilaian dan Deskripsi berhasil diperbarui!');
                    // Jika desk diperbarui, tampilkan di kolom desk
                    $('.pilihan4-desk[data-id="' + id + '"]').text(pilihan4Desk)
                        .removeClass('alert-danger')
                        .addClass('alert-info')
                        .show();
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat menyimpan penilaian');
                }
            });
        });


        handleDataTableEvents(datatable, "Silakan klik Generate Ekstrakurikuler terlebih dahulu");
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
