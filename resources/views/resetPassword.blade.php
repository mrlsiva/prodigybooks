@extends('layouts.appNewuser')

@section('content')
<div class="row" style="min-height: 300px">
        <div class="col-12">
            
            <link rel="stylesheet" href="{{ url('/resources/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

            <link rel="stylesheet" href="{{ url('/resources/css/login.css') }}">
            @if(isset($message))
                <div class="test">{{$message}}</div>
            @endif
            <section class="signup">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <h2 class="form-title">Create your profile </h2>
                            <form method="POST" action="{{route('update.password')}}" class="register-form" id="register-form">
                                    @csrf
                                    <input type="hidden" name="plan-id" value="{{ $plan }}" />
                                    <div class="form-group offlineuser">
                                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" placeholder="Your Name" value="{{$uname}}" required autocomplete="name" autofocus>
                                    </div>
                                    <div class="form-group offlineuser">
                                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{$email}}"placeholder="Your Email" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group offlineuser">
                                        <label for="old_password"><i class="zmdi zmdi-lock"></i></label>
                                        <input id="old_password" type="password" placeholder="Old Password" name="old_password" required>
                                    </div>
                                    <div class="form-group offlineuser">
                                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                        <input id="txtNewPassword" type="password" placeholder="New Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   

                                    <div class="form-group offlineuser">
                                        <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                                        <input id="txtConfirmPassword" placeholder="Repeat new password" type="password" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group offlineuser" style="border-bottom: 1px solid #999; ">
                                    <label for="age" style="width: 5% !important; "><i class="zmdi zmdi-account-add"></i></label>
                                    <select name="age" class="form-control" style="width: 95% !important; margin-left: 2%;border: none; ">
                                        <option>Choose Your Age</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                    </select>
                                    </div>
                                    <!-- <div class="form-group offlineuser">
                                        <label for="age"><i class="zmdi zmdi-email"></i></label>
                                        <input id="age" type="number" class="" name="age" value=""placeholder="Enter Your Age" required >
                                    </div> -->

                                    <div class="form-group offlineuser">
                                        <label for="country"><i class="zmdi zmdi-pin"></i></label>
                                        <input id="country" type="name" class="" name="country" value="" placeholder="Enter Your country" required >
                                    </div>

                                    <!-- <div class="form-group offlineuser">
                                        <label for="state"><i class="zmdi zmdi-email"></i></label>
                                        <input id="state" type="name" class="" name="state" value=""placeholder="Enter Your state" required >
                                    </div> -->

                                    <div class="form-group offlineuser">
                                        <label for="city"><i class="zmdi zmdi-pin"></i></label>
                                        <input id="city" type="name" class="" name="city" value=""placeholder="Enter Your city" required >
                                    </div>

                                    <!-- <div class="form-group offlineuser">
                                        <label for="school"><i class="zmdi zmdi-email"></i></label>
                                        <input id="school" type="name" class="" name="school" value="placeholder="Enter Your school" required >
                                    </div>

                                    <div class="form-group offlineuser">
                                        <label for="grade"><i class="zmdi zmdi-email"></i></label>
                                        <input id="grade" type="name" class="" name="grade" value=""placeholder="Enter Your grade" required >
                                    </div>

                                    <div class="form-group offlineuser">
                                        <label for="section"><i class="zmdi zmdi-email"></i></label>
                                        <input id="section" type="name" class="" name="section" value=""placeholder="Enter Your section" required >
                                    </div> -->

                                    


                                    <div class="form-group mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" id="btn-submit" disabled class="btn e-series-book">
                                                Update Password
                                            </button>
                                        </div>
                                    </div>

                                    
                            </form>
                        </div>
                        <!-- <div class="col-12 col-sm-12 col-md-46 col-lg-6 col-xl-6">
                            <figure><img src="{{ url('/resources/images/registration.png') }}" alt="sing up image"></figure>
                        </div> -->
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#txtNewPassword, #txtConfirmPassword").keyup(checkPasswordMatch);
        });

        function checkPasswordMatch() {
            var password = $("#txtNewPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();

            if (password !== confirmPassword){
            $("#divCheckPasswordMatch").html("Passwords do not match!");
                $("#btn-submit").attr('disabled', 'true');
            }
            else {
            $("#divCheckPasswordMatch").html("Passwords match.");
                $("#btn-submit").removeAttr('disabled');
            }
                
        }

    </script>
    @endsection