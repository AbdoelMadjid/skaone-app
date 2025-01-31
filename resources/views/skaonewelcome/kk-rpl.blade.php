<section class="g-mb-10">
    <div class="container">
        <header class="text-center g-width-80x--md mx-auto g-mb-10">
            <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                <h6 class="g-font-size-12 g-font-weight-600">Kompetensi Keahlian</h6>
                <h2 class="h3 u-heading-v6__title g-brd-primary g-color-gray-dark-v2 g-font-weight-600">Rekayasa
                    Perangkat Lunak
                </h2>
            </div>
        </header>
        <!-- Lightbox Single Image -->
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid" src="{{ URL::asset('images/logojurusan/logo-rpl.png') }}" alt="Image Description">
                <hr class="g-brd-gray-light-v4 g-my-60">
                <header class="text-center mx-auto g-mb-10">
                    <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                        <h6 class="g-font-size-12 g-font-weight-600">Ketua Kompetensi Keahlian</h6>
                    </div>
                </header>
                <img class="img-fluid img-thumbnail g-rounded-10 g-mb-20"
                    src="{{ URL::asset('images/welcome/personil/rpl/personil_0002.jpg') }}" alt="Image Description">
                <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                    <h6 class="g-font-size-12">Endik Casdi S.Kom</h6>
                </div>
                <hr class="g-brd-gray-light-v4 g-my-60">
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th>Tingkat</th>
                            <th>Jumlah Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jumlahSiswaPerKK['411'] as $row)
                            <tr>
                                <td align="center">{{ $row->rombel_tingkat }}</td>
                                <td align="center">{{ $row->jumlah_siswa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td align="center"><strong>Total</strong></td>
                            <td align="center"><strong>{{ $totalSiswaPerKK['411'] }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <p class="text-danger fs-6">{{ terbilang($totalSiswaPerKK['411']) }} orang</p>
            </div>
            <div class="col-md-9">
                <!-- Footer -->
                <div class="container g-mb-60">
                    <div class="row">
                        <!-- Footer Content -->
                        <div class="col-lg-8 col-md-8 g-mb-40 g-mb-0--lg">
                            <!-- Taglines Bordered -->
                            <h2 class="g-color-primary g-font-weight-800">ROFIL LULUSAN YANG DIHASILKAN</h2>
                            <p class="fs-6 mb-0">Membekali peserta didik Kompetensi Keahlian
                                Rekayasa Perangkat Lunak
                                dengan keterampilan, pengetahuan dan sikap agar kompeten dalam :</p>
                            <x-variasi-ceklist-one> Mencerdaskan kehidupan bangsa dan
                                mengembangkan manusia Indoensia seutuhnya, yaitu manusia yang beriman dan
                                bertaqwa terhadap Tuhan Yang Maha Esa dan berbudi pekerti luhur, memiliki
                                pengetahuan dan keterampilan, kesehatan jasmani dan rohani, kepribadian yang
                                mantap dan mandiri.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Berjiwa sosial yang tinggi dalam
                                kehidupan bermasyarakat, berbangsa dan bernegara.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mampu Merakit, Menginstalasi, Merawat,
                                dan Memperbaiki Personal Computer (PC).</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mampu menginstalasi sistem operasi dan
                                menginstalasi aplikasi-aplikasi komputer baik opened source ataupun closed
                                source.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mampu menginstalasi jaringan lokal dan
                                mengoperasikan jaringan wired dan wireless</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mampu merancang, membuat dan
                                mengaplikasikan tampilan website secara statis.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mampu membuat, mengelola dan
                                memelihara aplikasi website dinamis</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mampu membuat, mengelola dan
                                memelihara aplikasi berbasis desktop client-server..</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mampu merancang, membuat, mengelola
                                dan memelihara basis data client-server</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mampu merancang berbagai perangkat
                                lunak berbagai platform dengan berbagai teknik pemodelan perangkat
                                lunak.</x-variasi-ceklist-one>
                        </div>
                        <!-- End Footer Content -->

                        <!-- Footer Content -->
                        <div class="col-lg-4 col-md-4 g-mb-40 g-mb-0--lg">
                            <h2 class="text-success g-font-weight-800">PROSPEK KERJA</h2>
                            <x-variasi-ceklist-one> Web Application Programmer</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Database Programmer</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Interfacing Programmer</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mobile Application Programmer (Java
                                and Android)</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Desktop Application Programmer</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> C++ Programmer</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Game Programmer</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Hardware and Software Technicians</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> IT Support and IT Staff</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Pekerjaan-pekerjaan lainnya yang
                                berbasis komputer</x-variasi-ceklist-one>
                            @php
                                // Query untuk mendapatkan data berdasarkan kode_kk
                                $photo = DB::table('photo_jurusans')->where('kode_kk', '411')->first();

                                // Tentukan path gambar
                                $imagePath =
                                    $photo && $photo->image
                                        ? asset('images/thumbnail/' . $photo->image)
                                        : asset('images/thumbnail/default.jpg');
                            @endphp
                            <img src="{{ $imagePath }}" alt="client-img" class="mx-auto img-fluid d-block mt-5">
                        </div>
                        <!-- End Footer Content -->
                    </div>
                </div>


                <!-- End Footer -->
                <div class="u-shadow-v1-5 g-line-height-2 g-pa-40 g-mb-30" role="alert">


                    @if ($personilRPL->isNotEmpty())
                        <h2>Guru Produktif</h2>
                        <div class="row">
                            @foreach ($personilRPL as $personil)
                                <div class="col-sm-7 col-lg-4 g-mb-30">
                                    <div
                                        class="u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                                        @if ($personil->image)
                                            <img class="img-fluid"
                                                src="{{ URL::asset('images/welcome/personil/' . strtolower($personil->jenis_group) . '/' . strtolower($personil->image)) }}"
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
