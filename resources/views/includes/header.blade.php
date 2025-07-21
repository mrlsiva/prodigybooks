
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top header" data-spy="affix" data-offset-top="197">
<div class="container">
      <div class="navbar-collapse" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item bold">
            <a class="nav-link" href="{{url('/cart/view')}}"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg> 
<span id="totalQty">
@if(session()->has('qty'))
  {{session('qty')}}
@else 
   0
@endif
</span> items - ( Rs. <span id="totalAmount">
@if(session()->has('totalAmount'))
  {{session('totalAmount')}}
@else 
  0
@endif

</span> in total ) 
</a>
          </li>
          
        </ul>

        <ul class="navbar-nav top-static-nav">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                {{--<li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>--}}
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Welcome  {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
      </div>
      </div>
    </nav>
    
    <nav class="navbar navbar-toggleable-md navbar-inverse second-navbar">
<div class="container mt-4">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/resources/img/logo.png') }}" /></a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
       
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Little Prodigy
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('/aboutus') }}">About Us</a>
          <a class="dropdown-item" target="_blank" href="{{ url('/resources/pdf/Our-Library-Catalogue.pdf') }}">Our Library Catalogue</a>
          <a class="dropdown-item" href="{{ url('our-distributers') }}">Our Distributorship</a>
          <a class="dropdown-item" href="{{ url('our-publishing-partners') }}">Our Publishing Partners</a>
          <a class="dropdown-item" href="{{ url('our-clients') }}">Our Clients</a>

        </div>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="{{ url('our-e-series') }}">Ebooks – Home Education</a>
          </li>
         
          <li class="dropdown menu-large nav-item" style="display:none"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> Hard Cover Books </a>
                    <ul class="dropdown-menu megamenu">
                        <li class="dropdown-item">
                            <div class="row text-center ">
                            
                                <div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12"> <h5 class="text-left">Combo Hard Cover Books </h5> <a class="text-left">View More...</a> </div>
                                <div class="dropdown-divider"></div>
                                
                                <div class="col-6	col-sm-6 col-md-3	col-lg-3 col-xl-3"><a href=""><div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12 mt-4"><h5>The king Box</h5></div> <div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12 mt-4 mb-4"><img src="{{ url('/resources/img/king.png') }}" class="resources/img-fluid"></div> <div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12"><h4 class=""><span>₹</span>1000</h4></div><div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12"><p class="">Choose any 10 books from the categories above and add it to your product boxes</a></div></a> </div>

                                <div class="col-6	col-sm-6 col-md-3	col-lg-3 col-xl-3"><a href=""><div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12 mt-4"><h5>The Queen Box</h5></div> <div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12 mt-4 mb-4"><img src="{{ url('/resources/img/queen.png') }}" class="resources/img-fluid"></div> <div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12"><h4 class=""><span>₹</span>2000</h4></div><div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12"><p class="">Choose any 20 books from the categories above and add it to your product boxes</a></div></a> </div>

                                <div class="col-6	col-sm-6 col-md-3	col-lg-3 col-xl-3"><a href=""><div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12 mt-4"><h5>The Knight Box</h5></div> <div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12 mt-4 mb-4"><img src="{{ url('/resources/img/knight.png') }}" class="resources/img-fluid"></div> <div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12"><h4 class=""><span>₹</span>3000</h4></div><div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12"><p class="">Choose any 30 books from the categories above and add it to your product boxes</a></div></a> </div>

                                <div class="col-6	col-sm-6 col-md-3	col-lg-3 col-xl-3"><a href=""><div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12 mt-4"><h5>The Great Warden Box</h5></div> <div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12 mt-4 mb-4"><img src="{{ url('/resources/img/warden.png') }}" class="resources/img-fluid"></div> <div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12"><h4 class=""><span>₹</span>4000</h4></div><div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12"><p class="">Choose any 40 books from the categories above and add it to your product boxes</a></div></a> </div>

                                <div class="dropdown-divider"></div>
                                <div class="col-12 col-sm-12 col-md-12	col-lg-12 col-xl-12"> <h5 class="text-left">Get Hard Cover Books </h5> <a class="text-left">View More...</a> </div>
                            </div>
                        </li>
                    </ul>
                </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{url('/membership-account')}}">Membership Account</a>
          <a class="dropdown-item" href="{{url('/cart/view')}}">Cart</a>
        </div>
      </li>
        </ul>
      </div>
      </div>
    </nav>