<?php $__env->startSection('content'); ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('assets/admin/media/photos/photo10@2x.jpg')); ?>');">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center">
                <div class="my-3">
                    
                    <img class="img-avatar img-avatar-thumb" src="<?php echo \Auth::user()->image !== '' ? url('storage/userImage/' . \Auth::user()->image) : url('storage/default.png'); ?>" alt="Image">
                </div>
                <h1 class="h2 text-white mb-0">Edit <?php echo e($form_title); ?></h1>
                <h2 class="h4 fw-normal text-white-75">
                    <?php echo e(Auth::user()->name); ?>

                </h2>
                <a class="btn btn-alt-secondary" href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Profile
                </a>
            </div>
        </div>
    </div>
    <div class="content content-boxed">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">User <?php echo e($form_title); ?></h3>
            </div>
            <div class="block-content">
                <form action="<?php echo e(route('admin.profile.update', Auth::user()->id)); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Your account’s vital info. Your username will be publicly visible.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-name">Name</label>
                                <input type="text" class="form-control" id="one-profile-edit-name" name="username"
                                    placeholder="Enter your name.." value="<?php echo e(Auth::user()->name); ?>">
                                <?php if($errors->has('username')): ?>
                                    <div class="text-danger"><?php echo e($errors->first('username')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email.." value="<?php echo e(Auth::user()->email); ?>">
                                <?php if($errors->has('email')): ?>
                                    <div class="text-danger"><?php echo e($errors->first('email')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Your Avatar</label>
                                <div class="mb-4">
                                    <img class="img-avatar" src="<?php echo url('storage/userImage/' . \Auth::user()->image); ?>" alt="Image">
                                </div>
                                <div class="mb-4">
                                    <label for="one-profile-edit-avatar" class="form-label">Choose a new avatar</label>
                                    <input class="form-control" name="image" type="file" id="one-profile-edit-avatar">
                                    <?php if($errors->has('image')): ?>
                                        <div class="text-danger"><?php echo e($errors->first('image')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Change Password</h3>
            </div>
            <div class="block-content">
                <form action="<?php echo e(route('admin.profile.updatePass', Auth::user()->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Changing your sign in password is an easy way to keep your account secure.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-password">Current Password</label>
                                <input type="password" class="form-control" id="one-profile-edit-password"
                                    placeholder="Enter Old Password Here" name="current_password" value="">
                                <?php if($errors->has('current_password')): ?>
                                    <div class="text-danger"><?php echo e($errors->first('current_password')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="one-profile-edit-password-new">New Password</label>
                                    <input type="password" class="form-control" id="one-profile-edit-password-new"
                                        placeholder="Enter New Password Here" name="password">
                                    <?php if($errors->has('password')): ?>
                                        <div class="text-danger"><?php echo e($errors->first('password')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="one-profile-edit-password-new-confirm">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control" id="one-profile-edit-password-new-confirm"
                                        placeholder="Enter Confirm Password Here" name="password_confirmation">
                                    <?php if($errors->has('password_confirmation')): ?>
                                        <div class="text-danger"><?php echo e($errors->first('password_confirmation')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelPanel\resources\views/backend/pages/profile/edit.blade.php ENDPATH**/ ?>