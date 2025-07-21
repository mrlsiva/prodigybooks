@extends('layouts.app')
@section('content')
<div class="container main">
<link rel="stylesheet" href="{{ url('/resources/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" href="{{ url('/resources/css/login.css') }}">
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" placeholder="Your Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"placeholder="Your Email" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input id="password" type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input id="password-confirm" placeholder="Repeat your password" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group pr-5">
                        <input class="agree-term" type="checkbox" name="remember" id="remember" required >

                        <label for="remember" class="label-agree-term"><span><span></span></span>I Agree to the <a target="_blank" href="http://localhost/littleprodigyapi/prodigyweb/tc">Terms and Conditions</a></label>
                    </div>
                        <div class="form-group mb-0">
                        
                            <div class="col-md-12">
                                <button type="submit" class="btn e-series-book">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{ url('/resources/images/registration.png') }}" alt="sing up image"></figure>
                <a href="{{ url('/login') }}" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>

</section>
<script src="{{ url('/resources/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/resources/js/main.js') }}"></script>
</div>
@endsection
