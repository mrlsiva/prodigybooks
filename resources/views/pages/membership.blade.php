@extends('layouts.app')

@section('content')
<form method="post" action="{{route('subscribe-process')}}">
@csrf

{{-- <input type="text" id="amount" name="amount" value="{{$total}}">
<input type="text" id="plan" name="plan" value="{{$plan->id}}"> --}}

<input type="hidden" id="amount" name="amount" value="{{$amount}}">
<input type="hidden" id="plan" name="plan" value="{{$plan}}">
<input type="hidden" id="type" name="type" value="2">
<style>
.ribbon {
 /* font-size: 16px !important; */
 /* This ribbon is based on a 16px font side and a 24px vertical rhythm. I've used em's to position each element for scalability. If you want to use a different font size you may have to play with the position of the ribbon elements */

 width: 50%;
    
 position: relative;
 background: #e43750;
 color: #fff;
 text-align: center;
 padding: 1em 2em; /* Adjust to suit */
 margin: 1em auto 1em; /* Based on 24px vertical rhythm. 48px bottom margin - normally 24 but the ribbon 'graphics' take up 24px themselves so we double it. */
}
.ribbon:before, .ribbon:after {
 content: "";
 position: absolute;
 display: block;
 bottom: -1em;
 border: 1.5em solid #e8445c;
 z-index: -1;
}
.ribbon:before {
 left: -2em;
 border-right-width: 1.5em;
 border-left-color: transparent;
}
.ribbon:after {
 right: -2em;
 border-left-width: 1.5em;
 border-right-color: transparent;
}
.ribbon .ribbon-content:before, .ribbon .ribbon-content:after {
 content: "";
 position: absolute;
 display: block;
 border-style: solid;
 border-color: #fb697e transparent transparent transparent;
 bottom: -1em;
}
.ribbon .ribbon-content:before {
 left: 0;
 border-width: 1em 0 0 1em;
}
.ribbon .ribbon-content:after {
 right: 0;
 border-width: 1em 1em 0 0;
}
.coupon-code{
    margin: 0;
    border-radius: 0px !important;
    width: 100%;
    border-radius: 0px 3px 3px 0px !important;
}
.coupon-msg {
    font-weight: bold;
    font-size: 18px;
}
.coupon-msg.success {
    color:#1a991a;
}
.coupon-msg.error {
    color:#e94343;
}
</style>
<div class="container">  
    <div class="col-12 text-center">  
    <h4> Hello!  <strong style="color: #e43750;"> E - Book </strong> Reader </h4>
    <h3 class="ribbon"> <strong class="ribbon-content">Congratulations</strong> </h3>
        <div><h3>You have Chosen a <strong style="color: #e43750;"> @if($plan === '1') Basic @else Advance @endif </strong>  Plan</h3> </div>
        <div> <h4>Total: <span id="setAmount">{{$amount}}</span> </h4></div>
        <div>  </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4" class="text-center">
                <div class="input-group custom-search-form">
                  <input type="text" class="form-control" id="coupon" name="coupon" placeholder="Enter Coupon Code" value="">
                  <span class="input-group-btn">
                  <button class="e-series-book coupon-code" type="button" name="apply" id="couponapply">
                  <span class="glyphicon glyphicon-search" id="cou-apply">Apply</span>
                 </button>
                 </span>
                 </div><!-- /input-group -->
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"><p class="coupon-msg"></p></div>
            <div class="col-4"></div>
        </div>
                   
        @if(Session::pull('subscription') === 'no') 
            <button class="button e-series-book" type="submit"> <span>Proceed to Pay</span> </button>
        @else 
        <!-- <input type="submit" enable> -->
            <button class="button e-series-book" type="submit"> <span>Proceed to Pay</span> </button>
        @endif
    </div>
</div>
</form>
<script type="text/javascript">
   $('#couponapply').click(function() {
        $('.coupon-msg').removeClass("success").removeClass('error');
        $('.coupon-msg').text("");
        let coupon = $('#coupon').val();
        let amount = parseInt($('#amount').val());
        if(!$('#setAmount').hasClass('applied')) {
            if(coupon == '') {
                $('.coupon-msg').addClass('error').text("Please enter coupon code!");
            }
            if(coupon != "") {
                var base_url = "{{url('/')}}";
                var headers = $('meta[name="csrf-token"]').attr('content');
                var requestData = {
                    'coupon': coupon,
                    'amount': amount
                }
                $.ajax({
                      type: "POST",
                      headers: {'X-CSRF-TOKEN': headers},
                      data: requestData,
                      url: base_url+"/coupon/check",
                      success: function(data){
                        if(data.status) {
                            $('#amount').val(data.amount);
                            $('#setAmount').addClass('applied').text('Rs.'+data.amount);
                            $('#cou-apply').text('Remove');
                            $('.coupon-msg').addClass('success').text(data.msg);
                        } else {
                            $('.coupon-msg').addClass('error').text(data.msg);
                        }
                      }
                });
            }
        } else {
            if(amount > 0) {
                amount = (amount * 10)/9;
                $('#setAmount').removeClass('applied').text('Rs.'+amount);
                $('#amount').val(amount);
                $('#coupon').val("");
                $('#cou-apply').text('Apply');
            }
        }
    }); 
</script>
@endsection