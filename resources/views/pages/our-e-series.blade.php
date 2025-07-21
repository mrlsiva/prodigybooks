@extends('layouts.app')

@section('content')
   <div class="row">
       @include('includes.carousal-ebook')
   </div>
   <div class="row day openstatus"><img src="{{url('resources/img/our-e-series/table_top_day.jpg')}}" class="img-fluid">  </div>
   <div class="row cloud openstatus"><img src="{{url('resources/img/our-e-series/table_top.jpg')}}" class="img-fluid">  </div>
   <div class="row night openstatus"><img src="{{url('resources/img/our-e-series/table_top_night.jpg')}}" class="img-fluid">  </div>

   <div class="row e_series_bg">
   <div class="container">
    <div id="accordion" class="accordion">

	@foreach ($categories as $value)

        <div class="card mb-1">
            <div class="card-header  "  >
                <div class="card-title m-0 row">
                  <div class="col-1"> {{$value->id}} </div>
                  <div class="col-6"> <a class="white_text" href="ebook/{{$value->series_table_name}}">{{$value->series_name}} </a> </div>
                  <div class="col-1"> {{$value->no_of_books}}  </div>
                  <div class="col-2"> {{$value->age_group}}  </div>
                  <div class="col-1 open"> <a class="collapsed" data-toggle="collapse" href="#collapseOne{{$value->id}}"> <img src="{{url('resources/img/our-e-series/002-plus.png')}}" class="img-fluid">  </a>  </div>
                  
                </div> 
              </div>
            <div id="collapseOne{{$value->id}}" class="card-body collapse" data-parent="#accordion" >
                <div class="card-title m-0 pt-2 pb-2 row">
                  <!-- <div class="col-3">  <img src="https://littleprodigybooks.s3.ap-south-1.amazonaws.com/img/{{$value->series_table_name}}/{{$value->series_table_name}}.png" class="img-fluid" > </div> -->
                  <div class="col-3">  <img src="storage/app/public/uploads/img/{{$value->series_table_name}}/{{$value->series_table_name}}.png" class="img-fluid" > </div>
                  
                  <div class="col-9">
					  <div class="col-12"> <p>{{$value->series_desc}} </p> </div>
					  
					  <div class="col-12 text-right"><a href="ebook/{{$value->series_table_name}}">View Series </a> </div>
					</div>
                </div>
              </div>
			</div>

@endforeach
          </div>
    </div>
</div>
<div class="row day openstatus"><img src="{{url('resources/img/our-e-series/table_bottom_day.jpg')}}" class="img-fluid">  </div>
<div class="row cloud openstatus"><img src="{{url('resources/img/our-e-series/table_bottom.jpg')}}" class="img-fluid">  </div>
<div class="row night openstatus"><img src="{{url('resources/img/our-e-series/table_bottom_night.jpg')}}" class="img-fluid">  </div>


@if (isset($plan) && $plan->id)
<div></div>
@else
<div class="container mt-4 abtus text-center">
   <!-- <img src="img/abt_us1.png" class="img-responsive"> -->
   <h2 class="mb-4 mt-2"> MEMBERSHIP PLAN </h2>
   </div>
<div class="row" id="chooseplan">  
  

<div class="col-6 text-right">

<div class="columns col-right">
  <ul class="price">
   <li class="rounded-circle mt-5 mb-5"> <span  class=""><img class="fa fa-feather-alt " src="resources/img/our-e-series/feather.png" aria-hidden="true"></span> </li>
    <li class="header">Basic</li>
    <li class="grey"><span>&#8377;</span> 500 </li>
    <li>Get Plan For One Year</li>
    <li>Read all E-book</li>
    <li>24/7 support</li>
    <li>
    <form method="POST" action="{{ url('membership/plans') }}">
    @csrf
       <input type="hidden" name='plan' value='1' />
       <input type="hidden" name='amount' value='500' />
      <button type='submit' class='button e-series-book'><span>Choose Plan</span></button>
    </form>
    </li>
  </ul>
</div>
</div>
<div class="col-6 text-left">
<div class="columns col-left">
  <ul class="price">
  <li class="rounded-circle mt-5 mb-5"> <span  class=""><img class="fa fa-feather-alt " src="resources/img/our-e-series/diamond.png" aria-hidden="true"></span> </li>
    <li class="header">Advance</li>
    <li class="grey"><span>&#8377;</span> 700 </li>
    <li>Get Plan For Two Year</li>
    <li>Read all E-book</li>
    <li>24/7 support</li>
    <li> 
    
    <form method="POST" action="{{ url('membership/plans') }}">
    @csrf
       <input type="hidden" name='plan' value='2' />
       <input type="hidden" name='amount' value='700' />
      <button type='submit' class='button e-series-book'><span>Choose Plan</span></button>
    </form>
    </li>
  </ul>
</div>
</div>

</div>
<div class="row mt-4 abtus text-center">

<a class="dropdown-item" href="#chooseplan">
<img src="{{url('/resources/img/our-e-series/Layout-01.jpg')}}" class="img-responsive">
</a>

   </div>
@endif
<div class="container mt-4 abtus text-center">
<a target="_blank" href="{{ url('/resources/pdf/Our-Library-Catalogue.pdf') }}"  class='button e-series-book mb-4'><span>View Our E-Book Catalogue </span></a>
<br>
<a class="dropdown-item mt-3" target="_blank" href="{{ url('/resources/pdf/Our-Library-Catalogue.pdf') }}">
<img src="{{url('/resources/img/our-e-series/Layout-02.jpg')}}" class="img-responsive">
</a>
   </div>

   <!-- https://littleprodigybooks.in/wp-content/uploads/2020/06/Our-Library-Catalogue.pdf
        https://littleprodigybooks.in/wordpress/wp-content/uploads/2020/06/Our-Library-Catalogue.pdf
    -->
<style>
  a.e-series-book:focus, a.e-series-book:hover {
    color: #fff !important;
    text-decoration: underline;
}
.row.openstatus {
  display:none;  
}
.row.day.openstatus, .row.night.openstatus, .row.cloud.openstatus {
  display:block; 
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$('#click_advance').click(function() {
    $('#display_advance').toggle('1000');
    $("i", this).toggleClass("icon-circle-arrow-up icon-circle-arrow-down");
});

// var Now = new Date(),
//   CurrentDay = Now.getDay(),
//   day = new Date(Now.getFullYear(), Now.getMonth(), Now.getDate(), 13),
//   cloud = new Date(Now.getFullYear(), Now.getMonth(), Now.getDate(), 19),
//   night = new Date(Now.getFullYear(), Now.getMonth(), Now.getDate(), 24),
//   Open = (Now.getTime() > day.getTime() && Now.getTime() > cloud.getTime() && Now.getTime() < night.getTime());
// debugger
// if ( Open) {
//     $('.openstatus').removeClass('day');
// }
// else if ( Open) {
//     $('.openstatus').removeClass('cloud');
// }
// else {
//     $('.openstatus').removeClass('night');
// }
// alert("Night");
var time = new Date().getHours();
debugger
  if (time < 13) { $('.openstatus').removeClass('cloud').removeClass('night'); }
  else if (time < 19) { $('.openstatus').removeClass('day').removeClass('night'); }
  else if (time < 24) { $('.openstatus').removeClass('day').removeClass('cloud'); }
  // else if (time > 19) { $('.openstatus').removeClass('cloud'); }
  // else { $('.openstatus').removeClass('night'); }
</script>
@endsection