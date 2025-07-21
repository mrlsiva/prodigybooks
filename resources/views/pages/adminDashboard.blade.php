@extends('layouts.appAdmin')

@section('content')
<div class="container">
<h4>Dashboard</h4>
    <div class="row">
        <div class="col-md-12">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Add books</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <!-- <button class="button e-series-book"><span class="mb-2">Add to Cart </span></button> -->
                  <a href="{{ route('admin.add_books') }}" class="e-series-book mb-1"> <span class="mb-2">Click here to add books </span></a>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View/Edit Blog</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{ route('admin.blog') }}" class="e-series-book mb-1"> <span class="mb-2">Go to Blog</span></a>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Active Users</h5>
                  <p class="card-text"><h4>{{ session('activeUsers') }}</h4> active users.</p>
                  
                </div>
              </div>
            </div>
            
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Add Trial books</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{ route('admin.add_trial_books') }}" class="e-series-book mb-1"> <span class="mb-2">Add trial books</span></a>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View/Edit Books</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{ route('admin.view_books') }}" class="e-series-book mb-1"> <span class="mb-2">View/Edit books</span></a>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Add Offline Users</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{ url('/register-offline-users') }}" class="e-series-book mb-1"> <span class="mb-2">Register offline user</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
