@if ($pembimbingList->isNotEmpty())
    <table class="table table-bordered table-centered table-nowrap">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Peserta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembimbingList as $pembimbing)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembimbing->nip }}</td>
                    <td>
                        <a href="javascript:void(0);" class="show-peserta-pembimbing"
                            data-id="{{ $pembimbing->id_personil }}">
                            {{ $pembimbing->gelardepan }} {{ $pembimbing->namalengkap }}
                            {{ $pembimbing->gelarbelakang }}
                        </a>
                    </td>
                    <td class="text-center">
                        {{ $pembimbingCounts[$pembimbing->id_personil] ?? 0 }}
                    </td>
                </tr>
                <tr id="peserta-{{ $pembimbing->id_personil }}" class="peserta-pembimbing-row" style="display: none;">
                    <td colspan="4">
                        <div class="loading" style="display: none;">Memuat data...</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Rombel</th>
                                    <th>Perusahaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesertaByPembimbing[$pembimbing->id_personil] ?? [] as $index => $peserta)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $peserta['nis'] }}</td>
                                        <td>{{ $peserta['nama_lengkap'] }}</td>
                                        <td>{{ $peserta['rombel'] }}</td>
                                        <td>{{ $peserta['nama_perusahaan'] }}</td>
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
                    <strong>{{ $pembimbingCounts->values()->sum() }}</strong>
                </td>
            </tr>
        </tfoot>
    </table>
@else
    <p>Data pembimbing tidak tersedia.</p>
@endif
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const links = document.querySelectorAll('.show-peserta-pembimbing');

        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const pembimbingId = this.getAttribute('data-id');
                const row = document.getElementById(`peserta-${pembimbingId}`);
                // Sembunyikan semua row lainnya yang sedang terbuka
                const allRows = document.querySelectorAll('.peserta-pembimbing-row');
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
