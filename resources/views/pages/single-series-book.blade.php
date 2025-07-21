@extends('layouts.app')

@section('content')
   <div class="row mt-4">
   <!-- <img src="resources/img/abt_us1.png" class="img-responsive"> -->
   <div class="container abtus">
            <h2 class="mb-2 mt-2"> {{$series_name}} </h2>
            <div class="row mt-4 e-series">
@foreach ($relatedProducts as $value)
<a href="{{ url('/product/'.$series_id.'/'.$value->sku) }}" class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-2">
   <img src="{{ url('storage/app/public/uploads/img/'.$series_image.'/thumb/'. $value->thumb_img) }}" class="img-responsive" />
   <h4 class="mb-2 mt-2 show_one_line">  {{$value->book_title}} </h4>

<div class="row mt-1"> 
      <div class="col-5 "> <h6>Age Group</h6> </div> 
      <div class="col-2 P-0"> <h6>:</h6> </div>
      <div class="col-5 p-0"> <h6>{{$age_group}}</h6> </div>
</div> 
<div class="row mt-1"> 
      <div class="col-5 "> <h6>Price</h6> </div> 
      <div class="col-2 P-0"> <h6>:</h6> </div>
      <div class="col-5 p-0"> <h6><span>₹</span>{{ $value->actual_price }}</h6> </div>
</div> 
<div class="row mt-1"> 
      <div class="col-12 "> <h6>Series Name    : </h6> </div> 
      <div class="col-12"> <h6>{{$series_name}}</h6> </div>
</div> 



   <div class="row mt-1"> <button class="button e-series-book"><span>View product </span></button> </div> 

</a>
@endforeach
      </div> 
   </div></div> 

   @endsection