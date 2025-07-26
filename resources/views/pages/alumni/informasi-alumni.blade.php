@extends('layouts.master')
@section('title')
    @lang('translation.informasi-alumni')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.alumni')
        @endslot
    @endcomponent
    {{--  --}}
    @include('error.belum-kelar-ngoding')
    {{--  --}}
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
