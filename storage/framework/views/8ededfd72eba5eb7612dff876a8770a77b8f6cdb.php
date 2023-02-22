<?php $__env->startSection('title'); ?>
    <?php echo e($form_title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Category Table</h3>
                <a href="<?php echo e(route('admin.category.create')); ?>" class="btn btn-sm btn-primary"> <i
                        class="fa fa-fw fa-plus me-1"></i> Add
                    Category</a>
            </div>


            <div class="block-content block-content-full">
                <table class="table table-striped table-bordered dt-responsive" id="quiztable">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th class="d-none d-sm-table-cell">Brand</th>
                            <th class="d-none d-sm-table-cell">Category</th>
                            <th class="d-none d-sm-table-cell notexport">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                    data: 'brand_id',
                    name: 'brand_id'
                },
                {
                    data: 'category_name',
                    name: 'category_name'
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
                        columns: [0, 1, 2] // Column index which needs to export
                    }
                },
                {
                    className: 'btn btn-sm btn-primary buttons-excel buttons-html5',
                    extend: 'excel',
                    text: '<i class="fa fa-print"></i> Excel',
                    exportOptions: {
                        columns: [0, 1, 2] // Column index which needs to export
                    }
                },
                {
                    className: 'btn btn-sm btn-primary buttons-csv buttons-html5',
                    extend: 'csv',
                    text: '<i class="fa fa-print"></i> CSV',
                    exportOptions: {
                        columns: [0, 1, 2] // Column index which needs to export
                    }
                },
                {
                    className: 'btn btn-sm btn-primary buttons-pdf buttons-html5',
                    extend: 'pdf',
                    text: '<i class="fa fa-print"></i> Pdf',
                    exportOptions: {
                        columns: [0, 1, 2] // Column index which needs to export
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
                        columns: [0, 1, 2] // Column index which needs to export
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
                ajax: "<?php echo e(route('admin.category.index')); ?>",
                dom: 'Blfrtip',
                columns: columns,
                buttons: buttons
            });

        });
    </script>
    <?php echo $__env->make('backend.theme.deleteSweelAlert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(document).ready(function() {
            $(document).on("click", "a.Showcategories", function(e) {
                var row = $(this);
                console.log("row", row);
                var id = $(this).attr('data-id');

                console.log("Id", id);
                // Make a request for a user with a given ID
                $.ajax({
                    url: "<?php echo e(route('admin.category.show')); ?>",
                    type: 'get',
                    data: {
                        id: id
                    },
                    success: function(msg) {
                        $('.testdata').html(msg);
                        $('#basicModal').modal('show');
                    },
                    error: function() {
                        swal("Error!", 'Error in Record Not Show', "error");
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelPanel\resources\views/backend/pages/category/index.blade.php ENDPATH**/ ?>