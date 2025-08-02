@extends('layouts.master')
@section('title')
    @lang('translation.informasi')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.panitia')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-xxl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Daftar Perusahaan</h4>
                                <div class="flex-shrink-0">
                                    {{ $totalPerusahaan ?? 0 }} Perusahaan
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body p-0">
                                <div id="perusahaanListWrapper" data-simplebar
                                    style="max-height: 316px;visibility: hidden;">
                                    <ul class="list-group list-group-flush border-dashed px-3">
                                        @foreach ($data as $index => $item)
                                            @php
                                                $radioId = 'perusahaan_' . $item->id;
                                            @endphp
                                            <li class="list-group-item ps-0">
                                                <div class="d-flex align-items-start">
                                                    <div class="form-check ps-0 flex-shrink-0">
                                                        <input type="radio" class="form-check-input ms-0"
                                                            id="{{ $radioId }}" name="perusahaan_id"
                                                            value="{{ $item->id }}"
                                                            onclick="tampilkanSiswa('{{ $item->id }}')">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <label class="form-check-label mb-0 ps-2" for="{{ $radioId }}">
                                                            {{ $item->nama_perusahaan }}
                                                        </label>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <p class="text-muted fs-12 mb-0">{{ $item->jumlah_siswa }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul><!-- end ul -->

                                </div>
                                <div class="p-3">
                                    <a href="{{ route('panitiaprakerin.perusahaan.index') }}" class="text-muted">Daftar
                                        Perusahaan</a>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-6">
                        <div class="card card-height-100">
                            <div class="card-header border-bottom-dashed align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Daftar Siswa Prakerin</h4>
                                <div class="flex-shrink-0">
                                    <span id="jumlahsiswa"><span>
                                </div>
                            </div><!-- end cardheader -->
                            <div class="card-body p-0">
                                <div class="p-3">
                                    <h5 class="mb-2 text-info-emphasis" id="nama_perusahaan">Nama Perusahaan</h5>
                                    <h6 class="mb-0" id="alamat_perusahaan">Alamat</h6>
                                </div>
                                <div data-simplebar style="max-height: 254px;" class="p-3">
                                    <div class="acitivity-timeline acitivity-main">
                                        <ul id="daftar-siswa" class="list-unstyled">
                                            <li class="text-muted">Pilih perusahaan terlebih dahulu.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div> <!-- end row-->
            </div> <!-- end col-xl-7-->
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        function tampilkanSiswa(idPerusahaan) {
            // Ambil data siswa berdasarkan perusahaan
            fetch(`/panitiaprakerin/get-siswa-perusahaan/${idPerusahaan}`)
                .then(res => res.json())
                .then(data => {
                    const container = document.getElementById('daftar-siswa');
                    const jumlahSiswaEl = document.getElementById('jumlahsiswa');

                    container.innerHTML = '';

                    if (data.length === 0) {
                        container.innerHTML = '<p class="text-muted">Belum ada siswa.</p>';
                        jumlahSiswaEl.textContent = 'Belum Ada Siswa';
                        return;
                    }

                    data.forEach((siswa, index) => {
                        const row =
                            `<li>${index + 1}. ${siswa.nis} ${siswa.nama_lengkap} (${siswa.rombel})</li>`;
                        container.innerHTML += row;
                    });

                    // Update jumlah siswa
                    jumlahSiswaEl.textContent = data.length + ' Orang';
                });

            // Ambil data perusahaan
            fetch(`/panitiaprakerin/getperusahaan/${idPerusahaan}`)
                .then(res => res.json())
                .then(perusahaan => {
                    document.getElementById('nama_perusahaan').textContent = perusahaan.nama + ' [' + perusahaan.id +
                        ']';
                    document.getElementById('alamat_perusahaan').textContent = perusahaan.alamat;
                });
        }
    </script>


    <script>
        window.addEventListener('DOMContentLoaded', function() {
            // Delay sedikit untuk memastikan SimpleBar siap, lalu tampilkan
            setTimeout(function() {
                const el = document.getElementById('perusahaanListWrapper');
                if (el) el.style.visibility = 'visible';
            }, 50); // Bisa disesuaikan, biasanya cukup 0–100ms
        });
    </script>


    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
