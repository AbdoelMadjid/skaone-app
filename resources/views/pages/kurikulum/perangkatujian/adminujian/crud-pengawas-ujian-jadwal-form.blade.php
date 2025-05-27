<table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2" class="text-center align-middle">Ruang</th>
            <th colspan="{{ $sesi }}" class="text-center">{{ strtoupper($tanggalFormatted) }}</th>
        </tr>
        <tr>
            @for ($i = 1; $i <= $sesi; $i++)
                <th class="text-center">{{ $i }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach ($ruangs as $ruang)
            <tr>
                <td class="text-center">{{ str_pad($ruang->nomor_ruang, 2, '0', STR_PAD_LEFT) }}</td>
                @for ($i = 1; $i <= $sesi; $i++)
                    <td>
                        <select name="pengawas[{{ $ruang->id }}][{{ $i }}]" class="form-select">
                            <option value="">-- Pilih Pengawas --</option>
                            @foreach ($pengawas as $p)
                                <option value="{{ $p->kode_pengawas }}">{{ $p->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>
