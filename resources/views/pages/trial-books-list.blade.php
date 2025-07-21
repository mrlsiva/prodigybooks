@extends('layouts.app')

@section('content')
<div class="row mt-4">
   <div class="container abtus">  
   <h2 class="mb-4">Trial Books</h2>
      <!-- <p>Writing is an important skill that kids use almost every day. Whether they’re working on a school report or writing about their day, the Language Arts Explorer Junior: Writing Series has tips and tricks that will help them become writing experts. </p> -->
      <div class="row mt-4 e-series">
         @foreach ($trialBooks as $value)
            <a href="{{ url('read-trial-book/'.$value->id)}}" class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-2">
               <img src="{{ url('storage/app/public/uploads/img/trialbooks/thumb/'.$value->thumb_img) }}" class="img-responsive">
               <h4 class="mb-2 mt-2 ">  {{$value->book_title}} </h4>
            </a>        
         @endforeach
      </div>
   </div> 
</div>
@endsection