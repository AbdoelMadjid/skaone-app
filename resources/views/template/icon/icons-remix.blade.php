@extends('layouts.master')
@section('title')
    @lang('translation.remix')
@endsection
@section('content')
@component('layouts.breadcrumb')
@slot('li_1')
    @lang('translation.components')
@endslot
@slot('li_2')
    @lang('translation.icons')
@endslot
@endcomponent
    <div class="row">

    </div><!-- end row -->

    <div class="row">
        <div class="col-12" id="icons"></div> <!-- end col-->
    </div><!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/remix-icons-listing.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
