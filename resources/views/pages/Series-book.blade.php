@extends('layouts.app')

@section('content')
   <div class="row mt-4">
   <!-- <img src="img/abt_us1.png" class="img-responsive"> -->
   <div class="container abtus">
   <h2 class="mb-2 mt-2"> Our Library Catalogue </h2>

<div class="row mt-4 e-series">
<a href="#" class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-2">
   <img src="img/thumb.jpeg" class="img-responsive">
   <h4 class="mb-2 mt-2 show_one_line">  Model T to Self-Driving Cars </h4>

   <div class="row mt-1"> 
      <div class="col-5 "> <h6>No. Of pages</h6> </div> 
      <div class="col-2 P-0"> <h6>:</h6> </div>
      <div class="col-5 p-0"> <h6>32</h6> </div>
</div> 
<div class="row mt-1"> 
      <div class="col-5 "> <h6>Age Group</h6> </div> 
      <div class="col-2 P-0"> <h6>:</h6> </div>
      <div class="col-5 p-0"> <h6>7 - 15 Years</h6> </div>
</div> 
<div class="row mt-1"> 
      <div class="col-5 "> <h6>Price</h6> </div> 
      <div class="col-2 P-0"> <h6>:</h6> </div>
      <div class="col-5 p-0"> <h6><span>&#8377;</span>500</h6> </div>
</div> 
<div class="row mt-1"> 
      <div class="col-12 "> <h6>Series Name    : </h6> </div> 
      <div class="col-12"> <h6>KIDS CAN RE-CYCLE - PICTURE SERIES</h6> </div>
</div> 



   <div class="row mt-1"> <button class="button e-series-book"><span>Add to Cart </span></button> </div> 

</a>


</div> 

</div> 
   </div>
   @endsection