@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item ">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    Profile
                </div>
            </div>
        </div>

        <div class="section-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Profile</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.profile.update') }}" method="POST" class="row"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-12 mb-4">
                                    <label for="avatar">Avatar</label>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="avatar" id="image-upload" />
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="name">Fullname</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ auth()->user()->name }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="{{ auth()->user()->email }}">
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ auth()->user()->address }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ auth()->user()->phone }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="website">Website</label>
                                    <input type="text" name="website" id="website" class="form-control"
                                        value="{{ auth()->user()->website }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control"
                                        value="{{ auth()->user()->facebook }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" id="twitter" class="form-control"
                                        value="{{ auth()->user()->facebook }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="linkedin">LinkedIn</label>
                                    <input type="text" name="linkedin" id="linkedin" class="form-control"
                                        value="{{ auth()->user()->linkedin }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" name="instagram" id="instagram" class="form-control"
                                        value="{{ auth()->user()->instagram }}">
                                </div>

                                <div class="col-12">
                                    <label for="about">About</label>
                                    <textarea name="about" id="about" class="form-control" rows="5">{{ auth()->user()->about }}</textarea>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Password</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.profile.password.update') }}" class="row" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="col-md-6 mb-4">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control">
                                </div>

                                <div class="col-md-6 mb-4"></div>

                                <div class="col-md-6 mb-4">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <div class="col-md-6 mb-4"></div>

                                <div class="col-md-6 mb-4">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control">
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#image-preview').css('background-image', 'url({{ auth()->user()->avatar }})');
            $('#image-preview').css('background-size', 'cover');
            $('#image-preview').css('background-position', 'center');
            $('#image-preview').css('background-repeat', 'no-repeat');
        });
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "Choose File",
            label_selected: "Change File",
            no_label: false,
            success_callback: null
        })
    </script>
@endpush
