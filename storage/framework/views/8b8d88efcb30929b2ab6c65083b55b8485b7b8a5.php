<?php $__env->startSection('authContent'); ?>
    <div class="bg-image" style="background-image: url('assets/admin/media/photos/photo8@2x.jpg');">
        <div class="bg-primary-dark-op">
            <div class="hero bg-black-50">
                <div class="hero-inner">
                    <div class="content content-full">
                        <div class="row justify-content-center">
                            <div class="col-md-6 py-3 text-center">
                                <div class="push">
                                    <a class="link-fx fw-bold fs-1" href="index.html">
                                        <span class="text-white">OneUI</span>
                                    </a>
                                    <p class="text-white-75">Stay tuned! We are working on it and it is coming soon!</p>
                                </div>
                                <div class="js-countdown"></div>
                                <form class="push" action="op_coming_soon.html" method="POST" onsubmit="return false;">
                                    <div class="row justify-content-center mb-4">
                                        <div class="col-md-10 col-xl-6">
                                            <div class="input-group input-group-lg bg-primary-dark-op p-3 rounded-3 mb-2">
                                                <input type="email" class="form-control border-0"
                                                    placeholder="Enter your email..">
                                                <button type="submit" class="btn btn-primary">Subscribe</button>
                                            </div>
                                            <div class="fs-sm text-white-50">
                                                Don't worry, we hate spam.
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <a class="btn btn-dark" href="<?php echo e(route('admin.login')); ?>">
                                    <i class="fa fa-arrow-left opacity-50 me-1"></i> Go Back to Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/admin/js/lib/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/plugins/jquery-countdown/jquery.countdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/pages/op_coming_soon.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.authMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelPanel\resources\views/welcome.blade.php ENDPATH**/ ?>