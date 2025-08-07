@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-per-guru')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.data-kbm')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0 me-3">
                    <x-btn-group-dropdown>
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperrombel') }}" label="Jadwal Per Rombel"
                            icon="ri-calendar-fill" />
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperguru') }}" label="Jadwal Per Guru"
                            icon="ri-calendar-2-fill" />
                    </x-btn-group-dropdown>
                </div>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('kurikulum.datakbm.jadwal-mingguan.index') }}" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="row g-3">
                <div class="col-lg">
                </div>

                <div class="col-lg-auto">
                    <select id="selectHari" class="form-select">
                        <option value="">-- Pilih Hari --</option>
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $h)
                            <option value="{{ $h }}">{{ $h }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div id="containerTableJadwal">
                <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show mt-4"
                    role="alert">
                    <i class="ri-user-smile-line label-icon"></i><strong>Mohon di perhatikan
                        !!</strong> -
                    Silakan pilih hari dulu untuk menampilkan data.
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectHari = document.getElementById('selectHari');
            const container = document.getElementById('containerTableJadwal');

            selectHari.addEventListener('change', function() {
                const hari = this.value;

                // Clear container dulu biar nggak numpuk
                container.innerHTML = '<div class="text-muted">Memuat jadwal...</div>';

                if (!hari) {
                    container.innerHTML =
                        '<div class="alert alert-warning">Silakan pilih hari terlebih dahulu.</div>';
                    return;
                }

                fetch(`/kurikulum/datakbm/ajax-tampil?hari=${encodeURIComponent(hari)}`)
                    .then(response => response.json())
                    .then(data => {
                        container.innerHTML = data.html;
                    })
                    .catch(error => {
                        console.error('Gagal memuat:', error);
                        container.innerHTML =
                            '<div class="alert alert-danger">Terjadi kesalahan saat memuat data.</div>';
                    });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('containerTableJadwal');

            container.addEventListener('click', function(e) {
                const target = e.target.closest('.cell-kehadiran');
                if (!target) return;

                const idJadwal = target.dataset.idJadwal;
                const idPersonil = target.dataset.idPersonil;
                const hari = target.dataset.hari;
                const jam = target.dataset.jam;

                // Toggle warna dulu (optimis)
                target.classList.toggle('bg-primary');
                target.classList.toggle('text-white');

                fetch("{{ route('kurikulum.datakbm.simpankehadiranguru') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            jadwal_mingguan_id: idJadwal,
                            id_personil: idPersonil,
                            hari: hari,
                            jam_ke: jam
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        const jumlahCell = document.querySelector(
                            `.jumlah-kehadiran[data-id="${idPersonil}-${hari}"]`);
                        const totalHariCell = document.querySelector(
                            `.total-kehadiran[data-hari="${hari}"]`);
                        const totalJamCell = document.querySelector(
                            `.jumlah-jam-terisi[data-id="${idPersonil}-${hari}"]`);
                        const persenCell = document.querySelector(
                            `.persentase-kehadiran[data-id="${idPersonil}-${hari}"]`);
                        const totalProsentaseCell = document.querySelector(
                            `.total-prosentase[data-hari="${hari}"]`);

                        let currentValue = parseInt(jumlahCell.textContent);
                        let totalHariValue = parseInt(totalHariCell.textContent);
                        let totalJam = parseInt(totalJamCell.textContent);

                        if (data.status === 'success') {
                            if (data.action === 'created') {
                                showToast('success', 'Kehadiran sukses disimpan!');
                                jumlahCell.textContent = currentValue + 1;
                                totalHariCell.textContent = totalHariValue + 1;

                                let persen = totalJam > 0 ? Math.round(((currentValue + 1) / totalJam) *
                                    100) : 0;
                                if (persenCell) persenCell.textContent = `${persen}%`;

                                if (totalProsentaseCell) {
                                    const totalJadwal = parseInt(totalProsentaseCell.getAttribute(
                                        'data-total-jadwal'));
                                    const totalHadirValue = parseInt(totalHariCell.textContent);
                                    const persenTotal = totalJadwal > 0 ? Math.round((totalHadirValue /
                                        totalJadwal) * 100) : 0;
                                    totalProsentaseCell.textContent = `${persenTotal}%`;
                                }

                            } else if (data.action === 'deleted') {
                                showToast('success', 'Kehadiran sukses dihapus!');
                                let newJumlah = currentValue > 0 ? currentValue - 1 : 0;
                                let newTotalHari = totalHariValue > 0 ? totalHariValue - 1 : 0;

                                jumlahCell.textContent = newJumlah;
                                totalHariCell.textContent = newTotalHari;

                                let persen = totalJam > 0 ? Math.round((newJumlah / totalJam) * 100) :
                                    0;
                                if (persenCell) persenCell.textContent = `${persen}%`;

                                if (totalProsentaseCell) {
                                    const totalJadwal = parseInt(totalProsentaseCell.getAttribute(
                                        'data-total-jadwal'));
                                    const totalHadirValue = parseInt(totalHariCell.textContent);
                                    const persenTotal = totalJadwal > 0 ? Math.round((totalHadirValue /
                                        totalJadwal) * 100) : 0;
                                    totalProsentaseCell.textContent = `${persenTotal}%`;
                                }
                            }
                        } else {
                            showToast('error', 'Gagal menyimpan kehadiran');
                            target.classList.toggle('bg-primary');
                            target.classList.toggle('text-white');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        showToast('error', 'Terjadi kesalahan!');
                        target.classList.toggle('bg-primary');
                        target.classList.toggle('text-white');
                    });
            });
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
