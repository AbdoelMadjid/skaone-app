@php
    $jamKe = $jadwalHari->pluck('jam_ke')->unique()->sort()->values();
    $guruIds = $jadwalHari->pluck('id_personil')->unique()->values();
    $guruMap = $jadwalHari->pluck('personil', 'id_personil');
    $semuaJamKe = range(1, 13);
    $jumlahKelasPerGuru = [];
@endphp

<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>Nama Guru</th>
                <th>Ket</th>
                @foreach ($semuaJamKe as $jam)
                    <th width="55" class="th-jam" data-jam-ke="{{ $jam }}" style="cursor:pointer;">
                        {{ $jam }}
                    </th>
                @endforeach
                <th width="55">Kelas</th>
                <th width="55">Terisi</th>
                <th width="55">Hadir</th>
                <th width="55" class="text-center">%</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guruIds as $gid)
                @php
                    $jumlahJamTerisiGuru = $jadwalHari->where('id_personil', $gid)->pluck('jam_ke')->unique()->count();

                    $jumlahJamTerisi[$gid] = $jumlahJamTerisiGuru;

                    $rombelUnikGuru = $jadwalHari
                        ->where('id_personil', $gid)
                        ->pluck('rombonganBelajar.rombel')
                        ->filter()
                        ->unique();

                    $jumlahKelasPerGuru[$gid] = $rombelUnikGuru->count();

                    $jmlHadir = $semuaKehadiran->where('id_personil', $gid)->count();
                    $tidakHadir = !$semuaKehadiran->where('id_personil', $gid)->count();
                @endphp
                <tr>
                    <td>
                        {{ $guruMap[$gid]->namalengkap ?? 'N/A' }}<br>
                        @if ($tidakHadir)
                            @if (isset($keteranganTidakHadir[$gid]))
                                <span class="ms-2 text-muted small">
                                    (<span class="text-danger">{{ $keteranganTidakHadir[$gid] }}</span>)
                                </span>
                            @endif
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($tidakHadir)
                            @if (isset($keteranganTidakHadir[$gid]))
                                {{-- Jika sudah ada keterangan, tombol hapus --}}
                                <button type="button"
                                    class="btn btn-sm btn-outline-danger ms-2 btn-hapus-keterangan-tidak-hadir"
                                    data-id-personil="{{ $gid }}"
                                    data-nama-guru="{{ $guruMap[$gid]->namalengkap ?? '' }}"
                                    data-hari="{{ $hari }}">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            @else
                                {{-- Jika belum ada keterangan, tombol tambah --}}
                                <button type="button"
                                    class="btn btn-sm btn-outline-info ms-2 btn-keterangan-tidak-hadir"
                                    data-id-personil="{{ $gid }}"
                                    data-nama-guru="{{ $guruMap[$gid]->namalengkap ?? '' }}"
                                    data-hari="{{ $hari }}" data-bs-toggle="modal"
                                    data-bs-target="#modalKeteranganTidakHadir">
                                    <i class="ri-edit-2-line"></i>
                                </button>
                            @endif
                        @endif
                    </td>
                    @foreach ($semuaJamKe as $jam)
                        @php
                            $match = $jadwalHari->firstWhere(fn($j) => $j->jam_ke == $jam && $j->id_personil == $gid);
                            $rombel = $match->rombonganBelajar->rombel ?? null;
                            $kehadiranAda =
                                $rombel &&
                                $semuaKehadiran
                                    ->where('jadwal_mingguan_id', $match->id ?? 0)
                                    ->where('jam_ke', $jam)
                                    ->isNotEmpty();
                            $isIstirahat = in_array($jam, [6, 10]);

                            $customText = null;
                            if ($hari === 'Senin' && $jam == 1) {
                                $customText = 'Upacara';
                            } elseif ($hari === 'Jumat' && $jam == 1) {
                                $customText = 'Insidentil';
                            }
                        @endphp
                        <td class="fs-10 text-center fw-bold
                            {{ $rombel ? 'cell-kehadiran' : '' }}
                            {{ $kehadiranAda ? 'bg-primary text-white' : '' }}
                            {{ $isIstirahat ? 'bg-danger text-white' : '' }}
                            {{ $customText ? 'bg-info text-white fw-bold' : '' }}
                            {{ (!$rombel || $rombel === '-') && !$kehadiranAda && !$isIstirahat && !$customText ? 'bg-danger-subtle' : '' }}"
                            @if ($rombel && !$isIstirahat && !$customText) data-id-jadwal="{{ $match->id }}"
                                data-id-personil="{{ $gid }}"
                                data-hari="{{ $hari }}"
                                data-jam="{{ $jam }}"
                                style="cursor:pointer" @endif>
                            {{ $customText ?? ($isIstirahat ? 'Istirahat' : $rombel ?? '') }}
                        </td>
                    @endforeach

                    <td class="text-center fw-bold bg-info-subtle">{{ $jumlahKelasPerGuru[$gid] }}</td>
                    <td class="text-center fw-bold bg-info-subtle jumlah-jam-terisi"
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
                        {{ $persentase }} %
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
                <th class="text-center">{{ collect($jumlahKelasPerGuru)->sum() }}</th>
                <th class="text-center jadwal-terisi">{{ $jadwalHari->count() }}</th>
                <th class="text-center total-kehadiran" data-hari="{{ $hari }}">
                    {{ $semuaKehadiran->count() }}
                </th>
                <th class="text-center total-prosentase" data-hari="{{ $hari }}"
                    data-total-jadwal="{{ $jadwalHari->count() }}">
                    @php
                        $totalJadwal = $jadwalHari->count();
                        $totalHadir = $semuaKehadiran->count();
                        $persen = $totalJadwal > 0 ? round(($totalHadir / $totalJadwal) * 100) : 0;
                    @endphp
                    {{ $persen }} %
                </th>
            </tr>
        </tfoot>
    </table>
</div>
