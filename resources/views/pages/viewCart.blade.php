@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-md-offset-1">
<form method="post" action="{{route('subscribe-process')}}">
@csrf

<input type="hidden" id="cart-id" value="" />
<table class="table table-hover" id="cart-table">
@php $array=[]; $sku = [];$id = []; $last = array_key_last($cartItems); @endphp
<thead>
    <tr>
      <th scope="col-5">Product</th>
      <th scope="col-2">Quantity</th>
      <th scope="col-2">Price</th>
      <th scope="col-2">Total</th>
      <th scope="col-1"></th>
    </tr>
  </thead>
  <tbody>
@foreach ($cartItems as $k=>$value)
<div class="alert alert-warning" id='redo-box' role="alert" style="display: none">
<span>You wanna <a href="javascript:void(0)" id="redo-delete" data-id="{{$value['id']}}">redo</a>?</span>
</div>
<tr id="item-{{$value['id']}}">
    <th scope="row"><img class="mr-1" src="{{$value['image']}}" style="width: 72px; height: 72px;">{{$value['book_title']}}</th>
    <td>{{$value['qty']}}
    </td>
    <td><strong><span>&#8377;</span></strong> {{$value['amount']}}</td>
    <td><strong><span>&#8377;</span><span id="item-total-{{$value['id']}}">{{$value['curr_total']}}</span></strong></td>
    <td> <a href="javascript:void(0)" class='delete-cart' data-attr="{{$value['id']}}">X</a> </td>
</tr>
@php
$sku[]= $value['sku'];
$id[]= $value['id'];

@endphp
@endforeach
@php
$array=array(
    'sku'=>$sku,
    'id'=>$id
    );

@endphp
</tbody>


<!-- <input type="submit"> -->
</table>
<div class="row" style="padding: 10px; background: #ccc; margin-bottom: 10px;">
    <div class="col-8"></div>
    <div class="col-2 text-right">
        <h5>Total: </h5>
    </div>
    <div class="col-2 text-right">
        <h5><strong><span>&#8377;</span><span class="amount">{{$total}}</span></strong></h5>
    </div>
</div>
<div class="row">
    <div class="col-12 text-right" style="display:none">
        <h5>Subtotal</h5>
        <h5><strong><span>&#8377;</span><span class="amount">{{$total}}</span></strong></h5>
    </div>
    <div class="" style="display:none"> 
    <input type="text" id="amount"  name="amount" value="{{$total}}">
    <input type="hidden" id="sku" name="sku" value="{{json_encode($array,true)}}">

    <input type="hidden" id="type" name="type" value="1">
</div>
<div class="col-12 text-right">
<a href="{{url('/')}}">
    <button type="button" class="btn e-series-book">
        <span class="glyphicon glyphicon-shopping-cart">Continue Shopping</span> 
    </button>
    </a>
    <button type="submit" class="btn e-series-book">
         <span class="glyphicon glyphicon-play">Checkout</span>
    </button>

</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
$('.delete-cart').on('click', function(){
    // console.log($(this).data('attr'));
    $('#cart-id').val($(this).data('attr'));
    var base_url = "{{url('/')}}";
        var headers = $('meta[name="csrf-token"]').attr('content');
        // console.log("getCategories: ", getCategories);
        var requestData = {
            "id": $(this).data('attr')
        };
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': headers},
            data: requestData,
            url: base_url+"/delete-cart-item",
            success: function(msg){
                console.log('msg: ', msg);
                $('#item-'+msg).hide();
                var getItemTotal = $('#item-total-'+msg).text();
                var itemCount = $('#totalQty').text();
                var updateTotal = parseInt($('#amount').val()) - parseInt(getItemTotal);
                console.log('updateTotal: ', updateTotal, ' itemCount: ', itemCount);
                $('#redo-box').fadeIn().show();
                $('#amount').val(updateTotal);
                $('.amount').text(updateTotal);
                $('#totalQty').text(parseInt(itemCount-1));
                $('#totalAmount').text(updateTotal);
            }
        }); 
});

$('#redo-box a').on('click', function(){
    var base_url = "{{url('/')}}";
        var headers = $('meta[name="csrf-token"]').attr('content');
        // console.log("getCategories: ", getCategories);
        var requestData = {
            "id": $('#cart-id').val()
        };
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': headers},
            data: requestData,
            url: base_url+"/redo-delete-item",
            success: function(msg){
                console.log('msg: ', msg);
                $('#redo-box').fadeOut().hide();
                var getItemTotal = $('#item-total-'+msg).text();
                var itemCount = $('#totalQty').text();
                var updateTotal = parseInt($('#amount').val()) + parseInt(getItemTotal);
                console.log('updateTotal: ', updateTotal, $('#amount').val());
                $('#item-'+msg).fadeIn().show();
                $('#amount').val(updateTotal);
                $('.amount').text(updateTotal);
                $('#totalQty').text(parseInt(itemCount)+1);
                $('#totalAmount').text(updateTotal);
                // setTimeout('location.reload()', 1000);
            }
        }); 
})
</script>
@endsection