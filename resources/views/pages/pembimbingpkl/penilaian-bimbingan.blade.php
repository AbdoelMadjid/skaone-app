@extends('layouts.master')
@section('title')
    @lang('translation.penilaian-bimbingan')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.pembimbing-prakerin')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @yield('title')</h5>
                    <div>
                        @if (!$semuaSudahDinilai)
                            <form action="{{ route('pembimbingpkl.generate.nilai.prakerin') }}" method="POST"
                                class="generate-nilai-form">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary generate-btn">
                                    Generate Nilai Prakerin
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    @if (session('success'))
        <div id="session-message" data-message="{{ session('success') }}"></div>
    @endif
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
        document.querySelectorAll('.generate-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Cegah form submit langsung

                Swal.fire({
                    title: 'Yakin ingin generate nilai?',
                    text: "Pastikan semua data sudah benar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, lanjutkan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit(); // Submit form jika dikonfirmasi
                    }
                });
            });
        });

        $(document).on('keydown', '.input-cp4', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();

                const input = $(this);
                const nis = input.data('nis');
                const nilai = input.val();

                if (!nilai || nilai < 0 || nilai > 100) {
                    showToast('error', 'Nilai CP4 harus antara 0 - 100');
                    return;
                }

                $.ajax({
                    url: '{{ route('pembimbingpkl.update.cp4') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nis: nis,
                        cp4: nilai
                    },
                    success: function(response) {
                        showToast('success', 'Nilai CP4 berhasil disimpan');
                    },
                    error: function() {
                        showToast('error', 'Terjadi kesalahan saat menyimpan nilai CP4');
                    }
                });
            }
        });
    </script>
    <script>
        const datatable = 'penilaianpembimbing-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
