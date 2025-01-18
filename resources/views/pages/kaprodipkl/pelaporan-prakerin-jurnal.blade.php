<div class="row">
    <div class="col-sm">
        <div class="form-group mb-3">
            <select id="pembimbingJurnalSelect" class="form-control select2 form-select form-select-sm">
                <option value="">-- Pilih Semua --</option>
                <option value="all">Pilih Semua</option>
                @foreach ($pembimbingList as $pembimbing)
                    <option value="{{ $pembimbing->id_personil }}">{{ $pembimbing->gelardepan }}
                        {{ $pembimbing->namalengkap }} {{ $pembimbing->gelarbelakang }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-auto">
        <a href="{{ route('kaprodipkl.downloadjurnalpdf') }}" class="btn btn-soft-primary">Download Jurnal</a>
    </div>
</div>
<table class="table table-bordered table-centered">
    <thead>
        <tr>
            <th>No</th>
            <th width="250">Identitas Siswa</th>
            <th>Perusahaan / Pembimbing</th>
            <th width="300">Element</th>
            <th width="150">Rekap Per Bulan</th>
            <th>Sudah</th>
            <th>Belum</th>
            <th>Tolak</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataPrakerin as $index => $prakerin)
            <tr class="jurnal-prakerin-row" data-pembimbing-id="{{ $prakerin->id_personil }}">
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $prakerin->nis }}<br>
                    <strong class="text-info">{{ $prakerin->nama_lengkap }}</strong><br>
                    {{ $prakerin->rombel }}
                </td>
                <td>
                    <strong class="text-primary">{{ $prakerin->nama_perusahaan }}</strong>
                    <br>
                    <strong class="text-info">
                        {{ $prakerin->gelardepan }}
                        {{ $prakerin->namalengkap }}
                        {{ $prakerin->gelarbelakang }}
                    </strong>
                </td>
                <td>
                    @foreach ($prakerin->jurnal_per_elemen as $jurnal)
                        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                            <p class="fw-medium fs-10 mb-0"><i
                                    class="ri-checkbox-blank-circle-fill text-primary align-middle me-2"></i>
                                <strong>{{ $jurnal['element'] }}</strong>
                            </p>
                            <div>
                                <span class="text-primary fw-medium fs-12">{{ $jurnal['total_jurnal_cp'] }}</span>
                            </div>
                        </div><!-- end -->
                    @endforeach
                </td>
                <td>
                    @forelse ($prakerin->rekap_jurnal as $jurnal)
                        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                            <p class="fw-medium fs-10 mb-0"><i
                                    class="ri-checkbox-blank-circle-fill text-primary align-middle me-2"></i>
                                <strong>{{ \Carbon\Carbon::create($jurnal['tahun'], $jurnal['bulan'])->locale('id')->translatedFormat('F Y') }}</strong>
                            </p>
                            <div>
                                <span
                                    class="text-primary fw-medium fs-12">{{ $jurnal['sudah'] + $jurnal['belum'] }}</span>
                            </div>
                        </div><!-- end -->
                    @empty
                        <span class="text-danger fs-12">Jurnal belum ada</span>
                    @endforelse
                </td>
                <td class="text-center jumlah_sudah">{{ $prakerin->jumlah_sudah }}</td>
                <td class="text-center jumlah_belum">{{ $prakerin->jumlah_belum }}</td>
                <td class="text-center jumlah_tolak">{{ $prakerin->jumlah_tolak }}</td>
                <td class="text-center total_jumlah">
                    {{ $prakerin->jumlah_sudah + $prakerin->jumlah_belum + $prakerin->jumlah_tolak }}
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot class="bg-light">
        <tr>
            <td colspan="4" class="text-end"><strong>Total:</strong></td>
            <td class='text-center' id="totalSudah">
                <strong>{{ $dataPrakerin->sum('jumlah_sudah') }}</strong>
            </td>
            <td class='text-center' id="totalBelum">
                <strong>{{ $dataPrakerin->sum('jumlah_belum') }}</strong>
            </td>
            <td class='text-center' id="totalTolak">
                <strong>{{ $dataPrakerin->sum('jumlah_tolak') }}</strong>
            </td>
            <td class="text-center" id="allTotal">
                <strong>{{ $dataPrakerin->sum('jumlah_sudah') + $dataPrakerin->sum('jumlah_belum') + $dataPrakerin->sum('jumlah_tolak') }}</strong>
            </td>
        </tr>
    </tfoot>
</table>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const pembimbingSelect = $('#pembimbingJurnalSelect'); // Gunakan jQuery untuk Select2
        const tableRows = document.querySelectorAll('.jurnal-prakerin-row');
        const totalSudah = document.querySelector('#totalSudah');
        const totalBelum = document.querySelector('#totalBelum');
        const totalTolak = document.querySelector('#totalTolak');
        const allTotal = document.querySelector('#allTotal');

        pembimbingSelect.on('select2:select', function(e) {
            const selectedPembimbingId = e.target.value;
            let sumSudah = 0;
            let sumBelum = 0;
            let sumTolak = 0;
            let sumAll = 0;
            let currentNo = 1; // Mulai nomor urut dari 1

            tableRows.forEach(row => {
                const rowPembimbingId = row.getAttribute('data-pembimbing-id');

                if (selectedPembimbingId === "all" || selectedPembimbingId === "" ||
                    rowPembimbingId === selectedPembimbingId) {
                    row.style.display = ''; // Menampilkan row yang sesuai
                    // Perbarui nomor urut
                    row.querySelector('td:first-child').textContent = currentNo++;
                    sumSudah += parseInt(row.querySelector('.jumlah_sudah').textContent) || 0;
                    sumBelum += parseInt(row.querySelector('.jumlah_belum').textContent) || 0;
                    sumTolak += parseInt(row.querySelector('.jumlah_tolak').textContent) || 0;
                    sumAll += parseInt(row.querySelector('.total_jumlah').textContent) || 0;
                } else {
                    row.style.display = 'none'; // Menyembunyikan row yang tidak sesuai
                }
            });

            // Update total values
            totalSudah.textContent = sumSudah;
            totalBelum.textContent = sumBelum;
            totalTolak.textContent = sumTolak;
            allTotal.textContent = sumAll;
        });

        // Inisialisasi Select2
        pembimbingSelect.select2({
            placeholder: "-- Pilih Pembimbing --",
            allowClear: true
        });
    });
</script>
