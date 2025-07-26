@extends('layouts.master')
@section('title')
    @lang('translation.pengawas-ujian')
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
                    <x-btn-group-dropdown>
                        <x-btn-action label="Tambah Jadwal Massal" icon="ri-checkbox-multiple-fill" id="btnTambahMassal" />
                        <x-btn-tambah can="create kurikulum/perangkatujian/administrasi-ujian/pengawas-ujian"
                            route="kurikulum.perangkatujian.administrasi-ujian.pengawas-ujian.create"
                            label="Tambah Jadwal Ngawas" icon="ri-add-line" />
                    </x-btn-group-dropdown>
                </div>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('kurikulum.perangkatujian.administrasi-ujian.index') }}" />
                </div>
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
            <div class="card-body p-1">
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
                                    <x-btn-action label="Tambah Pengawas" icon="ri-add-fill" id="btn-tambah-pengawas" />
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-4">Daftar Pengawas Ujian</h5>
                        <div id="custom-table-wrapper" class="px-4 mx-n4 mt-n2 mb-0"
                            style="height: calc(100vh - 435px); overflow: hidden;">
                            <div id="custom-scroll-container" style="overflow-y: auto; height: 100%;">
                                <table class="table table-bordered mb-0">
                                    <thead class="table-light position-sticky top-0" style="z-index: 1;">
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
                                                <td colspan="3" class="text-center">Belum ada pengawas
                                                    ditambahkan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--end tab-content-->
            </div><!--end card-body-->

        </div>
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
        ScrollStaticTable('custom-table-wrapper', 'custom-scroll-container', 86);
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
