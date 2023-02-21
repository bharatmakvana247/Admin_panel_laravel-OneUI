<?php $__env->startSection('authContent'); ?>
    <div class="bg-image" style="background-image: url('assets/media/photos/photo14@2x.jpg');">
        <div class="hero-static d-flex align-items-center bg-primary-dark-op">
            <div class="content">
                <div class="row justify-content-center push">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="block block-rounded shadow-none mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Account Locked</h3>
                                <div class="block-options">
                                    <a class="btn-block-option" href="<?php echo e(route('admin.login')); ?>" data-bs-toggle="tooltip"
                                        data-bs-placement="left" title="Sign In with another account">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5 text-center">
                                    <img class="img-avatar img-avatar96" src="<?php echo \Auth::user()->image !== '' ? url('storage/userImage/' . \Auth::user()->image) : url('storage/default.png'); ?>" alt="">
                                    <p class="fw-semibold my-2">
                                        <?php echo e(Auth::user()->email); ?>

                                    </p>
                                    <form class="js-validation-lock mt-4" action="<?php echo e(route('admin.unlock')); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-4">
                                            <input type="password" class="form-control form-control-lg form-control-alt"
                                                id="lock-password" name="lock_password" placeholder="Password..">
                                            <?php if($errors->has('lock_password')): ?>
                                                <div class="text-danger"><?php echo e($errors->first('lock_password')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="row justify-content-center mb-4">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" class="btn w-100 btn-alt-success">
                                                    <i class="fa fa-fw fa-lock-open me-1 opacity-50"></i> Unlock
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fs-sm text-center text-white">
                    <span class="fw-medium">OneUI 5.4</span> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.authMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelPanel\resources\views/backend/pages/dashboard/lockscreen.blade.php ENDPATH**/ ?>