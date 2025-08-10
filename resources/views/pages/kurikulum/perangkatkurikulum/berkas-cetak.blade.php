@extends('layouts.master')
@section('title')
    @lang('translation.berkas-cetak')
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
            @lang('translation.perangkat-kurikulum')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-4">
                <div class="card-body p-3">
                    <form method="GET" id="filterForm"
                        action="{{ route('kurikulum.perangkatkurikulum.berkas-cetak.index') }}">
                        <div class="row g-3">
                            <div class="col-lg">
                                <h5><i class="ri-contacts-book-2-line text-muted align-bottom me-1"></i> Berkas Cetak <span
                                        class="d-none d-sm-inline ms-2">Daftar
                                        Hadir dan Nilai</span>
                                </h5>
                                <p>Pilih tahunajaran, kompetensi keahlian, tingkat dan rombel untuk proses cetak.</p>
                            </div>
                            <div class="col-lg-auto">
                                <div class="d-flex align-items-center gap-2">
                                    <select name="tahun_ajaran" id="tahun_ajaran" class="form-select form-select-sm">
                                        <option value="">Pilih Tahun Aajaran</option>
                                        @foreach ($tahunAjaranOptions as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ ($filters['tahun_ajaran'] ?? '') == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <div class="d-flex align-items-center gap-2">
                                    <select name="kode_kk" id="kode_kk" class="form-select form-select-sm">
                                        <option value="">Pilih KK</option>
                                        @foreach ($kompetensiKeahlianOptions as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ ($filters['kode_kk'] ?? '') == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <div class="d-flex align-items-center gap-2">
                                    <select name="tingkat" id="tingkat" class="form-select form-select-sm">
                                        <option value="">Pilih Tingkat</option>
                                        @for ($i = 10; $i <= 13; $i++)
                                            <option value="{{ $i }}"
                                                {{ ($filters['tingkat'] ?? '') == $i ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <div class="d-flex align-items-center gap-2">
                                    <select name="rombel_kode" id="rombel_kode" class="form-select form-select-sm">
                                        <option value="">Pilih Rombel</option>
                                        @foreach ($rombonganBelajarOptions as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ ($filters['rombel_kode'] ?? '') == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <div class="d-flex align-items-center gap-2">
                                    <button class="btn btn-soft-primary btn-sm" type="submit">Tampilkan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (
                !empty($filters['tahun_ajaran']) &&
                    !empty($filters['kode_kk']) &&
                    !empty($filters['tingkat']) &&
                    !empty($filters['rombel_kode']))
                <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                    <div class="card-body">
                        <div>
                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#daftarHadir" role="tab"
                                        aria-selected="false">
                                        <i class="ri-list-unordered text-muted align-bottom me-1"></i> Daftar Hadir
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#daftarNilai" role="tab"
                                        aria-selected="false">
                                        <i class="ri-file-user-line text-muted align-bottom me-1"></i> Daftar Nilai
                                    </a>
                                </li>
                                @if (count($pesertaDidikRombels))
                                    <li class="nav-item ms-auto">
                                        <div class="mb-3 d-flex align-items-center gap-2">
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-soft-primary"
                                                    id="btn-cetak-daftar-hadir">
                                                    Cetak Daftar Hadir
                                                </button>
                                                <button type="button" class="btn btn-soft-primary"
                                                    id="btn-cetak-daftar-nilai">
                                                    Cetak Daftar Nilai
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="tab-content">
                            @if (count($pesertaDidikRombels))
                                <div class="tab-pane active" id="daftarHadir" role="tabpanel">
                                    @include('pages.kurikulum.perangkatkurikulum.daftar-hadir')
                                </div>
                                <div class="tab-pane" id="daftarNilai" role="tabpanel">
                                    @include('pages.kurikulum.perangkatkurikulum.daftar-nilai')
                                </div>
                            @else
                                <div class="tab-pane active" id="daftarHadir" role="tabpanel">
                                    <div class="alert alert-info mt-4">
                                        <i class="ri-information-line me-2"></i> Nama Siswa Rombongan Belajar Belum Ada.
                                    </div>
                                </div>
                                <div class="tab-pane" id="daftarNilai" role="tabpanel">
                                    <div class="alert alert-info mt-4">
                                        <i class="ri-information-line me-2"></i> Nama Siswa Rombongan Belajar Belum Ada.
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/ngeprint.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        function loadRombelOptions() {
            const tahunajaran = $('#tahun_ajaran').val();
            const kode_kk = $('#kode_kk').val();
            const tingkat = $('#tingkat').val();

            if (tahunajaran && kode_kk && tingkat) {
                $.ajax({
                    url: "{{ route('kurikulum.perangkatkurikulum.getrombelbyfilter') }}",
                    data: {
                        tahunajaran: tahunajaran,
                        kode_kk: kode_kk,
                        tingkat: tingkat
                    },
                    success: function(data) {
                        let options = '<option value="">Pilih Rombel</option>';
                        $.each(data, function(kode_rombel, rombel) {
                            options += `<option value="${kode_rombel}">${rombel}</option>`;
                        });
                        $('#rombel_kode').html(options);
                    }
                });
            } else {
                $('#rombel_kode').html('<option value="">Pilih Rombel</option>');
            }
        }

        $('#tahun_ajaran, #kode_kk, #tingkat').on('change', loadRombelOptions);
    </script>
    <script>
        $('#filterForm').on('submit', function(e) {
            const tahunajaran = $('#tahun_ajaran').val();
            const kode_kk = $('#kode_kk').val();
            const tingkat = $('#tingkat').val();
            const rombel = $('#rombel_kode').val();

            if (!tahunajaran || !kode_kk || !tingkat || !rombel) {
                e.preventDefault(); // cegah submit

                showToast('warning', 'Lengkapi semua filter sebelum menampilkan data.');
                return false;
            }
        });
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-cetak-daftar-hadir',
            tableContentId: 'tabel-daftar-hadir',
            title: 'Format Daftar Hadir',
            requiredFields: [{
                    id: 'tahun_ajaran',
                    message: 'Tahun Ajaran wajib dipilih!'
                },
                {
                    id: 'kode_kk',
                    message: 'Kompetensi Keahlian wajib dipilih!'
                },
                {
                    id: 'tingkat',
                    message: 'Tingkat wajib dipilih!'
                },
                {
                    id: 'rombel_kode',
                    message: 'Rombel wajib dipilih!'
                },
            ],
            customStyle: `
                @page { size: A4 landscape; margin: 10mm; }
                body { font-family: 'Times New Roman', serif; font-size: 11px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { border: 1px solid black; }
                th { padding: 4px; text-align: center; }
                h4 { margin: 5px 0; text-align: center; }
                .no-border {border: none; }
                .text-center { text-align: center; }
            `
        });
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-cetak-daftar-nilai',
            tableContentId: 'tabel-daftar-nilai',
            title: 'Format Daftar Nilai',
            requiredFields: [{
                    id: 'tahun_ajaran',
                    message: 'Tahun Ajaran wajib dipilih!'
                },
                {
                    id: 'kode_kk',
                    message: 'Kompetensi Keahlian wajib dipilih!'
                },
                {
                    id: 'tingkat',
                    message: 'Tingkat wajib dipilih!'
                },
                {
                    id: 'rombel_kode',
                    message: 'Rombel wajib dipilih!'
                },
            ],
            customStyle: `
                @page { size: A4 landscape; margin: 10mm; }
                body { font-family: 'Times New Roman', serif; font-size: 11px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { border: 1px solid black; }
                th { padding: 4px; text-align: center; }
                h4 { margin: 5px 0; text-align: center; }
                .no-border {border: none; }
                .text-center { text-align: center; }
            `
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
