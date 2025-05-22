@foreach ($pesertaUjians as $peserta)
    <div class="col-sm-4">
        <div class="card border card-border-primary">
            <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;'>
                    <tr>
                        <td style='font-size:14px;text-align:center;'><strong>KARTU PESERTA</strong></td>
                    </tr>
                    <tr>
                        <td style='font-size:12px;text-align:center;'>
                            <strong>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style='font-size:12px;text-align:center;'><strong>TAHUN AJARAN
                                {{ $identitasUjian?->tahun_ajaran ?? '-' }}</strong></td>
                    </tr>
                </table>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse; margin-top:10px;'>
                    <tr>
                        <td style='font-size:12px;' width="100">No. Peserta</td>
                        <td style='font-size:12px;'>:</td>
                        <td style='font-size:12px;'>{{ $peserta->nomor_peserta }}</td>
                    </tr>
                    <tr>
                        <td style='font-size:12px;'>NIS/NISN</td>
                        <td style='font-size:12px;'>:</td>
                        <td style='font-size:12px;'>{{ $peserta->nis }} / {{ $peserta->nisn }}</td>
                    </tr>
                    <tr>
                        <td style='font-size:12px;'>Nama Lengkap</td>
                        <td style='font-size:12px;'>:</td>
                        <td style='font-size:12px;'>{{ $peserta->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <td style='font-size:12px;'>Kelas</td>
                        <td style='font-size:12px;'>:</td>
                        <td style='font-size:12px;'>{{ $peserta->rombel }}</td>
                    </tr>
                    <tr>
                        <td style='font-size:12px;'>Ruangan</td>
                        <td style='font-size:12px;'>:</td>
                        <td style='font-size:12px;'>{{ $peserta->nomor_ruang }}</td>
                    </tr>
                </table>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;'>
                    <tr>
                        <td>
                            <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
                            <table width='70%' style='margin: 0 auto;width:100%;border-collapse:collapse;'>
                                <tr>
                                    <td width='140'></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style='padding:4px 8px;'>
                                        Majalengka,
                                        {{ \Carbon\Carbon::parse($identitasUjian?->titimangsa_ujian)->translatedFormat('d F Y') ?? '-' }}<br>
                                        Kepala Sekolah,
                                        <div>
                                            <img src='{{ URL::asset('images/damudin.png') }}' border='0'
                                                height='80'
                                                style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -100px;margin-top:-15px;'>
                                        </div>
                                        <div><img src='{{ URL::asset('images/stempel.png') }}' border='0'
                                                height='120' width='124'
                                                style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -85px;margin-top:-50px;'>
                                        </div>
                                        <p>&nbsp;</p>
                                        <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                                        NIP. 19740302 199803 1 002
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width='25'>&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer card-primary text-center">
                Kartu ini harap dibawa pada saat ujian
            </div>
        </div>
    </div>
@endforeach
