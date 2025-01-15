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
        </div>

        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Dokumen Siswa</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">

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
    @include('pages.kurikulum.datakbm.kunci-data-kbm-leger-modal')
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

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('dataLegerSiswa');

            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Tombol yang memicu modal
                const kodeRombel = button.getAttribute('data-kode_rombel'); // Ambil data-kode_rombel

                // Perbarui judul modal
                const modalTitle = modal.querySelector('.modal-title');
                modalTitle.textContent = `Leger for Rombel ${kodeRombel}`;

                // Tampilkan status loading
                const modalBody = modal.querySelector('.modal-body');
                modalBody.innerHTML = '<p>Loading data...</p>';

                // Ambil data dari server
                fetch(`/kurikulum/datakbm/get-leger-data/${kodeRombel}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Failed to fetch data');
                        }
                        return response.text(); // Ambil HTML tabel
                    })
                    .then(html => {
                        modalBody.innerHTML = html; // Masukkan HTML ke dalam modal body
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        modalBody.innerHTML =
                            '<p class="text-danger">Failed to load data. Please try again later.</p>';
                    });
            });
        });

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
