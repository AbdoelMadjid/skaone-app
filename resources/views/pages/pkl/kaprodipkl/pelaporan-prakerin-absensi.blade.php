<div class="row">
    <div class="col-sm">
        <div class="form-group mb-3">
            <select id="pembimbingAbsensiSelect" class="form-control select2 form-select form-select-sm">
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
        <a href="{{ route('kaprodipkl.downloadabsensipdf') }}" class="btn btn-soft-primary">Download Absen</a>
    </div>
</div>
<table id="absensiTable" class="table table-bordered table-centered">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Rombel</th>
            <th>Nama Perusahaan / Pembimbing</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Izin</th>
            <th>Alfa</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataPrakerin as $index => $prakerin)
            <tr class="absensi-prakerin-row" data-pembimbing-id="{{ $prakerin->id_personil }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $prakerin->nis }}</td>
                <td>{{ $prakerin->nama_lengkap }}</td>
                <td>{{ $prakerin->rombel }}</td>
                <td>
                    <strong class="text-primary">{{ $prakerin->nama_perusahaan }}</strong>
                    <br>
                    <strong class="text-info">
                        {{ $prakerin->gelardepan }}
                        {{ $prakerin->namalengkap }}
                        {{ $prakerin->gelarbelakang }}
                    </strong>
                </td>
                <td class="text-center">{{ $prakerin->jumlah_hadir }}</td>
                <td class="text-center">{{ $prakerin->jumlah_sakit }}</td>
                <td class="text-center">{{ $prakerin->jumlah_izin }}</td>
                <td class="text-center">{{ $prakerin->jumlah_alfa }}</td>
                <td class="text-center">{{ $prakerin->jumlah_total }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot class="bg-light">
        <tr>
            <td colspan="5" class="text-end"><strong>Total:</strong></td>
            <td class="text-center" id="totalHadir">
                <strong>{{ $dataPrakerin->sum('jumlah_hadir') }}</strong>
            </td>
            <td class="text-center" id="totalSakit">
                <strong>{{ $dataPrakerin->sum('jumlah_sakit') }}</strong>
            </td>
            <td class="text-center" id="totalIzin">
                <strong>{{ $dataPrakerin->sum('jumlah_izin') }}</strong>
            </td>
            <td class="text-center" id="totalAlfa">
                <strong>{{ $dataPrakerin->sum('jumlah_alfa') }}</strong>
            </td>
            <td class="text-center" id="totalAll">
                <strong>{{ $dataPrakerin->sum('jumlah_hadir') + $dataPrakerin->sum('jumlah_sakit') + $dataPrakerin->sum('jumlah_izin') + $dataPrakerin->sum('jumlah_alfa') }}</strong>
            </td>
        </tr>
    </tfoot>
</table>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const pembimbingSelect = $('#pembimbingAbsensiSelect'); // Gunakan jQuery untuk Select2
        const tableRows = document.querySelectorAll('.absensi-prakerin-row');

        // Mengambil elemen total
        const totalHadir = document.querySelector('#totalHadir');
        const totalSakit = document.querySelector('#totalSakit');
        const totalIzin = document.querySelector('#totalIzin');
        const totalAlfa = document.querySelector('#totalAlfa');
        const totalAll = document.querySelector('#totalAll');

        pembimbingSelect.on('select2:select', function(e) {
            const selectedPembimbingId = e.target.value;
            let sumHadir = 0;
            let sumSakit = 0;
            let sumIzin = 0;
            let sumAlfa = 0;
            let sumTotal = 0;
            let currentNo = 1; // Mulai nomor urut dari 1

            tableRows.forEach(row => {
                const rowPembimbingId = row.getAttribute('data-pembimbing-id');

                if (selectedPembimbingId === "all" || selectedPembimbingId === "" ||
                    rowPembimbingId === selectedPembimbingId) {
                    row.style.display = ''; // Menampilkan row yang sesuai
                    // Perbarui nomor urut
                    row.querySelector('td:first-child').textContent = currentNo++;
                    sumHadir += parseInt(row.querySelector('.jumlah_hadir').textContent) || 0;
                    sumSakit += parseInt(row.querySelector('.jumlah_sakit').textContent) || 0;
                    sumIzin += parseInt(row.querySelector('.jumlah_izin').textContent) || 0;
                    sumAlfa += parseInt(row.querySelector('.jumlah_alfa').textContent) || 0;
                    sumTotal += parseInt(row.querySelector('.jumlah_total').textContent) || 0;
                } else {
                    row.style.display = 'none'; // Menyembunyikan row yang tidak sesuai
                }
            });

            // Update total values
            totalHadir.textContent = sumHadir;
            totalSakit.textContent = sumSakit;
            totalIzin.textContent = sumIzin;
            totalAlfa.textContent = sumAlfa;
            totalAll.textContent = sumTotal;
        });

        // Inisialisasi Select2
        pembimbingSelect.select2({
            placeholder: "-- Pilih Pembimbing --",
            allowClear: true
        });
    });
</script>
