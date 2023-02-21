@extends('backend.layouts.master')
@section('content')
    <div class="bg-image overflow-hidden"
        style="background-image: url('{{ asset('assets/admin/media/photos/photo3@2x.jpg') }}');">
        <div class="bg-primary-dark-op">
            <div class="content content-full">
                <div
                    class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-start">
                    <div class="flex-grow-1">
                        <h1 class="fw-semibold text-white mb-0">Dashboard</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">Welcome {{ Auth::user()->name }}.</h2>
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
                        href="{{ route('admin.product.index') }}">
                        <div class="block-content block-content-full">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Products</div>
                            <div class="fs-2 fw-normal text-dark">{{ $prod_count }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-start border-primary border-4"
                        href="{{ route('admin.category.index') }}">
                        <div class="block-content block-content-full">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Categories</div>
                            <div class="fs-2 fw-normal text-dark">{{ $cat_count }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-start border-primary border-4" href="">
                        <div class="block-content block-content-full">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Brands</div>
                            <div class="fs-2 fw-normal text-dark">{{ $brand_count }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-start border-primary border-4"
                        href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Users</div>
                            <div class="fs-2 fw-normal text-dark">{{ $user_count }}</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
