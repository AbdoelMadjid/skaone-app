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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>Nilai @yield('title')
                    <span class="d-none d-lg-inline"> - </span>
                    <br class="d-inline d-lg-none">
                    {{ $waliKelas->rombel }}
                </x-heading-title>
                <div class="flex-shrink-0 me-2">
                    @if (!$absensiExists)
                        <form action="{{ route('walikelas.absensi-siswa.generateabsensi') }}" method="POST">
                            @csrf
                            <x-btn-action type="submit" label="Generate" icon="ri-share-circle-fill" />
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
                        showToast('warning', 'Gagal memperbarui absen!');
                    }
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr.responseText);
                    showToast('error',
                        'Abensi harus memiliki nilai minimal 0, tidak boleh kosong sama sekali');
                }
            });
        });


        handleDataTableEvents(datatable, "Silakan klik Generate Absensi terlebih dahulu");
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
