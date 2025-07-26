@extends('layouts.master')
@section('title')
    @lang('translation.catatan-wali-kelas')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.walikelas')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>Nilai @yield('title')
                    <span class="d-none d-lg-inline"> - </span>
                    <br class="d-inline d-lg-none">
                    {{ $waliKelas->rombel }}
                </x-heading-title>
                <div class="flex-shrink-0 me-2">
                    @if (!$catatanWaliKelasExists)
                        <form action="{{ route('walikelas.catatan-wali-kelas.generatecatatanwalikelas') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-soft-primary">Generate Catatan Wali
                                Kelas</button>
                        </form>
                    @else
                        <div></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        function showToast(status = 'success', message) {
            iziToast[status]({
                title: status == 'success' ? 'Success' : (status == 'warning' ? 'Warning' : 'Error'),
                message: message,
                position: 'topRight',
                close: true, // Tombol close
            });
        }

        @if (session('success'))
            showToast("success", "{{ session('success') }}");
        @endif
    </script>
    <script>
        const datatable = 'catatanwalikelas-table';

        $(document).ready(function() {
            // Function to save the catatan
            function saveCatatan(textarea) {
                var id = textarea.data('id');
                var catatan = textarea.val();

                // Make an AJAX call to save the catatan
                $.ajax({
                    url: '/walikelas/catatan-wali-kelas/update-catatan', // Your endpoint to save the catatan
                    method: 'POST',
                    data: {
                        id: id,
                        catatan: catatan, // This can be empty if the textarea is cleared
                        _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                    },
                    success: function(response) {
                        // Handle success (optional)
                        showToast('success', 'Catatan sukses disimpan atau diupdate');
                    },
                    error: function(xhr) {
                        // Handle error (optional)
                        showToast('error', 'Error saving catatan:', xhr);
                    }
                });
            }

            // Listen for keypress event on textarea inputs in the catatan column
            $(document).on('keypress', '.catatan-input', function(e) {
                if (e.which == 13) { // Check if Enter key is pressed
                    e.preventDefault(); // Prevent the default form submission
                    saveCatatan($(this)); // Save the catatan
                }
            });

            // Listen for clicks anywhere on the document
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.catatan-input').length) {
                    // Check if the click is outside the textarea
                    var textarea = $('.catatan-input:focus'); // Get the focused textarea
                    if (textarea.length) {
                        saveCatatan(textarea); // Save the catatan
                    }
                }
            });
        });

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
