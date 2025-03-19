<section class="g-mb-10">
    <div class="container">
        <header class="text-center g-width-80x--md mx-auto g-mb-10">
            <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                <h6 class="g-font-size-12 g-font-weight-600">Kompetensi Keahlian</h6>
                <h2 class="h3 u-heading-v6__title g-brd-primary g-color-gray-dark-v2 g-font-weight-600">Bisnis Digital
                </h2>
            </div>
        </header>
        <!-- Lightbox Single Image -->
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid" src="{{ URL::asset('images/logojurusan/logo-bd.png') }}" alt="Image Description">
                <hr class="g-brd-gray-light-v4 g-my-60">
                <header class="text-center mx-auto g-mb-10">
                    <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                        <h6 class="g-font-size-12 g-font-weight-600">Ketua Kompetensi Keahlian</h6>
                    </div>
                </header>
                <img class="img-fluid img-thumbnail g-rounded-10 g-mb-20"
                    src="{{ URL::asset('images/welcome/personil/bisnisdigital/personil_0004.jpg') }}"
                    alt="Image Description">
                <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                    <h6 class="g-font-size-12">Euis Kokom Komariah SE</h6>
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
                        @foreach ($jumlahSiswaPerKK['811'] as $row)
                            <tr>
                                <td align="center">{{ $row->rombel_tingkat }}</td>
                                <td align="center">{{ $row->jumlah_siswa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td align="center"><strong>Total</strong></td>
                            <td align="center"><strong>{{ $totalSiswaPerKK['811'] }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <p class="text-danger fs-6">{{ terbilang($totalSiswaPerKK['811']) }} orang</p>
            </div>
            <div class="col-md-9">
                <!-- Footer -->
                <div class="container g-mb-60">
                    <div class="row">
                        <!-- Footer Content -->
                        <div class="col-lg-8 col-md-8 g-mb-40 g-mb-0--lg">
                            <!-- Taglines Bordered -->
                            <h2 class="g-color-primary g-font-weight-800">ROFIL LULUSAN YANG DIHASILKAN</h2>
                            <p class="mb-0 g-font-size-16">Membekali peserta didik Kompetensi Keahlian
                                Bisnis Digital
                                dengan keterampilan, pengetahuan dan sikap agar kompeten dalam :</p>
                            <x-variasi-ceklist-one> Mencerdaskan kehidupan bangsa dan
                                mengembangkan manusia Indonesia seutuhnya yaitu manusia yang beriman dan
                                bertaqwa Kepada Tuhan YME dan berbudi pekerti luhur memiliki pengetahuan dan
                                keterampilan , kesehatan jasmani dan rohani kepribadian yang mantap dan mandiri.
                            </x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Meningkatkan kualitas lulusan yang
                                kompetitif di dunia kerja.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Menciptakan situasi kerja dan
                                pembelajaran yang kondusif serta berwawasan lingkungan.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mendidik peserta didik dengan keahlian
                                dan keterampilan dalam bidang keahlian Bisnis dan Manajemen, khususnya
                                kompetensi keahlian Pemasaran agar dapat bekerja baik secara mandiri atau
                                mengisi lowongan pekerjaan yang ada di dunia usaha dan dunia industri sebagai
                                tenaga kerja tingkat menengah.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mendidik peserta didik agar mampu
                                memilih karir, kompetensi, dan mengembangkan asikap professional dalam bidang
                                keahlian Bisnis dan Manajemen khususnya kompetensi keahlian
                                Pemasaran.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Menjadikan Kompetensi Keahlian
                                Pemasaran sebagai pusat pendidikan dan pelatihan, tempat uji kompetensi dan
                                sertifikasi Kompetensi Keahlian Pemasaran.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Meningkatkan kecerdasan yang
                                bermartabat didasari azas kecakapan hidup di bidang Bisnis Pemasaran (Marketing)
                            </x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Menyelenggarakan pendidikan dan
                                ketrampilan dengan mengedepankan keunggulan, kedisiplinan, kejujuran, berjiwa
                                wirausaha serta memiliki sikap professional yang berorientasi pada masa depan.
                            </x-variasi-ceklist-one>
                        </div>
                        <!-- End Footer Content -->

                        <!-- Footer Content -->
                        <div class="col-lg-4 col-md-4 g-mb-40 g-mb-0--lg">
                            <h2 class="text-success g-font-weight-800">PROSPEK KERJA</h2>
                            <x-variasi-ceklist-one> Marketting</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Administrasi Bisnis</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Account Officer</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Kasir</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Display (Penataan) Barang</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mengelola bisnis online</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mengelola bisnis ritel</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Pramuniaga</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mengelola Usaha Pemasaran</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Telemarketting</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Wirausaha/entrepreneur</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Eksekutif Sales</x-variasi-ceklist-one>
                            @php
                                // Query untuk mendapatkan data berdasarkan kode_kk
                                $photo = DB::table('photo_jurusans')->where('kode_kk', '811')->first();

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


                    @if ($personilBisnisDigital->isNotEmpty())
                        <h2>Guru Produktif</h2>
                        <div class="row">
                            @foreach ($personilBisnisDigital as $personil)
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
