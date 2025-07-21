<?php

namespace App\Http\Controllers;

// use Mail;
use Illuminate\Http\Request;
// use App\Categories;
use App\User;
use Auth;
use Session;
use DB;
use App\Mail\CommentMail;

class CheckoutController extends Controller
{

	public function purchasePlanView(Request $request){
		return view('payments.plan_purchase_view')->with('data',$request->all());
	}
    public function SubscribProcess(Request $request)
    {
		 
		$type = $request->input("type");
		$users = DB::table("users")->where("id",Auth::user()->id)->first();
		/* dd($request->all());
		dd($type);
		dd($users);
		 exit; */
		if(isset($type) && $type==1){
			//books
			$data["txnid"] = "Txn" . rand(10000,99999999);
			$data["amount"] = $request->input("amount");// can use plan price or total book price here i.e $total
			$data["pinfo"] = $request->input("sku");// can use plan id or total book id here i.e $books
			$data["fname"] = $users->name;
			$data["email"] = $users->email;
			$data["udf5"] = "BOLT_KIT_PHP7";
			//dd($request->all());
		}elseif(isset($type) && $type==3){
			//books
			$data["txnid"] = "Txn" . rand(10000,99999999);
			$data["amount"] = $request->input("amount");// can use plan price or total book price here i.e $total
			$data["pinfo"] = $request->input("sku");// can use plan id or total book id here i.e $books
			$data["fname"] = $users->name;
			$data["email"] = $users->email;
			$data["udf5"] = "BOLT_KIT_PHP7";
			//dd($request->all());
		}elseif(isset($type) && $type==4){
			//books
			$data["txnid"] = "Txn" . rand(10000,99999999);
			$data["amount"] = $request->input("amount");// can use plan price or total book price here i.e $total
			$data["pinfo"] = $request->input("box_product_id");// can use plan id or total book id here i.e $books
			$data["fname"] = $users->name;
			$data["email"] = $users->email;
			$data["udf5"] = "BOLT_KIT_PHP7";
			//dd($request->all());
		}
		else{
			// $getUser = DB::table("user_plan")->where("user_id",Auth::user()->id)->first();
			// dd($getUser);
			$data["txnid"] = "Txn" . rand(10000,99999999);
			$data["amount"] = $request->input("amount");// can use plan price or total book price here i.e $total
			$data["pinfo"] = $request->input("plan");// can use plan id or total book id here i.e $books
			$data["plan"] = $request->input("plan");
			$data["fname"] = $users->name;
			$data["email"] = $users->email;
			$data["udf5"] = "BOLT_KIT_PHP7";
		}
		
    	$hash = $this->getHash($data);
    	$return_url = $this->getCallbackUrl();
    	
        return view('payments.payumoney',compact('hash','return_url','data'));
    }

    public function SubscribeResponse(Request $request)
    {
		 /*  dd($request->all(), $request->path(), $request->input("plan"));
		  exit; */
    	if(!empty($request->all())) {
	    	$key				=   $request->input("key");
			// $salt				=   $request->input("salt");
			$salt				=   config("app.payu_salt");
			$txnid 				= 	$request->input("txnid");
		    $amount      		= 	$request->input("amount");
			$productInfo  		= 	$request->input("productinfo");
			$firstname    		= 	$request->input("firstname");
			$email        		=	$request->input("email");
			$udf5				=   $request->input("udf5");
			$mihpayid			=	$request->input("mihpayid");
			$status				= 	$request->input("status");
			$resphash			= 	$request->input("hash");
			$address1			=  	$request->input("address1");
			$phone				=  	$request->input("phone");

			//Calculate response hash to verify	
			$keyString 	  		=  	$key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
			$keyArray 	  		= 	explode("|",$keyString);
			$reverseKeyArray 	= 	array_reverse($keyArray);
			$reverseKeyString	=	implode("|",$reverseKeyArray);
			$CalcHashString 	= 	strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));	
		
