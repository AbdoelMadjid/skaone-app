@extends('layouts.master')
@section('title')
    @lang('translation.remedial-peserta-didik')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100">
                <div class="mb-3">
                    PILIH DATA
                </div>
                <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 468px);">
                    <div class="mb-3">
                        <select id="thnajaran_masuk" class="form-select">
                            <option value="">-- Pilih Tahun Ajaran --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select id="kode_kk" class="form-select" style="display: none;">
                            <option value="">-- Pilih Kompetensi Keahlian --</option>
                        </select>
                    </div>
                </div>


                <div class="mt-auto text-center">
                    <img src="{{ URL::asset('build/images/task.png') }}" alt="Task" class="img-fluid" />
                </div>
            </div>
        </div>
        <!--end side content-->
        <div class="file-manager-content w-100 p-4 pb-0">
            <div class="row mb-4">
                <div class="col-auto order-1 d-block d-lg-none">
                    <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                        <i class="ri-menu-2-fill align-bottom"></i>
                    </button>
                </div>
                <div class="col-sm order-3 order-sm-2 mt-3 mt-sm-0">
                    <h5 class="fw-semibold mb-0">Velzon Admin & Dashboard <span
                            class="badge bg-primary align-bottom ms-2">v2.0.0</span></h5>
                </div>

                <div class="col-auto order-2 order-sm-3 ms-auto">
                    <div class="hstack gap-2">
                        <div class="btn-group" role="group" aria-label="Basic example">

                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 356px);">
                <div id="table-data-siswa">
                    <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show mt-4"
                        role="alert">
                        <i class="ri-user-smile-line label-icon"></i><strong>Mohon di perhatikan !!</strong> -
                        Silakan pilih peserta didik dulu
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        $(document).ready(function() {
            // Load thnajaran_masuk saat halaman pertama kali dibuka
            $.get('/kurikulum/dokumentsiswa/get-tahun-ajaran', function(data) {
                let options = `<option value="">-- Pilih Tahun Ajaran --</option>`;
                data.forEach(function(tahun) {
                    options += `<option value="${tahun}">${tahun}</option>`;
                });
                $('#thnajaran_masuk').html(options);
            });

            // Saat thnajaran_masuk dipilih
            $('#thnajaran_masuk').on('change', function() {
                const tahun = $(this).val();

                if (tahun) {
                    $.get(`/kurikulum/dokumentsiswa/get-kompetensi-keahlian/${tahun}`, function(data) {
                        let options = `<option value="">-- Pilih Kompetensi Keahlian --</option>`;
                        data.forEach(function(item) {
                            options +=
                                `<option value="${item.kode_kk}">${item.nama_kk}</option>`;
                        });
                        $('#kode_kk').html(options).show();
                    });
                } else {
                    $('#kode_kk').hide().html('');
                }
            });

            $('#kode_kk').on('change', function() {
                const tahun = $('#thnajaran_masuk').val();
                const kode_kk = $(this).val();

                if (tahun && kode_kk) {
                    $.get('/kurikulum/dokumentsiswa/filter-siswa', {
                        thnajaran_masuk: tahun,
                        kode_kk: kode_kk
                    }, function(data) {
                        $('#table-data-siswa').html(
                            data); // asumsi ada <div id="datasiswa"></div> di halaman
                    });
                }
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
