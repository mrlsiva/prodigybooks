@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- this meta viewport is required for BOLT //-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<!-- BOLT Sandbox/test //-->
<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>
<!-- BOLT Production/Live //-->
<!-- // <script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>  // -->

</head>
<style type="text/css">
	.main {
		margin-left:30px;
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	.text {
		float:left;
		width:180px;
	}
	.dv {
		margin-bottom:5px;
	}

	.coupon-code{
		margin: 0;
		border-radius: 0px !important;
		width: 100%;
	    border-radius: 0px 3px 3px 0px !important;
	}
</style>
<body>
<div class="container">
   <form action="#" id="payment_form">
	<div class="col-12 text-center">
   	<div class="row text-center" style="display:none">
    <input type="hidden" id="udf5" name="udf5" value="<?php echo $data['udf5']; ?>" />
	<input type="hidden" id="surl" name="surl" value="<?php echo $return_url ?>" />
	</div>
    <div class="row text-center" style="display:none">
    <span class="text"><label>Merchant Key:</label></span>
    <span><input type="hidden" id="key" name="key" placeholder="Merchant Key" value="<?php echo config("app.payu_key"); ?>" /></span>
    </div>
    
    <div class="row text-center" style="display:none">
    <span class="text"><label>Merchant Salt:</label></span>
    <span><input type="hidden" id="salt" name="salt" placeholder="Merchant Salt" value="<?php echo config("app.payu_salt"); ?>" /></span>
    </div>
    
    <div class="row text-center" style="display:none">
    <span class="text"><label>Transaction/Order ID:</label></span>
    <span><input type="hidden" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo $data['txnid']; ?>" /></span>
    </div>
	<div class="row text-center" style="display:none">
    <span class="text"><label>First Name:</label></span>
    <span><input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $data['fname']; ?>" /></span>
    </div>
    
    <div class="row text-center" style="display:none">
    <span class="text"><label>Email ID:</label></span>
    <span><input type="text" id="email" name="email" placeholder="Email ID" value="<?php echo $data['email']; ?>" /></span>
    </div>
    
    <div class="row text-center" style="display:none">
    <span class="text"><label>Mobile/Cell Number:</label></span>
    <span><input type="text" id="validMobile"  placeholder="Mobile/Cell Number" value="9994090424" /></span>
    </div>
    <div class="row text-center" style="display:none">
    <span class="text"><label>Amount:</label></span>
    <span><input type="text" id="amounts" name="amounts" placeholder="Amount" value="<?php echo $data['amount']; ?>" /></span>    
    </div>
    <input type="hidden" id="amount" name="amount" placeholder="Amount" value="<?php echo $data['amount']; ?>" />
    <div class="row text-center" style="display:none">
    <span class="text"><label>Product Info:</label></span>
    <span><input type="text" id="pinfo" name="pinfo" placeholder="Product Info" value='<?php echo $data['pinfo']; ?>' /></span>
    </div>
    
    <div class="row text-center" style="display:none">
    <span class="text"><label>Hash:</label></span>
    <span><input type="hidden" id="hash" name="hash" placeholder="Hash" value="<?php echo $hash; ?>" /></span>
	</div>
	<div class="row text-center" style="display:none">
    <input type="hidden" id="token" name="token" placeholder="token" value="{{csrf_token()}}" />
	</div>
	<div style="max-width:200px;">
		
</div>
	
	</div>
	<div class="row">
	<div class="col-md-1"></div>
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart total</span>
        <!--<span class="badge badge-secondary badge-pill">3</span>-->
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between setAmount">
          <span>Total (INR)</span>
          <strong id="setAmount">Rs. <?php echo $data['amount']; ?></strong>
        </li>
      </ul>
    <input type="hidden" name="couponhidden" vlaue="ashwin100" id="couponhidden">
	

	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-12">
		            <div class="input-group custom-search-form">
		              <input type="text" class="form-control" id="coupon" name="coupon" placeholder="Enter Coupon Code" value="">
		              <span class="input-group-btn">
		              <button class="e-series-book coupon-code" type="button" name="apply" id="couponapply">
		              <span class="glyphicon glyphicon-search">Apply</span>
		             </button>
		             </span>
		             </div><!-- /input-group -->
		        </div>
			</div>
		</div>
    </div>
</div>
    <div class="col-md-6 order-md-1 slider_title">
      <h3 class="mb-3">Please fill this form</h3>
      <!-- <form class="needs-validation" novalidate=""> -->
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName"><strong>First name</strong></label><br />
          <span><?php echo $data['fname']; ?></span>
          </div>
        </div>
        <div class="mb-3">
          <label for="email"><strong>Email </strong></label><br />
          <span><?php echo $data['email']; ?></span>
		</div>
        <div class="mb-3">
          <label for="address"><strong>Address</strong></label>
          <input type="text" class="form-control" id="address1" name="address1" value="" placeholder="" required>
        </div>
		<div class="mb-3">
		<label for="mobile"><strong>Mobile No:</strong></label>
		<input type="text" class="form-control" id="mobile" name="mobile" placeholder="" value="" required>
		</div>
		<button type='button' value="Pay" onclick="launchBOLT(); return false;" class='button e-series-book'><span>Continue to checkout</span></button>
      </form>
    </div>

	<div class="col-md-1">&nbsp;</div>
  </div>
</div>
<script type="text/javascript">
function launchBOLT()
{
	
let address = $('#address1').val();
let mobile = $('#mobile').val();
// console.log(typeof mobile);
// alert(address);
if(address !== "" || mobile !== "") {
	bolt.launch({
	key: $('#key').val(),
	txnid: $('#txnid').val(), 
	hash: $('#hash').val(),
	amount: parseInt($('#amount').val()),
	firstname: $('#fname').val(),
	email: $('#email').val(),
	phone: $('#mobile').val(),
	productinfo: $('#pinfo').val(),
	plan: $('#plan').val(),
	udf5: $('#udf5').val(),
	address1: $('#address1').val(),
	surl : $('#surl').val(),
	furl: $('#surl').val(),
	mode: ''	
},{ responseHandler: function(BOLT){
	// console.log( BOLT.response.txnStatus );		
	if(BOLT.response.txnStatus != 'CANCEL')
	{
		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
		'<input type=\"hidden\" name=\"_token\" value=\"'+$('#token').val()+'\" />' +
		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
		'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
		'<input type=\"hidden\" name=\"productinfo\" value=\''+BOLT.response.productinfo+'\' />' +
		'<input type=\"hidden\" name=\"plan\" value=\''+BOLT.response.plan+'\' />' +
		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
		'<input type=\"hidden\" name=\"phone\" value=\"'+BOLT.response.phone+'\" />' +
		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
		'<input type=\"hidden\" name=\"address1\" value=\"'+BOLT.response.address1+'\" />' +
		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
		'</form>';
		var form = jQuery(fr);
		jQuery('body').append(form);								
		form.submit();
	}
},
	catchException: function(BOLT){
 		console.log( BOLT.message );
	}
});
}
else {
	alert("Please fill required details.")
}

	
}

$('#couponapply').click(function() {
	let coupon = $('#coupon').val();
	if(coupon == 'ashwin100') {
		let amount = parseInt($('#amount').val());
		if(amount > 100) {
			if($('#setAmount').hasClass('applied')){
			} else {			
				amount = amount - 100;
				$('#amount').val(amount);
				$('#setAmount').addClass('applied').text('Rs.'+amount);
			}
		}
	}
});

</script>	

@endsection