			if ($status == 'success'  && $resphash == $CalcHashString) {
				$msg = "Transaction Successful";
				$productInfo = json_decode($productInfo,true);
				//write insert query here $productInfo['key']
				// dd($request->all(), $request->path(), $productInfo, $phone);
				
				if($productInfo == 1 || $productInfo == 2) {
					$date = date_create(date("Y-m-d"));
					// $expiryDate = date_add($date, date_interval_create_from_date_string("365 days")); 
					// dd($expiryDate);
					if($productInfo == 1) {
						$expiryDate = date_add($date, date_interval_create_from_date_string("365 days")); 
					}
					else {
						$expiryDate = date_add($date, date_interval_create_from_date_string("730 days")); 
					}

					// $user = DB::table('users')->findOrFail(Auth::user()->id);
					// $user = User::findOrFail(Auth::user()->id);
        			// Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
           			//  $m->from('pmrlsivas@gmail.com', 'Little Prodigy Books');
					//  $m->to($user->email, $user->name)->subject('Payment Confirmation');
					// });

					DB::table('user_plan')->insert([
						'txn_id' => $txnid,
						'plan_id' => $productInfo,
						'user_id' => Auth::user()->id,
						'status' => '1',
						'address' => $address1,
						'txn_details' => $mihpayid,
						'expiry' => $expiryDate,
						'phone' => $phone
					]);
					$plan_type = '';
					$plan_sub = ''; 
					if($request->input("productinfo") == 1 || $request->input("productinfo") == 2) {
						$date = date_create(date("Y-m-d"));
						// $expiryDate = date_add($date, date_interval_create_from_date_string("365 days")); 
						// dd($expiryDate);
						if($productInfo == 1) {
							$plan_type = 'Basic';
							$plan_sub = 'One year Plan Subscription'; 
						}
						else {
							$plan_type = 'Advance';
							$plan_sub = 'Two year Plan Subscription';  
						}
					}
					$today = date('Y-m-d');
					$admin_details = User::where('role_id',1)->first();
					$users = DB::table("users")->where("id",Auth::user()->id)->first();
					$data['email_type'] = 'invoice_3';
					$data['to_email']   = $users->email;
					$data['to_name']    = $users->name;
					$data['cc_email']   = $admin_details->email;
					$data['cc_name']    = $admin_details->name;
					$data['subject']	= "Plan";
					$data['txnid'] 		= 	$request->input("txnid");
					$data['amount']     = 	$request->input("amount");
					$data['productInfo']= 	$request->input("productinfo");
					$data['status']		= 	$request->input("status");
					$data['address1']	=  	$request->input("address1");
					$data['phone']		=  	$request->input("phone");
					$data['plan_type'] 		= 	$plan_type;
					$data['plan_sub'] 		= 	$plan_sub;
					$data['buy_date'] 		= 	$today;
					sendCommonMail('invoice', $data);
				}
				else if(isset($productInfo['key']) && $productInfo['key']==='combo_plan') {
					DB::table('user_combo_plans')->insert([
						'txn_id' => $txnid,
						'combo_id' => $productInfo['sku'],
						'user_id' => Auth::user()->id,
						'status' => '1',						
						'address' => $address1,
						'phone' => $phone,
						'txn_details' => $mihpayid
					]);
				} elseif(isset($productInfo['box_product_id'])) {
					foreach ($productInfo['box_product_id'] as $pro) {
						DB::table('box_products')->where('id', $pro)->update(['status' => '2']);
						$cart_ids = DB::table('box_products')->where('id', $pro)->value('cart_ids');
						$carts = json_decode($cart_ids, true);
						DB::table('cart-products')->whereIn('id', $carts)->update(['status' => '2']);
						$books_details = [];
						$books_details['cats'] = DB::table('cart-products')->whereIn('id', $carts)->pluck('category_id')->toArray();
						$books_details['skus'] = DB::table('cart-products')->whereIn('id', $carts)->pluck('sku')->toArray();
						DB::table('box_products')->where('id', $pro)->update(['book_details' => json_encode($books_details)]);

						$user_book_id = DB::table('user_box_books')->insertGetId([
							'txn_id' => $txnid,
							'box_product_id' => $pro,
							'user_id' => Auth::user()->id,		
							'address' => $address1,
							'phone' => $phone,
							'txn_details' => $mihpayid,
							'product_details' => json_encode($books_details),
							'created_at' => date('Y-m-d H:i:s'),
							'amount' => $amount
						]);

						$products = UserBoxBook::find($user_book_id);      
						$pros = json_decode($products->product_details, true);
						$book_list = array_combine($pros['skus'], $pros['cats']);

						foreach($book_list as $key => $val) {
							$cat = Categories::find($val);
							$bookss[] = DB::table($cat->series_table_name)->where('sku', $key)->value('book_title');
						}
						$books = implode(' | ', $bookss);

						$data = [];
						$today = date('Y-m-d');
						$admin_details = User::where('role_id',1)->first();
						$users = DB::table("users")->where("id",Auth::user()->id)->first();
						$data['email_type'] = 'invoice_1';
						$data['to_email']   = $users->email;
						$data['to_name']    = $users->name;
						$data['cc_email']   = $admin_details->email;
						$data['cc_name']    = $admin_details->name;
						$data['subject']  = "Combo Books Purchase";
						$data['txnid']    = $txnid;
						$data['amount']     = $amount;
						$data['productInfo']= $books;
						$data['status']   = $request->input("status");
						$data['address1'] = $request->input("address1");
						$data['phone']    = $request->input("phone");
						$data['buy_date']  = $today;
						sendCommonMail('invoice', $data);

						/*$today = date('Y-m-d');
						$admin_details = User::where('role_id',1)->first();
						$users = DB::table("users")->where("id",Auth::user()->id)->first();
						$data['email_type'] = 'invoice_1';
						$data['to_email']   = $users->email;
						$data['to_name']    = $users->name;
						$data['cc_email']   = $admin_details->email;
						$data['cc_name']    = $admin_details->name;
						$data['subject']	= "Combo Books Purchase";
						$data['txnid'] 		= $txnid;
						$data['amount']     = $amount;
						$data['productInfo']= $books;
						//$data['status']		= $request->input("status");
						$data['address1']	= $request->input("address1");
						$data['phone']		= $request->input("phone");
						$data['buy_date'] 	= $today;
						sendCommonMail('invoice', $data);*/
					}
				} else {
					// dd($request->all(), $productInfo, $request->input("productinfo"));
					$prodInfo = json_decode($request->input("productinfo"), true);
					// dd($address1, $mihpayid);					
					$book_details = json_decode($request->input("productinfo"), true);

					$books = DB::table('cart-products')
						   ->leftJoin('categories','categories.id','cart-products.category_id')
						   ->select('cart-products.*','categories.series_name')
						   //->where('cart-products.id',$item)
						   ->whereIn('cart-products.id',$book_details['id'])
						   ->where('cart-products.status','1')
						   //->orderBy('cart-products.id','DESC')
						   ->get();
					$cats = $skus = $us_books = [];
					foreach ($books as $book) {
						$cats[] = $book->category_id;
						$skus[] = $book->sku;
					}
					$us_books['cat'] = $cats;
					$us_books['sku'] = $skus;

				   DB::table('user_books')->insert([
						'txn_id' => $txnid,
						//'product_details' =>$request->input("productinfo"),
						'product_details' => json_encode($us_books),
						'user_id' => Auth::user()->id,
						'address' => $address1,
						'phone' => $phone,
						'txn_details' => $mihpayid
					]);
					  
					$today = date('Y-m-d');
					$admin_details = User::where('role_id',1)->first();
					$users = DB::table("users")->where("id",Auth::user()->id)->first();
					$data['email_type'] = 'invoice_2';
					$data['to_email']   = $users->email;
					$data['to_name']    = $users->name;
					$data['cc_email']   = $admin_details->email;
					$data['cc_name']    = $admin_details->name;
					$data['subject']	= "Plan2";
					$data['txnid'] 		= 	$request->input("txnid");
					$data['amount']     = 	$request->input("amount");
					$data['productInfo']= 	$books;
					$data['status']		= 	$request->input("status");
					$data['address1']	=  	$request->input("address1");
					$data['phone']		=  	$request->input("phone");
					$data['buy_date'] 		= 	$today;
					sendCommonMail('invoice', $data);
					
					Session::put('totalAmount', 0);
					Session::put('qty', 0);
					foreach ($prodInfo['id'] as $item) {
						DB::table('cart-products')
						->where('id', $item)
						->update([
							'status' => '2'
						]);
					}
				}	
				 
			} else {
				//hash code failed handler
				$msg = "Transaction Failed";
			}     		
			//redirect url here
			// dd('Payment Successfully done!',$request->input("productinfo"), $msg,Auth::user()->id,$request->all());
			return redirect('/transaction/details')
					->with('message', $msg)
					->with('txnId', $txnid)
					->with('productInfo', $request->input("productinfo"));
    	}
		return redirect("/membership")
			//->with('pay-response', $msg)
			->with('pay-data', $request->all());
    }

	public function getHash($data){    	

        $hash=hash('sha512', config("app.payu_key").'|'.$data["txnid"].'|'.$data["amount"].'|'.$data["pinfo"].'|'.$data["fname"].'|'.$data["email"].'|||||'.$data["udf5"].'||||||'.config("app.payu_salt"));
		$json=array();
		//$json['success'] = $hash;
    	return $hash;
    }

    function getCallbackUrl()
	{
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '/response';
	}
    
}
