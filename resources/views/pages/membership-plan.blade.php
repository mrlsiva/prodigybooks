@extends('layouts.app')

@section('content')

@if (isset($plan) && $plan->id && $plan->status > 0)
   <div class="container mt-4 abtus text-center"> You have a subscription already. Please visit <a href="{{ url('/our-e-series') }}">our series</a> to read your desired book. </div>
  
   @elseif(isset($plan) && $plan->status == 0)
  <div class="container mt-4 abtus text-center"> Your subscription is Expired. Please Choose Plan Below </div>
  @endif
<div class="container mt-4 abtus text-center">
  
   <h2 class="mb-4 mt-2"> MEMBERSHIP PLAN </h2>
   </div>
<div class="row">  
<div class="col-6 text-right">
<div class="columns col-right">
  
  <ul class="price">
  <li class=""> <span  class=""><i class="fas fa-feather-alt rounded-circle" aria-hidden="true"></i></span> </li>
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
  <li class=""> <span  class=""><i class="fas fa-gem rounded-circle" aria-hidden="true"></i></span> </li>
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

@endsection