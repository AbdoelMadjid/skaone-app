@extends('layouts.master')
@section('title')
    @lang('translation.modul-ajar-pdf')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
        @slot('li_2')
            @lang('translation.administrasi-guru')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body checkout-tab">

                    <form action="#">
                        <div class="step-arrow-nav mt-n3 mx-n3 mb-3">
                            <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" id="info-tab" href="#info"
                                        role="tab" aria-selected="false">
                                        <i class="ri-briefcase-line align-middle me-1"></i> Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" id="kerangka-tujuan-tab"
                                        href="#kerangka-tujuan" role="tab" aria-selected="false">
                                        <i class="ri-stack-line me-1 align-middle"></i> Kerangka dan Tujuan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" id="komponen-tab" href="#komponen"
                                        role="tab" aria-selected="false">
                                        <i class="ri-git-repository-line align-middle me-1"></i>Komponen
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" id="lampiran-tab" href="#lampiran"
                                        role="tab" aria-selected="false">
                                        <i class="ri-file-copy-line align-middle me-1"></i>Lampiran
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel"
                                aria-labelledby="info-tab">
                                @include('pages.gurumapel.modul-ajar-form-a')

                                <div class="d-flex align-items-start gap-3 mt-4 mb-2 border border-dashed">
                                    {{-- <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="pills-bill-address-tab"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Info</button> --}}
                                    <button type="button" class="btn btn-light btn-label right ms-auto nexttab"
                                        data-nexttab="kerangka-tujuan"><i
                                            class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Kerangka &
                                        Tujuan</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="kerangka-tujuan" role="tabpanel"
                                aria-labelledby="kerangka-tujuan-tab">
                                @include('pages.gurumapel.modul-ajar-form-b')
                                <div class="d-flex align-items-start gap-3 mt-4 mb-2 border border-dashed">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="info"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Info</button>
                                    <button type="button" class="btn btn-light btn-label right ms-auto nexttab"
                                        data-nexttab="komponen"><i
                                            class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Komponen</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="komponen" role="tabpanel" aria-labelledby="komponen-tab">
                                @include('pages.gurumapel.modul-ajar-form-c')
                                <div class="d-flex align-items-start gap-3 mt-4 mb-2 border border-dashed">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="kerangka-tujuan"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Kerangka dan
                                        Tujuan</button>
                                    <button type="button" class="btn btn-light btn-label right ms-auto nexttab"
                                        data-nexttab="lampiran"><i
                                            class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Lampiran</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="lampiran" role="tabpanel" aria-labelledby="lampiran-tab">
                                @include('pages.gurumapel.modul-ajar-form-d')
                                <div class="d-flex align-items-start gap-3 mt-4 mb-2 border border-dashed">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="komponen"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Komponen</button>
                                    {{-- <button type="button" class="btn btn-light btn-label right ms-auto nexttab"
                                        data-nexttab="lampiran"><i
                                            class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Lampiran</button> --}}
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Tampil Modul Ajar</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('pages.gurumapel.modul-ajar-tampil')
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('script-bottom')
    {{-- TOMBOL DI BAWAH UNTUK NEXT AND PREVIOUS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol NEXT
            document.querySelectorAll('.nexttab').forEach(function(button) {
                button.addEventListener('click', function() {
                    const nextTabId = this.getAttribute('data-nexttab');
                    const nextTab = document.querySelector(`a[href="#${nextTabId}"]`);
                    if (nextTab) {
                        new bootstrap.Tab(nextTab).show();
                    }
                });
            });

            // Tombol PREVIOUS
            document.querySelectorAll('.previestab').forEach(function(button) {
                button.addEventListener('click', function() {
                    const prevTabId = this.getAttribute('data-previous');
                    const prevTab = document.querySelector(`a[href="#${prevTabId}"]`);
                    if (prevTab) {
                        new bootstrap.Tab(prevTab).show();
                    }
                });
            });
        });
    </script>

    {{-- REALTIME FORMULIT BAGIAN TAG A --}}
    <script>
        $(document).ready(function() {
            const faseSelect = $('#fase');
            const kelasSelect = $('#kelas');
            const mapelSelect = $('#mata_pelajaran');
            const modulFase = $('#modulFase');

            function updateJudulFase() {
                const fase = faseSelect.val();
                const mapelText = mapelSelect.find('option:selected').text();

                if (fase) {
                    if (mapelSelect.val() && mapelText !== 'Pilih Mata Pelajaran...') {
                        modulFase.text(`FASE ${fase} - ${mapelText.toUpperCase()}`);
                    } else {
                        modulFase.text(`FASE ${fase}`);
                    }
                } else {
                    modulFase.text(`FASE`);
                }
            }

            // Kelas
            $('#kelas').on('change', function() {
                const val = $(this).val();
                $('#previewKelas').text(val);
            });

            // Saat fase diubah
            faseSelect.on('change', function() {
                mapelSelect.val('').trigger('change');
                kelasSelect.val('').trigger('change'); // reset kelas
                $('#previewKelas').text(''); // reset preview
                updateJudulFase();
            });

            // Saat kelas diubah
            kelasSelect.on('change', function() {
                mapelSelect.val('').trigger('change');
                updateJudulFase();
            });

            // Saat mapel diubah
            mapelSelect.on('change', function() {
                updateJudulFase();
            });

            // Bidang Keahlian
            $('#bidang_keahlian').on('change', function() {
                const text = $(this).find('option:selected').text();
                $('#previewBidang').text(text);

                // Reset Program & Konsentrasi saat bidang diganti
                $('#previewProgram').text('');
                $('#previewKonsentrasi').text('');
            });

            // Program Keahlian
            $('#program_keahlian').on('change', function() {
                const text = $(this).find('option:selected').text();
                $('#previewProgram').text(text);

                // Reset Konsentrasi saat program diganti
                $('#previewKonsentrasi').text('');
            });

            // Konsentrasi Keahlian
            $('#konsentrasi_keahlian').on('change', function() {
                const text = $(this).find('option:selected').text();
                $('#previewKonsentrasi').text(text);
            });

            // Jenjang (optional kalau ingin pakai)
            $('#jenjang').on('change', function() {
                const val = $(this).val();
                // Kalau mau ditampilkan juga, tinggal tambahkan span/element target-nya
            });

            const initialVal = $('#topik-modul').val().trim();
            $('#modulTopik').text(initialVal ? `(${initialVal})` : '');

            // Saat input diketik, ubah modulTopik realtime
            $('#topik-modul').on('keyup', function() {
                const val = $(this).val().trim();
                $('#modulTopik').text(val ? `( ${val} )` : '');
            });

        });
    </script>


    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
