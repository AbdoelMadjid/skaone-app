@extends('layouts.master')
@section('title')
    @lang('translation.pembimbing-prakerin')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/multi.js/multi.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.administrator')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
                    <div>
                        {{--  @can('create administratorpkl/pembimbing-prakerin')
                            <a class="btn btn-primary action"
                                href="{{ route('administratorpkl.pembimbing-prakerin.create') }}">Add</a>
                        @endcan --}}
                        <a href="{{ route('administratorpkl.downloadpembprakerin') }}"
                            class="btn btn-soft-primary btn-sm">Download
                            PDF</a>
                        <a class="btn btn-soft-primary btn-sm action"
                            href="{{ route('administratorpkl.pembimbing-prakerin.create') }}">Tambah Guru PKL</a>
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
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/multi.js/multi.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'pembimbingprakerin-table';

        function confirmDelete(id) {
            // Use SweetAlert for confirmation
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send AJAX request to delete the student
                    $.ajax({
                        url: '{{ route('administratorpkl.pembimbing-prakerin.destroy', '') }}/' +
                            id, // Adjust the URL
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // Include CSRF token
                        },
                        success: function(response) {
                            showToast('success', 'Siswa berhasil dihapus!'); // Notify success
                            $('#pembimbingprakerin-table').DataTable().ajax.reload(null, false);
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            showToast('error', 'Gagal menghapus siswa.'); // Notify error
                        }
                    });
                }
            });
        }

        handleDataTableEvents(datatable);
        handleAction(datatable, function(res) {
            select2Init();
        })
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
