<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $li_1 }}</a></li>
                @if (isset($li_2))
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $li_2 }}</a></li>
                @endif
                @if (isset($li_3))
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $li_3 }}</a></li>
                @endif
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
            <div class="page-title-right">
                {!! renderDate() !!}
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
