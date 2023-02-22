<?php $__env->startSection('title'); ?>
    <?php echo e($form_title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        <?php echo e($form_title); ?> Element
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Forms</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <?php echo e($form_title); ?>

                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> edit-<?php echo e($form_title); ?>

                </h3>
            </div>
            <div class="block-content block-content-full">
                <?php echo Form::model($product, [
                    'method' => 'post',
                    'files' => true,
                    'enctype' => 'multipart/form-data',
                    'route' => ['admin.product.update', $product->product_id],
                ]); ?>

                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <center>
                            <div class="mb-4">
                                <div id="imagePreview" class="profile-image">
                                    <?php if(!empty($product->product_image)): ?>
                                        <img src="<?php echo url('storage/productImage/' . @$product->product_image); ?>" alt="user-img" class="img-circle"
                                            style="height:100px;width:100px;border-radius:50px">
                                    <?php else: ?>
                                        <img src="<?php echo url('storage/productImage/default.png'); ?>" alt="user-img" class="img-circle"
                                            style="height:100px;width:100px;border-radius:50px">
                                    <?php endif; ?>
                                </div>
                                <?php echo Form::file('product_image', ['id' => 'hidden', 'accept' => 'product_image/*']); ?>

                            </div>
                        </center>
                        <div class="mb-4">
                            <label class="form-label" for="example-text-input-alt">Product Name<span
                                    class="text-danger">*</span></label>
                            <?php echo Form::text('product_name', null, [
                                'class' => 'form-control form-control-lg form-control-alt py-2',
                                'id' => 'example-text-input-alt',
                                'placeholder' => 'Product Name Here',
                            ]); ?>

                            <?php if($errors->has('product_name')): ?>
                                <div class="text-danger"><?php echo e($errors->first('product_name')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="example-select">Select Brand</label><span
                                class="text-danger">*</span>
                            <?php echo Form::select('brand_id', $brand_name, null, [
                                'class' => 'form-select',
                                'id' => 'example-select',
                                'placeholder' => 'Select Brands',
                            ]); ?>

                            <?php if($errors->has('brand_id')): ?>
                                <div class="text-danger"><?php echo e($errors->first('brand_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="example-select">Select Category</label><span
                                class="text-danger">*</span>
                            <?php echo Form::select('category_name', $category_name, null, [
                                'class' => 'form-select',
                                'id' => 'example-select',
                                'placeholder' => 'Select Categories',
                            ]); ?>

                            <?php if($errors->has('category_name')): ?>
                                <div class="text-danger"><?php echo e($errors->first('category_name')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="example-textarea-input-alt">Product Details<span
                                    class="text-danger">*</span></label>
                            <?php echo Form::textarea('product_details', null, [
                                'class' => 'form-control form-control-lg form-control-alt py-2',
                                'rows' => '4',
                                'id' => 'product_details',
                                'placeholder' => 'Product Details Here',
                            ]); ?>

                            <?php if($errors->has('product_details')): ?>
                                <div class="text-danger"><?php echo e($errors->first('product_details')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="example-text-input-alt">Product Price<span
                                    class="text-danger">*</span></label>
                            <?php echo Form::text('product_price', null, [
                                'class' => 'form-control form-control-lg form-control-alt py-2',
                                'id' => 'example-text-input-alt',
                                'placeholder' => 'Product Price Here',
                            ]); ?>

                            <?php if($errors->has('product_price')): ?>
                                <div class="text-danger"><?php echo e($errors->first('product_price')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="example-text-input-alt">Product Qty<span
                                    class="text-danger">*</span></label>
                            <?php echo Form::text('product_qty', null, [
                                'class' => 'form-control form-control-lg form-control-alt py-2',
                                'id' => 'example-text-input-alt',
                                'placeholder' => 'Product Qty Here',
                            ]); ?>

                            <?php if($errors->has('product_qty')): ?>
                                <div class="text-danger"><?php echo e($errors->first('product_qty')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="row items-push">
                            <div class="col-lg-7 offset-lg">
                                <button type="submit" class="btn btn-alt-success">Update</button>
                                <button type="submit" class="btn btn-alt-danger"><a href="<?php echo e(route('admin.dashboard')); ?>">
                                        Cancel</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('scripts'); ?>
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#imagePreview img').on('click', function() {
                $('input[type="file"]').trigger('click');
                $('input[type="file"]').change(function() {
                    readURL(this);
                });
            });
        </script>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('styles'); ?>
        <style>
            #hidden {
                display: none;
                height: 100px;
                width: 100px;
                border-radius: 50px;
            }
        </style>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelPanel\resources\views/backend/pages/product/edit.blade.php ENDPATH**/ ?>