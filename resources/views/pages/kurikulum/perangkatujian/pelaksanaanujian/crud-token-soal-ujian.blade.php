@extends('layouts.master')
@section('title')
    @lang('translation.token-soal-ujian')
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
            @lang('translation.pelaksanaan-ujian')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0 me-2">
                    <x-btn-action label="Input Massal" icon="ri-checkbox-multiple-fill" id="btnTambahTokenMassal" />
                </div>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('kurikulum.perangkatujian.pelaksanaan-ujian.index') }}" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-token-ujian-tambah-massal')
@endsection
@section('script')
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
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
