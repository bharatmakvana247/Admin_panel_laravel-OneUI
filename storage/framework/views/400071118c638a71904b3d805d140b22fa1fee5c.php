<div class="row">
    <div class="mb-4">
        <label class="form-label" for="example-select">Select Brand</label><span class="text-danger">*</span>
        <?php echo Form::select('brand_name', $brands_list, null, [
            'class' => 'form-select',
            'id' => 'example-select',
            'placeholder' => 'Select Brand',
        ]); ?>

        <?php if($errors->has('brand_name')): ?>
            <div class="text-danger"><?php echo e($errors->first('brand_name')); ?>

            </div>
        <?php endif; ?>
    </div>
    <div class="mb-4">
        <label class="form-label" for="example-text-input-alt">Category Name<span class="text-danger">*</span></label>
        <?php echo Form::text('category_name', null, [
            'class' => 'form-control form-control-lg form-control-alt py-2',
            'id' => 'example-text-input-alt',
            'placeholder' => 'Category Name Here',
        ]); ?>

        <?php if($errors->has('category_name')): ?>
            <div class="text-danger"><?php echo e($errors->first('category_name')); ?>

            </div>
        <?php endif; ?>
    </div>
    <div class="row items-push">
        <div class="col-lg-7 offset-lg">
            <button type="submit" class="btn btn-alt-success">Submit</button>
            <button type="reset" class="btn btn-alt-primary">
                Reset
            </button>
            <a type="submit" href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-alt-danger">
                Cancel</a>
        </div>
    </div>
</div>
<?php /**PATH D:\LaravelPanel\resources\views/backend/pages/category/form.blade.php ENDPATH**/ ?>