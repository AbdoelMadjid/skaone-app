@extends('layouts.master')
@section('title')
    @lang('translation.arsip-guru-mata-pelajaran')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        /* Untuk hasil pilihan di Select2 agar rata kiri */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            text-align: left !important;
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.dokumen-guru')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xxl-9">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
                    <div>

                    </div>
                </div>
                <div class="card-body p-1">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <div class="col-xxl-3">
            <div class="card d-lg-flex gap-1 mx-n1 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">Pilih Data</h5>
                    <div>
                        @if ($personal_id == 'Pgw_0016')
                            <button type="button" class="btn btn-soft-primary btn-sm w-100" data-bs-toggle="modal"
                                data-bs-target="#tambahPilihArsipGuru"><i
                                    class="ri-file-download-line align-bottom me-1"></i>
                                Tambah</button>
                        @endif
                    </div>
                </div>
                <div class="card-body text-center">
                    <form>
                        <input type="hidden" name="id_personil" id="id_personil" value="{{ $personal_id }}">
                        <select class="form-control mb-3 w-100" name="tahunajaran" id="tahunajaran" required>
                            <option value="">Pilih TA</option>
                            @foreach ($tahunAjaran as $tahunajaran => $thajar)
                                <option value="{{ $tahunajaran }}"
                                    {{ $tahunajaran == $selectedTahunajaran ? 'selected' : '' }}>
                                    {{ $thajar }}
                                </option>
                            @endforeach
                        </select>

                        <select class="form-control mb-3" name="ganjilgenap" id="ganjilgenap" required>
                            <option value="">Pilih Semester</option>
                            <option value="Ganjil" {{ $selectedSemester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="Genap" {{ $selectedSemester == 'Genap' ? 'selected' : '' }}>Genap</option>
                        </select>

                        <select class="form-control select2 mb-3" name="id_guru" id="id_guru" required>
                            <option value="">Pilih Guru</option>
                            @foreach ($daftarGuru as $guru)
                                @php
                                    $namaLengkap = trim(
                                        "{$guru->gelardepan} {$guru->namalengkap} {$guru->gelarbelakang}",
                                    );
                                @endphp
                                <option value="{{ $guru->id_personil }}"
                                    {{ $guru->id_personil == $selectedGuru ? 'selected' : '' }}>
                                    {{ $namaLengkap }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    @include('pages.kurikulum.dokumenguru.arsip-gurumapel-tambah-form')
    @include('pages.kurikulum.dokumenguru.formatif-upload-nilai')
    @include('pages.kurikulum.dokumenguru.sumatif-upload-nilai')
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- DataTables Buttons --}}
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'arsipngajar-table';

        $(document).ready(function() {

            const table = $("#arsipngajar-table").DataTable();

            $('#id_guru').select2({
                placeholder: "Pilih Guru",
                allowClear: true,
                width: '100%'
            });

            // Reload tabel setiap dropdown filter berubah
            /* $("#tahunajaran, #ganjilgenap, #id_guru").on("change", function() {
                table.ajax.reload();
            }); */

            // Saat tahunajaran berubah
            $('#tahunajaran').on('change', function() {
                const tahunajaran = $(this).val();

                $.ajax({
                    url: '{{ route('kurikulum.dokumenguru.simpanpilihan') }}', // pastikan route ini sesuai
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        tahunajaran: tahunajaran,
                    },
                    success: function(response) {
                        updateGuruDropdown(); // muat ulang dropdown guru
                        $('#arsipngajar-table').DataTable().ajax.reload();

                        // ✅ tampilkan notifikasi dari response
                        if (response.message) {
                            showToast('success', response.message);
                        }
                    }
                });
            });

            // Saat semester berubah
            $('#ganjilgenap').on('change', function() {
                const ganjilgenap = $(this).val();

                $.ajax({
                    url: '{{ route('kurikulum.dokumenguru.simpanpilihan') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ganjilgenap: ganjilgenap,
                    },
                    success: function(response) {
                        updateGuruDropdown(); // muat ulang dropdown guru
                        $('#arsipngajar-table').DataTable().ajax.reload();

                        // ✅ tampilkan notifikasi dari response
                        if (response.message) {
                            showToast('success', response.message);
                        }
                    }
                });
            });

            // Saat guru berubah
            $('#id_guru').on('change', function() {
                if (autoChanging) return; // 🔒 cegah AJAX saat bukan interaksi user

                const id_guru = $(this).val();

                $.ajax({
                    url: '{{ route('kurikulum.dokumenguru.simpanpilihan') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_guru: id_guru
                    },
                    success: function(response) {
                        $('#arsipngajar-table').DataTable().ajax.reload();

                        if (response.message) {
                            showToast('success', response.message);
                        }
                    }
                });
            });


            function updateGuruDropdown() {
                const tahunajaran = $('#tahunajaran').val();
                const ganjilgenap = $('#ganjilgenap').val();

                if (tahunajaran && ganjilgenap) {
                    $.ajax({
                        url: '{{ route('kurikulum.dokumenguru.getguru') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            tahunajaran: tahunajaran,
                            ganjilgenap: ganjilgenap
                        },
                        success: function(response) {
                            const guruSelect = $('#id_guru');
                            autoChanging = true; // ⛳ Mulai perubahan otomatis

                            guruSelect.empty().append('<option value="">Pilih Guru</option>');

                            response.options.forEach(function(option) {
                                guruSelect.append(new Option(option.text, option.id, option
                                    .selected, option.selected));
                            });

                            guruSelect.trigger('change'); // update tampilan select2
                            autoChanging = false; // ✅ Selesai, nonaktifkan flag
                        }
                    });
                }
            }

        });

        /*  handleDataTableEvents(datatable);
         handleAction(datatable)
         handleDelete(datatable) */
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
