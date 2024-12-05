@extends('layouts.master')
@section('title')
    @lang('translation.absensi-siswa')
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.absensi-siswa') - {{ $waliKelas->rombel }}
                    </h5>
                    <div>
                        @if (!$absensiExists)
                            <form action="{{ route('walikelas.absensi-siswa.generateabsensi') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Generate Absensi</button>
                            </form>
                        @else
                            <div></div>
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
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

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
        const datatable = 'absensisiswa-table';
        $(document).on('input', '.absen-input', function() {
            let id = $(this).data('id');
            let type = $(this).data('type');
            let value = $(this).val();

            // Ambil nilai izin, sakit, dan alfa untuk menghitung jmlhabsen
            let izin = $(this).closest('tr').find('input[data-type="izin"]').val() || 0;
            let sakit = $(this).closest('tr').find('input[data-type="sakit"]').val() || 0;
            let alfa = $(this).closest('tr').find('input[data-type="alfa"]').val() || 0;

            // Update nilai jmlhabsen
            let jmlhabsen = parseInt(izin) + parseInt(sakit) + parseInt(alfa);
            $(this).closest('tr').find('.jmlhabsen-value').text(jmlhabsen);

            // Simpan perubahan ke server via AJAX
            $.ajax({
                url: '/walikelas/absensi-siswa/update-absensi', // Rute untuk update absensi
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Sertakan CSRF token
                    id: id,
                    type: type,
                    value: value,
                    jmlhabsen: jmlhabsen
                },
                success: function(response) {
                    if (response.success) {
                        showToast('success', 'Data berhasil diperbarui!');
                    } else {
                        showToast('warning', 'Gagal memperbarui KKM!');
                    }
                },
                error: function(xhr) {
                    showToast('error', 'Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        });

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
