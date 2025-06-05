@extends('layouts.master')
@section('title')
    @lang('translation.arsip')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .list-rombel-wrapper {
            display: none;
            /* Sembunyikan dropdown sementara */
        }

        .list-gurumapel-wrapper {
            display: none;
            /* Sembunyikan dropdown sementara */
        }

        .loading-message {
            display: block;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.dokumenguru')
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <form>
                <div class="row g-3">
                    <div class="col-lg">
                        <select class="form-control mb-3" name="tahunajaran" id="tahunajaran" required>
                            <option value="" selected>Pilih TA</option>
                            @foreach ($tahunAjaran as $tahunajaran => $thajar)
                                <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-auto">
                        <select class="form-control mb-3" name="semester" id="semester" required>
                            <option value="" selected>Pilih Semester</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="col-lg-auto">
                        <select class="form-select mb-3 filter-selector" aria-label="Default select example" name="filter"
                            id="filter" required>
                            <option value="">Pilih Filter</option>
                            <option value="gurumapel">Guru Mata Pelajaran</option>
                            <option value="rombel">Rombongan Belajar</option>
                        </select>
                    </div>
                    <div class="col-xxl-4 col-sm-4">
                        <div class="loading-message">Memuat data...</div>
                        <div class="list-gurumapel-wrapper">
                            <select class="form-control list-gurumapel" name="gurumapel" id="gurumapel" style="width: 100%;"
                                disabled></select>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-sm-4">
                        <div class="loading-message">Memuat data...</div>
                        <div class="list-rombel-wrapper">
                            <select class="form-control list-rombel" name="rombel" id="rombel" style="width: 100%;"
                                disabled></select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-card">
                {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
            </div>
        </div>
    </div>
    @include('pages.gurumapel.formatif-upload-nilai')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'arsipngajar-table';

        $(document).ready(function() {

            const table = $("#arsipngajar-table").DataTable();

            // Reload tabel setiap dropdown filter berubah
            $(".form-control").on("change", function() {
                table.ajax.reload();
            });


            // Event handler untuk perubahan dropdown filter
            $(".filter-selector").on("change", function() {
                var selectedValue = $(this).val();

                // Reset semua dropdown ke disabled
                $(".list-gurumapel").prop("disabled", true);
                $(".list-rombel").prop("disabled", true);

                // Kembali ke opsi default ("All") untuk dropdown yang dinonaktifkan
                $(".list-gurumapel").val("All").trigger("change");
                $(".list-rombel").val("All").trigger("change");

                // Aktifkan dropdown sesuai pilihan
                if (selectedValue === "gurumapel") {
                    $(".list-gurumapel").prop("disabled", false);
                } else if (selectedValue === "rombel") {
                    $(".list-rombel").prop("disabled", false);
                }
            });

            // Inisialisasi Select2 untuk Guru Mapel
            $(".list-gurumapel").select2({
                placeholder: "Pilih Guru Mapel",
            });

            // Simulasi Memuat Data untuk Guru Mapel
            // Fetch data
            $.ajax({
                url: '/kurikulum/dokumenguru/get-guru', // Endpoint backend
                method: 'GET',
                success: function(data) {
                    // Tambahkan opsi "Pilih Guru Mapel"
                    var options = [{
                            id: 'All',
                            text: 'Pilih Guru Mapel'
                        }, // Opsi pertama dengan value All
                    ];

                    // Tambahkan data guru ke dalam opsi
                    data.forEach(function(guru) {
                        options.push({
                            id: guru.id_personil,
                            text: `${guru.gelardepan ? guru.gelardepan + ' ' : ''}${guru.namalengkap}${guru.gelarbelakang ? ', ' + guru.gelarbelakang : ''}`
                        });
                    });

                    // Masukkan data ke dalam dropdown
                    $(".list-gurumapel").select2({
                        data: options,
                        placeholder: "Pilih Guru",
                    });

                    // Tampilkan dropdown setelah data selesai dimuat
                    $(".loading-message").hide();
                    $(".list-gurumapel-wrapper").fadeIn();
                },
                error: function(error) {
                    console.error('Error fetching data:', error);

                    // Tampilkan pesan error dan sembunyikan dropdown
                    $(".loading-message").text("Gagal memuat data.");
                    $(".list-gurumapel-wrapper").hide();
                }
            });

            // Inisialisasi Select2 untuk Rombel
            $(".list-rombel").select2({
                placeholder: "Pilih Rombongan Belajar",
            });

            // Simulasi Memuat Data untuk Rombel
            $.ajax({
                url: '/kurikulum/dokumenguru/get-rombel',
                method: 'GET',
                beforeSend: function() {
                    // Pastikan dropdown tersembunyi saat data belum siap
                    $(".list-rombel-wrapper").hide();
                    $(".loading-message").show();
                },
                success: function(data) {
                    // Clear existing options
                    $(".list-rombel").empty();

                    // Add default option
                    $(".list-rombel").append(
                        $("<option>", {
                            value: "All",
                            text: "Pilih Rombel"
                        })
                    );

                    // Loop through grouped data
                    $.each(data, function(id_kk, rombels) {
                        const groupLabel = rombels[0]?.nama_kk || 'Unknown';

                        // Create optgroup
                        const optgroup = $("<optgroup>", {
                            label: groupLabel
                        });

                        // Add options to the optgroup
                        rombels.forEach(function(rombel) {
                            optgroup.append(
                                $("<option>", {
                                    value: rombel.kode_rombel,
                                    text: rombel.rombel
                                })
                            );
                        });

                        // Append optgroup to the select
                        $(".list-rombel").append(optgroup);
                    });

                    // Tampilkan dropdown setelah data selesai dimuat
                    $(".loading-message").hide();
                    $(".list-rombel-wrapper").fadeIn();
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                    $(".loading-message").text('Gagal memuat data.');
                }
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
