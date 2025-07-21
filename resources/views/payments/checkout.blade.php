@extends('layouts.app')

@section('content')
<?php if(!empty($successMessage)) { ?>
    <div id="success-message"><?php echo $successMessage; ?></div>
    <?php  } ?>
    <div id="error-message"></div>
                
            <form id="frmStripePayment" action="{{route('cart.checkout')}}" method="post">
            	@csrf
                <div class="field-row">
                    <label>Card Holder Name</label> <span
                        id="card-holder-name-info" class="info"></span><br>
                    <input type="text" id="name" name="name"
                        class="demoInputBox">
                </div>
                <div class="field-row">
                    <label>Email</label> <span id="email-info"
                        class="info"></span><br> <input type="text"
                        id="email" name="email" class="demoInputBox">
                </div>
                <div class="field-row">
                    <label>Card Number</label> <span
                        id="card-number-info" class="info"></span><br> <input
                        type="text" id="card-number" name="card-number"
                        class="demoInputBox">
                </div>
                <div class="field-row">
                    <div class="contact-row column-right">
                        <label>Expiry Month / Year</label> <span
                            id="userEmail-info" class="info"></span><br>
                        <select name="month" id="month"
                            class="demoSelectBox">
                            <option value="08">08</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> <select name="year" id="year"
                            class="demoSelectBox">
                            <option value="18">2018</option>
                            <option value="19">2019</option>
                            <option value="20">2020</option>
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                            <option value="24">2024</option>
                            <option value="25">2025</option>
                            <option value="26">2026</option>
                            <option value="27">2027</option>
                            <option value="28">2028</option>
                            <option value="29">2029</option>
                            <option value="30">2030</option>
                        </select>
                    </div>
                    <div class="contact-row cvv-box">
                        <label>CVC</label> <span id="cvv-info"
                            class="info"></span><br> <input type="text"
                            name="cvc" id="cvc"
                            class="demoInputBox cvv-input">
                    </div>
                </div>
                <div>
                    <input type="submit" name="pay_now" value="Submit"
                        id="submit-btn" class="btnAction"
                        onClick="stripePay(event);">

                    <div id="loader" style="display:none">
                        <img alt="loader" src="{{ asset('resources/images/LoaderIcon.gif') }}">
                    </div>
                </div>
                <input type='hidden' name='amount' value="{{ base64_decode($inputs['total']) }}"> <input
                    type='hidden' name='currency_code' value='INR'> <input
                    type='hidden' name='item_name' value='Basic'>
                <input type='hidden' name='item_number'
                    value='price_1H7G32FVJjiIwa1TbQ6YKuok'>
                    @if(!empty($inputs['book_id']))
                    <input type='hidden' name='books' value="{{ json_encode($inputs['book_id']) }}">
                    @endif
                    @if(!empty($inputs['categories_id']))
                    <input type='hidden' name='categories' value="{{ json_encode($inputs['categories_id']) }}">
                    @endif
                    @if(!empty($inputs['plan_id']))
                    <input type='hidden' name='plan_id' value="{{ $inputs['plan_id'] }}">
                    @endif
            </form>
    <div class="test-data">
        <h3>Test Card Information</h3>
        <p>Use these test card numbers with valid expiration month
            / year and CVC code for testing with this demo.</p>
        <table class="tutorial-table" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <th>CARD NUMBER</th>
                <th>BRAND</th>
            </tr>
            <tr>
                <td>4242424242424242</td>
                <td>Visa</td>
            </tr>
            <tr>
                <td>4000056655665556</td>
                <td>Visa (debit)</td>
            </tr>
            
            <tr>
                <td>5555555555554444</td>
                <td>Mastercard</td>
            </tr>
            
            <tr>
                <td>5200828282828210</td>
                <td>Mastercard (debit)</td>
            </tr>
            
            <tr>
                <td>378282246310005</td>
                <td>American Express</td>
            </tr>
            
            <tr>
                <td>6011111111111117</td>
                <td>Discover</td>
            </tr>
            
            <tr>
                <td>30569309025904</td>
                <td>Diners Club</td>
            </tr>
            
            <tr>
                <td>3566002020360505</td>
                <td>JCB</td>
            </tr>
            <tr>
                <td>6200000000000005</td>
                <td>UnionPay</td>
            </tr>
            
        </table>
    </div>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"  type="text/javascript"></script>
    <script>
function cardValidation () {
    var valid = true;
    var name = $('#name').val();
    var email = $('#email').val();
    var cardNumber = $('#card-number').val();
    var month = $('#month').val();
    var year = $('#year').val();
    var cvc = $('#cvc').val();

    $("#error-message").html("").hide();

    if (name.trim() == "") {
        valid = false;
    }
    if (email.trim() == "") {
    	   valid = false;
    }
    if (cardNumber.trim() == "") {
    	   valid = false;
    }

    if (month.trim() == "") {
    	    valid = false;
    }
    if (year.trim() == "") {
        valid = false;
    }
    if (cvc.trim() == "") {
        valid = false;
    }

    if(valid == false) {
        $("#error-message").html("All Fields are required").show();
    }

    return valid;
}
//set your publishable key
Stripe.setPublishableKey("{{ config('app.stripe_publish') }}");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $("#submit-btn").show();
        $( "#loader" ).css("display", "none");
        //display the errors on the form
        $("#error-message").html(response.error.message).show();
    } else {
        //get token id
        var token = response['id'];
        //insert the token into the form
        $("#frmStripePayment").append("<input type='hidden' name='token' value='" + token + "' />");
        //submit form to the server
        $("#frmStripePayment").submit();
    }
}
function stripePay(e) {
    e.preventDefault();
    var valid = cardValidation();

    if(valid == true) {
        $("#submit-btn").hide();
        $( "#loader" ).css("display", "inline-block");
        Stripe.createToken({
            number: $('#card-number').val(),
            cvc: $('#cvc').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val()
        }, stripeResponseHandler);

        //submit from callback
        return false;
    }
}
</script>
@endsection