{{-- <div class="d-flex justify-content-sm-end">
    <div class="mb-3">
        <button class="btn btn-sm btn-soft-primary" id="kembali-daftar-siswa">
            <i class="ri-arrow-left-line"></i> Kembali ke Daftar Siswa
        </button>
    </div>
</div> --}}

@foreach ($data as $tingkat => $mapelTingkat)
    <h5 class="mt-3">Tingkat {{ $tingkat }} Tahun Ajaran {{ $tahunAjarans[$tingkat] ?? '-' }}</h5>
    <hr>
    <x-info-row label="Nama Lengkap" content="{{ $siswa->nama_lengkap ?? '-' }}" icon-color="text-primary"
        label-col="col-sm-2" content-col="col-sm-10" />
    <x-info-row label="NIS" content="{{ $siswa->nis ?? '-' }}" icon-color="text-primary" label-col="col-sm-2"
        content-col="col-sm-10" />
    @php
        // Ambil salah satu entri dari semester ganjil atau genap
        $sampleMapel = $mapelTingkat['ganjil']->first() ?? $mapelTingkat['genap']->first();
    @endphp

    @if ($sampleMapel)
        <x-info-row label="Kode Rombel" content="{{ $sampleMapel->kode_rombel }}" icon-color="text-primary"
            label-col="col-sm-2" content-col="col-sm-10" />
        <x-info-row label="Rombel" content="{{ $sampleMapel->rombel }}" icon-color="text-primary" label-col="col-sm-2"
            content-col="col-sm-10" />
        <hr>
    @endif

    @foreach (['ganjil' => 'Ganjil', 'genap' => 'Genap'] as $key => $label)
        <h6 class="mt-2">Semester {{ $label }}</h6>
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    {{-- <th>Kode Rombel</th>
                    <th>Rombel</th> --}}
                    {{-- <th>Kel. Mapel</th>
                    <th>Kode Mapel</th> --}}
                    <th class="text-center align-middle">Mata Pelajaran</th>
                    <th class="text-center align-middle">KKM</th>
                    <th class="text-center align-middle">Jml TP</th>
                    <th class="text-center align-middle">Nilai Formatif</th>
                    <th class="text-center align-middle">Rerata Formatif</th>
                    <th class="text-center align-middle">Nilai Sumatif</th>
                    <th class="text-center align-middle">Rerata Sumatif</th>
                    <th class="text-center align-middle">Nilai Akhir</th>
                    <th class="text-center align-middle">Cetak</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mapelTingkat[$key] as $mapel)
                    <tr>
                        {{-- <td>{{ $mapel->kode_rombel }}</td>
                        <td>{{ $mapel->rombel }}</td> --}}
                        {{-- <td>{{ $mapel->kel_mapel }}</td>
                        <td>{{ $mapel->kode_mapel }}</td> --}}
                        <td>
                            {{ $mapel->mata_pelajaran }}<br>
                            <small class="text-muted">{{ $mapel->personil_info ?? '-' }}</small>
                        </td>
                        <td class="text-center">{{ $mapel->kkm }}</td>
                        <td class="text-center">{{ $mapel->jumlah_tp }}</td>
                        <td>{!! $mapel->nilai_formatif ?? '-' !!}</td>
                        <td class="text-center">{!! $mapel->rerata_formatif ?? '-' !!}</td>
                        <td>{!! $mapel->nilai_sumatif ?? '-' !!}</td>
                        <td class="text-center">{!! $mapel->rerata_sumatif ?? '-' !!}</td>
                        <td class="text-center">{!! $mapel->nilai_akhir ?? '-' !!}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-soft-primary cetak-remedial">
                                <i class="ri-printer-line"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endforeach
@endforeach
