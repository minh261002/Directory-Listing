@extends('frontend.layouts.master')

@section('content')
    <section class="wsus__login_page" style="padding-top:20px !important">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                    <div class="wsus__login_area">
                        <h2>Welcome back!</h2>
                        <p>Forgot Password</p>
                        <form method="POST" action="{{ route('password.email') }}">
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
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>email</label>
                                        <input type="email" name="email" placeholder="Email"
                                            value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <button type="submit">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="or"><span>or</span></p>

                        <div class="wsus__login_imput wsus__login_check_area">
                            <a href="{{ route('login') }}">Login</a>

                            <a href="{{ route('register') }}">Register</a>
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
            $('form').submit(function() {
                $(this).find('button[type="submit"]').html(
                    '<i class="fa fa-spinner fa-spin"></i> Please wait...'
                );
                $(this).find('button[type="submit"]').attr('disabled', 'disabled');
            });
        });
    </script>
@endpush
