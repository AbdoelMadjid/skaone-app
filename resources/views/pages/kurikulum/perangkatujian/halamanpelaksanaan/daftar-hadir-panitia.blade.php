<div class="row g-3">
    <div class="col-lg">
        <h3>Daftar Hadir Pengawas</h3>
        <p>Pilih tanggal dan jamke untuk proses cetak daftar hadir peserta ujian.</p>
    </div>
    <!--end col-->

    <div class="col-lg-auto">
        <div class="mb-3 d-flex align-items-center gap-2">
            <select id="selectTanggalPanitia" class="form-control">
                <option value="">-- Pilih Tanggal --</option>
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
            <button type="button" class="btn btn-soft-primary" id="btn-print-daftar-panitia">
                Cetak
            </button>
        </div>
    </div>
</div>
<div id="tabel-daftar-hadir-panitia">
    <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}" alt="Card image cap"><br><br>
    <div style="text-align:center; font-size: 14px; font-weight: bold;">
        <H4><strong>DAFTAR HADIR PANITIA</strong></H4>
        <H4><strong>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</strong></H4>
        <H4><strong>TAHUN AJARAN
                {{ $identitasUjian?->tahun_ajaran ?? '-' }}</strong></H4>
    </div>
    <div style="width: 100%;font-size: 12px;margin-bottom: 10px; margin-top: 20px;">
        <div style="display: flex; margin-bottom: 12px;">
            <div style="width: 100px;">Hari/Tanggal</div>
            <div style="width: 10px;">:</div>
            <div id="hari_tgl_ujian_panitia"></div>
        </div>
    </div>
    <table class="table table-bordered" style="font-size: 12px;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th colspan="2">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($panitiaUjian as $index => $panitia)
                @php
                    $urut = $index + 1;
                    $isOdd = $urut % 2 === 1;
                @endphp
                <tr>
                    <td class="text-center">{{ $urut }}</td>
                    <td style="text-align: left; padding:10px">{{ $panitia->nama_lengkap }}</td>
                    <td class="text-center">{{ $panitia->nip }}</td>
                    <td style="text-align: left;">{{ $panitia->jabatan }}</td>
                    @if ($isOdd)
                        <td rowspan="2" width="100" style="text-align: left;" valign="top">{{ $urut }}
                        </td>
                        <td rowspan="2" width="100" style="text-align: left;" valign="top">{{ $urut + 1 }}
                        </td>
                    @endif
                </tr>
            @endforeach
            {{-- Tambahkan baris kosong jika jumlah peserta ganjil --}}
            @if ($panitiaUjian->count() % 2 === 1)
                <tr>
                    <td style="text-align: center; padding:10px">{{ $panitiaUjian->count() + 1 }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
        </tbody>
    </table>
    <br>
    @include('pages.kurikulum.perangkatujian.halamanadmin.tanda-tangan', [
        'identitasUjian' => $identitasUjian,
    ])
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectTanggal = document.getElementById('selectTanggalPanitia');
        const outputDiv = document.getElementById('hari_tgl_ujian_panitia');

        selectTanggal.addEventListener('change', function() {
            const selectedDate = this.value;
            if (selectedDate) {
                const tanggalObj = new Date(selectedDate);

                // Format nama hari dan tanggal (gunakan bahasa Indonesia)
                const hari = tanggalObj.toLocaleDateString('id-ID', {
                    weekday: 'long'
                });
                const tanggalFormat = tanggalObj.toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });

                outputDiv.textContent = `${hari}, ${tanggalFormat}`;
            } else {
                outputDiv.textContent = '';
            }
        });
    });
</script>
