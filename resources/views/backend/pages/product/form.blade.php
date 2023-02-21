<div class="col-lg-12 col-xl-12">
    <div class="{{ $errors->has('product_name') ? 'is-invalid' : 'mb-4' }}">
        <label class="form-label" for="example-text-input-alt">Product Name<span class="text-danger">*</span></label>
        {!! Form::text('product_name', null, [
            'class' => 'form-control form-control-lg form-control-alt py-2',
            'id' => 'example-text-input-alt',
            'placeholder' => 'Product Name Here',
        ]) !!}
        @if ($errors->has('product_name'))
            <div class="text-danger">{{ $errors->first('product_name') }}
            </div>
        @endif
    </div>
    <div class="mb-4">
        <label class="form-label" for="example-select">Select Brand</label><span class="text-danger">*</span>
        {!! Form::select('brand_name', $brands_list, null, [
            'class' => 'form-select',
            'id' => 'example-select',
            'placeholder' => 'Select Brand',
        ]) !!}
        @if ($errors->has('brand_name'))
            <div class="text-danger">{{ $errors->first('brand_name') }}
            </div>
        @endif
    </div>
    <div class="mb-4">
        <label class="form-label" for="example-select">Select Brand</label><span class="text-danger">*</span>
        {!! Form::select('category_name', $category_list, null, [
            'class' => 'form-select',
            'id' => 'example-select',
            'placeholder' => 'Select Categories',
        ]) !!}
        @if ($errors->has('category_name'))
            <div class="text-danger">{{ $errors->first('category_name') }}
            </div>
        @endif
    </div>
    <div class="mb-4">
        <label class="form-label" for="example-textarea-input-alt">Product Details<span
                class="text-danger">*</span></label>
        {!! Form::textarea('product_details', null, [
            'class' => 'form-control form-control-lg form-control-alt py-1',
            'id' => 'example-text-input-alt',
            'placeholder' => 'Product Details Here',
        ]) !!}
        @if ($errors->has('product_details'))
            <div class="text-danger">{{ $errors->first('product_details') }}
            </div>
        @endif
    </div>
    <div class="mb-4">
        <label class="form-label" for="example-text-input-alt">Product Price<span class="text-danger">*</span></label>
        {!! Form::text('product_price', null, [
            'class' => 'form-control form-control-lg form-control-alt py-2',
            'id' => 'example-text-input-alt',
            'placeholder' => 'Product Price Here',
        ]) !!}
        @if ($errors->has('product_price'))
            <div class="text-danger">{{ $errors->first('product_price') }}
            </div>
        @endif
    </div>
    <div class="mb-4">
        <label class="form-label" for="example-text-input-alt">Product Qty<span class="text-danger">*</span></label>
        {!! Form::text('product_qty', null, [
            'class' => 'form-control form-control-lg form-control-alt py-2',
            'id' => 'example-text-input-alt',
            'placeholder' => 'Product Qty Here',
        ]) !!}
        @if ($errors->has('product_qty'))
            <div class="text-danger">{{ $errors->first('product_qty') }}
            </div>
        @endif
    </div>
    <div class="mb-4">
        <label class="form-label" for="example-file-input">Product Image<span class="text-danger">*</span></label><br>
        {!! Form::file('product_image', null, [
            'class' => 'form-control form-control-lg form-control-alt py-2',
            'id' => 'example-text-input-alt',
            'placeholder' => 'Product Qty Here',
        ]) !!}
        @if ($errors->has('product_image'))
            <div class="text-primary">{{ $errors->first('product_image') }}
            </div>
        @endif
    </div>
    <div class="row items-push">
        <div class="col-lg-7 offset-lg">
            <button type="submit" class="btn btn-alt-success">Submit</button>
            <button type="reset" class="btn btn-alt-primary">
                Reset
            </button>
            <a type="submit" href="{{ route('admin.dashboard') }}" class="btn btn-alt-danger">
                Cancel</a>
        </div>
    </div>
</div>
