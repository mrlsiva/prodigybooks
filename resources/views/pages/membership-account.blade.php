@extends('layouts.app')

@section('content')
   <style>

nav > .nav.nav-tabs{

  border: none;
    color:#fff;
    background:#272e38;
    border-radius:0;

}
nav > div a.nav-item.nav-link,
nav > div a.nav-item.nav-link.active
{
  border: none;
    padding: 18px 25px;
    color:#fff;
    background:#272e38;
    border-radius:0;
}
nav > div a.nav-item.nav-link.active
{
    background:#e43750 !important;
    }
nav > div a.nav-item.nav-link.active:after
 {
  content: "";
  position: relative;
  bottom: -59px;
  left: -10%;
  border: 15px solid transparent;
  border-top-color: #e43750 ;
}
.tab-content{
  background: #fdfdfd;
    line-height: 25px;
    border: 1px solid #ddd;
    border-top:5px solid #e43750;
    border-bottom:5px solid #e43750;
    padding:30px 25px;
}
.tab-content.inside.pt-3 {
  background: #fdfdfd;
    line-height: 25px;
    border: 0px solid #ddd;
    border-top:5px solid #fff;
    border-bottom:5px solid #fff;
    padding:30px 25px;
}
nav > div a.nav-item.nav-link:hover,
nav > div a.nav-item.nav-link:focus
{
  border: none;
    background: #e43750;
    color:#fff;
    border-radius:0;
    transition:background 0.20s linear;
}
.table .thead-dark th {
    color: #fff;
    background-color: #343a40;
    border-color: #454d55;
}
.panel.panel-default {
    max-width: 400px;
    margin: 0 auto;
}
   </style>


<div class="container mt-2">
@if (session('profileMessage'))
    <div class="row alert alert-success" role="alert">
        {{ session('profileMessage') }}
    </div>
@endif
@if (session('passwordMessage'))
    <div class="row alert alert-success" role="alert">
        {{ session('passwordMessage') }}
    </div>
@endif


              <div class="row">
                <div class="col-12 ">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Membership Account</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                      <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Change Password</a>
                      <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Membership Levels</a> -->
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                   
                    <h4> My Memberships</h4> 
                     
                        @if ($userPlan)
                        <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th>LEVEL</th>
                            <th>BILLING</th>
                            <th>PAID ON</th>
                            <th>EXPIRATION</th>
                          </tr>
                        </thead>
                          <tbody>
                            <tr>
                              <td>
                                @if ($userPlan->plan_id == "1")
                                  Basic
                                @else
                                  Advance
                                @endif
                              </td>
                              <td>
                              @if ($userPlan->plan_id == "1")
                                  INR. 500
                                @else
                                  INR. 700
                                @endif
                              </td>
                              <td>
                                {{$userPlan->created_on}}
                              </td>
                              <td>
                                {{$userPlan->expiry}}
                              </td>
                            
                            </tr>
                          </tbody>
                          </table>
                        @else
                          <!--  -->
                          
                          <div>You are not a member yet</div>
                              <a href="{{url('/membership-plans' )}}"> Choose Plan </a>
                        @endif
                        
                    

                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                        <div class="container">
<div class="row flex-lg-nowrap">


  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="  ">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"> User Name : {{$user->name}}  </h4>
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Register Mail ID : {{$user->email}}</h4>
                    <!-- <div class="text-muted"><small>Last seen 2 hours ago</small></div> -->

                  </div>
                  <!-- <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">administrator</span>
                    <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                  </div> -->
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="active nav-link">Edit Your Details</a></li>
              </ul>
              <div class="tab-content inside pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="" method="POST" action="{{ route('profile.edit') }}">
                    <div class="row">
                      <div class="col-6">
                        <div class="row">
                       
                        @csrf
                          <!-- <input type="text" name="user"  /> -->
                          <!-- <input type="text" /> -->
                          <!-- <input  /> -->
                      
                          <div class="col">
                          <div class="mb-2"><b>Update Name / Email</b></div>
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="user" placeholder="{{$user->name}}" value="{{$user->name}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text"  name="email" value="{{$user->email}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit" value="Update Profile">Update Profile</button>
                      </div>
                    </div>
                  </form>
                      </div>
                      <div class="col-6">
                      <div class="col-12 col-sm-12 mb-3">
                      <form method="POST" action="{{ route('password.edit') }}">
                    @csrf

                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>
                              <input class="form-control" type="password" name="old_password" value="" placeholder="Old password" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" id="txtNewPassword" type="password" name="password" value="" placeholder="••••••" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" id="txtConfirmPassword" type="password" placeholder="••••••" required></div>
                          </div>
                        </div>
                        <div id="divCheckPasswordMatch"></div>
                        <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" disabled="true" id="btn-submit" type="submit" value="Update Profile">Update Password</button>
                      </div>
                    </div>
                  </form>
                      </div>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
</div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
ttttt
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                  </div>
                
                </div>
              </div>
       
</div>

<!-- <div class="container">
	<div class="row">
		<div class="col-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"> <i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class=" button e-series-book btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">

                      
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div> -->
<script>
        $(document).ready(function() {

            $('#nav-tab a').on('click', function() {
  $('.nav-item').removeClass('active');
});

                   
        })
    </script>

   @endsection