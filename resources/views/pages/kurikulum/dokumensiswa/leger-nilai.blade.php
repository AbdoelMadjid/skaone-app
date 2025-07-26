@extends('layouts.master')
@section('title')
    @lang('translation.leger-nilai')
@endsection
@section('css')
    {{-- --}}
    <style>
        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }

        th.vertical-center {
            /* Membuat teks vertikal */
            text-align: center;
            /* Memusatkan teks secara horizontal */
            vertical-align: middle;
            /* Memusatkan konten secara vertikal */
            justify-content: center;
            /* Memusatkan konten secara horizontal */
        }

        .text-center {
            text-align: center;
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.dokumensiswa')
        @endslot
    @endcomponent

    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    {{--  --}}
                </div>
            </div>
        </div>
        <div class="card-header border-0">
            <div class="row g-4">
                <div class="col-sm-auto">
                    <div>

                    </div>
                </div>
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end">
                        <form id="formAutoSave" action="{{ route('kurikulum.dokumentsiswa.leger-nilai.store') }}"
                            method="POST">
                            @csrf
                            <div class="row g-3">
                                <input type="hidden" name="id_personil" value="{{ $personal_id }}">
                                <div class="col-md">
                                    <select name="tahunajaran" id="tahun_ajaran" class="form-select form-select-sm">
                                        <option value="">Pilih Tahun Ajar</option>
                                        @foreach ($tahunAjaranOptions as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('tahunajaran', isset($pilihData) && $pilihData->tahunajaran == $key ? 'selected' : '') }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-auto">
                                    <select name="semester" id="semester" class="form-select form-select-sm">
                                        <option value="">Pilih Semester</option>
                                        <option value="Ganjil"
                                            {{ old('semester', isset($pilihData) && $pilihData->semester == 'Ganjil' ? 'selected' : '') }}>
                                            Ganjil</option>
                                        <option value="Genap"
                                            {{ old('semester', isset($pilihData) && $pilihData->semester == 'Genap' ? 'selected' : '') }}>
                                            Genap</option>
                                    </select>
                                </div>
                                @if ($pilihData)
                                    <div class="col-md-auto">
                                        <select name="kode_kk" id="kode_kk" class="form-select form-select-sm">
                                            <option value="">Pilih Kompetensi Keahlian</option>
                                            @foreach ($kompetensiKeahlianOptions as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ old('kode_kk', isset($pilihData) && $pilihData->kode_kk == $key ? 'selected' : '') }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-auto">
                                        <select name="tingkat" id="tingkat" class="form-select form-select-sm">
                                            <option value="">Pilih Tingkat</option>
                                            <option value="10"
                                                {{ old('tingkat', isset($pilihData) && $pilihData->tingkat == '10' ? 'selected' : '') }}>
                                                10</option>
                                            <option value="11"
                                                {{ old('tingkat', isset($pilihData) && $pilihData->tingkat == '11' ? 'selected' : '') }}>
                                                11</option>
                                            <option value="12"
                                                {{ old('tingkat', isset($pilihData) && $pilihData->tingkat == '12' ? 'selected' : '') }}>
                                                12</option>
                                        </select>
                                    </div>

                                    <div class="col-md-auto">
                                        <select name="kode_rombel" id="kode_rombel" class="form-select form-select-sm">
                                            <option value="">Pilih Rombel</option>
                                            @foreach ($rombonganBelajar as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ old('kode_rombel', isset($pilihData) && $pilihData->kode_rombel == $key ? 'selected' : '') }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="col-md-auto">
                                    <button type="submit" class="btn btn-soft-primary btn-sm">
                                        @if (!$pilihData)
                                            Add
                                        @else
                                            Update
                                        @endif
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#legerNilai" role="tab">
                                Leger
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#mataPelajaran" role="tab">
                                Mata Pelajaran
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#rankingPerTingkat"
                                            role="tab">
                                            Ranking Per Tingkat
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#rankingPerTingkatperKK"
                                            role="tab">
                                            Ranking Per Tingkat Per KK
                                        </a>
                                    </li> --}}
                    </ul>
                </div>
                <div class="col-auto">
                    @if ($pilihData)
                        <a class="btn btn-soft-primary btn-sm"
                            href="/kurikulum/dokumentsiswa/export-pivot-data?kode_rombel={{ $pilihData->kode_rombel }}">Download
                            Leger Excel</a>
                    @endif
                    <div id="selection-element">
                        <div class="my-n1 d-flex align-items-center text-muted">
                            Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result
                            <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal"
                                data-bs-target="#removeItemModal">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card header -->
        <div class="card-body">

            <div class="tab-content">
                <div class="tab-pane active" id="legerNilai" role="tabpanel">
                    <div id="table-product-list-all" class="table-card gridjs-border-none">
                        @if ($pilihData)
                            <table class="table table-bordered table-striped mt-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="vertical-center">No.</th>
                                        <th class="vertical-center">NIS</th>
                                        <th class="vertical-center">Nama Lengkap</th>
                                        @foreach ($kelMapelList as $kelMapel)
                                            <th class="vertical-text">{{ $kelMapel->kel_mapel }}</th>
                                        @endforeach
                                        <th class="vertical-text">Nilai Rata-Rata</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pivotData as $nis => $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $nis }}</td>
                                            <td>{{ $data['nama_lengkap'] }}</td>
                                            @foreach ($kelMapelList as $kelMapel)
                                                <td class="text-center">
                                                    {{ $data[$kelMapel->kel_mapel] ?? '-' }}</td>
                                            @endforeach
                                            <td class="text-center">{{ $data['nil_rata_siswa'] }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="{{ 3 + $kelMapelList->count() }}" class="text-center">
                                                Tidak
                                                ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <!-- end tab pane -->

                <div class="tab-pane" id="mataPelajaran" role="tabpanel">
                    <div id="table-product-list-published" class="table-card gridjs-border-none">
                        @if ($pilihData)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIS</th>
                                        <th>Mata Pelajaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listMapel as $index => $kelMapel)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $kelMapel->kel_mapel }}</td>
                                            <td>{{ $kelMapel->mata_pelajaran }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                {{-- <div class="tab-pane" id="rankingPerTingkat" role="tabpanel">
                                <div class="p-3">
                                    @if ($pilihData)
                                        @foreach ($groupedRanking as $tingkat => $rankingList)
                                            <h2 class="mt-5 mb-3">Ranking Tingkat {{ $tingkat }}</h2>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Ranking</th>
                                                        <th class="text-center">NIS</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Kode KK</th>
                                                        <th>Rombel</th>
                                                        <th class="text-center">Nilai Rata-rata</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($rankingList as $siswa)
                                                        <tr>
                                                            <td class="text-center">{{ $siswa->ranking }}</td>
                                                            <td class="text-center">{{ $siswa->nis }}</td>
                                                            <td>{{ $siswa->nama_lengkap }}</td>
                                                            <td class="text-center">{{ $siswa->kode_kk }}</td>
                                                            <td>{{ $siswa->rombel_nama }}</td>
                                                            <td class="text-center">{{ $siswa->nil_rata_siswa }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane" id="rankingPerTingkatperKK" role="tabpanel">
                                <div class="p-3">
                                    @if ($pilihData)
                                        @foreach ($groupedData as $tingkat => $kkGroups)
                                            <h2 class="mt-5">Tingkat: {{ $tingkat }}</h2>
                                            @foreach ($kkGroups as $kodeKK => $rankingList)
                                                <h4 class="mt-3">{{ $kodeKKList[$kodeKK] ?? $kodeKK }}</h4>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Ranking</th>
                                                            <th class="text-center">NIS</th>
                                                            <th>Nama Lengkap</th>
                                                            <th>Rombel</th>
                                                            <th class="text-center">Nilai Rata-rata</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($rankingList as $nilai)
                                                            <tr>
                                                                <td class="text-center">{{ $nilai->ranking }}</td>
                                                                <td class="text-center">{{ $nilai->nis }}</td>
                                                                <td>{{ $nilai->nama_lengkap }}</td>
                                                                <td>{{ $nilai->rombel_nama }}</td>
                                                                <td class="text-center">
                                                                    {{ $nilai->nil_rata_siswa }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </div>
                            </div> --}}
                <!-- end tab pane -->
                <!-- end tab pane -->
            </div>
            <!-- end tab content -->

        </div>
        <!-- end card body -->
    </div>
    <!-- end card -->
@endsection
@section('script')
    <script>
        // JavaScript untuk menangani perubahan dan permintaan AJAX
        document.addEventListener('DOMContentLoaded', function() {
            const tahunAjaranSelect = document.getElementById('tahun_ajaran');
            const kodeKkSelect = document.getElementById('kode_kk');
            const tingkatSelect = document.getElementById('tingkat');
            const kodeRombelSelect = document.getElementById('kode_rombel');

            // Data awal dari variabel $pilihData yang di-passing dari server (jika ada)
            const initialData = {
                tahunajaran: "{{ isset($pilihData) ? $pilihData->tahunajaran : '' }}",
                kode_kk: "{{ isset($pilihData) ? $pilihData->kode_kk : '' }}",
                tingkat: "{{ isset($pilihData) ? $pilihData->tingkat : '' }}",
                kode_rombel: "{{ isset($pilihData) ? $pilihData->kode_rombel : '' }}"
            };

            // Set initial value jika data awal tersedia
            if (initialData.tahunajaran) tahunAjaranSelect.value = initialData.tahunajaran;
            if (initialData.kode_kk) kodeKkSelect.value = initialData.kode_kk;
            if (initialData.tingkat) tingkatSelect.value = initialData.tingkat;

            // Load initial data for kode_rombel
            fetchKodeRombel(true);

            // Event listener untuk perubahan pada dropdown
            [tahunAjaranSelect, kodeKkSelect, tingkatSelect].forEach(select => {
                select.addEventListener('change', function() {
                    // Reset kode_rombel jika salah satu dropdown berubah
                    kodeRombelSelect.innerHTML = '<option value="">Pilih Rombel</option>';
                    fetchKodeRombel();
                });
            });

            function fetchKodeRombel(initialLoad = false) {
                const tahunAjaran = tahunAjaranSelect.value;
                const kodeKk = kodeKkSelect.value;
                const tingkat = tingkatSelect.value;
                const selectedKodeRombel = kodeRombelSelect.value;

                // Pastikan semua field utama memiliki nilai sebelum melakukan fetch
                if (!tahunAjaran || !kodeKk || !tingkat) return;

                fetch(
                        `/kurikulum/dokumentsiswa/get-kode-rombel-leger?tahunajaran=${tahunAjaran}&kode_kk=${kodeKk}&tingkat=${tingkat}`
                    )
                    .then(response => response.json())
                    .then(data => {
                        // Populate dropdown kode_rombel
                        kodeRombelSelect.innerHTML = '<option value="">Pilih Rombel</option>';
                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.kode_rombel;
                            option.textContent = item.rombel;

                            // Tandai pilihan awal jika initialLoad dan sesuai
                            if (initialLoad && item.kode_rombel === initialData.kode_rombel) {
                                option.selected = true;
                            }
                            kodeRombelSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching kode rombel:', error));
            }
        });
    </script>
@endsection
@section('script-bottom')
    <script></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
