<!doctype html>
<html lang="en">
<?php echo $__env->make('backend.theme.headerStyle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <div id="page-container">
        <main id="main-container">
            <?php echo $__env->yieldContent('authContent'); ?>
        </main>
    </div>
    <?php echo $__env->make('backend.authTheme.footerScript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\LaravelPanel\resources\views/backend/layouts/authMaster.blade.php ENDPATH**/ ?>