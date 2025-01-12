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
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Filter</h4>
                    <div class="flex-shrink-0">

                    </div>
                </div><!-- end card header -->
                <div class="card-header">
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
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-9 col-lg-8">
            <div>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all"
                                            role="tab">
                                            Rombongan Belajar
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published"
                                            role="tab">
                                            Leger Nilai
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft"
                                            role="tab">
                                            Draft
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">

                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                <div id="table-product-list-all" class="table-card gridjs-border-none">
                                    {!! $dataTable->table([
                                        'class' => 'table table-striped hover',
                                        'style' => 'width:100%',
                                    ]) !!}
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-published" role="tabpanel">
                                <div id="table-product-list-published" class="table-card gridjs-border-none">
                                    <!-- Rounded Ribbon -->
                                    <div class="card ribbon-box border shadow-none mb-lg-0">
                                        <div class="card-body">
                                            <div class="ribbon ribbon-primary round-shape">Primary</div>
                                            <h5 class="fs-14 text-end">Rounded Ribbon</h5>
                                            <div class="ribbon-content mt-4 text-muted">
                                                <p class="mb-0">Quisque nec turpis at urna dictum luctus. Suspendisse
                                                    convallis dignissim eros at volutpat. In egestas
                                                    mattis dui. Aliquam mattis dictum aliquet. Nulla sapien mauris, eleifend
                                                    et sem ac, commodo dapibus odio.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                <div class="py-4 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                                    </lord-icon>
                                    <h5 class="mt-4">Sorry! No Result Found</h5>
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
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
