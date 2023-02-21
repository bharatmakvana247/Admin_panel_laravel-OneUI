<div class="row">
    <div class="mb-4">
        <label class="form-label" for="example-text-input-alt">Brand Name<span class="text-danger">*</span></label>
        {!! Form::text('brand_name', null, [
            'class' => 'form-control form-control-lg form-control-alt py-2',
            'id' => 'example-text-input-alt',
            'placeholder' => 'Category Name Here',
        ]) !!}
        @if ($errors->has('brand_name'))
            <div class="text-danger">{{ $errors->first('brand_name') }}
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
