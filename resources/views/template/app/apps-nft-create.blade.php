@extends('layouts.master')
@section('title')
    @lang('translation.create-nft')
@endsection
@section('css')
    <!-- Filepond css -->
    <link href="{{ URL::asset('build/libs/filepond/filepond.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.apps')
        @endslot
        @slot('li_2')
            @lang('translation.nft-marketplace')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create New File</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <h5 class="fw-semibold mb-3">Image, Video, Audio, or 3D Model</h5>
                                <input type="file" class="filepond filepond-input-multiple" multiple name="filepond"
                                    data-allow-reorder="true" data-max-file-size="3MB" data-max-files="2">
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName"
                                    placeholder="Enter product name">
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="discription" class="form-label">Description</label>
                                <textarea class="form-control" id="discription" rows="3" placeholder="Enter description"></textarea>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="externalLink" class="form-label">External link</label>
                                <input type="text" class="form-control" id="externalLink"
                                    placeholder="Enter external link">
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <label for="itemPrice" class="form-label">Item Price</label>
                                <input type="text" class="form-control" id="itemPrice" placeholder="Price">
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <label for="size" class="form-label">Size</label>
                                <input type="text" class="form-control" id="size" placeholder="Size">
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <label for="properties" class="form-label">Properties</label>
                                <input type="text" class="form-control" id="properties" placeholder="Properties">
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Put on sale</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Instant sale price</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="option3">
                                        <label class="form-check-label" for="inlineCheckbox3">Unlock one purchased</label>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button class="btn btn-primary">Create Item</button>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <!-- filepond js -->
    <script src="{{ URL::asset('build/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('build/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('build/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ URL::asset('build/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <!--nft create init js-->
    <script src="{{ URL::asset('build/js/pages/apps-nft-create.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
