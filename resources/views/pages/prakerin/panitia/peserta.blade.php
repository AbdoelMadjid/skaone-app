@extends('layouts.master')
@section('title')
    @lang('translation.peserta-prakerin')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.panitia')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-action label="Distribusi Peserta" icon="ri-route-fill" data-bs-toggle="modal"
                        data-bs-target="#distribusiPeserta" id="distribusiPesertaBtn"
                        title="Distribusikan Peserta Prakerin" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.prakerin.panitia.peserta-distribusi')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        $('#formDistribusiPesertaPrakerin').on('submit', function(e) {
            if ($('input[name="nis_terpilih[]"]:checked').length === 0) {
                e.preventDefault();

                Swal.fire({
                    icon: 'warning',
                    title: 'Oops!',
                    text: 'Minimal 1 siswa harus dipilih untuk didistribusikan.',
                });
            }
        });
    </script>
    <script>
        const datatable = 'prakerinpeserta-table';

        function loadSiswa() {
            const tahunajaran = $('#tahunajaran').val();
            const kode_kk = $('#kode_kk').val();
            const tingkat = $('#tingkat').val();

            if (tahunajaran && kode_kk && tingkat) {
                $.ajax({
                    url: "{{ route('panitiaprakerin.daftarSiswa') }}",
                    method: "GET",
                    data: {
                        tahunajaran: tahunajaran,
                        kode_kk: kode_kk,
                        tingkat: tingkat
                    },
                    beforeSend: function() {
                        $('#daftar_siswa_tbody').html('<tr><td colspan="6">Loading...</td></tr>');
                    },
                    success: function(response) {
                        $('#daftar_siswa_tbody').html(response.html);

                        // Tambah notifikasi jika ada siswa yang sudah terdaftar
                        if (response.terdaftar > 0) {
                            showToast('warning', response.terdaftar + ' siswa sudah didistribusikan.');
                            /* Swal.fire({
                                icon: "info",
                                title: "Sebagian siswa disembunyikan",
                                text: response.terdaftar +
                                    ' siswa sudah didistribusikan, jadi tidak ditampilkan di sini.',
                                footer: '<a href="#">Why do I have this issue?</a>'
                            }); */
                        }
                    },
                    error: function() {
                        $('#daftar_siswa_tbody').html(
                            '<tr><td colspan="6">Terjadi kesalahan saat memuat data.</td></tr>');
                    }
                });
            } else {
                $('#daftar_siswa_tbody').html(
                    '<tr><td colspan="6">Silakan pilih Tahun Ajaran, Kompetensi Keahlian, dan Tingkat terlebih dahulu.</td></tr>'
                );
            }
        }

        $('#daftar_siswa_list').on('change', '#checkAll', function() {
            $('input[name="nis_terpilih[]"]').prop('checked', this.checked);
        });

        $(document).on('change', '#tahunajaran, #kode_kk, #tingkat', loadSiswa);

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
