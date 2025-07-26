@extends('layouts.master')
@section('title')
    @lang('translation.perangkat-ajar')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
        @slot('li_2')
            @lang('translation.administrasi-guru')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>Upload @yield('title')</x-heading-title>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    <!-- Modal Preview PDF -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="max-width:90%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preview Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" style="height: 80vh;">
                    <iframe id="pdfFrame" src="" width="100%" height="100%" style="border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Upload -->
    @include('pages.gurumapel.perangkat-ajar-form')
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        function lihatPDF(url) {
            const frame = document.getElementById('pdfFrame');
            frame.src = url;

            const modal = new bootstrap.Modal(document.getElementById('pdfModal'));
            modal.show();
        }
    </script>
    <script>
        // Saat tombol Upload diklik
        $('#uploadModal').on('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const tingkat = button.getAttribute('data-tingkat');
            const mapel = button.getAttribute('data-mapel');

            // Set nilai input di modal
            document.getElementById('tingkatInput').value = tingkat;
            document.getElementById('mapelInput').value = mapel;

            // Set action form secara dinamis
            const actionUrl = "{{ route('gurumapel.adminguru.perangkat-ajar.upload') }}";
            document.getElementById('uploadForm').action = actionUrl;
        });
    </script>
    <script>
        const datatable = 'perangkatajar-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
