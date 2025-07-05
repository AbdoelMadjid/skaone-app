@extends('layouts.master')
@section('title')
    @lang('translation.token-soal-ujian')
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
            @lang('translation.pelaksanaan-ujian')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Token Soal Ujian</h5>
                    <div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-soft-primary btn-sm dropdown-toggle"
                                data-bs-toggle="dropdown">
                                Tambah Token
                            </button>
                            <ul class="dropdown-menu">
                                {{-- <li>
                                    @can('create kurikulum/perangkatujian/pelaksanaan-ujian/token-soal-ujian')
                                        <a class="dropdown-item action"
                                            href="{{ route('kurikulum.perangkatujian.pelaksanaan-ujian.token-soal-ujian.create') }}">Tambah</a>
                                    @endcan
                                </li> --}}
                                <li><a href="#" class="dropdown-item" id="btnTambahTokenMassal">Input Massal</a></li>
                            </ul>
                        </div>

                        <a class="btn btn-soft-danger btn-sm"
                            href="{{ route('kurikulum.perangkatujian.pelaksanaan-ujian.index') }}">Kembali</a>
                    </div>
                </div>
                <div class="card-body p-1">
                    <div id="datatable-wrapper" style="height: calc(100vh - 268px);">
                        {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    @include('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-token-ujian-tambah-massal')
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
        const datatable = 'tokensoalujian-table';

        $(document).ready(function() {
            // Buka modal
            $('#btnTambahTokenMassal').click(function() {
                $('#massal_tanggal_ujian').val('');
                $('#massal_jml_sesi').val('');
                $('#massal_tingkat').val('');
                $('#massal_kode_kk').val('');
                $('#massal_token_wrap').html('');
                $('#modalTokenMassal').modal('show');
            });

            $('#massal_tingkat, #massal_tanggal_ujian, #massal_jam_ke, #massal_kode_kk').on('change', function() {
                let tanggal = $('#massal_tanggal_ujian').val();
                let jam_ke = $('#massal_jam_ke').val();
                let tingkat = $('#massal_tingkat').val();
                let kodeKK = $('#massal_kode_kk').val();

                if (tanggal && jam_ke && tingkat && kodeKK) {
                    $.ajax({
                        url: '{{ route('kurikulum.perangkatujian.cek-jadwal-untuk-token') }}', // Ganti sesuai route-mu
                        method: 'GET',
                        data: {
                            tanggal: tanggal,
                            jam_ke: jam_ke,
                            tingkat: tingkat,
                            kode_kk: kodeKK,
                        },
                        success: function(res) {
                            if (res.success && res.data) {
                                let infoHTML = `
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Tahun Ajaran</label>
                                            <input type="text" name="tahun_ajaran_ditemukan" class="form-control" value="${res.data.tahun_ajaran}" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Kode Ujian</label>
                                            <input type="text" name="kode_ujian_ditemukan" class="form-control" value="${res.data.kode_ujian}" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Mata Pelajaran</label>
                                            <input type="text" name="mata_pelajaran_ditemukan" class="form-control" value="${res.data.mata_pelajaran}" readonly>
                                        </div>
                                    </div>
                                    <input type="hidden" name="kode_ujian" value="${res.data.kode_ujian}">
                                    <input type="hidden" name="mata_pelajaran" value="${res.data.mata_pelajaran}">
                                `;

                                $('#massal_token_wrap').html(infoHTML);

                                // 🔽 Ambil rombel berdasarkan kode_kk & tahun_ajaran
                                $.ajax({
                                    url: '/kurikulum/perangkatujian/get-rombel-by-kk',
                                    method: 'GET',
                                    data: {
                                        id_kk: $('#massal_kode_kk').val(),
                                        tahunajaran: res.data.tahun_ajaran,
                                        tingkat: $('#massal_tingkat').val()
                                    },
                                    success: function(rombels) {
                                        let tableHTML = `
                                            <div class="mt-4">
                                                <h5>Daftar Kelas</h5>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Rombel</th>
                                                            <th>Rombel</th>
                                                            <th>Token</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                        `;

                                        if (rombels.length > 0) {
                                            rombels.forEach((item, index) => {
                                                tableHTML += `
                                                    <tr>
                                                        <td>${index + 1}</td>
                                                        <td>${item.kode_rombel}</td>
                                                        <td>${item.rombel}</td>
                                                        <td>
                                                            <input type="text" name="tokens[${item.kode_rombel}]" class="form-control" placeholder="Isi token">
                                                        </td>
                                                    </tr>
                                                `;
                                            });
                                        } else {
                                            tableHTML += `
                                                <tr>
                                                    <td colspan="4" class="text-center">Tidak ada data rombel</td>
                                                </tr>
                                            `;
                                        }

                                        tableHTML += `
                                                    </tbody>
                                                </table>
                                            </div>
                                        `;

                                        $('#massal_token_wrap').append(tableHTML);
                                    }
                                });

                            } else {
                                $('#massal_token_wrap').html(
                                    '<div class="alert alert-warning">Data tidak ditemukan untuk kombinasi tersebut.</div>'
                                );
                            }
                        },
                        error: function() {
                            $('#massal_token_wrap').html(
                                '<div class="alert alert-danger">Terjadi kesalahan saat mengambil data.</div>'
                            );
                        }
                    });
                } else {
                    $('#massal_token_wrap').html('');
                }
            });


            // Submit form massal
            $('#formTokenSimpanMassal').submit(function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('kurikulum.perangkatujian.simpan-token-massal') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message,
                            });
                            $('#modalTokenMassal').modal('hide');
                            $('#tokensoalujian-table').DataTable().ajax.reload(null, false);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.message || 'Terjadi kesalahan.',
                            });
                        }
                    },
                    error: function(xhr) {
                        let msg = 'Terjadi kesalahan saat menyimpan data.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            msg = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: msg,
                        });
                    }
                });
            });

        });

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
        ScrollDinamicDataTable(datatable, scrollOffsetOverride = 86);
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
