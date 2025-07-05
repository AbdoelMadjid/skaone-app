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
        font-size: 12px;
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
                    <button type="button" class="btn btn-soft-primary btn-sm" id="btn-print-denah-ruangan-ujian">
                        <i class="ri-printer-line align-bottom me-1"></i> Cetak Denah Ruangan Ujian
                    </button>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm"
                        id="btn-print-keterangan-denah-ruangan-ujian">
                        <i class="ri-printer-line align-bottom me-1"></i> Cetak Keterangan Denah
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cetak-denah-ruangan-ujian">
    <div style="text-align:center; font-size: 14px; font-weight: bold;">
        <H4><strong>DENAH RUANGAN UJIAN</strong></H4>
        <H4><strong>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</strong></H4>
        <H4><strong>TAHUN AJARAN
                {{ $identitasUjian?->tahun_ajaran ?? '-' }}</strong></H4>
    </div>
    <div class="denah-container" class="denah-container"
        style="position: relative; margin-top: 20px; margin-bottom: 20px;">
        <img src="{{ asset('images/denahsekolah.jpg') }}" alt="Denah Sekolah" class="denah-img">

        @foreach ($penanda as $item)
            <div class="penanda" data-id="{{ $item->id }}"
                style="left: {{ $item->x }}px; top: {{ $item->y }}px;background-color: {{ $item->warna ?? '#007bff' }};">
                {{ $item->kode_ruang }}
            </div>
        @endforeach
    </div>
</div>

<div id="denah-ruangan-list">
    <h4>Daftar Ruangan</h4>
    <p>Berikut adalah daftar ruangan yang telah ditandai pada denah.</p>
    @php
        $columns = 3;
        $penanda = $penanda->values(); // pastikan indeks berurutan
        $total = $penanda->count();
        $rowsPerColumn = ceil($total / $columns);

        // Inisialisasi array kolom kosong
        $tables = array_fill(0, $columns, []);

        // Bagi data secara berurutan ke kolom
        foreach ($penanda as $index => $item) {
            $columnIndex = floor($index / $rowsPerColumn);
            $tables[$columnIndex][] = $item;
        }

        // Tambahkan baris kosong jika jumlah baris < $rowsPerColumn
        foreach ($tables as $i => $table) {
            while (count($tables[$i]) < $rowsPerColumn) {
                $tables[$i][] = null;
            }
        }

        $startNumber = 1;
    @endphp

    <div style="display: flex; gap: 20px; margin-top: 20px;">
        @foreach ($tables as $table)
            <table border="1" cellpadding="8" cellspacing="0" class="table table-striped" style="width: 30%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Label</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($table as $item)
                        <tr>
                            @if ($item)
                                <td style="text-align: center">{{ $startNumber++ }}</td>
                                <td style="text-align: center">{{ $item->kode_ruang }}</td>
                                <td>{{ $item->label }}</td>
                            @else
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
</div>
