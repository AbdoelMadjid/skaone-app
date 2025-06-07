@extends('layouts.master')
@section('title')
    @lang('translation.remedial-peserta-didik')
@endsection
@section('css')
    {{-- --}}
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
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>

                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <form id="formAutoSave"
                                        action="{{ route('kurikulum.dokumentsiswa.remedial-peserta-didik.store') }}"
                                        method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <input type="hidden" name="id_personil" value="{{ $personal_id }}">
                                            <div class="col-md">
                                                <select name="tahunajaran" id="tahun_ajaran" class="form-control">
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
                                                <select name="semester" id="semester" class="form-control">
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
                                                    <select name="kode_kk" id="kode_kk" class="form-control">
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
                                                    <select name="tingkat" id="tingkat" class="form-control">
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
                                                    <select name="kode_rombel" id="kode_rombel" class="form-control">
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
                                                <button type="submit" class="btn btn-primary">
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
                    <div class="card-body" id="datasiswa">
                        @if (isset($pesertaDidik) && $pesertaDidik->count())
                            @include('pages.kurikulum.dokumensiswa.remedial-peserta-didik-tampil', [
                                'pesertaDidik' => $pesertaDidik,
                            ])
                        @else
                            <p>Belum ada data siswa.</p>
                        @endif

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
@endsection
@section('script-bottom')
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
                        `/kurikulum/dokumentsiswa/get-kode-rombel-remedial?tahunajaran=${tahunAjaran}&kode_kk=${kodeKk}&tingkat=${tingkat}`
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
