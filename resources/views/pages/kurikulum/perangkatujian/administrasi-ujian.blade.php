@extends('layouts.master')
@section('title')
    @lang('translation.administrasi-ujian')
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
            @lang('translation.perangkat-ujian')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-sm-10">
                            <div class="text-center mt-lg-2 pt-3">
                                <h1 class="display-6 fw-semibold mb-3 lh-base">
                                    Administrasi Ujian <br>
                                    <span class="text-success">
                                        {{ $identitasUjian?->nama_ujian ?? '-' }}
                                    </span>
                                </h1>
                                <p class="lead text-muted lh-base">
                                    Tanggal Pelaksanaan Ujian :
                                    {{ \Carbon\Carbon::parse($identitasUjian?->tgl_ujian_awal)->translatedFormat('l, d F Y') ?? '-' }}
                                    s.d.
                                    {{ \Carbon\Carbon::parse($identitasUjian?->tgl_ujian_akhir)->translatedFormat('l, d F Y') ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-body">
                            <button type="button" class="btn-close text-reset float-end" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                            <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                                <div class="search-voice">
                                    <i class="ri-mic-fill align-middle"></i>
                                    <span class="voice-wave"></span>
                                    <span class="voice-wave"></span>
                                    <span class="voice-wave"></span>
                                </div>
                                <h4>Talk to me, what can I do for you?</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#RuangUjian" role="tab"
                                aria-selected="true">
                                <i class="ri-home-4-line text-muted align-bottom me-1"></i> Ruang Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#PesertaUjian" role="tab"
                                aria-selected="false">
                                <i class="mdi mdi-account-circle text-muted align-bottom me-1"></i> Peserta Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#JadwalUjian" role="tab"
                                aria-selected="false">
                                <i class="ri-list-unordered text-muted align-bottom me-1"></i> Jadwal Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#PengawasUjian" role="tab"
                                aria-selected="false">
                                <i class="ri-file-user-line text-muted align-bottom me-1"></i> Pengawas Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#KartuUjian" role="tab"
                                aria-selected="false">
                                <i class="ri-contacts-book-2-line text-muted align-bottom me-1"></i> Kartu Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#DenahUjian" role="tab"
                                aria-selected="false">
                                <i class="ri-dashboard-line text-muted align-bottom me-1"></i> Denah Tempat Duduk
                            </a>
                        </li>
                        <li class="nav-item ms-auto">
                            <div class="dropdown">
                                <a class="nav-link fw-medium text-reset mb-n1" href="#" role="button"
                                    id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-settings-4-line align-middle me-1"></i> Settings
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li>
                                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.ruang-ujian.index') }}"
                                            class="dropdown-item">Ruang Ujian</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.peserta-ujian.index') }}"
                                            class="dropdown-item">Peserta
                                            Ujian</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.jadwal-ujian.index') }}"
                                            class="dropdown-item">Jadwal
                                            Ujian</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item">Pengawas
                                            Ujian</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="RuangUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.ruang-ujian')
                        </div>
                        <div class="tab-pane" id="PesertaUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.peserta-ujian')
                        </div>
                        <div class="tab-pane" id="JadwalUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.jadwal-ujian')
                        </div>
                        <div class="tab-pane" id="PengawasUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.pengawas-ujian')
                        </div>
                        <div class="tab-pane" id="KartuUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.kartu-ujian')
                        </div>
                        <div class="tab-pane" id="DenahUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.denah-ujian')
                        </div>
                    </div><!--end tab-content-->
                </div><!--end card-body-->
            </div><!--end card -->
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        function formatRuang(nomor) {
            return nomor.toString().padStart(2, '0');
        }

        function loadDenah() {
            const ruang = document.getElementById('nomorRuang').value;
            const layout = document.getElementById('layout').value;

            // Set nomor ruang ke tampilan cetak
            document.getElementById('text-ruang').innerText = formatRuang(ruang);

            fetch(`/kurikulum/perangkatujian/denahdata?nomor_ruang=${ruang}&layout=${layout}`)
                .then(res => res.json())
                .then(response => {
                    const {
                        layout,
                        mejaList
                    } = response;
                    const layoutType = layout === '4x5' ? generateLayout4x5 : generateLayout5x4;
                    document.getElementById('denah-container').innerHTML = layoutType(mejaList);
                });
        }

        function generateLayout4x5(data) {
            const urutan = [
                [1, 2, 3, 4],
                [8, 7, 6, 5],
                [9, 10, 11, 12],
                [16, 15, 14, 13],
                [17, 18, 19, 20]
            ];
            return renderLayoutByNumber(urutan, data);
        }

        function generateLayout5x4(data) {
            const urutan = [
                [1, 2, 3, 4, 5],
                [10, 9, 8, 7, 6],
                [11, 12, 13, 14, 15],
                [20, 19, 18, 17, 16]
            ];
            return renderLayoutByNumber(urutan, data);
        }

        function renderLayoutByNumber(layoutArray, mejaList) {
            let html = `<div class="text-center mb-3"><strong></strong></div>`;

            layoutArray.forEach(baris => {
                html += `<div class="d-flex justify-content-center mb-2">`;
                baris.forEach(nomor => {
                    const index = nomor - 1;
                    const meja = mejaList[index] || {};
                    const kiri = meja.kiri;
                    const kanan = meja.kanan;

                    html += `
                <div style="border:1px solid #333; width:300px; height:75px; margin:2px; background:#fefefe;">
                    <table style="width:100%; height:100%; font-size:11px; text-align:center; border-collapse:collapse;">
                        <tr>
                            <td style="border-right:1px solid #ccc;padding-top:12px;" width="50%" valign="top">
                                ${kiri ? kiri.nomor_peserta + '<br>' + kiri.nis + '<br>' + kiri.nama_lengkap : '&nbsp;'}
                            </td>
                            <td style="border-left:1px solid #ccc;padding-top:12px;" width="50%" valign="top">
                                ${kanan ? kanan.nomor_peserta + '<br>' + kanan.nis + '<br>' + kanan.nama_lengkap : '&nbsp;'}
                            </td>
                        </tr>
                    </table>
                </div>`;
                });
                html += `</div>`;
            });

            return html;
        }

        document.getElementById('kelas').addEventListener('change', function() {
            const kelas = this.value;
            const container = document.getElementById('kartu-container');
            container.innerHTML = '<p>Loading...</p>';

            fetch("{{ route('kurikulum.perangkatujian.getkartupeserta') }}?kelas=" + kelas)
                .then(response => response.json())
                .then(data => {
                    container.innerHTML = data.html;
                })
                .catch(err => {
                    container.innerHTML = '<p>Gagal memuat data.</p>';
                    console.error(err);
                });
        });
    </script>
    <script>
        function cetakDenah() {
            const printContents = document.getElementById('cetak-denah').innerHTML;
            const w = window.open('', '', 'height=1000,width=800');

            w.document.write(`
        <html>
        <head>
            <title>Denah Tempat Duduk</title>
            <style>
                @page { size: A4; margin: 10mm; }
                body { font-family: 'Times New Roman', serif; font-size: 12px; }
                table { border-collapse: collapse; width: 100%; }
                td { padding: 4px; }
                .meja { border:1px solid #333; width:300px; height:165px; margin:4px; background:#fefefe; }
                .denah-wrapper { display: flex; justify-content: center; flex-wrap: wrap; }
                .d-flex { display: flex; justify-content: center; margin-bottom: 10px; }
            </style>
        </head>
        <body onload="window.print(); setTimeout(() => window.close(), 100);">
            ${printContents}
        </body>
        </html>
    `);

            w.document.close();
        }
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
