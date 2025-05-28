<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Rombel</th>
            <th>Jumlah Kiri</th>
            <th>Jumlah Kanan</th>
            <th>Ruang</th>
            <th>Total Siswa</th>
            <th>Cetak</th>
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
                <td>
                    <button type="button" class="btn btn-sm btn-soft-primary btn-kartu" data-kelas="{{ $item['kelas'] }}">
                        Lihat Kartu
                    </button>
                    <button type="button" class="btn btn-sm btn-soft-secondary btn-cetak-kelas"
                        data-kelas="{{ $item['kelas'] }}">
                        Cetak
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="modalKartuUjian" tabindex="-1" aria-labelledby="modalKartuLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kartu Ujian Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body" id="kartu-container">
                <p>Memuat data...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-soft-secondary" id="btn-cetak-kartu">Cetak</button>
                {{-- <button class="btn btn-soft-secondary btn-sm" onclick="printContent('cetak-kartu-ujian')">
                    Cetak</button> --}}
                <button type="button" class="btn btn-sm btn-soft-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<iframe id="print-iframe" style="display:none;"></iframe>
