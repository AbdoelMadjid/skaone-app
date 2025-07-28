@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-mingguan')
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
            @lang('translation.data-kbm')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('kurikulum.datakbm.jadwal-mingguan.index') }}" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            @php
                $kodeRombel = '202541110-10RPL1'; // Ganti sesuai kebutuhan atau buat dinamis
                $jadwal = App\Models\Kurikulum\DataKBM\JadwalMingguan::where('kode_rombel', $kodeRombel)->get();

                $grid = [];
                foreach ($jadwal as $item) {
                    $guru =
                        App\Models\ManajemenSekolah\PersonilSekolah::where('id_personil', $item->id_personil)->value(
                            'namalengkap',
                        ) ?? '-';

                    $namaMapel =
                        App\Models\Kurikulum\DataKBM\KbmPerRombel::where(
                            'kode_mapel_rombel',
                            $item->mata_pelajaran,
                        )->value('mata_pelajaran') ?? '-';

                    $grid[$item->jam_ke][$item->hari] = [
                        'mapel' => $namaMapel,
                        'guru' => $guru,
                    ];
                }

                $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                $jamKeList = range(1, 13); // Atur sesuai jumlah jam maksimal
            @endphp

            <table class="table table-bordered table-sm text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Jam ke</th>
                        @foreach ($hariList as $hari)
                            <th>{{ $hari }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jamKeList as $jam)
                        <tr>
                            <td><strong>{{ $jam }}</strong></td>
                            @foreach ($hariList as $hari)
                                <td>
                                    @if (isset($grid[$jam][$hari]))
                                        <div class="fw-semibold">{{ $grid[$jam][$hari]['mapel'] }}</div>
                                        <div class="text-muted fs-14">{{ $grid[$jam][$hari]['guru'] }}</div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
