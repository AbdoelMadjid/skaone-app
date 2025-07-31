<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <div class="row g-3">
            <div class="col-lg">
                <h3><i class="ri-contacts-line text-muted align-bottom me-1"></i> Daftar Hadir Pengawas</h3>
                <p>Pilih tanggal dan jamke untuk proses cetak daftar hadir peserta ujian.</p>
            </div>
            <!--end col-->

            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <select id="selectTanggal" class="form-select form-select-sm">
                        <option value="">Pilih Tanggal</option>
                        @foreach ($tanggalList as $tgl)
                            @php
                                $tanggalFormat = \Carbon\Carbon::parse($tgl)->translatedFormat('l, d F Y');
                            @endphp
                            <option value="{{ $tgl }}">{{ $tanggalFormat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <select id="selectJamKe" class="form-select form-select-sm">
                        <option value="">Pilih Jam Ke</option>
                        @foreach ($jamKeList as $jk)
                            <option value="{{ $jk }}">{{ $jk }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" id="btn-print-daftar-pengawas">
                        Cetak
                    </button>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>

<div id="tabel-daftar-hadir-pengawas">
    <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}" alt="Card image cap"><br><br>
    <div style="text-align:center; font-size: 14px; font-weight: bold;">
        <H4><strong>DAFTAR HADIR PENGAWAS</strong></H4>
        <H4><strong>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</strong></H4>
        <H4><strong>TAHUN AJARAN
                {{ $identitasUjian?->tahun_ajaran ?? '-' }}</strong></H4>
    </div>
    <div style="width: 100%;font-size: 12px;margin-left:60px;margin-bottom: 10px; margin-top: 20px;">
        <div style="display: flex; margin-bottom: 12px;">
            <div style="width: 150px;">Hari/Tanggal</div>
            <div style="width: 10px;">:</div>
            <div id="hari_tgl_ujian"></div>
        </div>
        <div style="display: flex; margin-bottom: 12px;">
            <div style="width: 150px;">Sesi</div>
            <div style="width: 10px;">:</div>
            <div id="sesi_jamke"></div>
        </div>
    </div>
    <table class="table table-bordered" style="font-size: 12px;" id="tabelPengawas">
        <thead>
            <tr>
                <th>Ruang</th>
                <th>NIP</th>
                <th>Nama Pengawas</th>
                <th>Kode Pengawas</th>
                <th colspan="2">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <P style='font-size: 12px; margin-top: 20px;margin-bottom: 10px;margin-left: 25px;'>
        <strong>Catatan:</strong> Pengawas wajib mengisi daftar hadir ini sebelum dan sesudah pelaksanaan ujian.
    </P>
    @include('pages.kurikulum.perangkatujian.halamanadmin.tanda-tangan', [
        'identitasUjian' => $identitasUjian,
    ])
    <br>
    <h4>DAFTAR HADIR PENGAWAS CADANGAN / PENGGANTI</h4>
    <table class="table table-bordered" style="font-size: 12px;">
        <thead>
            <tr>
                <th width="50">No.</th>
                <th width="50">Ruang</th>
                <th width="150">NIP</th>
                <th>Nama Pengawas</th>
                <th width="25">Kode Pengawas</th>
                <th width="100">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 7; $i++)
                <tr>
                    <td style="padding: 20px;">{{ $i }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>
