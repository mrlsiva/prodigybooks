<link rel="stylesheet" href="{{ url('/resources/css/admin.css') }}">
<div class="container">
<div class="row">
<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 text-center">
<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/resources/img/logo.png') }}" /></a>
</div>
<div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8 text-right">
<ul class="admin navbar-right align-middle">
        @guest
            
        @else
        <li> <a href="{{url('admin/dashboard')}}" >Welcome Admin</a> </li>

        <li> <a href="{{url('admin/dashboard')}}" >Go to Dashboard</a> </li>

        <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a> </li>

        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
        @endguest
    </ul>
</div>
</div>

</div>

<div class="header_admin_title">
<h4> Welcome Little Prodigy Books Dashboard</h4>
</div>
