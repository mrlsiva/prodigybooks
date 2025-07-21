@extends('layouts.app')

@section('content')
<form method="post" action="{{route('subscribe-process')}}">
@csrf

{{-- <input type="text" id="amount" name="amount" value="{{$total}}">
<input type="text" id="plan" name="plan" value="{{$plan->id}}"> --}}

</form>
<div>
{{$pay-response}}
</div>
@endsection