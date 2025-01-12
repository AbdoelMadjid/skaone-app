@extends('layouts.master')
@section('title')
    @lang('translation.kunci-data-kbm')
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
            @lang('translation.data-kbm')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-2 col-lg-3">
            <!-- Rounded Ribbon -->
            <div class="card ribbon-box border shadow-none mb-lg-0">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape">Filter</div>
                    <div class="ribbon-content mt-5 text-muted">
                        <form action="{{ route('kurikulum.datakbm.kunci-data-kbm.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_personil" value="{{ $personal_id }}">

                            <div class="col-md-12">
                                <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions"
                                    value="{{ old('tahunajaran', isset($dataPilCR) ? $dataPilCR->tahunajaran : $tahunajaran) }}"
                                    id="tahun_ajaran" />
                            </div>

                            <div class="col-md-12">
                                <x-form.select name="ganjilgenap" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']"
                                    value="{{ old('ganjilgenap', isset($dataPilCR) ? $dataPilCR->ganjilgenap : $ganjilgenap) }}"
                                    label="Semester" id="ganjilgenap" />
                            </div>

                            {{-- Tambahkan tombol jika dataPilCR tidak ada --}}
                            @if (!$dataPilCR)
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-10 col-lg-9">
            <div>
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <div>
                                    <h5 class="card-title mb-0">@lang('translation.tables') @lang('translation.kbm-per-rombel')</h5>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-4">
                                <div>
                                    Tahun Ajaran:
                                    {{ isset($dataPilCR) ? $dataPilCR->tahunajaran : $tahunajaran }}
                                </div>

                                <div>
                                    Semester:
                                    {{ isset($dataPilCR) ? $dataPilCR->ganjilgenap : $ganjilgenap }}
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! $dataTable->table([
                            'class' => 'table table-striped hover',
                            'style' => 'width:100%',
                        ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        const datatable = 'kuncidatakbm-table';

        $(document).on('change', '.terpilih-checkbox', function() {
            const checkbox = $(this);
            const isChecked = checkbox.is(':checked');

            // Ambil data dari atribut checkbox
            const data = {
                tahunajaran: checkbox.data('tahunajaran'),
                ganjilgenap: checkbox.data('ganjilgenap'),
                semester: checkbox.data('semester'),
                kode_kk: checkbox.data('kode_kk'),
                tingkat: checkbox.data('tingkat'),
                kode_rombel: checkbox.data('kode_rombel'),
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF token Laravel
            };

            // Kirim data ke server
            $.ajax({
                url: '/kurikulum/datakbm/update-kunci-data',
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        $('#kuncidatakbm-table').DataTable().ajax.reload(null, false);
                        showToast('success', 'Data berhasil diperbarui');
                    } else {
                        showToast('error', 'Terjadi kesalahan: ' + response.message);
                    }
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat mengirim data ke server.');
                }
            });
        });

        // Inisialisasi DataTable
        $(document).ready(function() {
            $('#' + datatable).DataTable();

            handleDataTableEvents(datatable);
            handleAction(datatable)
            handleDelete(datatable)
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
