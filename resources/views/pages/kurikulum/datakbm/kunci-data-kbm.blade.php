@extends('layouts.master')
@section('title')
    @lang('translation.kunci-data-kbm')
@endsection
@section('css')
    {{-- --}}
    <style>
        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }

        th.vertical-center {
            /* Membuat teks vertikal */
            text-align: center;
            /* Memusatkan teks secara horizontal */
            vertical-align: middle;
            /* Memusatkan konten secara vertikal */
            justify-content: center;
            /* Memusatkan konten secara horizontal */
        }
    </style>
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
                    <h5 class="fs-14 text-end"></h5>
                    <div class="ribbon-content mt-5" id="tomboldokumen">
                        @if ($dataPilCR)
                            <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">Rombongan Belajar</a>

                                <a class="nav-link mb-2" id="v-pills-leger-tab" data-bs-toggle="pill" href="#v-pills-leger"
                                    data-kode-rombel="{{ $dataPilCR->kode_rombel }}" role="tab"
                                    aria-controls="v-pills-leger" aria-selected="false">Nilai Leger Siswa</a>

                                {{--
                                <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                    aria-selected="false">Messages</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                                    role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> --}}
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8">
            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div>
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <div>
                                            <h5 class="card-title mb-0">Rombongan Belajar</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="d-flex flex-wrap align-items-start gap-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-bottom-dashed border-bottom">
                                {!! $dataTable->table([
                                    'class' => 'table table-striped hover',
                                    'style' => 'width:100%',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-leger" role="tabpanel" aria-labelledby="v-pills-leger-tab">
                    {{--  --}}
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="d-flex mb-2">
                        <div class="flex-shrink-0">
                            <img src="http://skaone-apps.test:7777/build/images/small/img-6.jpg" alt=""
                                width="150" class="rounded">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-0">In this image, you can see that the line height has been
                                reduced significantly, and the size was brought up exponentially. Experiment
                                and play around with the fonts that you already have in the software you’re
                                working with reputable font websites.</p>
                        </div>
                    </div>
                    <p class="mb-0">
                        They highly encourage that you use different fonts in one design, but do not
                        over-exaggerate and go overboard This may be the most commonly encountered tip I
                        received from the designers I spoke with.
                    </p>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="d-flex mb-2">
                        <div class="flex-shrink-0">
                            <img src="http://skaone-apps.test:7777/build/images/small/img-7.jpg" alt=""
                                width="150" class="rounded">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-0">When designing, the goal is to draw someone’s attention and
                                portray to them what you’re trying to say. You can make a big statement by
                                using little tricks, like this one. Use contrasting fonts. you can use a
                                bold sanserif font with a cursive.</p>
                        </div>
                    </div>
                    <p class="mb-0">
                        If you’re using multiple elements, make sure that your principal object is larger
                        than the others, as the eye of your viewer will automatically be drawn to the larger
                        of the two objects.
                    </p>
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

                        // Update kode_rombel di tab "Leger"
                        $('#v-pills-leger-tab').attr('data-kode-rombel', kodeRombel);

                    } else {
                        showToast('error', 'Terjadi kesalahan: ' + response.message);
                    }
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat mengirim data ke server.');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var legerTab = document.getElementById('v-pills-leger-tab');
            legerTab.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                var kodeRombel = this.getAttribute('data-kode-rombel');

                // Fetch content via Ajax
                fetch('/kurikulum/datakbm/get-leger-content/' + kodeRombel)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('v-pills-leger').innerHTML = html;
                        // Optionally trigger the tab to show content
                        var tab = new bootstrap.Tab(this);
                        tab.show();
                    });
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
