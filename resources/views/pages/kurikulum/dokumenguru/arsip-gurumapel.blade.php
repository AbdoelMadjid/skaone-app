@extends('layouts.master')
@section('title')
    @lang('translation.arsip-guru-mata-pelajaran')
@endsection
@section('css')
    {{--  --}}
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    @if ($personal_id == 'Pgw_0016')
                        <x-btn-action label="Tambah" icon="ri-admin-fill" data-bs-toggle="modal"
                            data-bs-target="#tambahPilihArsipGuru" />
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <form id="pilihgurumapel">
                <div class="row g-3">
                    <div class="col-lg">
                    </div>
                    <div class="col-lg-auto">
                        <input type="hidden" name="id_personil" id="id_personil" value="{{ $personal_id }}">
                        <select class="form-select form-select-sm" name="tahunajaran" id="tahunajaran" required>
                            <option value="">Pilih Tahun Ajaran</option>
                            @foreach ($tahunAjaran as $tahunajaran => $thajar)
                                <option value="{{ $tahunajaran }}"
                                    {{ $tahunajaran == $selectedTahunajaran ? 'selected' : '' }}>
                                    {{ $thajar }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-auto">
                        <select class="form-select form-select-sm" name="ganjilgenap" id="ganjilgenap" required>
                            <option value="">Pilih Semester</option>
                            <option value="Ganjil" {{ $selectedSemester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="Genap" {{ $selectedSemester == 'Genap' ? 'selected' : '' }}>Genap</option>
                        </select>
                    </div>
                    <div class="col-lg-auto">
                        <select style="min-width: 250px;" class="form-select form-select-sm" name="id_guru" id="id_guru"
                            required>
                            <option value="">Pilih Guru Mata Pelajaran</option>
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
                    </div>
                    <div class="col-lg-auto me-3">
                        <button type="submit" class="btn btn-sm btn-soft-primary btn-label waves-effect waves-light"> <i
                                class="ri-computer-fill label-icon align-middle fs-16 me-2"></i>Tapilkan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.kurikulum.dokumenguru.arsip-gurumapel-tambah-form')
    @include('pages.kurikulum.dokumenguru.formatif-upload-nilai')
    @include('pages.kurikulum.dokumenguru.sumatif-upload-nilai')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'arsipngajar-table';
        let autoChanging = false;

        $(document).ready(function() {
            const table = $("#arsipngajar-table").DataTable();

            $('#id_guru').select2({
                width: "resolve",
                //theme: "classic",
            });

            // 🔁 Update dropdown guru setiap tahunajaran/semester berubah
            $('#tahunajaran, #ganjilgenap').on('change', function() {
                updateGuruDropdown();
            });

            // Submit form
            $('#pilihgurumapel').on('submit', function(e) {
                e.preventDefault();

                const formData = {
                    _token: '{{ csrf_token() }}',
                    tahunajaran: $('#tahunajaran').val(),
                    ganjilgenap: $('#ganjilgenap').val(),
                    id_guru: $('#id_guru').val()
                };

                // Validasi
                if (!formData.tahunajaran || !formData.ganjilgenap || !formData.id_guru) {
                    showToast('error', 'Lengkapi semua pilihan terlebih dahulu');
                    return;
                }

                $.ajax({
                    url: '{{ route('kurikulum.dokumenguru.simpanpilihan') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.message) {
                            showToast('success', response.message);
                        }

                        $('#arsipngajar-table').DataTable().ajax.reload();
                    },
                    error: function() {
                        showToast('error', 'Gagal menyimpan pilihan');
                    }
                });
            });

            function updateGuruDropdown() {
                const tahunajaran = $('#tahunajaran').val();
                const ganjilgenap = $('#ganjilgenap').val();
                const guruSelect = $('#id_guru');

                // 💡 Kosongkan dulu isi select2 dan tampilkan placeholder
                guruSelect.empty().append('<option value="">Pilih Guru Mata Pelajaran</option>').val(null).trigger(
                    'change');

                if (tahunajaran && ganjilgenap) {
                    $.ajax({
                        url: '{{ route('kurikulum.dokumenguru.getguru') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            tahunajaran,
                            ganjilgenap
                        },
                        success: function(response) {
                            autoChanging = true;

                            // Tambahkan opsi baru jika ada
                            if (response.options && response.options.length > 0) {
                                response.options.forEach(function(option) {
                                    guruSelect.append(new Option(option.text, option.id));
                                });
                            }

                            guruSelect.trigger('change');
                            autoChanging = false;
                        }
                    });
                }
            }
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
