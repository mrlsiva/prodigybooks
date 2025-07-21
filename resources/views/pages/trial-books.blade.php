@extends('layouts.app')

@section('content')
   <div class="row mt-4">
   <div class="container abtus">
 
   <h2 class="mb-2 mt-2"> {{$category->series_name}} </h2>


   
<p>{{$category->series_desc}} </p>
<div class="row mt-4 e-series">
@foreach ($Trialbooks as $value)
           
       
<a href="{{url('read-trial-book/'.$value->id)}}" class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-2">
   <img src="{{ url('storage/app/public/uploads/img/trialbooks/thumb/'.$value->thumb_img ) }}" class="img-responsive">
   <h4 class="mb-2 mt-2 ">  {{$value->book_title}} </h4>
</a>
@endforeach
</div> 

</div> 
   </div>


   @endsection
