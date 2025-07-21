@extends('layouts.app')

@section('content')
<!-- Font Icon -->
<link rel="stylesheet" href="{{ url('/resources/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

<!-- Main css -->
<link rel="stylesheet" href="{{ url('/resources/css/login.css') }}">
 <style>.form-group {width: 100%; padding: 0; margin: 0; }</style>
 <div class="container">
    <div class="row justify-content-center">
        @if (session('currentSession'))
            <div class="alert alert-success" role="alert">
                {{ session('warning') }}
                <input type="hidden" id="current-session" name="current-session" value="{{session('currentSession')}}" />
                <div>
                    <button id="continue-login" class="button e-series-book"><span>Continue Login</span></button>
                    <button id="cancel-login" class="button e-series-book"><span>Cancel</span></button>
                </div>
            </div>
        @endif

        @if (session('loginToSubscribe'))
            <div class="alert alert-warning" role="alert">
                {{ session('loginToSubscribe') }}
                
            </div>
        @endif

        <div class="col-md-12">
            <div class="container main">
               
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image mt-5">
                <figure><img src="{{ url('/resources/images/login.png') }}" alt="sing up image"></figure>
                <a href="{{ url('/register') }}" class="signup-image-link">Not Registered ? <span style="color:#e43750">Create a new account</span></a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign in</h2>
                <form method="POST" class="register-form" id="login-form" action="{{ route('login') }}" onsubmit="return checkForm(this);">
                    @csrf    
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <!-- <input type="password" name="your_pass" id="your_pass" placeholder="Password"/> -->
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <!-- <input type="password" name="player_password" id="pass_log_id" /> -->

<span toggle="#password-field" class="fa fa-fw fa-eye-slash field_icon toggle-password"></span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <!-- <div class="form-group">
                        <input class="agree-term" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>-->

                    <div class="form-group row">
                        <input class="" type="checkbox" name="not_robot" id="not_robot" {{ old('not_robot') ? 'checked' : '' }}>
                        <label for="not_robot" class="label-agree-term"><span><span></span></span> I'm not a robot</label>
                    </div>

                    <div class="form-group form-button">
                        <button class="button e-series-book" type="submit"><span>{{ __('Login') }} </span></button>
                   

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</section>

                
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="{{ url('/resources/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/resources/js/main.js') }}"></script>

<script type="text/javascript">
    $("#continue-login").on('click', function(){
        console.log('Session id: ', $("#current-session").val());
        var base_url = "{{url('/')}}";
        var headers = $('meta[name="csrf-token"]').attr('content');
        var requestData = {
            "currentSession": $("#current-session").val()
            // "comment_id": cid
        }
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': headers},
            data: requestData,
            url: base_url+"/active-session",
            success: function(msg){
                console.log('msg: ', msg);
                // $('#reply-comment-'+index).append("<span>"+msg+"</span>");
                // $('.reply-comment-'+index).hide();
                // $('#reply_'+index).show();
            }
        });
    })

    $("#cancel-login").on('click', function(){
        var base_url = "{{url('/')}}";
        var headers = $('meta[name="csrf-token"]').attr('content');
        var requestData = {
            "logoutSession": $("#current-session").val()
            // "comment_id": cid
        }
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': headers},
            data: requestData,
            url: base_url+"/logout-session",
            success: function(msg){
                console.log('msg: ', msg);
                // $('#reply-comment-'+index).append("<span>"+msg+"</span>");
                // $('.reply-comment-'+index).hide();
                // $('#reply_'+index).show();
            }
        });
    })


//     $("body").on('click','.toggle-password',function(){
//     $(this).toggleClass("fa-eye fa-eye-slash");

//     var input = $("#password").attr("type");

//     if (input.attr("type") === "password") {
//         input.attr("type", "text");
//     } else {
//         input.attr("type", "password");
//     }
// });
$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>
    <script>

  function checkForm(form)
  {
    
    if(!form.not_robot.checked) {
      alert("Please Confirm You are not Robot ");
      form.not_robot.focus();
      return false;
    }
    return true;
  }

</script>


@endsection
