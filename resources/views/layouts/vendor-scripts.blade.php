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

@if (session('errorAmbilData'))
    <script>
        const message = `{!! session('errorAmbilData') !!}`;

        Swal.fire({
            html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                '<h4>Oops...! Something went Wrong !</h4>' +
                message +
                '</div>' +
                '</div>',
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonClass: 'btn btn-primary w-xs mb-1',
            cancelButtonText: 'Dismiss',
            buttonsStyling: true,
            showCloseButton: true
        })
    </script>
@endif
