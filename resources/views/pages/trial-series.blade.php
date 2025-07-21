@extends('layouts.app')

@section('content')
   <div class="row">
       @include('includes.carousal-ebook')
   </div>
   <div class="row day openstatus"><img src="resources/img/our-e-series/table_top_day.jpg" class="img-fluid">  </div>
<div class="row night openstatus"><img src="resources/img/our-e-series/table_top.jpg" class="img-fluid">  </div>
   <div class="row e_series_bg">
   <div class="container">
    <div id="accordion" class="accordion">

	@foreach ($categories as $value)

        <div class="card mb-1">
            <div class="card-header  collapsed" data-toggle="collapse" href="#collapseOne{{$value->id}}">
                <div class="card-title m-0 row">
                  <div class="col-1"> {{$value->id}} </div>
                  <div class="col-8"> {{$value->series_name}} </div>
                  <!-- <div class="col-1"> {{$value->no_of_books}}  </div> -->
                  <div class="col-2"> {{$value->age_group}}  </div>
                </div> 
              </div>
            <div id="collapseOne{{$value->id}}" class="card-body collapse" data-parent="#accordion" >
                <div class="card-title m-0 pt-2 pb-2 row">
                  <div class="col-3">  <img src="storage/app/public/uploads/img/{{$value->series_table_name}}/{{$value->series_table_name}}.png" class="img-fluid" > </div>
                  <div class="col-9">
					  <div class="col-12"> <p>{{$value->series_desc}} </p> </div>
					  
					  <div class="col-12 text-right"><a href="trial-books/{{$value->id}}">View Series </a> </div>
					</div>
                </div>
              </div>
			</div>

@endforeach
          </div>
    </div>
</div>
<div class="row day openstatus"><img src="resources/img/our-e-series/table_bottom_day.jpg" class="img-fluid">  </div>
<div class="row night openstatus"><img src="resources/img/our-e-series/table_bottom.jpg" class="img-fluid">  </div>
<style>
.row.openstatus {
  display:none;  
}
.row.day.openstatus, .row.night.openstatus {
  display:block; 
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
var Now = new Date(),
  CurrentDay = Now.getDay(),
  OpeningTime = new Date(Now.getFullYear(), Now.getMonth(), Now.getDate(), 9),
  ClosingTime = new Date(Now.getFullYear(), Now.getMonth(), Now.getDate(), 18),
  Open = (Now.getTime() > OpeningTime.getTime() && Now.getTime() < ClosingTime.getTime());
// debugger
if ( Open) {
    $('.openstatus').removeClass('night');
}
else {
    $('.openstatus').removeClass('day');
}
// alert("Night");

</script>
@endsection