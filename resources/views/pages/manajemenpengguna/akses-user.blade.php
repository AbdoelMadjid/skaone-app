@extends('layouts.master')
@section('title')
    @lang('translation.akses-user')
@endsection
@section('css')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.manajemen-pengguna')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.akses-user')</h5>
                </div>
                <div class="card-body">
                    {!! $dataTable->table([
                        'class' => 'table table-striped hover',
                        'style' => 'width:100%',
                    ]) !!}
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
        const datatable = 'user-table';

        function handleCheckMenu() {
            // When a parent checkbox is clicked, toggle the checked state of its children
            $('.parent').on('click', function() {
                const parentRow = $(this).closest('tr');
                const children = parentRow.find('.child');
                children.prop('checked', this.checked);
            });

            // When a child checkbox is clicked, update the parent checkbox
            $('.child').on('click', function() {
                const parentRow = $(this).closest('tr');
                const parentCheckbox = parentRow.find('.parent');
                const allChildren = parentRow.find('.child');
                const checkedChildren = allChildren.filter(':checked');

                parentCheckbox.prop('checked', allChildren.length === checkedChildren.length);

                // Update the grandparent (menu) checkbox if all its children (submenus) are checked
                const grandparentRow = parentRow.closest('tr').prevAll('tr').first();
                if (grandparentRow.length) {
                    const grandparentCheckbox = grandparentRow.find('.parent');
                    const grandparentChildren = grandparentRow.nextUntil('tr:has(.parent)').find('.child');
                    const checkedGrandparentChildren = grandparentChildren.filter(':checked');
                    grandparentCheckbox.prop('checked', grandparentChildren.length === checkedGrandparentChildren
                        .length);
                }
            });

            // Ensure that parent checkboxes are updated based on their children's checked status on page load
            $('.parent').each(function() {
                const parentRow = $(this).closest('tr');
                const children = parentRow.find('.child');
                const checkedChildren = children.filter(':checked');
                $(this).prop('checked', children.length === checkedChildren.length);
            });
        }
        handleAction(datatable, function() {
            handleCheckMenu()

            $('.search').on('keyup', function() {
                const value = this.value.toLowerCase()
                $('#menu_permissions tr').show().filter(function(i, item) {
                    return item.innerText.toLowerCase().indexOf(value) == '-1'
                }).hide()

            })

            $('.copy').on('change', function() {
                handleAjax(`{{ url('manajemenpengguna/akses-user') }}/${this.value}/user`)
                    .onSuccess(function(res) {
                        $('#menu_permissions').html(res)
                        handleCheckMenu()
                    }, false)
                    .execute()
            })
        })
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
