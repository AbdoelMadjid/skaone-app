@extends('layouts.master')
@section('title')
    @lang('translation.users')
@endsection
@section('css')
    {{--  --}}
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.manajemen-pengguna')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-tambah can="create manajemenpengguna/users" route="manajemenpengguna.users.create" label="Tambah"
                        icon="ri-add-line" />
                </div>
            </div>
        </div>
        <div class="card-body p-2">
            <div class="row g-3">
                <div class="col-lg">
                </div>
                <div class="col-lg-auto">
                    <div class="search-box">
                        <input type="text" class="form-control form-control-sm search"
                            placeholder="Search for name user ...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                @if (auth()->check() &&
                        auth()->user()->hasAnyRole(['master']))
                    <div class="col-lg-auto">
                        <div class="d-flex align-items-center gap-2"> <!-- Tambahan baris ini -->
                            <select id="role-select" class="form-select form-select-sm">
                                <option value="">-- Pilih Role --</option>
                                @foreach (\Spatie\Permission\Models\Role::pluck('name') as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            <button id="hapus-role-btn"
                                class="btn btn-danger rounded-pill btn-sm btn-icon waves-effect waves-light w-25"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus Role"><i
                                    class="ri-delete-bin-5-line fs-12"></i></button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    <script></script>
    @if (session('success'))
        <script>
            $(document).ready(function() {
                showToast('success', '{{ session('success') }}');
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            $(document).ready(function() {
                showToast('error', '{{ session('error') }}');
            });
        </script>
    @endif

    @if (session('swal_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    html: '<div class="mt-3">' +
                        '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Well done!</h4>' +
                        '<p class="text-muted mx-4 mb-0">{{ session('swal_success') }}</p>' +
                        '</div>' +
                        '</div>',
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonClass: 'btn btn-primary w-xs mb-1',
                    cancelButtonText: 'Back',
                    buttonsStyling: true,
                    showCloseButton: true
                });
            });
        </script>
    @endif
    <div id="role-alert"></div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script></script>
    <script>
        const datatable = 'user-table';

        $(document).ready(function() {
            const table = $("#user-table").DataTable();

            // Fungsi debounce untuk mengurangi frekuensi reload
            function debounce(func, delay) {
                let timer;
                return function() {
                    const context = this;
                    const args = arguments;
                    clearTimeout(timer);
                    timer = setTimeout(() => func.apply(context, args), delay);
                };
            }

            // Event pencarian
            $(".search-box .search").on(
                "input",
                debounce(function() {
                    table.ajax.reload(); // Reload tabel saat pencarian berubah
                }, 300)
            );
        });

        // Fungsi showToast dari user
        $(document).on('click', '.switch-account-link', function(e) {
            e.preventDefault();

            var userId = $(this).data('user-id');

            $.ajax({
                url: '{{ route('switch.account') }}', // Rute POST yang sudah dibuat
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: userId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        showToast('success', response.message); // Tampilkan notifikasi sukses
                        // Redirect ke dashboard setelah switch akun
                        window.location.href = '{{ route('dashboard') }}';
                    } else {
                        showToast('error', response.message); // Tampilkan notifikasi error
                    }
                },
                error: function(xhr) {
                    showToast('error', 'Something went wrong.');
                }
            });
        });

        $(document).on('change', '.select-role-add', function() {
            var userId = $(this).data('user-id');
            var roleId = $(this).val();

            $.ajax({
                url: '/manajemenpengguna/users/' + userId + '/add-role', // Update the URL as needed
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    role_id: roleId
                },
                success: function(response) {
                    if (response.success) {
                        showToast('success', 'Role added successfully!');
                        $('#user-table').DataTable().ajax.reload(null,
                            false); // false prevents page reset
                    } else {
                        showToast('error', 'Failed to add role.');
                    }
                }
            });
        });


        $(document).on('click', '.btn-reset-password', function() {
            let userId = $(this).data('id');

            // Send AJAX request to reset password
            $.ajax({
                url: `/manajemenpengguna/users/reset-password/${userId}`, // Sesuaikan URL ini sesuai route reset password
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Pastikan CSRF token dikirim
                },
                success: function(response) {
                    // Display SweetAlert
                    Swal.fire({
                        html: '<div class="mt-3">' +
                            '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                            '<div class="mt-4 pt-2 fs-15">' +
                            '<h4>Well done!</h4>' +
                            '<p class="text-muted mx-4 mb-0">' + response.message +
                            '</p>' +
                            '</div>' +
                            '</div>',
                        showCancelButton: true,
                        showConfirmButton: false,
                        cancelButtonClass: 'btn btn-primary w-xs mb-1',
                        cancelButtonText: 'Back',
                        buttonsStyling: true,
                        showCloseButton: true
                    });
                },
                error: function() {
                    Swal.fire('Error', 'Failed to reset password.', 'error');
                }
            });
        });

        $(document).ready(function() {
            $('#hapus-role-btn').on('click', function() {
                const selectedRole = $('#role-select').val();

                if (!selectedRole) {
                    showToast('error', `Role belum dipilih silakan pilih role dulu`);
                } else {
                    Swal.fire({
                        title: 'Yakin ingin menghapus role ini?',
                        text: `Semua user dengan role "${selectedRole}" akan kehilangan role tersebut.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '{{ route('manajemenpengguna.hapus.role.ajax') }}',
                                method: 'DELETE',
                                data: {
                                    role: selectedRole,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    showToast('success', `${response.message}`);
                                    $('#user-table').DataTable().ajax.reload(null,
                                        false);
                                },
                                error: function(xhr) {
                                    showToast('error',
                                        `Terjadi kesalahan: ${xhr.responseJSON.message}`
                                    );
                                }
                            });
                        }
                    });
                }
            });
        });
        /* $('#hapus-role-btn').on('click', function() {
            const selectedRole = $('#role-select').val();

            if (!selectedRole) {
                alert('Silakan pilih role terlebih dahulu.');
                return;
            }

            if (!confirm(`Yakin ingin menghapus role "${selectedRole}" dari semua user?`)) {
                return;
            }

            $.ajax({
                url: '{{ route('manajemenpengguna.hapus.role.ajax') }}',
                method: 'DELETE',
                data: {
                    role: selectedRole,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    showToast('success', `${response.message}`);
                    $('#user-table').DataTable().ajax.reload(null,
                        false); // reload DataTable tanpa reset halaman
                },
                error: function(xhr) {
                    showToast('error', `Terjadi kesalahan: ${xhr.responseJSON.message}`);
                }
            });
        }); */



        handleAction(datatable, function(res) {
            select2Init()
        })
        handleDelete(datatable)
        ScrollDinamicDataTable(datatable, scrollOffsetOverride = 86);
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
