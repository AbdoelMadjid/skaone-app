<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <form id="form-pilih-tingkat">
            <div class="row g-3">
                <div class="col-lg">
                    <h3><i class="ri-list-unordered text-muted align-bottom me-1"></i> Jadwal Ujian</h3>
                    <p>Pilih tingkat untuk menampilkan jadwal ujian.</p>
                </div>
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <select name="tingkat" id="tingkat" class="form-select w-auto">
                            <option value="">Pilih Tingkat</option>
                            @for ($i = 10; $i <= 12; $i++)
                                <option value="{{ $i }}">Tingkat {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-soft-primary" id="btn-cetak-jadwal">
                            Cetak
                        </button>
                    </div>
                </div>
            </div>
            <!--end row-->
        </form>
    </div>
</div>

<div id="tabel-jadwal-ujian" class="mb-3">

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const printButton = document.getElementById('btn-cetak-jadwal');
        if (!printButton) {
            console.error("Tombol print tidak ditemukan");
            return;
        }

        printButton.addEventListener('click', function() {
            /* const content = document.getElementById('tabel-jadwal-ujian');
            if (!content) {
                console.error("Elemen tabel tidak ditemukan");
                return;
            } */

            const content = document.getElementById('tabel-jadwal-ujian');
            //const tingkat = document.getElementById('tingkat').value || 'jadwal';

            if (!content || !content.innerHTML.trim()) {
                showToast('error',
                    'Silakan pilih tingkat terlebih dahulu dan pastikan jadwal sudah ditampilkan.');
                return;
            }

            const win = window.open('', '_blank');
            win.document.write(`
            <html>
            <head>
                <title>Daftar Pengawas</title>
                <style>
                    body { font-family: 'Times New Roman', serif; font-size: 12px; }
                    table { width: 100%; border-collapse: collapse; }
                    table, th, td { border: 1px solid black; }
                    th { padding: 4px; text-align: center; }
                    h4 { margin: 5px 0; text-align: center; }
                </style>
            </head>
            <body>
                ${content.innerHTML}
            </body>
            </html>
        `);
            win.document.close();
            win.focus();
            win.print();
            win.close();
        });
    });
</script>
