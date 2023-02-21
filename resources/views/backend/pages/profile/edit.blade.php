@extends('backend.layouts.master')
@section('content')
    <div class="bg-image" style="background-image: url('{{ asset('assets/admin/media/photos/photo10@2x.jpg') }}');">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center">
                <div class="my-3">
                    {{-- <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar13.jpg" alt=""> --}}
                    <img class="img-avatar img-avatar-thumb" src="{!! \Auth::user()->image !== '' ? url('storage/userImage/' . \Auth::user()->image) : url('storage/default.png') !!}" alt="Image">
                </div>
                <h1 class="h2 text-white mb-0">Edit {{ $form_title }}</h1>
                <h2 class="h4 fw-normal text-white-75">
                    {{ Auth::user()->name }}
                </h2>
                <a class="btn btn-alt-secondary" href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Profile
                </a>
            </div>
        </div>
    </div>
    <div class="content content-boxed">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">User {{ $form_title }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.profile.update', Auth::user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
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
                                    placeholder="Enter your name.." value="{{ Auth::user()->name }}">
                                @if ($errors->has('username'))
                                    <div class="text-danger">{{ $errors->first('username') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email.." value="{{ Auth::user()->email }}">
                                @if ($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Your Avatar</label>
                                <div class="mb-4">
                                    <img class="img-avatar" src="{!! url('storage/userImage/' . \Auth::user()->image) !!}" alt="Image">
                                </div>
                                <div class="mb-4">
                                    <label for="one-profile-edit-avatar" class="form-label">Choose a new avatar</label>
                                    <input class="form-control" name="image" type="file" id="one-profile-edit-avatar">
                                    @if ($errors->has('image'))
                                        <div class="text-danger">{{ $errors->first('image') }}
                                        </div>
                                    @endif
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
                <form action="{{ route('admin.profile.updatePass', Auth::user()->id) }}" method="POST">
                    @csrf
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
                                @if ($errors->has('current_password'))
                                    <div class="text-danger">{{ $errors->first('current_password') }}
                                    </div>
                                @endif
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="one-profile-edit-password-new">New Password</label>
                                    <input type="password" class="form-control" id="one-profile-edit-password-new"
                                        placeholder="Enter New Password Here" name="password">
                                    @if ($errors->has('password'))
                                        <div class="text-danger">{{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="one-profile-edit-password-new-confirm">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control" id="one-profile-edit-password-new-confirm"
                                        placeholder="Enter Confirm Password Here" name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="text-danger">{{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
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
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
