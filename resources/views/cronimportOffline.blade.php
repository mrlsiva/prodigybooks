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
                <form method="POST" action="{{route('cronimport.offline')}}" class="register-form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group offlineuser">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input id="name" type="file"  value="{{ old('name') }}" name="name"  required  autofocus>
                            <input id="password" type="hidden"  value="LP@BOOKS" name="password">
                        </div>
                        
                        
                        <div class="form-group mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn e-series-book">
                                    Register
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-5">
                            <a href="{{url('sampleExcel')}}">Download Template</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
