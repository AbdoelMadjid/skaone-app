<table id="sertifikatprakerinTable" class="display" style="width:100%; table-layout: fixed;">
    <thead>
        <tr>
            <th style="width:40px;">No.</th>
            <th style="width:60px;">NIS</th>
            <th>Nama Lengkap</th>
            <th style="width:60px;">Rombel</th>
            <th>Perusahaan</th>
            <th>Pembimbing</th>
            <th>Sertifikat</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataPrakerin as $index => $prakerin)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $prakerin->nis }}</td>
                <td>{{ $prakerin->nama_lengkap }}</td>
                <td>{{ $prakerin->rombel }}</td>
                <td>{{ $prakerin->nama_perusahaan }}</td>
                <td>{{ $prakerin->gelardepan }} {{ $prakerin->namalengkap }}
                    {{ $prakerin->gelarbelakang }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary btn-show-sertifikat"
                        data-nama="{{ $prakerin->nama_lengkap }}" data-nis="{{ $prakerin->nis }}"
                        data-perusahaan="{{ $prakerin->nama_perusahaan }}">
                        Lihat Sertifikat
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Modal Sertifikat Global -->
<div class="modal fade" id="globalSertifikatModal" tabindex="-1" aria-labelledby="globalSertifikatModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="globalSertifikatModalLabel">Sertifikat Prakerin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img id="sertifikatImage" src="" alt="Sertifikat" class="img-fluid">
                </div>
                <div class="text-center mt-3">
                    <h2 id="sertifikatTitle">Sertifikat Prakerin</h2>
                    <p id="sertifikatSubtitle">Diberikan kepada:</p>
                    <p id="sertifikatName" class="fw-bold"></p>
                </div>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                    <tr>
                        <td width='15'>&nbsp;</td>
                        <td>
                            <table>
                                <tr>
                                    <td width='170'>Nama</td>
                                    <td width='10'>:</td>
                                    <td><strong><span id="modalNama"></span></strong></td>
                                </tr>
                                <tr>
                                    <td>Nomor Induk Siswa</td>
                                    <td>:</td>
                                    <td><span id="modalNis"></span></td>
                                </tr>
                                <tr>
                                    <td>Program Keahlian</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Konsentrasi Keahlian</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                        <td width='40'>&nbsp;</td>
                    </tr>
                </table>

                <p><strong>Perusahaan:</strong> <span id="modalPerusahaan"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
