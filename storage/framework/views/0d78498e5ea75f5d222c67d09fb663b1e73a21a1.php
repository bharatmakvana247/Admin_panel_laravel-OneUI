<?php $__env->startSection('authContent'); ?>
    <div class="bg-image" style="background-image: url('assets/media/photos/photo28@2x.jpg');">
        <div class="row g-0 bg-primary-dark-op">
            <div class="hero-static col-lg-4 d-none d-lg-flex flex-column justify-content-center">
                <div class="p-4 p-xl-5 flex-grow-1 d-flex align-items-center">
                    <div class="w-100">
                        <a class="link-fx fw-semibold fs-2 text-white" href="<?php echo e(route('admin.login')); ?>">
                            One<span class="fw-normal">UI</span>
                        </a>
                        <p class="text-white-75 me-xl-8 mt-2">
                            Welcome to your amazing app. Feel free to login and start managing your projects and
                            clients.
                        </p>
                    </div>
                </div>
                <div class="p-4 p-xl-5 d-xl-flex justify-content-between align-items-center fs-sm">
                    <p class="fw-medium text-white-50 mb-0">
                        <strong>OneUI 5.4</strong> &copy; <span data-toggle="year-copy"></span>
                    </p>
                    <ul class="list list-inline mb-0 py-2">
                        <li class="list-inline-item">
                            <a class="text-white-75 fw-medium" href="javascript:void(0)">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-white-75 fw-medium" href="javascript:void(0)">Contact</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-white-75 fw-medium" href="javascript:void(0)">Terms</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-body-extra-light">
                <div class="p-3 w-100 d-lg-none text-center">
                    <a class="link-fx fw-semibold fs-3 text-dark" href="<?php echo e(route('admin.login')); ?>">
                        One<span class="fw-normal">UI</span>
                    </a>
                </div>
                <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                    <div class="w-100">
                        <div class="text-center mb-5">
                            <p class="mb-3">
                                <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
                            </p>
                            <h1 class="fw-bold mb-2">
                                Sign In
                            </h1>
                            <p class="fw-medium text-muted">
                                Welcome, please login or <a href="<?php echo e(route('admin.register')); ?>">sign up</a> for a new
                                account.
                            </p>
                        </div>
                        <div class="row g-0 justify-content-center">
                            <div class="col-sm-8 col-xl-4">
                                <form class="js-validation-signin" action="<?php echo e(route('admin.login.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-4">
                                        <input id="signup-email" type="email"
                                            class="form-control form-control-lg form-control-alt py-3<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                            name="email" value="" required autocomplete="off" placeholder="Email"
                                            autofocus>
                                        <?php if($errors->has('email')): ?>
                                            <div class="alert-info text-primary"><?php echo e($errors->first('email')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-4">
                                        <input type="password"
                                            class="form-control form-control-lg form-control-alt py-3<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                            value="" required="" id="signup-password" placeholder="Password"
                                            name="password" autocomplete="off">
                                        <?php if($errors->has('password')): ?>
                                            <div class="alert-info text-primary"><?php echo e($errors->first('password')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember_me"
                                                value="remember_me" name="remember_me"> &nbsp;
                                            <label class="form-check-label" for="login-remember">Remember Me</label>
                                        </div>
                                    </div>
                                    

                                    <div style="overflow: hidden; display: flex; justify-content:space-around;">
                                        <a href="<?php echo e(route('admin.authorized.google')); ?>"> <img src="<?php echo url('storage/socialite/google.png'); ?>"
                                                alt="Google" class="img-circle"
                                                style="height:25px;width:25px;border-radius:50px"></a>

                                        <a href="<?php echo e(route('admin.authorized.facebook')); ?>"> <img
                                                src="<?php echo url('storage/socialite/facebook.png'); ?>" alt="Facebook" class="img-circle"
                                                style="height:25px;width:25px;border-radius:50px"></a>

                                        <a href="<?php echo e(route('admin.authorized.github')); ?>"> <img
                                                src="<?php echo url('storage/socialite/github.png'); ?>" alt="Github" class="img-circle"
                                                style="height:25px;width:25px;border-radius:50px"></a>

                                        <a href="<?php echo e(route('admin.authorized.linkedin')); ?>"> <img
                                                src="<?php echo url('storage/socialite/linked.png'); ?>" alt="linkedin" class="img-circle"
                                                style="height:25px;width:25px;border-radius:50px"></a>
                                        <a href=""> <img src="<?php echo url('storage/socialite/insta.png'); ?>" alt="Facebook"
                                                class="img-circle" style="height:25px;width:25px;border-radius:50px"></a>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <a class="text-muted fs-sm fw-medium d-block d-lg-inline-block mb-1"
                                                href="<?php echo e(route('admin.forgetPassword.get')); ?>">
                                                Forgot Password?
                                            </a>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-lg btn-alt-primary">
                                                <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Sign In
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="px-4 py-3 w-100 d-lg-none d-flex flex-column flex-sm-row justify-content-between fs-sm text-center text-sm-start">
                    <p class="fw-medium text-black-50 py-2 mb-0">
                        <strong>OneUI 5.4</strong> &copy; <span data-toggle="year-copy"></span>
                    </p>
                    <ul class="list list-inline py-2 mb-0">
                        <li class="list-inline-item">
                            <a class="text-muted fw-medium" href="javascript:void(0)">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted fw-medium" href="javascript:void(0)">Contact</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted fw-medium" href="javascript:void(0)">Terms</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.authMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelPanel\resources\views/backend/pages/auth/login.blade.php ENDPATH**/ ?>