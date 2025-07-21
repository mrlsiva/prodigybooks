@extends('layouts.app')

@section('content')
@if ($offlineUser)
    <div class="row" style="min-height: 300px">
        <div class="col-12">
            
            <link rel="stylesheet" href="{{ url('/resources/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

            <link rel="stylesheet" href="{{ url('/resources/css/login.css') }}">

            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Reset your password</h2>
                            <form method="POST" action="{{route('update.password')}}" class="register-form" id="register-form">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" placeholder="Your Name" value="{{$offlineUser->name}}" required autocomplete="name" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{$offlineUser->email}}"placeholder="Your Email" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="old_password"><i class="zmdi zmdi-lock"></i></label>
                                        <input id="old_password" type="password" placeholder="Old Password" name="old_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                        <input id="password" type="password" placeholder="New Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                                        <input id="password-confirm" placeholder="Repeat new password" type="password" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="form-group mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn e-series-book">
                                                Update Password
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <div class="signup-image">
                            <figure><img src="{{ url('/resources/images/registration.png') }}" alt="sing up image"></figure>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div> 
@else 
    <div class="row">
        @include('includes.carousal')
    </div>
    <div class="row text-center slider-thumb1"> <img src="{{ url('/resources/img/load.gif') }}" class="img-fluid text-center center_alignment_img" /> </div>
    <div id="show_data" class="container mt-4 mb-2 text-center p-0" style="display:none">

        @foreach($categories as $value)
        <div class="row slider_title mb-2" data-attr={{$value->series_table_name}}>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-2 text-left ">
                <h3> {{ $value->series_name }} </h3>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2 text-right hidden-sm-down"> <a href="series/{{ $value->series_table_name }}">View More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a> </div>
        </div>
        <div class="row no-gutters slider-thumb mb-5" id="category-{{$value->id}}" style="display: none" data-attr=>
            @include('includes.thumbnail')
        </div>
        @endforeach
    </div>

@endif
        
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="resources/js/slick.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).ready(function() {
// debugger
            var base_url = "{{url('/')}}";
            var headers = $('meta[name="csrf-token"]').attr('content');
            var getCategories = [];
            $('.slider_title').each(function(index) {
                // console.log( index + ": " + $( this ).attr('data-attr') );
                getCategories.push($(this).attr('data-attr'));
            });
            // console.log("getCategories: ", getCategories);
            var requestData = {
                // "displayCategories": ['careerseries', 'playgroup']
                "displayCategories": getCategories
            };
            console.log('headers: ', headers);
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': headers
                },
                data: requestData,
                url: base_url + "/api/categories",
                success: function(msg) {
                    // debugger
                    for (let i = 0; i < msg.length; i++) {
                        for (let j = 0; j < msg[i].length; j++) {
                            $('#category-' + msg[i][j].categories_id + ' section').append("<div class='mr-2 ml-2 text-center'><a href='" + base_url + "/product/" + msg[i][j].categories_id + "/" + msg[i][j].sku + "'><img class='img-fluid' src='storage/app/public/uploads/img/" + msg[i][j].series_table_name + "/thumb/" + msg[i][j].thumb_img + "'><a/><h5 class='mt-1 mb-1 show_two_line'> " + msg[i][j].book_title + " </h5><a href='" + base_url + "/product/" + msg[i][j].categories_id + "/" + msg[i][j].sku + "'> <button  class='button e-series-book'><span>View Details</span></button></a></div>");
                        }

                    }
                    // alert("data loaded");
                    $('.slider-thumb').show();
                    $('.slider-thumb1').hide();
                    $('#show_data').show();
                    $('.responsive').slick({
                        dots: false,
                        infinite: true,
                        speed: 300,
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        autoplay:true,
                        autoplaySpeed:3000,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 4,
                                    slidesToScroll: 1,
                                    infinite: true,
                                    dots: false
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    });
                }
            });
        })
    </script>

@endsection