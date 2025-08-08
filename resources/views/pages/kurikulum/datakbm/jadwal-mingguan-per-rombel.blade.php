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
                    <x-btn-group-dropdown>
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperguru') }}" label="Jadwal Per Guru"
                            icon="ri-calendar-2-fill" />
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperhari') }}" label="Jadwal Per Hari"
                            icon="ri-calendar-event-fill" />
                    </x-btn-group-dropdown>
                </div>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('kurikulum.datakbm.jadwal-mingguan.index') }}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 p-2">
                @include('pages.kurikulum.datakbm.jadwal-mingguan-tabel-rombel')
            </div>
            <div class="col-md-3">
                <div class="card-body p-2">
                    <x-heading-title>Pilih Rombel</x-heading-title>
                    <br>
                    <select class="form-select form-select-sm mb-4" id="idRombelAuto" name="kode_rombel">
                        <option value="">Pilih Rombel</option>
                        @foreach ($rombonganBelajarGrouped as $namaKK => $tingkatGrouped)
                            @foreach ($tingkatGrouped as $tingkat => $rombels)
                                <optgroup label="{{ $namaKK }} - Tingkat {{ $tingkat }}">
                                    @foreach ($rombels as $rombel)
                                        <option value="{{ $rombel->kode_rombel }}"
                                            data-tahunajaran="{{ $tahunAjaranAktif }}" data-semester="{{ $semesterAktif }}"
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
                                    ->contains(fn($rombel) => $rombel->kode_rombel == request('kode_rombel'));
                            @endphp
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ Str::slug($namaKK) }}">
                                    <button class="accordion-button {{ $isOpen ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-{{ Str::slug($namaKK) }}"
                                        aria-expanded="false" aria-controls="collapse-{{ Str::slug($namaKK) }}">
                                        {{ $namaKK }}
                                    </button>
                                </h2>
                                <div id="collapse-{{ Str::slug($namaKK) }}"
                                    class="accordion-collapse collapse {{ $isOpen ? 'show' : '' }}"
                                    aria-labelledby="heading-{{ Str::slug($namaKK) }}" data-bs-parent="#accordionRombel">
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
        </div>
    </div>

    @include('pages.kurikulum.datakbm.jadwal-mingguan-modal-rombel')
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        // Function untuk mengecek apakah dropdown rombel harus di-disable atau tidak
        function checkDisableRombel() {
            var tahunAjaran = $('#idThnAjaran').val();
            var kodeKK = $('#idKodeKK').val();
            var tingKat = $('#idTingkat').val();
            var semester = $('#idSemester').val();

            // Jika salah satu dari Tahun Ajaran atau Kompetensi Keahlian belum dipilih
            if (tahunAjaran === '' || semester === '' || kodeKK === '' || tingKat === '') {
                // Disable dropdown Rombel
                $('#idRombel').attr('disabled', true);
                $('#idRombel').empty().append('<option value="all" selected>Rombel</option>'); // Kosongkan pilihan Rombel
            } else {
                // Jika sudah dipilih keduanya, enable dropdown Rombel dan muat datanya
                $('#idRombel').attr('disabled', false);
                loadRombelData(tahunAjaran, kodeKK, tingKat); // Panggil AJAX untuk load data
            }
        }

        // Function untuk load data rombel sesuai pilihan Tahun Ajaran dan Kompetensi Keahlian
        function loadRombelData(tahunAjaran, kodeKK, tingKat) {
            $.ajax({
                url: "{{ route('kurikulum.datakbm.getRombel') }}",
                type: "GET",
                data: {
                    tahun_ajaran: tahunAjaran,
                    kode_kk: kodeKK,
                    tingkat: tingKat
                },
                success: function(data) {
                    var rombelSelect = $('#idRombel');
                    var selectedKodeRombel =
                        "{{ request()->get('kode_rombel') ?? '' }}"; // Ambil dari request (blade)

                    rombelSelect.empty();
                    rombelSelect.append('<option value="all">Pilih Rombel</option>');

                    if (Object.keys(data).length > 0) {
                        $.each(data, function(key, value) {
                            const isSelected = key === selectedKodeRombel ? 'selected' : '';
                            rombelSelect.append('<option value="' + key + '" ' + isSelected + '>' +
                                value + '</option>');
                        });
                    } else {
                        rombelSelect.append('<option value="none">Tidak ada rombel tersedia</option>');
                    }

                    // Re-enable select
                    rombelSelect.prop('disabled', false);
                },
                error: function(xhr) {
                    console.error('Error pada AJAX:', xhr.responseText);
                }
            });
        }


        // Inisialisasi DataTable
        $(document).ready(function() {

            // Event listener ketika dropdown Tahun Ajaran atau Kompetensi Keahlian berubah
            $('#idThnAjaran, #idSemester, #idKodeKK, #idTingkat').on('change', function() {
                checkDisableRombel(); // Panggil fungsi untuk mengecek apakah Rombel harus di-disable
            });

            // Cek status Rombel saat halaman pertama kali dimuat
            checkDisableRombel();

            $('#btn-tampil-jadwal').on('click', function() {
                // Cek apakah semua select sudah dipilih
                if ($('#idThnAjaran').val() &&
                    $('#idSemester').val() &&
                    $('#idKodeKK').val() &&
                    $('#idTingkat').val() &&
                    $('#idRombel').val() &&
                    $('#idRombel').val() !== 'all' &&
                    $('#idRombel').val() !== 'none') {

                    // Submit form
                    $('#formRombel').submit();
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Lengkapi Filter',
                        text: 'Silakan lengkapi semua pilihan filter terlebih dahulu!',
                    });
                }
            });

        });
    </script>
    <script>
        document.getElementById('idRombelAuto').addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            const tahunajaran = selected.dataset.tahunajaran;
            const semester = selected.dataset.semester;
            const kompetensikeahlian = selected.dataset.kompetensikeahlian;
            const tingkat = selected.dataset.tingkat;
            const kode_rombel = selected.value;

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
    </script>
    <script>
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
            /* // Tambahkan logika untuk highlight active berdasarkan query URL
            const params = new URLSearchParams(window.location.search);
            const activeKodeRombel = params.get('kode_rombel');

            if (activeKodeRombel) {
                const activeItem = document.querySelector(
                    `.list-rombel-item[data-kode_rombel="${activeKodeRombel}"]`);
                if (activeItem) {
                    activeItem.classList.add('active', 'bg-light-primary');
                }
            } */
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('modalInputJadwal'));

            // Fungsi ambil query parameter dari URL
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

            document.querySelectorAll('.cell-jadwal').forEach(cell => {
                cell.addEventListener('click', function() {
                    // Jika ingin validasi masih berlaku, aktifkan kembali blok ini

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


                    const jam = this.dataset.jam;
                    const hari = this.dataset.hari;
                    const guru = this.dataset.id || '';
                    const mapel = this.dataset.mapel || '';

                    document.getElementById('modalJamKe').value = jam;
                    document.getElementById('modalHari').value = hari;
                    document.getElementById('modalGuru').value = guru;
                    document.getElementById('modalMapel').value = mapel;
                    document.getElementById('labelJamKe').textContent = jam;
                    document.getElementById('labelHari').textContent = hari;

                    modal.show();
                });
            });
        });
    </script>

    <script>
        const mapelPerGuru = @json($mapelPerGuru);

        $('#modalGuru').on('change', function() {
            const guruId = $(this).val();
            const mapelSelect = $('#modalMapel');
            const jumlahJamSelect = $('#jumlahJamSelect');

            // Reset dulu
            mapelSelect.empty().append('<option value="">-- Pilih Mata Pelajaran --</option>');
            mapelSelect.prop('disabled', true);
            jumlahJamSelect.val('').prop('disabled', true);

            // Cek dan isi mapel
            if (guruId && mapelPerGuru[guruId]) {
                const daftarMapel = mapelPerGuru[guruId];

                daftarMapel.forEach(item => {
                    mapelSelect.append(
                        `<option value="${item.kode_mapel_rombel}" data-jumlah-jam="${item.jumlah_jam}">${item.mata_pelajaran}</option>`
                    );
                });

                mapelSelect.prop('disabled', false);
            }
        });

        // Isi otomatis jumlah jam saat mapel dipilih
        $('#modalMapel').on('change', function() {
            const selectedOption = $(this).find('option:selected');
            const jumlahJam = selectedOption.data('jumlah-jam');

            if (jumlahJam) {
                $('#jumlahJamSelect').val(jumlahJam).prop('disabled', false);
            } else {
                $('#jumlahJamSelect').val('').prop('disabled', true);
            }
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
