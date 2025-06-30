<!-- Rounded Ribbon -->
<div class="card ribbon-box border shadow-none">
    <div class="card-body">
        <div class="ribbon ribbon-primary round-shape">{{ $judul->judul }}</div>
        <h5 class="fs-14 text-end">Status: {{ $judul->status == 'Y' ? 'Tampil' : 'Tersembunyi' }}</h5>
        <div class="ribbon-content mt-4">
            <div class="border p-3 rounded bg-light mb-3">
                <ul>
                    @foreach ($judul->pengumumanTerkiniAktif as $grup)
                        <li>
                            <strong>{{ $grup->judul }}</strong> (Urutan: {{ $grup->urutan }})
                            <ul>
                                @foreach ($grup->poin as $poin)
                                    <li>{{ $poin->isi }}</li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
