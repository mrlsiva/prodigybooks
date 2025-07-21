@extends('layouts.app')

@section('content')


   <div class="row">
       @include('includes.carousal')
   </div>


   <div class="container mt-4 mb-2 text-center p-0">
   <div class="row slider_title">
       <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-2 text-left "><h3>The Career Series </h3></div>
       <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2 text-right"> <a href="">View More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a> </div> 
    </div></div>
   <div class="container ">
   <div class="row no-gutters">
       @include('includes.thumbnail')
   </div>
   </div>
   
   <div class="container mt-4 mb-2 text-center p-0">
   <div class="row slider_title">
       <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-2 text-left "><h3>How To Write Series </h3></div>
       <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2 text-right"> <a href=""> View More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a> </div> 
    </div></div>
   <div class="container ">
   <div class="row no-gutters">
       @include('includes.thumbnail')
   </div>
   </div>
   
   @endsection