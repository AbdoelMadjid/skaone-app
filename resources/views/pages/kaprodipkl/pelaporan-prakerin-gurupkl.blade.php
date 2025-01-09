<table id="pembimbingTabel" class="display" style="width:100%; table-layout: fixed;">
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
            <tr data-id="{{ $pembimbing->id_personil }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pembimbing->nip }}</td>
                <td>
                    <a href="javascript:void(0);" class="show-peserta">
                        {{ $pembimbing->gelardepan }} {{ $pembimbing->namalengkap }}
                        {{ $pembimbing->gelarbelakang }}
                    </a>
                </td>
                <td class="text-center">
                    {{ $pembimbingCounts[$pembimbing->id_personil] ?? 0 }}
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
