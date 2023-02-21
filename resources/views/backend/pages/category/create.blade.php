@extends('backend.layouts.master')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        {{ $form_title }} Element
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Forms</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            {{ $form_title }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Add-{{ $form_title }}
                </h3>
            </div>
            <div class="block-content block-content-full">
                {!! Form::open([
                    'route' => ['admin.category.store'],
                    'id' => 'CreateForm',
                    'files' => 'true',
                    'enctype' => 'multipart/form-data',
                    'method' => 'POST',
                ]) !!}
                @csrf
                @include('backend.pages.category.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- <div class="block-content">
        <a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showpromo" data-bs-toggle="modal"
            data-bs-target="#modal-block-popin" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>
    </div>

    <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-content block-content-full">
                        <table class="table table-striped table-bordered dt-responsive" id="quiztable">
                            <tbody>
                                <tr>
                                    <td>Laptops</td>
                                    <td>Laptops</td>
                                    <td>Laptops</td>
                                    <td>Text</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
