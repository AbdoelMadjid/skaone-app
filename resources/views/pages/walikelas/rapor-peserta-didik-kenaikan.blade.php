<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Status Kenaikan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kenaikanSiswa as $key => $kenaikan)
            <tr>
                <td class='text-center'>{{ $key + 1 }}.</td>
                <td class='text-center'>{{ $kenaikan->nis }} </td>
                <td>{{ $kenaikan->nama_lengkap }}</td>
                <td class='text-center'>
                    <form method="POST" action="{{ route('walikelas.update.kenaikan') }}">
                        @csrf
                        <input type="hidden" name="nis" value="{{ $kenaikan->nis }}">
                        <input type="hidden" name="tahunajaran" value="{{ $kenaikan->tahunajaran }}">
                        <input type="hidden" name="kode_rombel" value="{{ $kenaikan->kode_rombel }}">
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="Naik" {{ $kenaikan->status == 'Naik' ? 'selected' : '' }}>Naik</option>
                            <option value="Naik Pindah" {{ $kenaikan->status == 'Naik Pindah' ? 'selected' : '' }}>Naik
                                Pindah</option>
                            <option value="Tidak Naik" {{ $kenaikan->status == 'Tidak Naik' ? 'selected' : '' }}>Tidak
                                Naik</option>
                        </select>
                    </form>
                </td>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
        @endforelse
    </tbody>
</table>
