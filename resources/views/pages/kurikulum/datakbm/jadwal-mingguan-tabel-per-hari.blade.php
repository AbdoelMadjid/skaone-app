@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-per-guru')
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
                <div class="flex-shrink-0 me-3">
                    <x-btn-group-dropdown>
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperrombel') }}" label="Jadwal Per Rombel"
                            icon="ri-calendar-fill" />
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperguru') }}" label="Jadwal Per Guru"
                            icon="ri-calendar-2-fill" />
                    </x-btn-group-dropdown>
                </div>
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

                        @php
                            $semuaJamKe = range(1, 13); // Tetap 13 kolom Jam Ke
                            $jumlahKelasPerGuru = []; // Simpan jumlah kelas per guru
                        @endphp

                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Guru</th>
                                        @foreach ($semuaJamKe as $jam)
                                            <th width="55">{{ $jam }}</th>
                                        @endforeach
                                        <th width="55">Kelas</th>
                                        <th width="55">Terisi</th> {{-- Kolom baru --}}
                                        <th width="55">Hadir</th> {{-- Tambahan --}}
                                        <th width="55" class="text-center">%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guruIds as $gid)
                                        @php
                                            $jumlahJamTerisi = [];

                                            // Ambil rombel unik yang diajar oleh guru ini
                                            $rombelUnikGuru = $jadwalHari
                                                ->where('id_personil', $gid)
                                                ->pluck('rombonganBelajar.rombel')
                                                ->filter()
                                                ->unique();

                                            $jumlahKelasPerGuru[$gid] = $rombelUnikGuru->count();

                                            // Hitung jumlah jam yang terisi (jam_ke yg ditemukan untuk guru ini)
                                            $jumlahJamTerisi[$gid] = $jadwalHari
                                                ->where('id_personil', $gid)
                                                ->pluck('jam_ke')
                                                ->unique()
                                                ->count();

                                            // Hitung jumlah kehadiran dari data kehadiran yang dimuat
                                            $jmlHadir = $semuaKehadiran
                                                ->where('id_personil', $gid)
                                                ->where('hari', $hari)
                                                ->count();
                                        @endphp
                                        <tr>
                                            <td>{{ $guruMap[$gid]->namalengkap ?? 'N/A' }}</td>
                                            @foreach ($semuaJamKe as $jam)
                                                @php
                                                    $match = $jadwalHari->firstWhere(
                                                        fn($j) => $j->jam_ke == $jam && $j->id_personil == $gid,
                                                    );
                                                @endphp
                                                @php
                                                    $rombel = $match->rombonganBelajar->rombel ?? null;
                                                    $kehadiranAda =
                                                        $rombel &&
                                                        $semuaKehadiran
                                                            ->where('jadwal_mingguan_id', $match->id ?? 0)
                                                            ->where('jam_ke', $jam)
                                                            ->where('hari', $hari)
                                                            ->isNotEmpty();
                                                @endphp
                                                <td class="fs-10 text-center {{ $rombel ? 'cell-kehadiran' : '' }} {{ $kehadiranAda ? 'bg-primary text-white' : '' }}"
                                                    @if ($rombel) data-id-jadwal="{{ $match->id }}"
                                                        data-id-personil="{{ $gid }}"
                                                        data-hari="{{ $hari }}"
                                                        data-jam="{{ $jam }}"
                                                        style="cursor:pointer" @endif>
                                                    {{ $rombel ?? '-' }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">{{ $jumlahKelasPerGuru[$gid] }}</td>
                                            <td class="text-center jumlah-jam-terisi"
                                                data-id="{{ $gid }}-{{ $hari }}">
                                                {{ $jumlahJamTerisi[$gid] }}
                                            </td>
                                            <td class="text-center fw-bold bg-info-subtle jumlah-kehadiran"
                                                data-id="{{ $gid }}-{{ $hari }}">
                                                {{ $jmlHadir }}
                                            </td>
                                            @php
                                                $totalJam = $jumlahJamTerisi[$gid] ?? 0;
                                                $persentase = $totalJam > 0 ? round(($jmlHadir / $totalJam) * 100) : 0;
                                            @endphp
                                            <td class="text-center fw-bold bg-danger-subtle persentase-kehadiran"
                                                data-id="{{ $gid }}-{{ $hari }}">
                                                {{ $persentase }}%
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        @foreach ($semuaJamKe as $jam)
                                            <th class="text-center">
                                                @php
                                                    $rombels = $jadwalHari
                                                        ->where('jam_ke', $jam)
                                                        ->pluck('rombonganBelajar.rombel')
                                                        ->filter()
                                                        ->unique();
                                                @endphp
                                                {{ $rombels->count() }}
                                            </th>
                                        @endforeach
                                        <th class="text-center">
                                            {{ collect($jumlahKelasPerGuru)->sum() }}
                                        </th>
                                        <th class="text-center">
                                            {{ $jadwalHari->count() }}
                                        </th>
                                        <th class="text-center total-kehadiran" data-hari="{{ $hari }}">
                                            {{ $semuaKehadiran->where('hari', $hari)->count() }}
                                        </th>
                                        <th class="text-center total-prosentase" data-hari="{{ $hari }}"
                                            data-total-jadwal="{{ $jadwalHari->count() }}">
                                            @php
                                                $totalJadwal = $jadwalHari->count();
                                                $totalHadir = $semuaKehadiran->where('hari', $hari)->count();
                                                $persen =
                                                    $totalJadwal > 0 ? round(($totalHadir / $totalJadwal) * 100) : 0;
                                            @endphp
                                            {{ $persen }}%
                                        </th>
                                    </tr>
                                </tfoot>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.cell-kehadiran').forEach(function(cell) {
                cell.addEventListener('click', function() {
                    const idJadwal = this.dataset.idJadwal;
                    const idPersonil = this.dataset.idPersonil;
                    const hari = this.dataset.hari;
                    const jam = this.dataset.jam;

                    // Toggle warna dulu (optimis)
                    this.classList.toggle('bg-primary');
                    this.classList.toggle('text-white');

                    fetch("{{ route('kurikulum.datakbm.simpankehadiranguru') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                jadwal_mingguan_id: idJadwal,
                                id_personil: idPersonil,
                                hari: hari,
                                jam_ke: jam
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === 'success') {
                                const jumlahCell = document.querySelector(
                                    `.jumlah-kehadiran[data-id="${idPersonil}-${hari}"]`);
                                let currentValue = parseInt(jumlahCell.textContent);

                                const totalHariCell = document.querySelector(
                                    `.total-kehadiran[data-hari="${hari}"]`);
                                let totalHariValue = parseInt(totalHariCell.textContent);

                                if (data.action === 'created') {
                                    showToast('success', 'Kehadiran sukses disimpan!');
                                    jumlahCell.textContent = currentValue + 1;
                                    totalHariCell.textContent = totalHariValue + 1;

                                    // === UPDATE PERSENTASE ===
                                    const totalJamCell = document.querySelector(
                                        `.jumlah-jam-terisi[data-id="${idPersonil}-${hari}"]`
                                    );
                                    let totalJam = parseInt(totalJamCell.textContent);

                                    let updatedJumlahHadir = currentValue + 1;
                                    let persen = totalJam > 0 ? Math.round((updatedJumlahHadir /
                                        totalJam) * 100) : 0;

                                    const persenCell = document.querySelector(
                                        `.persentase-kehadiran[data-id="${idPersonil}-${hari}"]`
                                    );
                                    if (persenCell) {
                                        persenCell.textContent = `${persen}%`;
                                    }
                                    // tambahkan ini
                                    const totalProsentaseCell = document.querySelector(
                                        `.total-prosentase[data-hari="${hari}"]`);
                                    if (totalProsentaseCell) {
                                        const totalJadwal = parseInt(totalProsentaseCell
                                            .getAttribute('data-total-jadwal'));
                                        const totalHadirValue = parseInt(totalHariCell
                                            .textContent);
                                        const persenTotal = totalJadwal > 0 ? Math.round((
                                            totalHadirValue / totalJadwal) * 100) : 0;
                                        totalProsentaseCell.textContent = `${persenTotal}%`;
                                    }
                                } else if (data.action === 'deleted') {
                                    showToast('success', 'Kehadiran sukses dihapus!');
                                    let newJumlah = currentValue > 0 ? currentValue - 1 : 0;
                                    let newTotalHari = totalHariValue > 0 ? totalHariValue - 1 :
                                        0;

                                    jumlahCell.textContent = newJumlah;
                                    totalHariCell.textContent = newTotalHari;

                                    // === UPDATE PERSENTASE ===
                                    const totalJamCell = document.querySelector(
                                        `.jumlah-jam-terisi[data-id="${idPersonil}-${hari}"]`
                                    );
                                    let totalJam = parseInt(totalJamCell.textContent);

                                    let persen = totalJam > 0 ? Math.round((newJumlah /
                                        totalJam) * 100) : 0;

                                    const persenCell = document.querySelector(
                                        `.persentase-kehadiran[data-id="${idPersonil}-${hari}"]`
                                    );
                                    if (persenCell) {
                                        persenCell.textContent = `${persen}%`;
                                    }
                                    // tambahkan ini
                                    const totalProsentaseCell = document.querySelector(
                                        `.total-prosentase[data-hari="${hari}"]`);
                                    if (totalProsentaseCell) {
                                        const totalJadwal = parseInt(totalProsentaseCell
                                            .getAttribute('data-total-jadwal'));
                                        const totalHadirValue = parseInt(totalHariCell
                                            .textContent);
                                        const persenTotal = totalJadwal > 0 ? Math.round((
                                            totalHadirValue / totalJadwal) * 100) : 0;
                                        totalProsentaseCell.textContent = `${persenTotal}%`;
                                    }
                                }
                            } else {
                                showToast('error', 'Gagal menyimpan kehadiran');
                                target.classList.toggle('bg-primary');
                                target.classList.toggle('text-white');
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            showToast('error', 'Terjadi kesalahan!');
                            target.classList.toggle('bg-primary');
                            target.classList.toggle('text-white');
                        });
                });
            });
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
