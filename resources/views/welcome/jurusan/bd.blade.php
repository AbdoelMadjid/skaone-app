<div class="d-flex">
    <div class="ms-3 flex-grow-1">
        <ul class="list-inline text-muted mb-3">
            <li class="list-inline-item">
                <i class="ri-building-line align-bottom me-1"></i> Bisnis dan Manajemen
            </li>
            <li class="list-inline-item">
                <i class="ri-user-line align-bottom me-1"></i> {{ $totalSiswaPerKK['811'] }} orang
            </li>
        </ul>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ URL::asset('images/jurusan_logo/logo-bd.png') }}" alt="client-img"
                    class="mx-auto img-fluid d-block">
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
            <div class="col-lg-6">
                <div class="d-flex mb-2">
                    <div class="flex-shrink-0 mt-1">
                        <i class="ri-checkbox-multiple-blank-fill text-info"></i>
                    </div>
                    <div class="flex-grow-1 ms-2"><span class="badge bg-info-subtle text-info fs-5">ROFIL LULUSAN
                            YANG
                            DIHASILKAN</span>
                    </div>
                </div>
                <p class="fs-6 mb-0">Membekali peserta didik Kompetensi Keahlian
                    Bisnis Digital
                    dengan keterampilan, pengetahuan dan sikap agar kompeten dalam :</p>
                <x-variasi-list colorClass="info"> Mencerdaskan kehidupan bangsa dan
                    mengembangkan manusia Indonesia seutuhnya yaitu manusia yang beriman dan
                    bertaqwa Kepada Tuhan YME dan berbudi pekerti luhur memiliki pengetahuan dan
                    keterampilan , kesehatan jasmani dan rohani kepribadian yang mantap dan mandiri.
                </x-variasi-list>
                <x-variasi-list colorClass="info"> Meningkatkan kualitas lulusan yang
                    kompetitif di dunia kerja.</x-variasi-list>
                <x-variasi-list colorClass="info"> Menciptakan situasi kerja dan
                    pembelajaran yang kondusif serta berwawasan lingkungan.</x-variasi-list>
                <x-variasi-list colorClass="info"> Mendidik peserta didik dengan keahlian
                    dan keterampilan dalam bidang keahlian Bisnis dan Manajemen, khususnya
                    kompetensi keahlian Pemasaran agar dapat bekerja baik secara mandiri atau
                    mengisi lowongan pekerjaan yang ada di dunia usaha dan dunia industri sebagai
                    tenaga kerja tingkat menengah.</x-variasi-list>
                <x-variasi-list colorClass="info"> Mendidik peserta didik agar mampu
                    memilih karir, kompetensi, dan mengembangkan asikap professional dalam bidang
                    keahlian Bisnis dan Manajemen khususnya kompetensi keahlian Pemasaran.</x-variasi-list>
                <x-variasi-list colorClass="info"> Menjadikan Kompetensi Keahlian
                    Pemasaran sebagai pusat pendidikan dan pelatihan, tempat uji kompetensi dan
                    sertifikasi Kompetensi Keahlian Pemasaran.</x-variasi-list>
                <x-variasi-list colorClass="info"> Meningkatkan kecerdasan yang
                    bermartabat didasari azas kecakapan hidup di bidang Bisnis Pemasaran (Marketing)
                </x-variasi-list>
                <x-variasi-list colorClass="info"> Menyelenggarakan pendidikan dan
                    ketrampilan dengan mengedepankan keunggulan, kedisiplinan, kejujuran, berjiwa
                    wirausaha serta memiliki sikap professional yang berorientasi pada masa depan.
                </x-variasi-list>
            </div>
            <div class="col-lg-3">
                <span class="badge bg-success-subtle text-success">PROSPEK KERJA</span>
                <x-variasi-list> Marketting</x-variasi-list>
                <x-variasi-list> Administrasi Bisnis</x-variasi-list>
                <x-variasi-list> Account Officer</x-variasi-list>
                <x-variasi-list> Kasir</x-variasi-list>
                <x-variasi-list> Display (Penataan) Barang</x-variasi-list>
                <x-variasi-list> Mengelola bisnis online</x-variasi-list>
                <x-variasi-list> Mengelola bisnis ritel</x-variasi-list>
                <x-variasi-list> Pramuniaga</x-variasi-list>
                <x-variasi-list> Mengelola Usaha Pemasaran</x-variasi-list>
                <x-variasi-list> Telemarketting</x-variasi-list>
                <x-variasi-list> Wirausaha/entrepreneur</x-variasi-list>
                <x-variasi-list> Eksekutif Sales</x-variasi-list>
                @php
                    // Query untuk mendapatkan data berdasarkan kode_kk
                    $photo = DB::table('photo_jurusans')->where('kode_kk', '811')->first();

                    // Tentukan path gambar
                    $imagePath =
                        $photo && $photo->image
                            ? asset('images/jurusan_gmb/' . $photo->image)
                            : asset('images/jurusan_gmb/default.png');
                @endphp
                <img src="{{ $imagePath }}" alt="client-img" class="mx-auto img-fluid d-block mt-5">
            </div>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-ghost-primary btn-icon custom-toggle" data-bs-toggle="button">
            <span class="icon-on"><i class="ri-bookmark-line"></i></span>
            <span class="icon-off"><i class="ri-bookmark-fill"></i></span>
        </button>
    </div>
</div>
