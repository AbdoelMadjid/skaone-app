<script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins.js') }}"></script>
<script src="{{ URL::asset('build/libs/izitoast/js/iziToast.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@yield('script')
<script src="{{ URL::asset('build/js/main.js') }}"></script>
@yield('script-bottom')
@if (session('errorRole'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('errorRole') }}",
            confirmButtonText: 'OK'
        })
    </script>
@endif
<!-- Tampilkan notifikasi sukses -->
@if (session('success-chache'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Clear Chache Berhasil di Eksekusi',
            text: @json(session('success')),
            confirmButtonText: 'OK'
        });
    </script>
@endif
