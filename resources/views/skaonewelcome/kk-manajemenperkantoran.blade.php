<section class="g-mb-10">
    <div class="container">
        <header class="text-center g-width-80x--md mx-auto g-mb-10">
            <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                <h6 class="g-font-size-12 g-font-weight-600">Kompetensi Keahlian</h6>
                <h2 class="h3 u-heading-v6__title g-brd-primary g-color-gray-dark-v2 g-font-weight-600">Manajemen
                    Perkantoran
                </h2>
            </div>
        </header>
        <!-- Lightbox Single Image -->
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid" src="{{ URL::asset('images/logojurusan/logo-mp.png') }}" alt="Image Description">
                <hr class="g-brd-gray-light-v4 g-my-60">
                <header class="text-center mx-auto g-mb-10">
                    <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                        <h6 class="g-font-size-12 g-font-weight-600">Ketua Kompetensi Keahlian</h6>
                    </div>
                </header>
                <img class="img-fluid img-thumbnail g-rounded-10 g-mb-20"
                    src="{{ URL::asset('images/welcome/personil/mperkantoran/personil_0003.jpg') }}"
                    alt="Image Description">
                <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                    <h6 class="g-font-size-12">Ratno Admamin S.Pd</h6>
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
                        @foreach ($jumlahSiswaPerKK['821'] as $row)
                            <tr>
                                <td align="center">{{ $row->rombel_tingkat }}</td>
                                <td align="center">{{ $row->jumlah_siswa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td align="center"><strong>Total</strong></td>
                            <td align="center"><strong>{{ $totalSiswaPerKK['821'] }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <p class="text-danger fs-6">{{ terbilang($totalSiswaPerKK['821']) }} orang</p>
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
                                Manajemen Perkantoran
                                dengan keterampilan, pengetahuan dan sikap agar kompeten dalam :</p>
                            <x-variasi-ceklist-one> Mencerdaskan kehidupan bangsa dan
                                mengembangkan manusia Indoensia seutuhnya, yaitu manusia yang beriman dan
                                bertaqwa terhadap Tuhan Yang Maha Esa dan berbudi pekerti luhur, memiliki
                                pengetahuan dan keterampilan, kesehatan jasmani dan rohani, kepribadian yang
                                mantap dan mandiri.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Meningkatkan kekualitas lulusan yang
                                kompetitif di dunia kerja.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Menciptakan situasi kerja dan
                                pembelajaran yang kondusif serta berwawasan lingkungan.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Menyiapkan peserta didik dengan
                                pengetahuan dan ketrampilan dalam kompetensi keahlian Otomatisasi dan Tata
                                Kelola Perkantoran agar dapat bekerja dengan baik dan dapat mengisi formasi
                                pekerjaan yang ada di dunia usaha maupun industri sebagai tenaga kerja tingkat
                                menengah.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Membekali peserta didik dengan
                                keahlian di bidang perkantoran antara lain dalam hal pelayanan informasi,
                                pelayanan prima.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Membekali peserta didik agar trampil
                                dalam mengelola administrasi keuangan dan perjalanan dinas.</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Membekali peserta didik agar trampil
                                dalam mengelola administrasi kepegawaian, administrasi sarana dan prasarana,
                                administrasi humas dan keprotokolan</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Menyelenggarakan pendidikan dan
                                keterampilan dengan mengedepankan keunggulan, kedisiplinan, kejujuran,
                                berjiwawirausaha, serta memiliki sikap professional yang berorientasi masa
                                depan.</x-variasi-ceklist-one>
                        </div>
                        <!-- End Footer Content -->

                        <!-- Footer Content -->
                        <div class="col-lg-4 col-md-4 g-mb-40 g-mb-0--lg">
                            <h2 class="text-success g-font-weight-800">PROSPEK KERJA</h2>
                            <x-variasi-ceklist-one> Administrasi Perkantoran Yunior</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Juru Tata Usaha Kantor</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Administrasi Perkantoran Muda (Yunior
                                Secretary)</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Juru Tik</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Resepsionis</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Juru Steno</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Operator Komputer</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Operator Telepon, Telex dan Facsimile,</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Arsiparis / Agendaris</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Petugas Humas / Keprotokola</x-variasi-ceklist-one>
                            <x-variasi-ceklist-one> Berbagai lembaga/ organisasi
                                pemerintah atau swasta</x-variasi-ceklist-one>
                            @php
                                // Query untuk mendapatkan data berdasarkan kode_kk
                                $photo = DB::table('photo_jurusans')->where('kode_kk', '821')->first();

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


                    @if ($personilMPerkantoran->isNotEmpty())
                        <h2>Guru Produktif</h2>
                        <div class="row">
                            @foreach ($personilMPerkantoran as $personil)
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
