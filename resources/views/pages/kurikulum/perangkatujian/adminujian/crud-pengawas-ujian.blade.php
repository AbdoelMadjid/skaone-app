@extends('layouts.master')
@section('title')
    @lang('translation.pengawas-ujian')
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
                    <h5 class="card-title mb-0 flex-grow-1">Pengawas Ujian</h5>
                    <div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-soft-primary dropdown-toggle" data-bs-toggle="dropdown">
                                Tambah Jadwal
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    @can('create kurikulum/perangkatujian/administrasi-ujian/pengawas-ujian')
                                        <a class="dropdown-item action"
                                            href="{{ route('kurikulum.perangkatujian.administrasi-ujian.pengawas-ujian.create') }}">Tambah</a>
                                    @endcan
                                </li>
                                {{-- <li><a href="#" class="dropdown-item" id="btnTambahSatuan">Tambah Satuan</a></li> --}}
                                <li><a href="#" class="dropdown-item" id="btnTambahMassal">Input Massal</a></li>
                            </ul>
                        </div>

                        <a class="btn btn-soft-danger"
                            href="{{ route('kurikulum.perangkatujian.administrasi-ujian.index') }}">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#JadwalMengawas" role="tab"
                                    aria-selected="true">
                                    <i class="ri-home-4-line text-muted align-bottom me-1"></i> Jadwal Mengawas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#DaftarPengawas" role="tab"
                                    aria-selected="false">
                                    <i class="mdi mdi-account-circle text-muted align-bottom me-1"></i> Daftar Pengawas
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="JadwalMengawas" role="tabpanel">
                                {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                            </div>
                            <div class="tab-pane" id="DaftarPengawas" role="tabpanel">
                                <div class="row g-3">
                                    <div class="col-lg">

                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-auto">
                                        Kode Ujian :
                                        <div class="mb-3 d-flex align-items-center gap-2">
                                            <span class="fw-semibold text-primary"
                                                id="kode_ujian">{{ $identitasUjian?->kode_ujian }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto">
                                        <div class="mb-3 d-flex align-items-center gap-2">
                                            <button type="button" class="btn btn-soft-primary" id="btn-tambah-pengawas">
                                                Tambah Pengawas Ujian
                                                <i class="ri-add-line align-bottom"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <h5 class="mt-4">Daftar Pengawas Ujian</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kode Pengawas</th>
                                                <th>NIP</th>
                                                <th>Nama Lengkap</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($daftarPengawas as $pengawas)
                                                <tr>
                                                    <td class="text-center">{{ $pengawas->kode_pengawas }}</td>
                                                    <td>{{ $pengawas->nip }}</td>
                                                    <td>{{ $pengawas->nama_lengkap }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">Belum ada pengawas ditambahkan.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div><!--end tab-content-->
                    </div><!--end card-body-->

                </div>
            </div>
        </div>
        <!--end col-->
    </div>

    <div class="modal fade" id="modal-pengawas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <form action="{{ route('kurikulum.perangkatujian.simpan-daftar-pengawas-massal') }}" method="POST">
                @csrf
                <div class="modal-content" id="modal-pengawas-content">
                    <!-- Isi dimuat oleh AJAX -->
                </div>
            </form>
        </div>
    </div>
    @include('pages.kurikulum.perangkatujian.adminujian.crud-pengawas-ujian-jadwal-massal')
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
        const datatable = 'pengawasujian-table';

        $(document).ready(function() {
            $('#btn-tambah-pengawas').click(function() {
                $.ajax({
                    url: "{{ route('kurikulum.perangkatujian.daftar-pengawas-ujian') }}",
                    type: 'GET',
                    success: function(response) {
                        $('#modal-pengawas-content').html(response);
                        $('#modal-pengawas').modal('show');
                    },
                    error: function() {
                        alert('Gagal memuat form pengawas.');
                    }
                });
            });

            // Buka modal
            $('#btnTambahMassal').click(function() {
                $('#massal_tanggal_ujian').val('');
                $('#massal_jml_sesi').val('');
                $('#massal_table_wrap').html('');
                $('#modalMassal').modal('show');
            });

            $('#massal_tanggal_ujian, #massal_jml_sesi').change(function() {
                let tanggal = $('#massal_tanggal_ujian').val();
                let jmlSesi = $('#massal_jml_sesi').val();

                if (tanggal && jmlSesi) {
                    $.ajax({
                        url: '{{ route('kurikulum.perangkatujian.jadwal-massal-table') }}',
                        method: 'GET',
                        data: {
                            tanggal: tanggal,
                            sesi: jmlSesi
                        },
                        success: function(res) {
                            $('#massal_table_wrap').html(res);
                        },
                        error: function() {
                            $('#massal_table_wrap').html(
                                '<div class="alert alert-danger">Gagal memuat tabel.</div>');
                        }
                    });
                } else {
                    $('#massal_table_wrap').html('');
                }
            });

            $('#formMassal').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('kurikulum.perangkatujian.jadwal-massal-simpan') }}', // ganti dengan route Anda
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(res) {
                        showToast('success', 'Data berhasil disimpan');
                        $('#modalMassal').modal('hide');
                        $('#pengawasujian-table').DataTable().ajax.reload(null, false);
                        // refresh datatable atau halaman jika perlu
                    },
                    error: function(xhr) {
                        showToast('error', 'Terjadi kesalahan saat menyimpan data.');
                        console.log(xhr.responseText);
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
