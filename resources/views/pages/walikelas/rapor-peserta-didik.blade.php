@extends('layouts.master')
@section('title')
    @lang('translation.rapor-peserta-didik')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.walikelas')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header align-items-xl-center d-xl-flex">
                    <p class="text-muted flex-grow-1 mb-xl-0">
                        Rombel : {{ $waliKelas->rombel }} <br>
                        Wali Kelas : {{ $personil->gelardepan }} {{ $personil->namalengkap }}
                        {{ $personil->gelarbelakang }}
                    </p>
                    <div class="flex-shrink-0">
                        <ul class="nav nav-pills card-header-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#designers" role="tab">
                                    Rapor
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#developers" role="tab">
                                    Data Pengajar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#managers" role="tab">
                                    Ranking Kelas
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane" id="developers" role="tabpanel">
                            <table class="table " style="no border">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Nama Pengajar</th>
                                        <th>KKM</th>
                                        <th>Nilai Formatif</th>
                                        <th>Nilai Sumatif</th>
                                        <th>Nilai Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kbmData as $index => $kbm)
                                        <tr>
                                            <td class='text-center'>{{ $index + 1 }}.</td>
                                            <td>{{ $kbm->mata_pelajaran }}</td>
                                            <td>
                                                @if ($kbm->id_personil)
                                                    @php
                                                        // Ambil data pengajar
                                                        $pengajar = DB::table('personil_sekolahs')
                                                            ->where('id_personil', $kbm->id_personil)
                                                            ->first();
                                                    @endphp
                                                    @if ($pengajar)
                                                        {{ $pengajar->gelardepan }} <span
                                                            class="text-uppercase">{{ $pengajar->namalengkap }}
                                                        </span>
                                                        {{ $pengajar->gelarbelakang }}<br>
                                                        @if (!empty($pengajar->nip))
                                                            NIP. {{ $pengajar->nip }}
                                                        @else
                                                            NIP. -
                                                        @endif
                                                    @else
                                                        Tidak ada pengajar
                                                    @endif
                                                @else
                                                    Tidak ada pengajar
                                                @endif
                                            </td>
                                            <td class='text-center'>{{ $kbm->kkm }}</td>
                                            <td>
                                                @php
                                                    $cekFormatif = DB::table('nilai_formatif')
                                                        ->where('tahunajaran', $kbm->tahunajaran)
                                                        ->where('ganjilgenap', $kbm->ganjilgenap)
                                                        ->where('semester', $kbm->semester)
                                                        ->where('tingkat', $kbm->tingkat)
                                                        ->where('kode_rombel', $kbm->kode_rombel)
                                                        ->where('kel_mapel', $kbm->kel_mapel)
                                                        ->where('id_personil', $kbm->id_personil)
                                                        ->count();
                                                    $rerataFormatif = DB::table('nilai_formatif')
                                                        ->where('tahunajaran', $kbm->tahunajaran)
                                                        ->where('ganjilgenap', $kbm->ganjilgenap)
                                                        ->where('semester', $kbm->semester)
                                                        ->where('tingkat', $kbm->tingkat)
                                                        ->where('kode_rombel', $kbm->kode_rombel)
                                                        ->where('kel_mapel', $kbm->kel_mapel)
                                                        ->where('id_personil', $kbm->id_personil)
                                                        ->avg('rerata_formatif');
                                                @endphp
                                                @if ($cekFormatif)
                                                    Formatif : <i class="bx bx-message-square-check fs-3 text-info"></i>
                                                    <p class="mb-0">Jumlah Siswa: {{ $cekFormatif }}</p>
                                                    <p class="mb-0">Rata-rata:
                                                        <strong>{{ number_format($rerataFormatif, 2) }}</strong>
                                                    </p>
                                                @else
                                                    <i class="bx bx-message-square-x fs-3 text-danger"></i>
                                                    <p class="mb-0 text-danger">Data tidak ditemukan.</p>
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $cekSumatif = DB::table('nilai_sumatif')
                                                        ->where('tahunajaran', $kbm->tahunajaran)
                                                        ->where('ganjilgenap', $kbm->ganjilgenap)
                                                        ->where('semester', $kbm->semester)
                                                        ->where('tingkat', $kbm->tingkat)
                                                        ->where('kode_rombel', $kbm->kode_rombel)
                                                        ->where('kel_mapel', $kbm->kel_mapel)
                                                        ->where('id_personil', $kbm->id_personil)
                                                        ->count();
                                                    $rerataSumatif = DB::table('nilai_sumatif')
                                                        ->where('tahunajaran', $kbm->tahunajaran)
                                                        ->where('ganjilgenap', $kbm->ganjilgenap)
                                                        ->where('semester', $kbm->semester)
                                                        ->where('tingkat', $kbm->tingkat)
                                                        ->where('kode_rombel', $kbm->kode_rombel)
                                                        ->where('kel_mapel', $kbm->kel_mapel)
                                                        ->where('id_personil', $kbm->id_personil)
                                                        ->avg('rerata_sumatif');
                                                @endphp
                                                @if ($cekSumatif)
                                                    Sumatif : <i class="bx bx-message-square-check fs-3 text-info"></i>
                                                    <p class="mb-0">Jumlah Siswa: {{ $cekSumatif }}</p>
                                                    <p class="mb-0">Rata-rata:
                                                        <strong>{{ number_format($rerataSumatif, 2) }}</strong>
                                                    </p>
                                                @else
                                                    <i class="bx bx-message-square-x fs-3 text-danger"></i>
                                                    <p class="mb-0 text-danger">Data tidak ditemukan.</p>
                                                @endif
                                            </td>
                                            <td class='text-center'>
                                                {{ number_format((number_format($rerataFormatif, 2) + number_format($rerataSumatif, 2)) / 2, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($kbmData->isEmpty())
                                        <tr>
                                            <td colspan="4">Tidak ada data KBM per Rombel.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane active" id="designers" role="tabpanel">
                            <div class="row">
                                <!-- Detail Siswa -->
                                <div class="col-xl-9 col-lg-8">
                                    <div class="card">
                                        <div class="card-body" id="siswa-detail">
                                            <p>Klik nama siswa untuk melihat detail.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Daftar Siswa -->
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex border-bottom-dashed">
                                            <h4 class="card-title mb-0 flex-grow-1">Daftar Siswa</h4>
                                            <div class="flex-shrink-0">{{ $waliKelas->rombel }}</div>
                                        </div>
                                        <div class="card-body">
                                            <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                                                <div class="vstack gap-3">
                                                    @foreach ($siswaData as $index => $siswa)
                                                        <div class="row align-items-center g-3">
                                                            <div class="col-auto">
                                                                <div
                                                                    class="avatar-sm p-1 py-2 h-auto bg-info-subtle rounded-3 pilih-siswa">
                                                                    <div class="text-center">
                                                                        <h5 class="mb-0">{{ $index + 1 }}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h5 class="text-muted mt-0 mb-1 fs-13">{{ $siswa->nis }}
                                                                </h5>
                                                                <a href="#" class="text-reset fs-14 mb-0 detail-link"
                                                                    data-nis="{{ $siswa->nis }}">
                                                                    {{ $siswa->nama_lengkap }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- TAB RANKING --}}
                        <div class="tab-pane" id="managers" role="tabpanel">
                            <div class="col-lg-12">
                                <div class="gap-2 hstack justify-content-end mb-4">
                                    <a href="{{ route('walikelas.downloadrankingsiswa') }}"
                                        class="btn btn-soft-info btn-sm">Download
                                        Ranking</a>
                                </div>
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>NIS</th>
                                        <th>Nama Lengkap</th>
                                        <th>Rata-Rata</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($nilaiRataSiswa as $key => $nilai)
                                        <tr>
                                            <td class='text-center'>{{ $key + 1 }}.</td>
                                            <td class='text-center'>{{ $nilai->nis }}</td>
                                            <td>{{ $nilai->nama_lengkap }}</td>
                                            <td class='text-center'>{{ $nilai->nil_rata_siswa }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).on('click', '.detail-link', function(e) {
            e.preventDefault(); // Mencegah reload halaman
            var nis = $(this).data('nis');

            // Ubah background elemen yang dipilih
            $('.pilih-siswa').removeClass('bg-danger-subtle').addClass('bg-info-subtle'); // Reset semua
            $(this).closest('.row').find('.pilih-siswa').removeClass('bg-info-subtle').addClass(
                'bg-danger-subtle'); // Highlight yang dipilih

            // AJAX request
            $.ajax({
                url: "/walikelas/rapor-peserta-didik/" + nis,
                method: "GET",
                success: function(response) {
                    $('#siswa-detail').html(response); // Render detail siswa
                },
                error: function(xhr) {
                    $('#siswa-detail').html(
                        '<p>Data siswa tidak ditemukan.</p>'); // Tampilkan pesan error
                }
            });
        });
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
