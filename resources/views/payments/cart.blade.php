@extends('layouts.app')

@section('content')

@php 
	$total=0;
@endphp


<form id="cart" name="cart" action="{{route('cart.checkout')}}" method="post">
	@csrf
@foreach($items as $value)

	{{$value->actual_price}}
	@php
		$total += $value->actual_price;
	@endphp
	<input type="hidden" id="categories_id" class="categories_id" name="categories_id[]" value="{{ $value->categories_id }}">
	<input type="hidden" id="book_id" class="book_id" name="book_id[]" value="{{ $value->id }}">
@endforeach
<input type="hidden" id="total" class="total" name="total" value="{{ base64_encode($total) }}">
<input type="submit">
</form>

@endsection