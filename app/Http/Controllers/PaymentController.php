<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Stripe\Stripe;
use \Stripe\Customer;
use \Stripe\ApiOperations\Create;
use \Stripe\Charge;

class PaymentController extends Controller
{
	 private $apiKey;

    private $stripeService;

	public function __construct()
    {
        $this->apiKey = config('app.stripe_secret');
        $this->stripeService = new \Stripe\Stripe();
        $this->stripeService->setVerifySslCerts(false);
        $this->stripeService->setApiKey($this->apiKey);
    }

    public function payment(Request $request){  
    	return view("payments.checkout");
    }

    public function getCheckout(Request $request){
        //dd($request->all());
        $inputs = $request->all();
    	$successMessage = "";
    	if(!empty($request->input("token")))
    	{
			//$stripePayment = new StripePayment();		    
		    $stripeResponse = $this->chargeAmountFromCard($_POST);
		    $amount = $stripeResponse["amount"] /100;
		    $param_type = 'ssdssss';
		    $param_value_array = array(
		        $_POST['email'],
		        $_POST['item_number'],
		        $amount,
		        $stripeResponse["currency"],
		        $stripeResponse["balance_transaction"],
		        $stripeResponse["status"],
		        //json_encode($stripeResponse)
		    );            
            
            if(!empty($request->input("plan_id"))){
                \DB::table("user_plan")->insert([
                    "user_id" => \Auth::user()->id,
                    "plan_id" => $request->input("plan_id"),
                    "txn_id" =>  $stripeResponse["balance_transaction"],
                    "txn_details" => json_encode($stripeResponse)
                ]);
                //subscribe
            }else{
                 $books = json_decode($request->input("books"),true);
                 $categories_id = json_decode($request->input("categories"),true);
                foreach($books as $b=>$book){
                    \DB::table("user_books")->insert([
                        "user_id" => \Auth::user()->id,
                        "book_id" => $book,
                        "cat_id" => $categories_id[$b],
                        "txn_id" =>  $stripeResponse["balance_transaction"],
                        "txn_details" => json_encode($stripeResponse)
                    ]);
                }
                //books redirect
                
            }
            //dd($request->all(),$_POST,$stripeResponse,$books);
		    // $query = "INSERT INTO tbl_payment (email, item_number, amount, currency_code, txn_id, payment_status, payment_response) values (?, ?, ?, ?, ?, ?, ?)";
		    // $id = $dbController->insert($query, $param_type, $param_value_array);
		    if ($stripeResponse['amount_refunded'] == 0 && empty($stripeResponse['failure_code']) && $stripeResponse['paid'] == 1 && $stripeResponse['captured'] == 1 && $stripeResponse['status'] == 'succeeded') {
		        $successMessage = "Stripe payment is completed successfully. The TXN ID is " . $stripeResponse["balance_transaction"];
		    }
    	}    	
    	return view("payments.checkout",compact("successMessage","inputs"));
    }

    public function addCustomer($customerDetailsAry)
    {
        
        $customer = new Customer();
        
        $customerDetails = $customer->create($customerDetailsAry);
        
        return $customerDetails;
    }

    public function chargeAmountFromCard($cardDetails)
    {
        $customerDetailsAry = array(
            'email' => $cardDetails['email'],
            'source' => $cardDetails['token']
        );
        $customerResult = $this->addCustomer($customerDetailsAry);
        $charge = new Charge();
        $cardDetailsAry = array(
            'customer' => $customerResult->id,
            'amount' => $cardDetails['amount']*100 ,
            'currency' => $cardDetails['currency_code'],
            'description' => $cardDetails['item_name'],
            'metadata' => array(
                'order_id' => $cardDetails['item_number']
            )
        );
        $result = $charge->create($cardDetailsAry);

        return $result->jsonSerialize();
    }
}
