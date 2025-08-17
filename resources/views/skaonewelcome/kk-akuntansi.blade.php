<section class="g-mb-10">
    <div class="container">
        <header class="text-center g-width-80x--md mx-auto g-mb-10">
            <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                <h6 class="g-font-size-12 g-font-weight-600">Kompetensi Keahlian</h6>
                <h2 class="h3 u-heading-v6__title g-brd-primary g-color-gray-dark-v2 g-font-weight-600">
                    Akuntansi
                </h2>
            </div>
        </header>
        <!-- Lightbox Single Image -->
        <div class="row">
            <div class="col-md-3">
                @php
                    // Query untuk mendapatkan data berdasarkan kode_kk
                    $photo = DB::table('logo_jurusans')->where('kode_kk', '833')->first();

                    // Tentukan path gambar
                    $imagePath =
                        $photo && $photo->logo
                            ? asset('images/jurusan_logo/' . $photo->logo)
                            : asset('images/jurusan_logo/default.jpg');
                @endphp
                <img src="{{ $imagePath }}" alt="client-img" class="mx-auto img-fluid d-block">
                {{-- <img class="img-fluid" src="{{ URL::asset('images/jurusan_logo/logo-ak.png') }}"
                    alt="Image Description"> --}}
                <hr class="g-brd-gray-light-v4 g-my-60">
                <header class="text-center mx-auto g-mb-10">
                    <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                        <h6 class="g-font-size-12 g-font-weight-600">Ketua Kompetensi Keahlian</h6>
                    </div>
                </header>
                @if (isset($tampilKaprodi['833']))
                    @php $kaprodi = $tampilKaprodi['833']; @endphp
                    <div class="text-center">
                        <img class="img-fluid img-thumbnail g-rounded-10 g-mb-20"
                            src="{{ asset('images/photo-personil/' . $kaprodi->photo) }}"
                            alt="{{ $kaprodi->namalengkap }}">
                        <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                            <h6 class="g-font-size-12">
                                {{ trim($kaprodi->gelardepan . ' ' . $kaprodi->namalengkap . ' ' . $kaprodi->gelarbelakang) }}
                            </h6>
                        </div>
                    </div>
                @endif
                <hr class="g-brd-gray-light-v4 g-my-60">
                <style>
                    /* khusus untuk tab tahun ajaran */
                    #tahunAjaranTab-833 .nav-link {
                        font-size: 0.85rem;
                        /* lebih kecil sedikit dari default */
                        padding: 0.3rem 0.6rem;
                        /* supaya tab nya tidak terlalu tinggi */
                    }
                </style>
                <ul class="nav nav-tabs" id="tahunAjaranTab-833" role="tablist">
                    @foreach ($tahunAjarans as $ta)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $ta->id == $tahunAjaranAktif->id ? 'active' : '' }}"
                                id="tab-833-{{ $ta->id }}" data-toggle="tab"
                                href="#content-833-{{ $ta->id }}" role="tab"
                                aria-controls="content-833-{{ $ta->id }}"
                                aria-selected="{{ $ta->id == $tahunAjaranAktif->id ? 'true' : 'false' }}">
                                {{ $ta->tahunajaran }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content mt-3" id="tahunAjaranContent-833">
                    @foreach ($tahunAjarans as $ta)
                        <div class="tab-pane fade {{ $ta->id == $tahunAjaranAktif->id ? 'show active' : '' }}"
                            id="content-833-{{ $ta->id }}" role="tabpanel"
                            aria-labelledby="tab-833-{{ $ta->id }}">

                            <h6>Kompetensi Keahlian 833 ({{ $ta->tahunajaran }})</h6>
                            <table class="table mt-3 table-bordered" style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Tingkat</th>
                                        <th style="text-align: center;">Rombel</th>
                                        <th style="text-align: center;">Siswa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPerTahunAjaran[$ta->tahunajaran]['jumlahSiswaPerKK']['833'] as $row)
                                        <tr>
                                            <td align="center">{{ $row->rombel_tingkat }}</td>
                                            <td align="center">{{ $row->jumlah_rombel }}</td>
                                            <td align="center">{{ $row->jumlah_siswa }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td align="center"><strong>Total</strong></td>
                                        <td align="center">
                                            <strong>{{ $dataPerTahunAjaran[$ta->tahunajaran]['totalRombelPerKK']['833'] }}</strong>
                                        </td>
                                        <td align="center">
                                            <strong>{{ $dataPerTahunAjaran[$ta->tahunajaran]['totalSiswaPerKK']['833'] }}</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <h6 class="text-danger">
                                {{ terbilang($dataPerTahunAjaran[$ta->tahunajaran]['totalSiswaPerKK']['833']) }} orang
                            </h6>

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <!-- Footer -->
                <div class="container g-mb-60">
                    <div class="row">
                        <!-- Footer Content -->
                        <div class="col-lg-8 col-md-8 g-mb-40 g-mb-0--lg">
                            <!-- Taglines Bordered -->
                            <h2 class="g-color-primary g-font-weight-800">ROFIL LULUSAN YANG DIHASILKAN</h2>
                            <p class="mb-0 g-font-size-16">Membekali peserta didik Kompetensi Keahlian Akuntansi dengan
                                keterampilan, pengetahuan dan sikap agar kompeten dalam :
                            </p>
                            @if (isset($dataProfil['833']['profil_lulusan']))
                                @foreach ($dataProfil['833']['profil_lulusan'] as $item)
                                    <x-variasi-ceklist-one>{{ $item->deskripsi }}</x-variasi-ceklist-one>
                                @endforeach
                            @endif
                        </div>
                        <!-- End Footer Content -->

                        <!-- Footer Content -->
                        <div class="col-lg-4 col-md-4 g-mb-40 g-mb-0--lg">
                            <h2 class="text-success g-font-weight-800">PROSPEK KERJA</h2>
                            @if (isset($dataProfil['833']['prospek_kerja']))
                                @foreach ($dataProfil['833']['prospek_kerja'] as $item)
                                    <x-variasi-ceklist-one>{{ $item->deskripsi }}</x-variasi-ceklist-one>
                                @endforeach
                            @endif
                            @php
                                // Query untuk mendapatkan data berdasarkan kode_kk
                                $photo = DB::table('photo_jurusans')->where('kode_kk', '833')->first();

                                // Tentukan path gambar
                                $imagePath =
                                    $photo && $photo->image
                                        ? asset('images/jurusan_gmb/' . $photo->image)
                                        : asset('images/jurusan_gmb/default.jpg');
                            @endphp
                            <img src="{{ $imagePath }}" alt="client-img" class="mx-auto img-fluid d-block mt-5">
                        </div>
                        <!-- End Footer Content -->

                    </div>
                </div>

                <!-- End Footer -->
                <div class="u-shadow-v1-5 g-line-height-2 g-pa-40 g-mb-30" role="alert">
                    @if ($personilAkuntansi->isNotEmpty())
                        <h2>Guru Produktif</h2>
                        <div class="row">
                            @foreach ($personilAkuntansi as $personil)
                                <div class="col-sm-7 col-lg-4 g-mb-30">
                                    <div
                                        class="u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                                        @if ($personil->photo)
                                            <img class="img-fluid"
                                                src="{{ URL::asset('images/photo-personil/' . $personil->photo) }}"
                                                alt="Image Description">
                                        @else
                                            <img class="img-fluid"
                                                src="{{ URL::asset('images/welcome/personil/img1.jpg') }}"
                                                alt="Image Description">
                                        @endif
                                    </div>
                                    <p class="text-center">
                                        <span class="g-font-size-12 g-color-gray">
                                            {{ $personil->gelardepan }}
                                            {{ ucwords(strtolower($personil->namalengkap)) }}
                                            {{ $personil->gelarbelakang }}
                                        </span>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- End Lightbox Single Image -->

        <hr class="g-brd-gray-light-v4 g-my-60">

    </div>
</section>
