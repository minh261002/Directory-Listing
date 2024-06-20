@extends('frontend.layouts.master')

@section('content')
    <section class="wsus__login_page" style="padding-top:20px !important">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                    <div class="wsus__login_area">
                        <h2>Welcome back!</h2>
                        <p>Reset Yout Password</p>
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="Email"
                                            value="{{ request()->get('email') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>password</label>
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <button type="submit">Reset Password</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="or"><span>or</span></p>
                        <ul class="d-flex">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                        <p class="create_account">Dont’t have an account ? <a href="{{ route('register') }}">Create
                                Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
