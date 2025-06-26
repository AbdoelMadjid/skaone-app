<div class="d-flex">
    <div class="ms-3 flex-grow-1">
        <ul class="list-inline text-muted mb-3">
            <li class="list-inline-item">
                <i class="ri-building-line align-bottom me-1"></i> Bisnis dan Manajemen
            </li>
            <li class="list-inline-item">
                <i class="ri-user-line align-bottom me-1"></i> {{ $totalSiswaPerKK['821'] }} orang
            </li>
        </ul>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ URL::asset('images/jurusan_logo/logo-mp.png') }}" alt="client-img"
                    class="mx-auto img-fluid d-block">
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
                    Manajemen Perkantoran
                    dengan keterampilan, pengetahuan dan sikap agar kompeten dalam :</p>
                <x-variasi-list colorClass="info"> Mencerdaskan kehidupan bangsa dan
                    mengembangkan manusia Indoensia seutuhnya, yaitu manusia yang beriman dan
                    bertaqwa terhadap Tuhan Yang Maha Esa dan berbudi pekerti luhur, memiliki
                    pengetahuan dan keterampilan, kesehatan jasmani dan rohani, kepribadian yang
                    mantap dan mandiri.</x-variasi-list>
                <x-variasi-list colorClass="info"> Meningkatkan kekualitas lulusan yang
                    kompetitif di dunia kerja.</x-variasi-list>
                <x-variasi-list colorClass="info"> Menciptakan situasi kerja dan
                    pembelajaran yang kondusif serta berwawasan lingkungan.</x-variasi-list>
                <x-variasi-list colorClass="info"> Menyiapkan peserta didik dengan
                    pengetahuan dan ketrampilan dalam kompetensi keahlian Otomatisasi dan Tata
                    Kelola Perkantoran agar dapat bekerja dengan baik dan dapat mengisi formasi
                    pekerjaan yang ada di dunia usaha maupun industri sebagai tenaga kerja tingkat
                    menengah.</x-variasi-list>
                <x-variasi-list colorClass="info"> Membekali peserta didik dengan
                    keahlian di bidang perkantoran antara lain dalam hal pelayanan informasi,
                    pelayanan prima.</x-variasi-list>
                <x-variasi-list colorClass="info"> Membekali peserta didik agar trampil
                    dalam mengelola administrasi keuangan dan perjalanan dinas.</x-variasi-list>
                <x-variasi-list colorClass="info"> Membekali peserta didik agar trampil
                    dalam mengelola administrasi kepegawaian, administrasi sarana dan prasarana,
                    administrasi humas dan keprotokolan</x-variasi-list>
                <x-variasi-list colorClass="info"> Menyelenggarakan pendidikan dan
                    keterampilan dengan mengedepankan keunggulan, kedisiplinan, kejujuran,
                    berjiwawirausaha, serta memiliki sikap professional yang berorientasi masa
                    depan.</x-variasi-list>
            </div>
            <div class="col-lg-3">
                <span class="badge bg-success-subtle text-success">PROSPEK KERJA</span>
                <x-variasi-list> Administrasi Perkantoran Yunior</x-variasi-list>
                <x-variasi-list> Juru Tata Usaha Kantor</x-variasi-list>
                <x-variasi-list> Administrasi Perkantoran Muda (Yunior Secretary)</x-variasi-list>
                <x-variasi-list> Juru Tik</x-variasi-list>
                <x-variasi-list> Resepsionis</x-variasi-list>
                <x-variasi-list> Juru Steno</x-variasi-list>
                <x-variasi-list> Operator Komputer</x-variasi-list>
                <x-variasi-list> Operator Telepon, Telex dan Facsimile,</x-variasi-list>
                <x-variasi-list> Arsiparis / Agendaris</x-variasi-list>
                <x-variasi-list> Petugas Humas / Keprotokola</x-variasi-list>
                <x-variasi-list> Berbagai lembaga/ organisasi
                    pemerintah atau swasta</x-variasi-list>
                @php
                    // Query untuk mendapatkan data berdasarkan kode_kk
                    $photo = DB::table('photo_jurusans')->where('kode_kk', '821')->first();

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
