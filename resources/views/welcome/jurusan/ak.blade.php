<div class="d-flex">
    <div class="ms-3 flex-grow-1">
        <ul class="list-inline text-muted mb-3">
            <li class="list-inline-item">
                <i class="ri-building-line align-bottom me-1"></i> Bisnis dan Manajemen
            </li>
            <li class="list-inline-item">
                <i class="ri-user-line align-bottom me-1"></i> {{ $totalSiswaPerKK['833'] }} orang (
                {{ terbilang($totalSiswaPerKK['833']) }})
            </li>
        </ul>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ URL::asset('images/jurusan_logo/logo-ak.png') }}" alt="client-img"
                    class="mx-auto img-fluid d-block">
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th>Tingkat</th>
                            <th>Jumlah Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jumlahSiswaPerKK['833'] as $row)
                            <tr>
                                <td align="center">{{ $row->rombel_tingkat }}</td>
                                <td align="center">{{ $row->jumlah_siswa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td align="center"><strong>Total</strong></td>
                            <td align="center"><strong>{{ $totalSiswaPerKK['833'] }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <p class="text-danger fs-6">{{ terbilang($totalSiswaPerKK['833']) }} orang</p>
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
                    Akuntansi
                    dengan keterampilan, pengetahuan dan sikap agar kompeten dalam :</p>
                <x-variasi-list colorClass="info"> Mencerdaskan kehidupan bangsa dan
                    mengembangkan manusia Indoensia seutuhnya, yaitu manusia yang
                    beriman dan
                    bertaqwa terhadap Tuhan Yang Maha Esa dan berbudi pekerti luhur,
                    memiliki
                    pengetahuan dan keterampilan, kesehatan jasmani dan rohani,
                    kepribadian yang
                    mantap dan mandiri serta rasa tanggung jawab kemasyarakatan dan
                    kebangsaan.</x-variasi-list>
                <x-variasi-list colorClass="info"> Meningkatkan kualitas lulusan yang
                    kompetitif di dunia kerja</x-variasi-list>
                <x-variasi-list colorClass="info"> Menciptakan situasi kerja dan
                    pembelajaran yang kondusif serta berwawasan
                    lingkungan.</x-variasi-list>
                <x-variasi-list colorClass="info"> Mendidik peserta didik dengan
                    keahlian
                    dan keterampilan dalam bidang keahlian Bisnis dan Manajemen,
                    khususnya
                    kompetensi keahlian Akuntansi agar dapat bekerja baik secara mandiri
                    atau
                    mengisi lowongan pekerjaan yang ada di dunia usaha dan dunia
                    industri
                    sebagai
                    tenaga kerja tingkat menengah.</x-variasi-list>
                <x-variasi-list colorClass="info"> Mendidik peserta didik agar mampu
                    memilih karir, kompetensi, dan mengembangkan sikap professional
                    dalam bidang
                    keahlian Bisnis dan Manajemen khususnya kompetensi keahlian
                    Akuntansi.</x-variasi-list>
                <x-variasi-list colorClass="info"> Menjadikan Kompetensi Keahlian
                    Akuntansi Keuangan dan Lembaga sebagai pusat pendidikan dan
                    pelatihan,
                    tempat
                    uji kompetensi dan sertifikasi Kompetensi Keahlian Akuntansi
                    Keuangan dan
                    Lembaga.</x-variasi-list>
                <x-variasi-list colorClass="info"> Meningkatkan kecerdasan yang
                    bermartabat didasari azas kecakapan hidup di bidang kompetensi
                    Akuntansi</x-variasi-list>
                <x-variasi-list colorClass="info"> Menyelenggarakan pendidikan dan
                    keterampilan dengan mengedepankan keunggulan, kedisiplinan,
                    kejujuran,
                    berjiwa
                    wirausaha, serta memiliki sikap professional yang berorientasi masa
                    depan.</x-variasi-list>
            </div>
            <div class="col-lg-3">
                <span class="badge bg-success-subtle text-success">PROSPEK KERJA</span>
                <x-variasi-list> Instansi pemerintahan</x-variasi-list>
                <x-variasi-list> BUMN/BUMS</x-variasi-list>
                <x-variasi-list> Perbankan</x-variasi-list>
                <x-variasi-list> Lembaga sosial</x-variasi-list>
                <x-variasi-list> Usaha mandiri</x-variasi-list>
                <x-variasi-list> Kasir/teller</x-variasi-list>
                <x-variasi-list> Operasi mesin hitung</x-variasi-list>
                <x-variasi-list> Juru penggajian</x-variasi-list>
                <x-variasi-list> Operator komputer</x-variasi-list>
                <x-variasi-list> Administrasi gudang</x-variasi-list>
                <x-variasi-list> Menyusun laporan keuangan</x-variasi-list>
                @php
                    // Query untuk mendapatkan data berdasarkan kode_kk
                    $photo = DB::table('photo_jurusans')->where('kode_kk', '833')->first();

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
