<style>
    .denah-container {
        position: relative;
        width: 1000px;
    }

    .denah-img {
        width: 100%;
    }

    .penanda {
        position: absolute;
        padding: 2px 6px;
        background: rgba(0, 123, 255, 0.8);
        color: #fff;
        border-radius: 4px;
        cursor: move;
        font-weight: bold;
        font-size: 14px;
    }
</style>
<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <div class="row g-3">
            <div class="col-lg">
                <h3><i class="ri-community-line text-muted align-bottom me-1"></i> Denah Ruangan Ujian</h3>
                <p>Tambahkan penanda untuk setiap ruangan ujian.</p>
            </div>
            <!--end col-->
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary" id="btn-print-daftar-panitia">
                        Cetak
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="denah-container">
    <img src="{{ asset('images/denahsekolah.jpg') }}" alt="Denah Sekolah" class="denah-img">

    @foreach ($penanda as $item)
        <div class="penanda" data-id="{{ $item->id }}"
            style="left: {{ $item->x }}px; top: {{ $item->y }}px;">
            {{ $item->kode_ruang }}
        </div>
    @endforeach
</div>
<h3>Daftar Ruangan</h3>
<table border="1" cellpadding="8" cellspacing="0" class="table table-striped" style="width:30%; margin-top: 20px;">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Label</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penanda as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->kode_ruang }}</td>
                <td>{{ $item->label }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
