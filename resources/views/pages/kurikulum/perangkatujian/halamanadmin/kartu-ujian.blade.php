<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <div class="row g-3">
            <div class="col-lg">
                <h3><i class="ri-contacts-book-2-line text-muted align-bottom me-1"></i> Kartu Peserta Ujian</h3>
                <p>Pilih kelas untuk proses cetak kartu peserta ujian.</p>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <select name="pilih_kelas" id="rombel" class="form-select form-select-sm w-auto">
                        <option value="">Pilih Kelas</option>
                        @foreach ($rekapKelas as $item)
                            <option value="{{ $item['kelas'] }}">{{ $item['rombel'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" id="btn-print-cetak-kartu-ujian">
                        Cetak
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="kartu-container" class="mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Rombel</th>
                <th>Jumlah Kiri</th>
                <th>Jumlah Kanan</th>
                <th>Ruang</th>
                <th>Total Siswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekapKelas as $i => $item)
                <tr class="text-center">
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item['rombel'] }} / {{ $item['kelas'] }}</td>
                    <td>{{ $item['jumlah_kiri'] }}</td>
                    <td>{{ $item['jumlah_kanan'] }}</td>
                    <td>{{ $item['ruang'] }}</td>
                    <td>{{ $item['total'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
