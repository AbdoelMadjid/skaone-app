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
                            {{ $pengajar->gelardepan }}
                            <span class="text-uppercase">{{ $pengajar->namalengkap }} </span>
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
