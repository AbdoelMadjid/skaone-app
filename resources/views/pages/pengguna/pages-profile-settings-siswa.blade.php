@extends('layouts.master')
@section('title')
    @lang('translation.profil-pengguna')
@endsection
@section('css')
    {{--  --}}
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.profilpengguna')
        @endslot
    @endcomponent
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="p-4 card-body">
                    <div class="text-center">
                        <div class="mx-auto mb-4 profile-user position-relative d-inline-block">
                            @if ($pesertaDidik->foto == 'siswacowok.png')
                                <img src="{{ URL::asset('images/siswacowok.png') }}" alt="User Avatar"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                            @elseif ($pesertaDidik->foto == 'siswacewek.png')
                                <img src="{{ URL::asset('images/siswacowok.png') }}" alt="User Avatar"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                            @else
                                <img src="{{ URL::asset('images/peserta_didik/' . $pesertaDidik->foto) }}" alt="User Avatar"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                            @endif
                            {{-- <div class="p-0 avatar-xs rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" name="profile_image"
                                    class="profile-img-file-input" required>
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div> --}}
                        </div>
                        <h5 class="mb-1 fs-16">{{ $pesertaDidik->nama_lengkap }}</h5>
                        <p class="mb-0 text-muted">{{ $user->role_labels }}</p>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="mb-0 card-title">Your Profile</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i
                                    class="align-bottom ri-edit-box-line me-1"></i> Edit</a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-0">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                            Login</p>
                        <div>
                            <span class="text-success fw-medium fs-12">{{ Auth::user()->login_count }} x</span>
                        </div>
                    </div><!-- end -->
                </div>
            </div>
            <div class="card">

            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                {{-- <div class="card-header">
                    <ul class="rounded nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Identitas Peserta Didik
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#ortusiswa" role="tab">
                                <i class="far fa-user"></i>
                                Orang Tua Peserta Didik
                            </a>
                        </li>
                    </ul>
                </div> --}}
                <div class="p-4 card-body">
                    {{-- <div class="tab-content"> --}}
                    <form action="{{ route('profilpengguna.profil-pengguna.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('pages.pengguna.tag-siswa-detail')
                        @include('pages.pengguna.tag-ortu-siswa')
                        {{-- === SUBMIT BUTTON UNTUK KESELURUHAN === --}}
                        <div class="col-lg-12">
                            <div class="gap-2 hstack justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan Seluruh Data</button>
                            </div>
                        </div>
                    </form>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
@endsection
@section('script')
    <script>
        // Meng-handle perubahan pada input file
        if (document.querySelector("#profile-img-file-input")) {
            document.querySelector("#profile-img-file-input").addEventListener("change", function() {
                var preview = document.querySelector(".user-profile-image");
                var file = document.querySelector(".profile-img-file-input").files[0];
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    preview.src = reader.result; // Tampilkan gambar yang dipilih

                    // Membuat FormData untuk mengirim data gambar
                    var formData = new FormData();
                    formData.append("profile_image", file);

                    // Mengirim request AJAX ke server
                    fetch("{{ route('profilpengguna.simpanphotoprofilsiswa') }}", {
                            method: "POST",
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Menambahkan CSRF token
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                return response.json();
                            }
                            throw new Error('Failed to upload image.');
                        })
                        .then(data => {
                            // Menampilkan notifikasi sukses
                            showToast('success', 'Data berhasil diperbarui!');
                        })
                        .catch(error => {
                            console.error(error);
                            // Menampilkan pesan kesalahan jika terjadi
                            showToast('error', 'Terjadi kesalahan: ' + error.message);
                        });
                }, false);

                if (file) {
                    reader.readAsDataURL(file); // Tampilkan gambar di preview
                }
            });
        }
    </script>
    <script>
        document.getElementById('sameAsStudentAddress').addEventListener('change', function() {
            if (this.checked) {
                // Ambil data dari input hidden siswa
                document.getElementById('ortu_alamat_blok').value = document.getElementById('alamat_blok').value;
                document.getElementById('ortu_alamat_norumah').value = document.getElementById('alamat_norumah')
                    .value;
                document.getElementById('ortu_alamat_rt').value = document.getElementById('alamat_rt').value;
                document.getElementById('ortu_alamat_rw').value = document.getElementById('alamat_rw').value;
                document.getElementById('ortu_alamat_kodepos').value = document.getElementById('alamat_kodepos')
                    .value;
                document.getElementById('ortu_alamat_desa').value = document.getElementById('alamat_desa').value;
                document.getElementById('ortu_alamat_kec').value = document.getElementById('alamat_kec').value;
                document.getElementById('ortu_alamat_kab').value = document.getElementById('alamat_kab').value;
            } else {
                // Kosongkan data jika checkbox tidak dicentang
                document.getElementById('ortu_alamat_blok').value = '';
                document.getElementById('ortu_alamat_norumah').value = '';
                document.getElementById('ortu_alamat_rt').value = '';
                document.getElementById('ortu_alamat_rw').value = '';
                document.getElementById('ortu_alamat_kodepos').value = '';
                document.getElementById('ortu_alamat_desa').value = '';
                document.getElementById('ortu_alamat_kec').value = '';
                document.getElementById('ortu_alamat_kab').value = '';
            }
        });
        // Fungsi ini bisa dipanggil secara otomatis pada halaman load
        document.addEventListener("DOMContentLoaded", function() {
            checkSessionAndShowToast(); // Memanggil fungsi saat halaman selesai dimuat
        });
    </script>
    <script src="{{ URL::asset('build/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
