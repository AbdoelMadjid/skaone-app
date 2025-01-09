<table id="daftarperusahaanTabel" class="display" style="width:100%; table-layout: fixed;">
    <thead>
        <tr>
            <th style="width:50px;">No.</th>
            <th>Nama Perusahaan</th>
            <th>Alamat</th>
            <th style="width:60px;">Peserta</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($perusahaanList as $perusahaan)
            <tr data-id="{{ $perusahaan->id_perusahaan }}">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>
                    <a href="javascript:void(0);" class="toggle-peserta">
                        {{ $perusahaan->nama_perusahaan }}
                    </a>
                </td>
                <td>{!! $perusahaan->alamat_perusahaan !!}</td>
                <td class="text-center">
                    {{ $perusahaanCounts[$perusahaan->id_perusahaan] ?? 0 }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
