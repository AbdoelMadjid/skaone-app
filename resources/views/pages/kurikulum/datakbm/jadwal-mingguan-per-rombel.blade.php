@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-per-rombel')
@endsection
@section('css')
    <style>
        .no-click {
            pointer-events: none;
            cursor: not-allowed;
        }

        .list-group-item.active {
            font-weight: bold;
            border-left: 4px solid #3b82f6;
            /* Tailwind blue-500 */
        }
    </style>
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
                    <x-btn-group-dropdown size="sm">
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperguru') }}" label="Guru"
                            icon="ri-calendar-2-fill" />
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperhari') }}" label="Harian"
                            icon="ri-calendar-event-fill" />
                    </x-btn-group-dropdown>
                </div>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('kurikulum.datakbm.jadwal-mingguan.index') }}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row gx-lg-5">
                            <div class="col-xl-9">
                                <div class="mt-xl-0 mt-5">
                                    @include('pages.kurikulum.datakbm.jadwal-mingguan-tabel-rombel')
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-xl-3 col-md-8 mx-auto">
                                <div class="product-img-slider sticky-side-div">
                                    <x-heading-title>Pilih Rombel</x-heading-title>
                                    <br>
                                    <select class="form-select form-select-sm mb-4" id="idRombelAuto" name="kode_rombel">
                                        <option value="">Pilih Rombel</option>
                                        @foreach ($rombonganBelajarGrouped as $namaKK => $tingkatGrouped)
                                            @foreach ($tingkatGrouped as $tingkat => $rombels)
                                                <optgroup label="{{ $namaKK }} - Tingkat {{ $tingkat }}">
                                                    @foreach ($rombels as $rombel)
                                                        <option value="{{ $rombel->kode_rombel }}"
                                                            data-tahunajaran="{{ $tahunAjaranAktif }}"
                                                            data-semester="{{ $semesterAktif }}"
                                                            data-kompetensikeahlian="{{ $rombel->id_kk }}"
                                                            data-tingkat="{{ $rombel->tingkat }}"
                                                            {{ request('kode_rombel') == $rombel->kode_rombel ? 'selected' : '' }}>
                                                            {{ $rombel->rombel }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        @endforeach
                                    </select>
                                    <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-primary"
                                        id="accordionRombel">
                                        @foreach ($rombonganBelajarGrouped as $namaKK => $tingkatGrouped)
                                            @php
                                                // Cek apakah rombel aktif ada di dalam group ini
                                                $isOpen = collect($tingkatGrouped)
                                                    ->flatten()
                                                    ->contains(
                                                        fn($rombel) => $rombel->kode_rombel == request('kode_rombel'),
                                                    );
                                            @endphp
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading-{{ Str::slug($namaKK) }}">
                                                    <button class="accordion-button {{ $isOpen ? '' : 'collapsed' }}"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-{{ Str::slug($namaKK) }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse-{{ Str::slug($namaKK) }}">
                                                        {{ $namaKK }}
                                                    </button>
                                                </h2>
                                                <div id="collapse-{{ Str::slug($namaKK) }}"
                                                    class="accordion-collapse collapse {{ $isOpen ? 'show' : '' }}"
                                                    aria-labelledby="heading-{{ Str::slug($namaKK) }}"
                                                    data-bs-parent="#accordionRombel">
                                                    <div class="accordion-body">

                                                        @foreach ($tingkatGrouped as $tingkat => $rombels)
                                                            <h6 class="mt-3">Tingkat {{ $tingkat }}</h6>
                                                            <ul class="list-group mb-2">
                                                                @foreach ($rombels as $rombel)
                                                                    <li class="list-group-item list-rombel-item
                                                        {{ request('kode_rombel') == $rombel->kode_rombel ? 'active bg-light-primary' : '' }}"
                                                                        data-tahunajaran="{{ $tahunAjaranAktif }}"
                                                                        data-semester="{{ $semesterAktif }}"
                                                                        data-kompetensikeahlian="{{ $rombel->id_kk }}"
                                                                        data-tingkat="{{ $rombel->tingkat }}"
                                                                        data-kode_rombel="{{ $rombel->kode_rombel }}"
                                                                        style="cursor: pointer;">
                                                                        {{ $rombel->rombel }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </div>
    @include('pages.kurikulum.datakbm.jadwal-mingguan-modal-rombel')
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        // Event listener untuk dropdown "Rombel" otomatis
        document.getElementById('idRombelAuto').addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            const tahunajaran = selected.dataset.tahunajaran;
            const semester = selected.dataset.semester;
            const kompetensikeahlian = selected.dataset.kompetensikeahlian;
            const tingkat = selected.dataset.tingkat;
            const kode_rombel = selected.value;

            if (kode_rombel) {
                // Membuat query string dari data rombel yang dipilih
                const query = new URLSearchParams({
                    tahunajaran,
                    semester,
                    kompetensikeahlian,
                    tingkat,
                    kode_rombel
                }).toString();

                // Redirect halaman dengan query string baru
                window.location.href = '?' + query;
            }
        });
    </script>

    <script>
        // Event listener untuk list rombel versi klik list-item
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.list-rombel-item').forEach(function(item) {
                item.addEventListener('click', function() {
                    const tahunajaran = this.dataset.tahunajaran;
                    const semester = this.dataset.semester;
                    const kompetensikeahlian = this.dataset.kompetensikeahlian;
                    const tingkat = this.dataset.tingkat;
                    const kode_rombel = this.dataset.kode_rombel;

                    if (kode_rombel) {
                        const query = new URLSearchParams({
                            tahunajaran,
                            semester,
                            kompetensikeahlian,
                            tingkat,
                            kode_rombel
                        }).toString();

                        window.location.href = '?' + query;
                    }
                });
            });
        });
    </script>

    <script>
        // Event untuk membuka modal input jadwal saat sel jadwal diklik
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('modalInputJadwal'));

            // Fungsi ambil nilai parameter dari query string URL
            function getQueryParam(param) {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }

            // Ambil nilai filter dari URL
            const tahunajaran = getQueryParam('tahunajaran');
            const semester = getQueryParam('semester');
            const kompetensikeahlian = getQueryParam('kompetensikeahlian');
            const tingkat = getQueryParam('tingkat');
            const rombel = getQueryParam('kode_rombel');

            // Event klik pada setiap cell jadwal
            document.querySelectorAll('.cell-jadwal').forEach(cell => {
                cell.addEventListener('click', function() {

                    // Validasi: Pastikan semua filter sudah dipilih
                    if (!tahunajaran || !semester || !kompetensikeahlian || !tingkat || !rombel) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Rombel Belum Dipilih!',
                            text: 'Silakan pilih Rombel terlebih dahulu.',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                        return;
                    }

                    // Ambil data dari atribut dataset
                    const jam = this.dataset.jam;
                    const hari = this.dataset.hari;
                    const guru = this.dataset.id || '';
                    const mapel = this.dataset.mapel || '';

                    // Set data ke dalam form modal
                    document.getElementById('modalJamKe').value = jam;
                    document.getElementById('modalHari').value = hari;
                    document.getElementById('modalGuru').value = guru;
                    document.getElementById('modalMapel').value = mapel;
                    document.getElementById('labelJamKe').textContent = jam;
                    document.getElementById('labelHari').textContent = hari;

                    // Tampilkan modal
                    modal.show();
                });
            });
        });
    </script>

    <script>
        // Data mapel per guru dari backend (Laravel -> Blade -> JSON)
        const mapelPerGuru = @json($mapelPerGuru);

        // Event ketika guru di modal diganti
        $('#modalGuru').on('change', function() {
            const idGuru = $(this).val();
            const mapelSelect = $('#modalMapel');

            // Kosongkan dan set default option
            mapelSelect.empty().append('<option value="">-- Pilih Mata Pelajaran --</option>');

            // Jika guru dipilih dan memiliki mapel
            if (idGuru && mapelPerGuru[idGuru]) {
                mapelPerGuru[idGuru].forEach(item => {
                    mapelSelect.append(
                        `<option value="${item.kode_mapel_rombel}"
                        data-jumlah-jam="${item.jumlah_jam}"
                        data-sisa-jam="${item.sisa_jam}">
                        ${item.mata_pelajaran} (Sisa: ${item.sisa_jam})
                    </option>`
                    );
                });
                mapelSelect.prop('disabled', false);
            } else {
                // Disable jika guru tidak punya mapel
                mapelSelect.prop('disabled', true);
            }
        });

        // Event ketika mapel dipilih
        $('#modalMapel').on('change', function() {
            const sisaJam = $(this).find(':selected').data('sisa-jam');
            const jumlahJamSelect = $('#jumlahJamSelect');

            // Auto set jumlah jam ke sisa jam dan disable jika sisa 0
            if (sisaJam > 0) {
                jumlahJamSelect.val(sisaJam).prop('disabled', false);
            } else {
                jumlahJamSelect.val('').prop('disabled', true);
            }
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
