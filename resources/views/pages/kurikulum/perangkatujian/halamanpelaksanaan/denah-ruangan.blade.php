<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
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
        padding: 4px 8px;
        background: rgba(0, 123, 255, 0.8);
        color: #fff;
        border-radius: 4px;
        cursor: move;
        font-weight: bold;
        font-size: 14px;
    }
</style>

<h2>Denah Sekolah Interaktif</h2>

<button id="btnTambah">Tambah Penanda</button>

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
<table border="1" cellpadding="8" cellspacing="0" class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Label</th>
            <th>X</th>
            <th>Y</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penanda as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->kode_ruang }}</td>
                <td>{{ $item->label }}</td>
                <td>{{ $item->x }}</td>
                <td>{{ $item->y }}</td>
                <td>
                    <button onclick="editData({{ $item }})">Edit</button>
                    <button onclick="hapusData({{ $item->id }})">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="formModal" style="display:none; padding:20px; border:1px solid #ccc; background:#f9f9f9; margin-top:20px;">
    <h3 id="formTitle">Tambah Penanda</h3>
    <input type="hidden" id="penanda_id">

    <label>Kode Ruang:</label><br>
    <input type="text" id="kode_ruang"><br>

    <label>Label Ruangan:</label><br>
    <input type="text" id="label"><br>

    <label>Koordinat X:</label><br>
    <input type="number" id="x"><br>

    <label>Koordinat Y:</label><br>
    <input type="number" id="y"><br><br>

    <button id="btnSimpan">Simpan</button>
    <button onclick="tutupForm()">Batal</button>
</div>

<script>
    interact('.penanda').draggable({
        listeners: {
            move(event) {
                const target = event.target;
                const x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                const y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

                target.style.transform = `translate(${x}px, ${y}px)`;
                target.setAttribute('data-x', x);
                target.setAttribute('data-y', y);
            },
            end(event) {
                const target = event.target;
                const id = target.dataset.id;
                const offsetX = parseFloat(target.getAttribute('data-x')) || 0;
                const offsetY = parseFloat(target.getAttribute('data-y')) || 0;

                const left = parseFloat(target.style.left) + offsetX;
                const top = parseFloat(target.style.top) + offsetY;

                target.style.left = left + 'px';
                target.style.top = top + 'px';
                target.style.transform = '';
                target.removeAttribute('data-x');
                target.removeAttribute('data-y');

                fetch('/kurikulum/perangkatujian/denah-update-position/' + id, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        x: left,
                        y: top
                    })
                }).then(response => {
                    if (!response.ok) {
                        alert("Gagal menyimpan posisi.");
                    } else {
                        // ✅ UPDATE KOORDINAT PADA TABEL
                        const row = document.querySelector(`tr[data-id='${id}']`);
                        if (row) {
                            row.querySelector('.kolom-x').textContent = Math.round(left);
                            row.querySelector('.kolom-y').textContent = Math.round(top);
                        }
                    }
                });
            }
        }
    });
</script>
<script>
    const form = document.getElementById('formModal');

    function tutupForm() {
        form.style.display = 'none';
        document.getElementById('penanda_id').value = '';
    }

    document.getElementById('btnTambah').addEventListener('click', () => {
        document.getElementById('formTitle').innerText = 'Tambah Penanda';
        form.style.display = 'block';
        form.querySelectorAll('input').forEach(input => input.value = '');
    });

    document.getElementById('btnSimpan').addEventListener('click', () => {
        const id = document.getElementById('penanda_id').value;
        const data = {
            kode_ruang: document.getElementById('kode_ruang').value,
            label: document.getElementById('label').value,
            x: document.getElementById('x').value,
            y: document.getElementById('y').value
        };

        const url = id ? `/kurikulum/perangkatujian/denahupdate/${id}` : `/kurikulum/perangkatujian/denahstore`;
        const method = 'POST';

        fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data)
            }).then(res => res.json())
            .then(res => {
                if (res.success) {
                    location.reload();
                } else {
                    alert('Gagal menyimpan data.');
                }
            });
    });

    function editData(data) {
        document.getElementById('formTitle').innerText = 'Edit Penanda';
        document.getElementById('formModal').style.display = 'block';
        document.getElementById('penanda_id').value = data.id;
        document.getElementById('kode_ruang').value = data.kode_ruang;
        document.getElementById('label').value = data.label;
        document.getElementById('x').value = data.x;
        document.getElementById('y').value = data.y;
    }

    function hapusData(id) {
        if (!confirm("Yakin ingin menghapus?")) return;

        fetch(`/kurikulum/perangkatujian/denahdelete/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(res => res.json())
            .then(res => {
                if (res.success) {
                    location.reload();
                } else {
                    alert('Gagal menghapus data.');
                }
            });
    }
</script>
