@extends('layouts.master')
@section('title')
    @lang('translation.users')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.manajemen-pengguna')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.users')</h5>
            <div></div>
        </div>
        <div class="card-header">
            <div class="row justify-content-between gy-3">
                <div class="col-lg-3">
                    <div class="search-box">
                        <input type="text" class="form-control search" placeholder="Search for name user...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="d-md-flex text-nowrap gap-2">
                        @can('create manajemenpengguna/users')
                            <a class="btn btn-soft-primary action" href="{{ route('manajemenpengguna.users.create') }}">
                                <i class="ri-add-fill me-1 align-bottom"></i> Add User</a>
                        @endcan
                        <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                            class="btn btn-soft-primary"><i class="ri-more-2-fill"></i></button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                            <li><a class="dropdown-item" href="#">All</a></li>
                            <li><a class="dropdown-item" href="#">Last Week</a></li>
                            <li><a class="dropdown-item" href="#">Last Month</a></li>
                            <li><a class="dropdown-item" href="#">Last Year</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div {{-- class="px-4 mx-n4 mt-n3 mb-0" --}} id="datatable-wrapper" style="height: calc(100vh - 365px);">
                {!! $dataTable->table([
                    'class' => 'table table-striped hover',
                    'style' => 'width:100%',
                ]) !!}
            </div>
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
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'user-table';

        ScrollDinamicDataTable(datatable); // Initialize dynamic scrolling for DataTable

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

        handleAction(datatable, function(res) {
            select2Init()
        })
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
