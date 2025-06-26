<div class="d-flex">
    <div class="ms-3 flex-grow-1">
        <ul class="list-inline text-muted mb-3">
            <li class="list-inline-item">
                <i class="ri-building-line align-bottom me-1"></i> Teknik Informatika
            </li>
            <li class="list-inline-item">
                <i class="ri-user-line align-bottom me-1"></i> {{ $totalSiswaPerKK['421'] }} orang
            </li>
        </ul>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ URL::asset('images/jurusan_logo/logo-tkj.png') }}" alt="client-img"
                    class="mx-auto img-fluid d-block">
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
                <p class='fs-6 mb-1'>Tujuan Kompetensi Keahlian Teknik Komputer dan Jaringan
                    secara umum mengacu pada isi Undang-Undang Sistem Pendidikan Nasional (UU SPN) pasal
                    3 dan penjelasan pasal 15 mengenai Tujuan Pendidikan Nasional yang menyebutkan bahwa
                    pendidikan kejuruan merupakan pendidikan menengah yang mempersiapkan peserta didik
                    terutama untuk bekerja dalam bidang tertentu.</p>
                <p class='mb-1 fs-6'>Secara khusus tujuan Program Keahlian Teknik Komputer dan
                    Jaringan adalah membekali peserta didik dengan keterampilan, pengetahuan dan sikap
                    agar kompeten, dengan kegiatan :</p>
                <x-variasi-list colorClass="info"> Mendidik peserta didik dengan keahlian
                    dan keterampilan dalam program keahlian teknik Komputer dan Jaringan agar dapat
                    bekerja baik secara mandiri atau mengisi lowongan pekerjaan yang ada di dunia
                    usaha dan dunia industri sebagai tenaga kerja tingkat menengah;</x-variasi-list>
                <x-variasi-list colorClass="info"> Mendidik peserta didik agar mampu
                    memilih karir, berkompetisi, dan mengembangkan sikap profesional dalam program
                    keahlian Komputer dan Jaringan;</x-variasi-list>
                <x-variasi-list colorClass="info"> Membekali peserta didik dengan ilmu
                    pengetahuan dan keterampilan sebagai bekal bagi yang berminat untuk melanjutkan
                    pendidikan. Kurikulum yang digunakan di Teknik Komputer dan Jaringan menggunakan
                    Kurikulum 2013.</x-variasi-list>
            </div>
            <div class="col-lg-3">
                <span class="badge bg-success-subtle text-success">PROSPEK KERJA</span>
                <x-variasi-list> IT Support</x-variasi-list>
                <x-variasi-list> Installation</x-variasi-list>
                <x-variasi-list> Networking</x-variasi-list>
                <x-variasi-list> Maintenance</x-variasi-list>
                <x-variasi-list> Teknisi Komputer</x-variasi-list>
                <x-variasi-list> Teknisi Jaringan</x-variasi-list>
                <x-variasi-list> Administrator Jaringan Level Dasar</x-variasi-list>
                <x-variasi-list> Administrator Jaringan Level Terampil</x-variasi-list>
                <x-variasi-list> Administrator Jaringan Level Mahir</x-variasi-list>
                <x-variasi-list> Pekerjaan-pekerjaan lainnya yang
                    berbasis komputer dan jaringan</x-variasi-list>
                @php
                    // Query untuk mendapatkan data berdasarkan kode_kk
                    $photo = DB::table('photo_jurusans')->where('kode_kk', '421')->first();

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
