@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-per-guru')
@endsection
@section('css')
    <style>
        .no-click {
            pointer-events: none;
            cursor: not-allowed;
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
            <ul class="nav nav-tabs mb-3" id="hariTab" role="tablist">
                @foreach ($semuaHari as $index => $hari)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if ($index == 0) active @endif"
                            id="{{ $hari }}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{ $hari }}"
                            type="button" role="tab">
                            {{ $hari }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach ($semuaHari as $index => $hari)
                    <div class="tab-pane fade @if ($index == 0) show active @endif"
                        id="tab-{{ $hari }}" role="tabpanel">
                        @php
                            $jadwalHari = $grouped[$hari] ?? collect();
                            $jamKe = $jadwalHari->pluck('jam_ke')->unique()->sort()->values();
                            $guruIds = $jadwalHari->pluck('id_personil')->unique()->values();
                            $guruMap = $jadwalHari->pluck('personil', 'id_personil');
                        @endphp

                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Guru</th>
                                        @foreach ($jamKe as $jam)
                                            <th>Jam {{ $jam }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guruIds as $gid)
                                        <tr>
                                            <td>{{ $guruMap[$gid]->namalengkap ?? 'N/A' }}</td>
                                            @foreach ($jamKe as $jam)
                                                @php
                                                    $match = $jadwalHari->firstWhere(
                                                        fn($j) => $j->jam_ke == $jam && $j->id_personil == $gid,
                                                    );
                                                @endphp
                                                <td>{{ $match->kode_rombel ?? '-' }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
