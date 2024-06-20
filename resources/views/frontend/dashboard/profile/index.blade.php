@extends('frontend.layouts.master')

@section('content')
    <section id="dashboard" style="padding-top: 20px !important">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>

                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4>basic information</h4>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-8 col-md-12">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>Fullname</label>
                                                    <div class="input_area">
                                                        <input type="text" name="name"
                                                            value="{{ old('name') ?? Auth::user()->name }}"
                                                            placeholder="Fullname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>Phone</label>
                                                    <div class="input_area">
                                                        <input type="text" name="phone"
                                                            value="{{ old('phone') ?? Auth::user()->phone }}"
                                                            placeholder="Phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>Email</label>
                                                    <div class="input_area">
                                                        <input type="Email" name="email"
                                                            value="{{ old('email') ?? Auth::user()->email }}"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>Address</label>
                                                    <div class="input_area">
                                                        <input type="text" name="address"
                                                            value="{{ old('address') ?? Auth::user()->address }}"
                                                            placeholder="Address">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>About Me</label>
                                                    <div class="input_area">
                                                        <textarea cols="3" rows="3" name="about" placeholder="About">{{ old('about') ?? Auth::user()->about }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-5">
                                        <div class="profile_pic_upload">
                                            <img src="{{ Auth::user()->avatar }}" alt="img"
                                                class="imf-fluid w-100 img-preview">
                                            <input type="file" name="avatar" id="img-preview">
                                            <input type="hidden" name="old_avatar" value="{{ Auth::user()->avatar }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="my_listing_single">
                                            <label>Website</label>
                                            <div class="input_area">
                                                <input type="text" name="website"
                                                    value="{{ old('website') ?? Auth::user()->website }}"
                                                    placeholder="Website">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="my_listing_single">
                                            <label>Facebook</label>
                                            <div class="input_area">
                                                <input type="text" name="facebook"
                                                    value="{{ old('facebook') ?? Auth::user()->facebook }}"
                                                    placeholder="Facebook">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="my_listing_single">
                                            <label>Twitter</label>
                                            <div class="input_area">
                                                <input type="text" name="twitter"
                                                    value="{{ old('twitter') ?? Auth::user()->twitter }}"
                                                    placeholder="Twitter">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="my_listing_single">
                                            <label>LinkedIn</label>
                                            <div class="input_area">
                                                <input type="text" name="linkedin"
                                                    value="{{ old('linkedin') ?? Auth::user()->linkedin }}"
                                                    placeholder="LinkedIn">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="my_listing_single">
                                            <label>Instagram</label>
                                            <div class="input_area">
                                                <input type="text" name="instagram"
                                                    value="{{ old('instagram') ?? Auth::user()->instagram }}"
                                                    placeholder="Instagram">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="read_btn">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="my_listing list_mar">
                            <h4>change password</h4>
                            <form method="POST" action="{{ route('profile.password') }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>Current password</label>
                                            <div class="input_area">
                                                <input type="password" name="current_password"
                                                    placeholder="Current Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>New password</label>
                                            <div class="input_area">
                                                <input type="password" name="password" placeholder="New Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="my_listing_single">
                                            <label>confirm password</label>
                                            <div class="input_area">
                                                <input type="password" name="password_confirmation"
                                                    placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="read_btn">
                                            Save Changes
                                        </button>
                                    </div>
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
        $('#img-preview').on('change', function() {
            var img = new FileReader();
            img.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            }
            img.readAsDataURL(this.files[0]);
        });
    </script>
@endpush
