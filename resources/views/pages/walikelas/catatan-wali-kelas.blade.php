@extends('layouts.master')
@section('title')
    @lang('translation.catatan-wali-kelas')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.walikelas')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title') - {{ $waliKelas->rombel }}
                    </h5>
                    <div>
                        @if (!$catatanWaliKelasExists)
                            <form action="{{ route('walikelas.catatan-wali-kelas.generatecatatanwalikelas') }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="btn btn-soft-primary">Generate Catatan Wali Kelas</button>
                            </form>
                        @else
                            <div></div>
                        @endif
                    </div>
                </div>
                <div class="card-body p-1">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- DataTables Buttons --}}
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


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
