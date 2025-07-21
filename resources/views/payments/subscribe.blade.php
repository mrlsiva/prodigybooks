@extends('layouts.app')

@section('content')

@php 
	$total=0;
@endphp

@if($exists_plan==0)

<form id="cart" name="cart" action="{{route('cart.checkout')}}" method="post">
	@csrf
	<input type="hidden" id="total" class="total" name="total" value="{{ base64_encode(100) }}">
	<input type="hidden" id="plan_id" class="plan_id" name="plan_id" value="{{ intval($plans->id) }}">
	<input type="submit" value="subscribe">
</form>
@endif
@endsection