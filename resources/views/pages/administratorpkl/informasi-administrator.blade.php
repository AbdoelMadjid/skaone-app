@extends('layouts.master')
@section('title')
    @lang('translation.informasi')
@endsection

@section('css')
    {{-- Add custom CSS if necessary --}}
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
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Bagan Daftar Hadir Per Hari</h5>
                    <div>
                        <form id="tanggalForm">
                            <input class="form-control" type="date" id="tanggal" name="tanggal"
                                value="{{ $selectedDate->toDateString() }}"
                                max="{{ \Carbon\Carbon::today()->toDateString() }}">
                            <button type="submit" style="display: none;"></button> <!-- tombol tidak terlihat -->
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Tempat untuk menampilkan data -->
                    <div id="kompetensiData">
                        @foreach ($kompetensiArray as $kompetensi => $data)
                            <div class="d-flex align-items-start text-muted mb-4">
                                <div class="flex-shrink-0 me-3">
                                    {{ $kompetensi }} ({{ $kompetensiArray[$kompetensi]['total'] }})
                                </div>
                                <div class="flex-grow-1">
                                    <div class="progress animated-progress custom-progress progress-label">
                                        <div class="progress-bar @if ($kompetensi == 'RPL') bg-primary @elseif($kompetensi == 'TKJ') bg-success @elseif($kompetensi == 'BD') bg-info @elseif($kompetensi == 'MP') bg-danger @elseif($kompetensi == 'AK') bg-warning @endif"
                                            role="progressbar" style="width: {{ $data['persentase'] }}%"
                                            aria-valuenow="{{ $data['persentase'] }}" aria-valuemin="0" aria-valuemax="100">
                                            <div class="label">{{ $data['hadir'] }} ({{ $data['persentase'] }}%)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tanggal').change(function() {
                var tanggal = $(this).val();

                // Kirim request AJAX ke route 'administratorpkl.informasi-prakerin.absensi'
                $.ajax({
                    url: "{{ route('administratorpkl.informasi-prakerin.index') }}", // Ganti dengan route yang sesuai
                    type: 'GET',
                    data: {
                        tanggal: tanggal,
                    },
                    success: function(response) {
                        // Update konten di #kompetensiData dengan hasil dari server
                        $('#kompetensiData').html(response);
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengambil data absensi.');
                    }
                });
            });
        });

        function updateProgress() {
            const url = "{{ route('administratorpkl.informasi-prakerin.index') }}";

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    // Replace the content of the progress container with the new data
                    $('#kompetensi-progress').html(response);
                },
                error: function(xhr) {
                    console.error("Error fetching progress data:", xhr.responseText);
                }
            });
        }

        // Refresh data every 10 seconds
        setInterval(updateProgress, 10000);
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
