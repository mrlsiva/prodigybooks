@extends('layouts.app')

@section('content')
<div class="card text-center" style="min-height: 200px;">
    <h3 class="card-title">Account Deactivated Successfully</h3>
    <span style="display: inline-block; padding: 10px 0; font-size: 55px; color: #03Ac13;"><i class="fa fa-check-circle"></i></span>
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <a href="{{url('/admin/dashboard')}}" class="btn btn-primary">Goto Dashboard</a>
</div>
@endsection