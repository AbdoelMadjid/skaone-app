<table id="daftarperusahaanTabel" class="table table-bordered table-centered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Perusahaan</th>
            <th>Alamat</th>
            <th>Peserta</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($perusahaanList as $perusahaan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="javascript:void(0);" class="show-peserta-perusahaan"
                        data-id="{{ $perusahaan->id_perusahaan }}">
                        {{ $perusahaan->nama_perusahaan }}
                    </a>
                </td>
                <td>{!! $perusahaan->alamat_perusahaan !!}</td>
                <td class="text-center">
                    {{ $perusahaanCounts[$perusahaan->id_perusahaan] ?? 0 }}
                </td>
            </tr>
            <tr id="peserta-{{ $perusahaan->id_perusahaan }}" class="peserta-perusahaan-row" style="display: none;">
                <td colspan="4">
                    <div class="loading" style="display: none;">Memuat data...</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Rombel</th>
                                <th>Guru PKL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesertaByPerusahaan[$perusahaan->id_perusahaan] ?? [] as $index => $peserta)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $peserta['nis'] }}</td>
                                    <td>{{ $peserta['nama_lengkap'] }}</td>
                                    <td>{{ $peserta['rombel'] }}</td>
                                    <td>{{ $peserta['nama_pembimbing'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot class="bg-light">
        <tr>
            <td colspan="3" class="text-end"><strong>Total:</strong></td>
            <td class="text-center">
                <strong>{{ $perusahaanCounts->values()->sum() }}</strong>
            </td>
        </tr>
    </tfoot>
</table>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const linksPerusahaan = document.querySelectorAll('.show-peserta-perusahaan');

        linksPerusahaan.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const perusahaanId = this.getAttribute('data-id');
                const row = document.getElementById(`peserta-${perusahaanId}`);

                // Sembunyikan semua row lainnya yang sedang terbuka
                const allRows = document.querySelectorAll('.peserta-perusahaan-row');
                allRows.forEach(r => {
                    if (r !== row) {
                        r.style.display = 'none'; // Menyembunyikan row yang lain
                    }
                });

                // Toggle row yang dipilih
                row.style.display = row.style.display === 'none' ? '' : 'none';
            });
        });
    });
</script>
