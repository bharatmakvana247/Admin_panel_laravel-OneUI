<?php $__env->startSection('content'); ?>
    <div class="bg-image overflow-hidden"
        style="background-image: url('<?php echo e(asset('assets/admin/media/photos/photo3@2x.jpg')); ?>');">
        <div class="bg-primary-dark-op">
            <div class="content content-full">
                <div
                    class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-start">
                    <div class="flex-grow-1">
                        <h1 class="fw-semibold text-white mb-0">Dashboard</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">Welcome <?php echo e(Auth::user()->name); ?>.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row items-push">

            <div class="row">
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-start border-primary border-4"
                        href="<?php echo e(route('admin.product.index')); ?>">
                        <div class="block-content block-content-full">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Products</div>
                            <div class="fs-2 fw-normal text-dark"><?php echo e($prod_count); ?></div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-start border-primary border-4"
                        href="<?php echo e(route('admin.category.index')); ?>">
                        <div class="block-content block-content-full">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Categories</div>
                            <div class="fs-2 fw-normal text-dark"><?php echo e($cat_count); ?></div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-start border-primary border-4" href="">
                        <div class="block-content block-content-full">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Brands</div>
                            <div class="fs-2 fw-normal text-dark"><?php echo e($brand_count); ?></div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-start border-primary border-4"
                        href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Users</div>
                            <div class="fs-2 fw-normal text-dark"><?php echo e($user_count); ?></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#lock').on('click', function(e) {
                $.ajax({
                    route: 'admin.lock.update',
                    method: 'post'
                }).then(function() {
                    alert('success');
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelPanel\resources\views/backend/pages/dashboard/dashboard.blade.php ENDPATH**/ ?>