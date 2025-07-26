@extends('layouts.master')
@section('title')
    @lang('translation.laporan')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.panitia')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="px-4 mx-n4 mt-n2 mb-0" data-simplebar style="height: calc(100vh - 280px);">

            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
