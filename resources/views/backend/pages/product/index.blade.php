@extends('backend.layouts.master')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Product Table</h3>
                <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary"> <i
                        class="fa fa-fw fa-plus me-1"></i> Add
                    Product</a>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-striped table-bordered dt-responsive" id="quiztable">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th class="d-none d-sm-table-cell">Product Name</th>
                            <th class="d-none d-sm-table-cell">Product Details</th>
                            <th class="d-none d-sm-table-cell">Category</th>
                            <th class="d-none d-sm-table-cell">brand</th>
                            <th class="d-none d-sm-table-cell">Product Price</th>
                            <th class="d-none d-sm-table-cell">Product Image</th>
                            <th class="d-none d-sm-table-cell notexport">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var columns = [{
                    data: 'DT_RowIndex',
                    name: 'product_id',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'productDetails',
                    name: 'productDetails'
                },
                {
                    data: 'category_id',
                    name: 'category_id'
                },
                {
                    data: 'brand_id',
                    name: 'brand_id'
                },
                {
                    data: 'product_price',
                    name: 'product_price'
                },
                {
                    data: 'productimage',
                    name: 'productimage'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ];
            var buttons = [{
                    className: 'btn btn-sm btn-primary buttons-copy buttons-html5',
                    extend: 'copy',
                    text: '<i class="fa fa-print"></i> Copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5] // Column index which needs to export
                    }
                },
                {
                    className: 'btn btn-sm btn-primary buttons-excel buttons-html5',
                    extend: 'excel',
                    text: '<i class="fa fa-print"></i> Excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5] // Column index which needs to export
                    }
                },
                {
                    className: 'btn btn-sm btn-primary buttons-csv buttons-html5',
                    extend: 'csv',
                    text: '<i class="fa fa-print"></i> CSV',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5] // Column index which needs to export
                    }
                },
                {
                    className: 'btn btn-sm btn-primary buttons-pdf buttons-html5',
                    extend: 'pdf',
                    text: '<i class="fa fa-print"></i> Pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5] // Column index which needs to export
                    }
                },
                {
                    className: 'btn btn-sm btn-primary buttons-print buttons-html5',
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Print',
                    customize: function(win) {
                        $(win.document.body)
                            .css('font-size', '15pt')
                            .prepend(
                                '<img src="http://127.0.0.1:8000/storage/userImage/default.png" style="position:absolute; top:0; left:0;" />'
                            );
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5] // Column index which needs to export
                    }
                }
            ];
            var table = $('#quiztable').DataTable({
                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100],
                ],
                pageLength: 5,
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.product.index') }}",
                dom: 'Blfrtip',
                columns: columns,
                buttons: buttons
            });

        });
    </script>
    @include('backend.theme.deleteSweelAlert')
@endsection
