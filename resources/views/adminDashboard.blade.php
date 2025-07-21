@extends('layouts.appAdmin')

@section('content')
<div class="container">
<!-- <h4>Dashboard</h4> -->
    <div class="row">
        <div class="col-md-12">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
          @if(Session::has('message'))
          <div class="alert">
          <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! Session::pull('message') !!} </p>
          </div>
          @endif
          <div class="row">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-2">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">About E- Books</h5>
                  <!-- <button class="button e-series-book"><span>Add to Cart </span></button> -->
                  <div class="col-12 mb-4"><a href="{{ route('admin.add_books') }}" class="e-series-book"> <span>Add books </span></a></div>
                  <div class="col-12 mb-4">
                  <a href="{{ route('admin.view_books') }}" class="e-series-book"><span>View/Edit books</span></a></div>
                  <div class="col-12 mb-4">
                  <a href="{{ route('admin.add_trial_books') }}" class="e-series-book"><span>Add trial books</span></a></div>



                  
                </div>
              </div>
            </div>
             <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-2">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View/Edit Blog</h5>
                  {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                  <div class="col-12 mb-4"><a href="{{ route('admin.blog') }}" class="e-series-book"> <span>Go to Blog</span></a></div>
                  <div class="col-12 mb-4"><a href="{{ route('admin.comments') }}" class="e-series-book"> <span>Go to Comments</span></a></div>
                  
                </div>
              </div>
            </div> 
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-2">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Active Users</h5>
                  <p class="card-text"><h4>{{ session('activeUsers') }}</h4> active users.</p>
                  
                  
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-2">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View Users</h5>
                
                  <div class="col-12 mb-4">
                  <a href="{{ url('/admin/subscribed-user-list') }}" class="e-series-book mt-3 mb-3"> <span>Subscribed List</span></a></div>
                  <div class="col-12 mb-4">
                  <a href="{{ url('/admin/unsubscribed-user-list') }}" class="e-series-book mt-3 mb-3"> <span>UnSubscribed List</span></a></div>
                </div>
              </div>
            </div>
            
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-2">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Add Offline Users</h5>
                  <div class="col-12 mb-4">
                  <a href="{{ url('/register-offline-users') }}" class="e-series-book mt-3 mb-3"><span>Register offline user</span></a>
                </div>
                  <div class="col-12 mb-4">
                  <a href="{{ url('/import-offline-users') }}" class="e-series-book mt-3 mb-3"><span>Import Same Template user</span></a>
                </div>
				 <div class="col-12 mb-4">
                  <a href="{{ url('/cronimport-offline-users') }}" class="e-series-book mt-3 mb-3"><span>Import Mulitple offline user</span></a>
                </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-2">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">All Users</h5>
                  <div class="col-12 mb-4"> <a href="{{ url('/admin/all-user') }}" class="e-series-book mt-3 mb-3"><span> User Password updated info</span></a></div>
				  <div class="col-12 mb-4"><a href="{{ route('admin.booklist') }}" class="e-series-book"> <span>Book List</span></a></div></span></a>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-2">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Coupon</h5>
                
                  <div class="col-12 mb-4">
                  <a href="{{ url('/admin/coupon') }}" class="e-series-book mt-3 mb-3"> <span>Coupons List</span></a></div>
                  <div class="col-12 mb-4">
                  <a href="{{ url('/admin/coupon-create') }}" class="e-series-book mt-3 mb-3"> <span>Add Coupon</span></a></div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
   $(document).ready(function ()
{ 
setTimeout(function(){
       $("div.alert").remove();
    }, 5000 ); 
});
</script>
@endsection
