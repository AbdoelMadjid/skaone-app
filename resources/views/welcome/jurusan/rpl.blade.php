<div class="d-flex">
    <div class="ms-3 flex-grow-1">
        <ul class="list-inline text-muted mb-3">
            <li class="list-inline-item">
                <i class="ri-building-line align-bottom me-1"></i> Teknik Informatika
            </li>
            <li class="list-inline-item">
                <i class="ri-user-line align-bottom me-1"></i> {{ $totalSiswaPerKK['411'] }} orang
            </li>
        </ul>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ URL::asset('images/jurusan_logo/logo-rpl.png') }}" alt="client-img"
                    class="mx-auto img-fluid d-block">
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
            <div class="col-lg-6">
                <div class="d-flex mb-2">
                    <div class="flex-shrink-0 mt-1">
                        <i class="ri-checkbox-multiple-blank-fill text-info"></i>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <span class="badge bg-info-subtle text-info fs-5">ROFIL LULUSAN YANG DIHASILKAN</span>
                    </div>
                </div>
                <p class="fs-6 mb-0">Membekali peserta didik Kompetensi Keahlian
                    Rekayasa Perangkat Lunak
                    dengan keterampilan, pengetahuan dan sikap agar kompeten dalam :</p>
                <x-variasi-list colorClass="info"> Mencerdaskan kehidupan bangsa dan
                    mengembangkan manusia Indoensia seutuhnya, yaitu manusia yang beriman dan
                    bertaqwa terhadap Tuhan Yang Maha Esa dan berbudi pekerti luhur, memiliki
                    pengetahuan dan keterampilan, kesehatan jasmani dan rohani, kepribadian yang
                    mantap dan mandiri.</x-variasi-list>
                <x-variasi-list colorClass="info"> Berjiwa sosial yang tinggi dalam
                    kehidupan bermasyarakat, berbangsa dan bernegara.</x-variasi-list>
                <x-variasi-list colorClass="info"> Mampu Merakit, Menginstalasi, Merawat,
                    dan Memperbaiki Personal Computer (PC).</x-variasi-list>
                <x-variasi-list colorClass="info"> Mampu menginstalasi sistem operasi dan
                    menginstalasi aplikasi-aplikasi komputer baik opened source ataupun closed
                    source.</x-variasi-list>
                <x-variasi-list colorClass="info"> Mampu menginstalasi jaringan lokal dan
                    mengoperasikan jaringan wired dan wireless</x-variasi-list>
                <x-variasi-list colorClass="info"> Mampu merancang, membuat dan
                    mengaplikasikan tampilan website secara statis.</x-variasi-list>
                <x-variasi-list colorClass="info"> Mampu membuat, mengelola dan
                    memelihara aplikasi website dinamis</x-variasi-list>
                <x-variasi-list colorClass="info"> Mampu membuat, mengelola dan
                    memelihara aplikasi berbasis desktop client-server..</x-variasi-list>
                <x-variasi-list colorClass="info"> Mampu merancang, membuat, mengelola
                    dan memelihara basis data client-server</x-variasi-list>
                <x-variasi-list colorClass="info"> Mampu merancang berbagai perangkat
                    lunak berbagai platform dengan berbagai teknik pemodelan perangkat lunak.</x-variasi-list>
            </div>
            <div class="col-lg-3">
                <span class="badge bg-success-subtle text-success">PROSPEK KERJA</span>
                <x-variasi-list> Web Application Programmer</x-variasi-list>
                <x-variasi-list> Database Programmer</x-variasi-list>
                <x-variasi-list> Interfacing Programmer</x-variasi-list>
                <x-variasi-list> Mobile Application Programmer (Java
                    and Android)</x-variasi-list>
                <x-variasi-list> Desktop Application Programmer</x-variasi-list>
                <x-variasi-list> C++ Programmer</x-variasi-list>
                <x-variasi-list> Game Programmer</x-variasi-list>
                <x-variasi-list> Hardware and Software Technicians</x-variasi-list>
                <x-variasi-list> IT Support and IT Staff</x-variasi-list>
                <x-variasi-list> Pekerjaan-pekerjaan lainnya yang
                    berbasis komputer</x-variasi-list>
                @php
                    // Query untuk mendapatkan data berdasarkan kode_kk
                    $photo = DB::table('photo_jurusans')->where('kode_kk', '411')->first();

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
