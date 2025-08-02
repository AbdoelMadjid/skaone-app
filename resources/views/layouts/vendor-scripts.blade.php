<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins.js') }}"></script>
<script src="{{ URL::asset('build/libs/izitoast/js/iziToast.min.js') }}"></script>

{{-- Sweet Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.all.min.js"></script>

{{-- DataTables JS --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

{{-- select 2 --}}
{{-- <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@yield('script')
<script src="{{ URL::asset('build/js/main.js') }}"></script>
@yield('script-bottom')

{{-- <script>
    window.addEventListener('DOMContentLoaded', showSessionSwal);
</script> --}}
<script>
    window.addEventListener('DOMContentLoaded', showSessionNotification);
</script>
