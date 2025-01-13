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
        <div class="col-xl-3 col-lg-4">
            <!-- Rounded Ribbon -->
            <div class="card ribbon-box border shadow-none mb-lg-0">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape">Pilih Data</div>
                    <h5 class="fs-14 text-end"></h5>
                    <div class="ribbon-content mt-5">
                        <div class="filter-choices-input">
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
            <!-- Rounded Ribbon -->
            <div class="card ribbon-box border shadow-none mb-lg-0">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape">Dokumen KBM</div>
                    <h5 class="fs-14 text-end">Rounded Ribbon</h5>
                    <div class="ribbon-content mt-4" id="tomboldokumen">
                        @if ($dataPilCR)
                            <div class="d-grid gap-2">
                                <a id="leger-link"
                                    href="/kurikulum/datakbm/export-to-excel-leger?kode_rombel={{ $dataPilCR->kode_rombel }}"
                                    class="btn btn-primary btn-sm">Leger</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8">
            <div>
                <div class="card">
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
                        //location.reload();
                        showToast('success', 'Data berhasil diperbarui');

                        // Perbarui URL pada link yang ada di dalam #tomboldokumen
                        const kodeRombel = data.kode_rombel;
                        // Hanya update link di #tomboldokumen tanpa mempengaruhi link lainnya
                        $('#leger-link').attr('href',
                            `/kurikulum/datakbm/export-to-excel-leger?kode_rombel=${kodeRombel}`);

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

            // Ketika tahunajaran dipilih
            $('#tahun_ajaran').change(function() {
                // Ambil nilai yang dipilih
                var tahunajaran = $(this).val();

                // Kirim request AJAX untuk update tahunajaran di tabel kunci_data_kbm
                $.ajax({
                    url: '{{ route('kurikulum.datakbm.kunci-data-kbm.updateTahunAjaran') }}', // Route untuk update
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token
                        tahunajaran: tahunajaran, // Data yang dikirim
                    },
                    success: function(response) {
                        // Berikan feedback jika update berhasil
                        if (response.success) {
                            $('#kuncidatakbm-table').DataTable().ajax.reload(null, false);
                            showToast('success', 'Tahun Ajaran berhasil diperbarui!');
                        } else {
                            showToast('error',
                                'Terjadi kesalahan saat memperbarui tahun ajaran.');
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Terjadi kesalahan! Silakan coba lagi.');
                    }
                });
            });

            // Ketika ganjilgenap dipilih
            $('#ganjilgenap').change(function() {
                // Ambil nilai yang dipilih
                var ganjilgenap = $(this).val();

                // Kirim request AJAX untuk update ganjilgenap di tabel kunci_data_kbm
                $.ajax({
                    url: '{{ route('kurikulum.datakbm.kunci-data-kbm.updateGanjilGenap') }}', // Route untuk update
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token
                        ganjilgenap: ganjilgenap, // Data yang dikirim
                    },
                    success: function(response) {
                        // Berikan feedback jika update berhasil
                        if (response.success) {
                            $('#kuncidatakbm-table').DataTable().ajax.reload(null, false);
                            showToast('success', 'Semester berhasil diperbarui!');
                        } else {
                            showToast('error', 'Terjadi kesalahan saat memperbarui semester.');
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Terjadi kesalahan! Silakan coba lagi.');
                    }
                });
            });

            handleDataTableEvents(datatable);
            handleAction(datatable)
            handleDelete(datatable)
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
