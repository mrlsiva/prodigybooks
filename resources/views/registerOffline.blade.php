@extends('layouts.appAdmin')
@section('content')
<div class="container main">
     <link rel="stylesheet" href="{{ url('/resources/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" href="{{ url('/resources/css/login.css') }}">
<section class="">
    <div class="container">
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <div class="">
            <div class="">
            <div class="text-center"> <h2 class="form-title">Sign up - For Offline Users</h2> </div>
                <form method="POST" action="{{route('register.offline')}}" class="register-form">
                        @csrf

                        <div class="form-group offlineuser">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input id="name" type="text"  value="{{ old('name') }}" name="name" placeholder="Your Name" required autocomplete="name" autofocus>
                        </div>
                        
                        <div class="form-group offlineuser offlineuserselect">
                            <label for="user-plan"><i class="zmdi zmdi-lock-outline"></i></label>
                            <select name="user-plan" required>
                                <option selected value="1">1 year</option>
                                <option value="2">2 years</option>
                            </select>
                        </div>
                        <div class="form-group offlineuser">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your Email" required autocomplete="email">
                            @if(Session::has('userExist'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{!! Session::pull('userExist') !!}</strong>
                                </span>
                            @endif
                        </div>
                       
                        <div class="form-group offlineuser">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input id="password" type="password" placeholder="Password" name="password" required autocomplete="new-password">
                        </div>

                      
                                <button type="submit" class="btn e-series-book">
                                    {{ __('Register') }}
                                </button>
                         
                        
                        <!-- <div class="form-group mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn e-series-book">
                                    Register
                                </button>
                            </div>
                        </div> -->
                </form>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
