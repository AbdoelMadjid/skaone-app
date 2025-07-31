<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <div class="row g-3">
            <div class="col-lg">
                <h3><i class="ri-key-line text-muted align-bottom me-1"></i> Token Soal Ujian</h3>
                <p>Pilih tanggal dan jamke untuk proses cetak token soal ujian.</p>
            </div>
            <!--end col-->
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <select id="selectTanggalToken" class="form-select form-select-sm">
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
                    <select id="selectJamKeToken" class="form-select form-select-sm">
                        <option value="">Pilih Jam Ke</option>
                        @foreach ($jamKeList as $jk)
                            <option value="{{ $jk }}">{{ $jk }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" id="btn-print-token-soal-ujian">
                        Cetak
                    </button>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>


<div id="token-soal-ujian-container" class=row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
    <p class="text-muted">Silakan pilih tanggal dan sesi/jam ke terlebih dahulu untuk menampilkan token soal ujian.</p>

</div>
