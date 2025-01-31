<section class="g-py-30">
    <div class="container">
        <header class="text-center g-width-80x--md mx-auto g-mb-10">
            <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                <h6 class="g-font-size-12 g-font-weight-600">Kompetensi Keahlian</h6>
                <h2 class="h3 u-heading-v6__title g-brd-primary g-color-gray-dark-v2 g-font-weight-600">Teknik Komputer
                    dan Jaringan
                </h2>
            </div>
        </header>
        <!-- Lightbox Single Image -->
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid" src="{{ URL::asset('images/logojurusan/logo-tkj.png') }}" alt="Image Description">
                <hr class="g-brd-gray-light-v4 g-my-60">
                <header class="text-center mx-auto g-mb-10">
                    <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                        <h6 class="g-font-size-12 g-font-weight-600">Ketua Kompetensi Keahlian</h6>
                    </div>
                </header>
                <img class="img-fluid img-thumbnail g-rounded-10 g-mb-20"
                    src="{{ URL::asset('images/welcome/personil/tkj/personil_0005.jpg') }}" alt="Image Description">
                <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                    <h6 class="g-font-size-12">Otong Sunahdi S.T.</h6>
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
                        @foreach ($jumlahSiswaPerKK['421'] as $row)
                            <tr>
                                <td align="center">{{ $row->rombel_tingkat }}</td>
                                <td align="center">{{ $row->jumlah_siswa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td align="center"><strong>Total</strong></td>
                            <td align="center"><strong>{{ $totalSiswaPerKK['421'] }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <p class="text-danger fs-6">{{ terbilang($totalSiswaPerKK['421']) }} orang</p>
            </div>
            <div class="col-md-9">
                <!-- Footer -->
                <div class="container g-mb-60">
                    <div class="row">
                        <!-- Footer Content -->
                        <div class="col-lg-8 col-md-8 g-mb-40 g-mb-0--lg">
                            <!-- Taglines Bordered -->
                            <h2 class="g-color-primary g-font-weight-800">ROFIL LULUSAN YANG DIHASILKAN</h2>
                            <p class='fs-6 mb-1'>Tujuan Kompetensi Keahlian Teknik Komputer dan Jaringan
                                secara umum mengacu pada isi Undang-Undang Sistem Pendidikan Nasional (UU SPN) pasal
                                3 dan penjelasan pasal 15 mengenai Tujuan Pendidikan Nasional yang menyebutkan bahwa
                                pendidikan kejuruan merupakan pendidikan menengah yang mempersiapkan peserta didik
                                terutama untuk bekerja dalam bidang tertentu.</p>
                            <p class='mb-1 fs-6'>Secara khusus tujuan Program Keahlian Teknik Komputer dan
                                Jaringan adalah membekali peserta didik dengan keterampilan, pengetahuan dan sikap
                                agar kompeten, dengan kegiatan :</p>
                            <x-variasi-ceklist-one> Mendidik peserta didik dengan keahlian
                                dan keterampilan dalam program keahlian teknik Komputer dan Jaringan agar dapat
                                bekerja baik secara mandiri atau mengisi lowongan pekerjaan yang ada di dunia
                                usaha dan dunia industri sebagai tenaga kerja tingkat menengah;</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Mendidik peserta didik agar mampu
                                memilih karir, berkompetisi, dan mengembangkan sikap profesional dalam program
                                keahlian Komputer dan Jaringan;</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Membekali peserta didik dengan ilmu
                                pengetahuan dan keterampilan sebagai bekal bagi yang berminat untuk melanjutkan
                                pendidikan. Kurikulum yang digunakan di Teknik Komputer dan Jaringan menggunakan
                                Kurikulum 2013.</x-variasi-ceklist-one>
                        </div>
                        <!-- End Footer Content -->

                        <!-- Footer Content -->
                        <div class="col-lg-4 col-md-4 g-mb-40 g-mb-0--lg">
                            <h2 class="text-success g-font-weight-800">PROSPEK KERJA</h2>
                            <x-variasi-ceklist-one> IT Support</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Installation</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Networking</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Maintenance</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Teknisi Komputer</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Teknisi Jaringan</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Administrator Jaringan Level Dasar</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Administrator Jaringan Level Terampil</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Administrator Jaringan Level Mahir</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Pekerjaan-pekerjaan lainnya yang
                                berbasis komputer dan jaringan</x-variasi-ceklist-one>
                            @php
                                // Query untuk mendapatkan data berdasarkan kode_kk
                                $photo = DB::table('photo_jurusans')->where('kode_kk', '421')->first();

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


                    @if ($personilTKJ->isNotEmpty())
                        <h2>Guru Produktif</h2>
                        <div class="row">
                            @foreach ($personilTKJ as $personil)
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
