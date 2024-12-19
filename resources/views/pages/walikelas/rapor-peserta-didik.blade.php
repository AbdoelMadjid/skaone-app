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
                                <a class="nav-link active" data-bs-toggle="tab" href="#developers" role="tab">
                                    Data Pengajar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#designers" role="tab">
                                    Rapor
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
                        <div class="tab-pane active" id="developers" role="tabpanel">
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
                        <div class="tab-pane" id="designers" role="tabpanel">

                        </div>
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
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
