@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-mingguan')
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
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('kurikulum.datakbm.jadwal-mingguan.index') }}" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <form method="GET" id="formRombel">
                <div class="row g-3">
                    <div class="col-lg">
                    </div>

                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="tahunajaran" id="idThnAjaran">
                                <option value="" selected>Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaranOptions as $thnajar)
                                    <option value="{{ $thnajar }}"
                                        {{ request('tahunajaran') == $thnajar ? 'selected' : '' }}>{{ $thnajar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="semester" id="idSemester">
                                <option value="" selected>Pilih Semester</option>
                                <option value="Ganjil" {{ request('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil
                                </option>
                                <option value="Genap" {{ request('semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="kompetensikeahlian" id="idKodeKK">
                                <option value="" selected>Pilih Kompetensi Keahlian</option>
                                @foreach ($kompetensiKeahlianOptions as $id => $kode_kk)
                                    <option value="{{ $id }}"
                                        {{ request('kompetensikeahlian') == $id ? 'selected' : '' }}>
                                        {{ $kode_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="tingkat" id="idTingkat">
                                <option value="" selected>Pilih Tingkat</option>
                                <option value="10" {{ request('tingkat') == '10' ? 'selected' : '' }}>10</option>
                                <option value="11" {{ request('tingkat') == '11' ? 'selected' : '' }}>11</option>
                                <option value="12" {{ request('tingkat') == '12' ? 'selected' : '' }}>12</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto me-2">
                        <div>
                            <select class="form-select form-select-sm" name="kode_rombel" id="idRombel" disabled>
                                <option value="" selected>Pilih Rombel</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto me-2">
                        <button type="button" id="btn-tampil-jadwal"
                            class="btn btn-soft-primary btn-sm w-100 mb-4">Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body p-1">
            @if (!function_exists('warnaDariId'))
                @php
                    function warnaDariId($id)
                    {
                        $hash = crc32($id);
                        $hex = substr(dechex($hash), 0, 6);
                        return '#' . str_pad($hex, 6, '0', STR_PAD_RIGHT);
                    }

                    function kontrasTeks($bg)
                    {
                        $r = hexdec(substr($bg, 1, 2));
                        $g = hexdec(substr($bg, 3, 2));
                        $b = hexdec(substr($bg, 5, 2));
                        $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
                        return $luminance > 0.5 ? '#000' : '#fff';
                    }
                @endphp
            @endif
            @php
                use App\Models\Kurikulum\DataKBM\JadwalMingguan;
                use App\Models\Kurikulum\DataKBM\KbmPerRombel;
                use App\Models\ManajemenSekolah\RombonganBelajar;
                use App\Models\ManajemenSekolah\PersonilSekolah;

                // Ambil parameter dari URL
                $tahunAjaran = request()->get('tahunajaran');
                $seMester = request()->get('semester');
                $kodeKK = request()->get('kompetensikeahlian');
                $tingKat = request()->get('tingkat');
                $kodeRombel = request()->get('kode_rombel');

                // Ambil data jadwal mingguan
                $jadwal = JadwalMingguan::where('tahunajaran', $tahunAjaran)
                    ->where('semester', $seMester)
                    ->where('kode_rombel', $kodeRombel)
                    ->get();

                // Ambil nama rombel
                $namaRombel = KbmPerRombel::where('kode_rombel', $kodeRombel)->value('rombel') ?? '-';

                // Ambil nama wali kelas
                $rombel = RombonganBelajar::with('waliKelas')->where('kode_rombel', $kodeRombel)->first();

                $namaWaliKelas =
                    $rombel && $rombel->waliKelas
                        ? trim(
                            "{$rombel->waliKelas->gelardepan} {$rombel->waliKelas->namalengkap}" .
                                ($rombel->waliKelas->gelarbelakang ? ", {$rombel->waliKelas->gelarbelakang}" : ''),
                        )
                        : '-';

                // Buat struktur grid jadwal [jam_ke][hari] => [mapel, guru, id]
                $grid = [];

                foreach ($jadwal as $item) {
                    $guru = PersonilSekolah::where('id_personil', $item->id_personil)->value('namalengkap') ?? '-';

                    $namaMapel =
                        KbmPerRombel::where('kode_mapel_rombel', $item->mata_pelajaran)->value('mata_pelajaran') ?? '-';

                    $grid[$item->jam_ke][$item->hari] = [
                        'mapel' => $namaMapel,
                        'guru' => $guru,
                        'id' => $item->id_personil,
                    ];
                }

                // List hari dan jam pelajaran
                $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

                $jamList = [
                    1 => '6:30 - 7:10',
                    2 => '7:10 - 7:50',
                    3 => '7:50 - 8:30',
                    4 => '8:30 - 9:10',
                    5 => '9:10 - 9:50',
                    6 => '9:50 - 10:00', // Istirahat
                    7 => '10:00 - 10:40',
                    8 => '10:40 - 11:20',
                    9 => '11:20 - 12:00',
                    10 => '12:00 - 13:00', // Istirahat
                    11 => '13:00 - 13:40',
                    12 => '13:40 - 14:20',
                    13 => '14:20 - 15:00',
                ];

                $jamKeList = array_keys($jamList);

                // Ambil semua data KBM untuk rombel tersebut
                $dataKBMPerRombel = KbmPerRombel::where('tahunajaran', $tahunAjaran)
                    ->where('ganjilgenap', $seMester)
                    ->where('kode_rombel', $kodeRombel)
                    ->get();

                // Ambil ID guru dari data KBM
                $idGuruDalamKBM = $dataKBMPerRombel->pluck('id_personil')->unique();

                // Ambil data guru berdasarkan ID yang ditemukan
                $guruList = PersonilSekolah::whereIn('id_personil', $idGuruDalamKBM)->orderBy('namalengkap')->get();

                // Siapkan data mapel per guru dalam bentuk array
                $mapelPerGuru = [];

                foreach ($dataKBMPerRombel as $kbm) {
                    $idGuru = $kbm->id_personil;
                    if (!isset($mapelPerGuru[$idGuru])) {
                        $mapelPerGuru[$idGuru] = [];
                    }
                    $mapelPerGuru[$idGuru][] = [
                        'kode_mapel_rombel' => $kbm->kode_mapel_rombel,
                        'mata_pelajaran' => $kbm->mata_pelajaran,
                    ];
                }
            @endphp



            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10">
                    <div class="text-center mt-lg-2 pt-3">
                        <h1 class="display-6 fw-semibold mb-1 lh-base">
                            JADWAL PEMBELAJARAN
                            <span class="text-success">
                                {{ $namaRombel }}
                            </span>
                        </h1>
                        <p class="lead text-muted lh-base">TAHUN AJARAN {{ $tahunAjaran ?? '-' }} SEMESTER
                            {{ strtoupper($seMester ?? '-') }}
                        </p>
                    </div>
                </div>
            </div>
            <h5>Wali Kelas: {{ $namaWaliKelas }}</h5>
            <table class="table table-bordered table-sm text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Jam ke</th>
                        @foreach ($hariList as $hari)
                            <th>{{ $hari }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jamKeList as $jam)
                        @if ($jam == 6)
                            <tr class="table-info">
                                <td>
                                    <strong class='fs-24'>{{ $jam }}</strong><br>
                                    <small>{{ $jamList[$jam] }}</small>
                                </td>
                                <td colspan="{{ count($hariList) }}">
                                    <strong>Istirahat Pertama</strong>
                                </td>
                            </tr>
                        @elseif ($jam == 10)
                            <tr class="table-info">
                                <td>
                                    <strong class='fs-24'>{{ $jam }}</strong><br>
                                    <small>{{ $jamList[$jam] }}</small>
                                </td>
                                <td colspan="{{ count($hariList) }}">
                                    <strong>Istirahat, Sholat, Makan</strong>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td style="width:100px;">
                                    <strong class='fs-24'>{{ $jam }}</strong><br>
                                    <small>{{ $jamList[$jam] }}</small>
                                </td>
                                @foreach ($hariList as $hari)
                                    @php
                                        $bgColor = '';
                                        if (isset($grid[$jam][$hari])) {
                                            $id = $grid[$jam][$hari]['id'];
                                            $bgColor = warnaDariId($id);
                                        }
                                        $isUpacara = $jam == 1 && $hari == 'Senin';
                                        $isKegiatanInsidentil = $jam == 1 && $hari == 'Jumat';
                                    @endphp
                                    <td class="cell-jadwal" data-jam="{{ $jam }}" data-hari="{{ $hari }}"
                                        data-mapel="{{ $grid[$jam][$hari]['mapel'] ?? '' }}"
                                        data-guru="{{ $grid[$jam][$hari]['guru'] ?? '' }}"
                                        data-id="{{ $grid[$jam][$hari]['id'] ?? '' }}"
                                        style="width:250px; background-color: {{ $bgColor }}; color: {{ kontrasTeks($bgColor) }}; {{ $isUpacara || $isKegiatanInsidentil ? 'background-color: rgb(95, 42, 42);' : '' }}; cursor:pointer;">

                                        @if ($isUpacara)
                                            <strong>UPACARA BENDERA</strong>
                                        @elseif ($isKegiatanInsidentil)
                                            <strong>KEGIATAN INSIDENTIL</strong>
                                        @elseif (isset($grid[$jam][$hari]))
                                            <div class="fw-semibold">{{ $grid[$jam][$hari]['mapel'] }}</div>
                                            <div class="fs-14">{{ $grid[$jam][$hari]['guru'] }}</div>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Input Jadwal -->
    <div class="modal fade" id="modalInputJadwal" tabindex="-1" aria-labelledby="modalInputJadwalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formInputJadwal" method="POST" action="{{ route('kurikulum.datakbm.simpanJadwal') }}">
                @csrf
                <input type="hidden" name="tahunajaran" value="{{ $tahunAjaran }}">
                <input type="hidden" name="semester" value="{{ $seMester }}">
                <input type="hidden" name="kode_kk" value="{{ $kodeKK }}">
                <input type="hidden" name="tingkat" value="{{ $tingKat }}">
                <input type="hidden" name="kode_rombel" value="{{ $kodeRombel }}">
                <input type="hidden" name="jam_ke" id="modalJamKe">
                <input type="hidden" name="hari" id="modalHari">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalInputJadwalLabel">Isi Jadwal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-light border mb-3" id="modalKeteranganWaktu">
                            Hari: <strong id="labelHari">-</strong> | Jam ke-<strong id="labelJamKe">-</strong>
                        </div>
                        <div class="mb-2">
                            <label for="id_personil" class="form-label">Guru</label>
                            <select name="id_personil" id="modalGuru" class="form-select">
                                <option value="">-- Pilih Guru --</option>
                                @foreach ($guruList as $guru)
                                    <option value="{{ $guru->id_personil }}">{{ $guru->namalengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="kode_mapel_rombel" class="form-label">Mata Pelajaran</label>
                            <select name="kode_mapel_rombel" id="modalMapel" class="form-select" disabled>
                                <option value="">-- Pilih Mata Pelajaran --</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="jumlah_jam" class="form-label">Jumlah Jam</label>
                            <select name="jumlah_jam" id="jumlahJamSelect" class="form-select">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }} jam</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('modalInputJadwal'));
            const form = document.getElementById('formInputJadwal');

            document.querySelectorAll('.cell-jadwal').forEach(cell => {
                cell.addEventListener('click', function() {
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

        document.addEventListener('DOMContentLoaded', function() {
            const guruSelect = document.getElementById('modalGuru');
            const mapelSelect = document.getElementById('modalMapel');

            guruSelect.addEventListener('change', function() {
                const selectedGuruId = this.value;
                mapelSelect.innerHTML = '<option value="">-- Pilih Mata Pelajaran --</option>';

                if (mapelPerGuru[selectedGuruId]) {
                    mapelPerGuru[selectedGuruId].forEach(item => {
                        const opt = document.createElement('option');
                        opt.value = item.kode_mapel_rombel;
                        opt.textContent = item.mata_pelajaran;
                        mapelSelect.appendChild(opt);
                    });
                    mapelSelect.disabled = false;
                } else {
                    mapelSelect.disabled = true;
                }
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
