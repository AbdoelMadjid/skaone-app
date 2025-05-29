<style>
    .ttd-container {
        margin-left: 10%;
        width: 90%;
        /* Supaya tidak melewati batas kanan */
    }

    .ttd-wrapper {
        width: 100%;
        margin: 20px auto;
        font-family: "Times New Roman", Times, serif;
        font-size: 12px;
        border-collapse: collapse;
    }

    .ttd-section {
        width: 50%;
        vertical-align: top;
        text-align: left;
        /* Rata kiri */
    }

    .ttd-section td {
        padding: 3px;
    }

    .ttd-spacing {
        height: 45px;
    }

    .relative-wrapper {
        position: relative;
    }

    .ttd-img-kepsek {
        position: absolute;
        top: 20px;
        left: -75px;
        height: 80px;
        z-index: 1;
    }

    .ttd-img-stempel {
        position: absolute;
        top: -5px;
        left: -75px;
        height: 120px;
        z-index: 0;
    }

    @media print {
        .ttd-wrapper {
            page-break-inside: avoid;
        }
    }
</style>
<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <form id="form-pilih-tingkat">
            <div class="row g-3">
                <div class="col-lg">
                    <h3>Pengawas Ujian</h3>
                    <p>Pengawas ujian untuk setiap ruang dan tanggal ujian.</p>
                </div>
                <!--end col-->

                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-soft-primary" id="btn-print-jadwal-mengawas">
                            Cetak Jadwal Pengawas
                        </button>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-soft-primary" id="btn-print-daftar-pengawas">
                            Cetak Daftar Pengawas
                        </button>
                    </div>
                </div>
            </div>
            <!--end row-->
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">Jadwal Mengawas</a>
                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill"
                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">Daftar Pengawas</a>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-10">
                        <div class="tab-content mt-4 mt-md-0" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div id="tabel-jadwal-mengawas">
                                    {{--  <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}"
                alt="Card image cap"><br><br> --}}
                                    <h4 class="text-center">JADWAL PENGAWAS UJIAN</h4>
                                    <h4 class="text-center">{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</h4>
                                    <h4 class="text-center">TAHUN AJARAN {{ $identitasUjian?->tahun_ajaran ?? '-' }}
                                    </h4>
                                    <br><br>
                                    <table cellpadding="2" cellspacing="0" class="table table-bordered"
                                        style="font-size: 12px;">
                                        <thead>
                                            <tr style='background-color: #797878;'>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Ruang</th>
                                                @foreach ($tanggalUjianOption as $tgl => $label)
                                                    <th colspan="3">{{ strtoupper($label) }}</th>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($tanggalUjian as $tgl)
                                                    <th>1</th>
                                                    <th>2</th>
                                                    <th>3</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ruangUjian as $index => $ruang)
                                                <tr>
                                                    <td style='text-align:center;'>{{ $index + 1 }}</td>
                                                    <td style='text-align:center;'>
                                                        {{ str_pad($ruang->nomor_ruang, 2, '0', STR_PAD_LEFT) }}
                                                    </td>
                                                    @foreach ($tanggalUjian as $tgl)
                                                        @for ($sesi = 1; $sesi <= 3; $sesi++)
                                                            @php
                                                                $key = $ruang->nomor_ruang . '_' . $tgl . '_' . $sesi;
                                                                $pengawasNama = $pengawas[$key][0]->kode_pengawas ?? '';
                                                            @endphp
                                                            <td style='text-align:center;'>{{ $pengawasNama }}</td>
                                                        @endfor
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2" style='text-align:center;'>Cadangan</td>
                                                @foreach ($tanggalUjian as $tgl)
                                                    <td colspan="3" style='text-align:center;'>
                                                        @php
                                                            $cadangan = collect($pengawas)
                                                                ->filter(
                                                                    fn($value, $key) => str_contains(
                                                                        $key,
                                                                        'CAD_' . $tgl,
                                                                    ),
                                                                )
                                                                ->flatten();

                                                            $kodePengawasList = $cadangan
                                                                ->pluck('kode_pengawas')
                                                                ->unique()
                                                                ->implode(', ');
                                                        @endphp
                                                        {{ $kodePengawasList ?: '-' }}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table
                                        style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
                                        <tr>
                                            <td width='25' style='border: none !important;'>&nbsp;</td>
                                            <td style='border: none !important;'>
                                                <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
                                                <table width='70%'
                                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
                                                    <tr style='border: none !important;'>
                                                        <td width='50' style='border: none !important;'></td>
                                                        <td style='border: none !important;'></td>
                                                        <td style='border: none !important;'>
                                                            Mengetahui<br>
                                                            Kepala Sekolah,
                                                            <div>
                                                                <img src='{{ URL::asset('images/damudin.png') }}'
                                                                    border='0' height='110'
                                                                    style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -120px;margin-top:-15px;'>
                                                            </div>
                                                            {{-- <div><img src='{{ URL::asset('images/stempel.png') }}' border='0' height='180'
                                            width='184'
                                            style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                                    </div> --}}
                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                            <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                                                            NIP. 19740302 199803 1 002
                                                        </td>
                                                        <td style='border: none !important;' width='200'></td>
                                                        <td style='padding:4px 8px;border: none !important;'>
                                                            Majalengka, 05 Mei 2025<br>
                                                            Ketua Panitia,
                                                            <div>
                                                                <img src='{{ URL::asset('images/almadjid.png') }}'
                                                                    border='0' height='110'
                                                                    style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -20px;margin-top:-15px;'>
                                                            </div>

                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                            <strong>Abdul Madjid, S.Pd., M.Pd.</strong><br>
                                                            NIP. 19761128 200012 1 002
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width='25' style='border: none !important;'>&nbsp;</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <div id="tabel-daftar-pengawas">
                                    <h4 class="text-center">DAFTAR PENGAWAS UJIAN</h4>
                                    <h4 class="text-center">{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</h4>
                                    <h4 class="text-center">TAHUN AJARAN {{ $identitasUjian?->tahun_ajaran ?? '-' }}
                                    </h4>
                                    <br><br>
                                    <table cellpadding="2" cellspacing="0" width="100%" class="table table-bordered"
                                        style="font-size: 10px;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>NIP</th>
                                                <th>Nama Lengkap</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($daftarPengawas as $index => $p)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td class="text-center">{{ $p->kode_pengawas }}</td>
                                                    <td>{{ $p->nip ?? '-' }}</td>
                                                    <td style='text-align:left;padding-left:8px;'>
                                                        {{ $p->nama_lengkap }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">Belum ada data pengawas untuk ujian ini.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <table
                                        style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
                                        <tr>
                                            <td width='25' style='border: none !important;'>&nbsp;</td>
                                            <td style='border: none !important;'>
                                                <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
                                                <table
                                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
                                                    <tr style='border: none !important;'>
                                                        <td width='50' style='border: none !important;'></td>
                                                        <td style='border: none !important;'></td>
                                                        <td style='border: none !important;'>
                                                            Mengetahui<br>
                                                            Kepala Sekolah,
                                                            <div>
                                                                <img src='{{ URL::asset('images/damudin.png') }}'
                                                                    border='0' height='110'
                                                                    style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -160px;margin-top:-15px;'>
                                                            </div>
                                                            {{-- <div><img src='{{ URL::asset('images/stempel.png') }}' border='0' height='180'
                                            width='184'
                                            style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                                    </div> --}}
                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                            <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                                                            NIP. 19740302 199803 1 002
                                                        </td>
                                                        <td style='border: none !important;' width='200'></td>
                                                        <td style='padding:4px 8px;border: none !important;'>
                                                            Majalengka, 05 Mei 2025<br>
                                                            Ketua Panitia,
                                                            {{-- <div>
                                        <img src='{{ URL::asset('images/almadjid.png') }}' border='0'
                                            height='110'
                                            style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -80px;margin-top:-15px;'>
                                    </div> --}}

                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                            <strong>ABDUL MADJID, S.Pd., M.Pd.</strong><br>
                                                            NIP. 19761128 200012 1 002
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width='25' style='border: none !important;'>&nbsp;</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!--  end col -->
                </div><!--end row-->
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
</div>
<div class="row">
    <div class="col-md-7">

    </div>
    <div class="col-md-5">

    </div>
</div>
