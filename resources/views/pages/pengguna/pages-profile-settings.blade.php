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
            <img src="{{ $personil->bg_profil ? URL::asset('images/bgprofil/' . $personil->bg_profil) : URL::asset('build/images/profile-bg.jpg') }}"
                class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="p-3 text-end">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input"
                            name="bg_profil" required>
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="align-bottom ri-image-edit-line me-1"></i> Change Cover
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="p-4 card-body">
                    <div class="text-center">
                        <div class="mx-auto mb-4 profile-user position-relative d-inline-block">
                            @if ($personil->jeniskelamin == 'Perempuan')
                                <img src="{{ $personil->photo ? URL::asset('images/personil/' . $personil->photo) : URL::asset('images/gurucewek.png') }}"
                                    alt="User Avatar" class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                            @else
                                <img src="{{ $personil->photo ? URL::asset('images/personil/' . $personil->photo) : URL::asset('images/gurulaki.png') }}"
                                    alt="User Avatar" class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                            @endif
                            <div class="p-0 avatar-xs rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" name="profile_image"
                                    class="profile-img-file-input" required>
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="mb-1 fs-16">{{ $personil->namalengkap }}</h5>
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
                <div class="card-header">
                    <ul class="rounded nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#comments" role="tab">
                                <i class="far fa-user"></i>
                                Comments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#loginlog" role="tab">
                                <i class="far fa-user"></i>
                                Login History
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="p-4 card-body">
                    <div class="tab-content">
                        @include('pages.pengguna.tag-personil-detail')
                        @include('pages.pengguna.tag-login-log')
                        @include('pages.pengguna.tag-comments')
                    </div>
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
                    fetch("{{ route('profilpengguna.simpanphotoprofil') }}", {
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

        if (document.querySelector("#profile-foreground-img-file-input")) {
            document.querySelector("#profile-foreground-img-file-input").addEventListener("change", function() {
                var preview = document.querySelector(".profile-wid-img");
                var file = document.querySelector(".profile-foreground-img-file-input").files[0];
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    preview.src = reader.result; // Tampilkan gambar yang dipilih

                    // Membuat FormData untuk mengirim data gambar
                    var formData = new FormData();
                    formData.append("bg_profil", file);

                    // Mengirim request AJAX ke server
                    fetch("{{ route('profilpengguna.simpanphotobackground') }}", {
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
        // Fungsi ini bisa dipanggil secara otomatis pada halaman load
        document.addEventListener("DOMContentLoaded", function() {
            checkSessionAndShowToast(); // Memanggil fungsi saat halaman selesai dimuat
        });
    </script>
    <script src="{{ URL::asset('build/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
