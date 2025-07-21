<?php
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Categories;
use App\Models\Distributorship;
use DB;
use Illuminate\Support\Facades\Log;
use App\Models\Coupon;
use App\Models\GpsTrack;
   
class HomeApiController extends BaseController
{
	public function __construct()
    {
        // header("Access-Control-Allow-Origin:*");
        /*header("Access-Control-Allow-Methods:GET, POST, PUT, PATCH, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers:Origin, X-Requested-With, Accept, Content-Type, Authorization");*/
    }
    public function viewCategories(Request $request)
    {
        //Log::info(date('Y-m-d H:i:s'));
        //Log::info("11111111111111");
        //Log::info(Auth::user()->id);		
        $page = 1;
        if($request->page !== null)
            $page = $request->page;
        $total_count = Categories::count();

        $take = 5;
        $skip = 0;
        if($page) {
            $skip = $page-1;
            $skip = $skip * $take;
        }

        //$categories = Categories::skip($skip)->take($take)->get();
        $categories = Categories::all();
		$data = [];
        //$data['page'] = (int)$page;
        //$data['total'] = $total_count;
		$i = 1;
		foreach ($categories as $cat) {
            $res = [];
			$table = $cat->series_table_name;
            $series_name = strtolower($cat->series_name);
            $cat->series_name = ucwords($series_name);
			//$products = DB::table('categories as c')->leftjoin($table.' as sc','sc.categories_id','c.id')->select('sc.*')->get();
			$products = DB::table('categories as c')->join($table.' as sc','sc.categories_id','c.id')->select('sc.*')->get();
            $catt = $cat;
			$res['category'] = $catt;
            foreach ($products as $pro) {
                // $pro->thumb_img = url('storage/app/public/uploads/img/'.$table.'/thumb/'.$pro->thumb_img); //stroage_path('')
                $pro->thumb_img = 'https://littleprodigybooks.in/storage/app/public/uploads/img/'.$table.'/thumb/'.$pro->thumb_img;
            }
			$res['products'] = $products;
            $data[] = $res;
			$i++;
		}
		return $this->sendResponse($data, 'Categories have been retrieved successfully!');
    }

    public function getAllCategories(Request $request)
    {    
        $page = 1;
        if($request->page !== null)
            $page = $request->page;
        $total_count = Categories::count();

        $take = 5;
        $skip = 0;
        if($page) {
            $skip = $page-1;
            $skip = $skip * $take;
        }

        $categories = Categories::skip($skip)->take($take)->get();
        $data = [];
        $i = 1;
        foreach ($categories as $cat) {
            $res = [];
            $table = $cat->series_table_name;
            $series_name = strtolower($cat->series_name);
            $cat->series_name = ucwords($series_name);
            //$products = DB::table('categories as c')->leftjoin($table.' as sc','sc.categories_id','c.id')->select('sc.*')->get();
            $products = DB::table('categories as c')->join($table.' as sc','sc.categories_id','c.id')->select('sc.*')->get();
            $catt = $cat;
            $res['category'] = $catt;
            foreach ($products as $pro) {
                // $pro->thumb_img = url('storage/app/public/uploads/img/'.$table.'/thumb/'.$pro->thumb_img); //stroage_path('')
                $pro->thumb_img = 'https://littleprodigybooks.in/storage/app/public/uploads/img/'.$table.'/thumb/'.$pro->thumb_img;
            }
            $res['products'] = $products;
            $data[] = $res;            
            $i++;
        }
        //$data['page'] = (int)$page;
        //$data['total'] = $total_count;
        //return $this->sendResponse($data, 'Categories have been retrieved successfully!');


        $response = [
            'success' => true,
            'data'    => $data,
            'message' => 'Categories have been retrieved successfully!',
            'total' => $total_count,
            'page'=> $page
        ];
        return response()->json($response, 200);
    }

    function removeJoinString($prodDesc) {
        $eliminate_arr = [];
        $i = 0;
        foreach ($prodDesc as $key => $value) {
            if($value != '') {
                $value = trim($value);
                $word = ": ";
                if(strpos($value, $word) !== false) {
                } else {
                    $eliminate_arr[] = $i;
                    break;
                }
            } 
            $i++;   
        }
        if(count($eliminate_arr)) {
            $prodDesc[$eliminate_arr[0] - 1] = $prodDesc[$eliminate_arr[0] - 1].','.$prodDesc[$eliminate_arr[0]];
            unset($prodDesc[$eliminate_arr[0]]);
            $newArr = [];
            foreach ($prodDesc as $proVal) {
                $newArr[] = $proVal;
            };
            return $this->removeJoinString($newArr);
        } else return $prodDesc;
    }

    function makeCorrectStr($arr) {
        if(count($arr)) {
            $str = '';
            foreach ($arr as $val) {
                if($str != '')
                    $str .= ' : '.trim($val);
                else
                    $str = trim($val);
            }
            return $str;
        }
    }

    public function viewProduct($category, $sku) {
        $getTable = DB::table('categories')->where('id', $category)->first();
        $getBook = DB::table($getTable->series_table_name)->where('sku', $sku)->first();
        $getRelatedProducts = DB::table($getTable->series_table_name)->where('sku', '!=', $sku)->get();
        foreach ($getRelatedProducts as $relPro) {
            $relPro->thumb_img = 'https://littleprodigybooks.in/storage/app/public/uploads/img/'.$getTable->series_table_name.'/thumb/'.$relPro->thumb_img;
        }
        $prodDescs = null;
        $prodDesc = [];
        if($getBook->product_details != null) {            
            $getBook->product_details = trim($getBook->product_details);
            /*$word = "Product details,";
            if(strpos($getBook->product_details, $word) !== false) {
                $res = explode('Product details,', $getBook->product_details);
                $getBook->product_details = $res[1];
            }
        	$prodDesc = explode(',', $getBook->product_details);
            $finalArr = $this->removeJoinString($prodDesc);
            $newArr = [];
                
            foreach ($finalArr as $key => $value) {
                if($value != '') {
                    $value = trim($value);
                    $arr = explode(': ', $value);
                    if(count($arr) > 2) {                        
                        $newArr[str_replace(' ', '_', trim(array_shift($arr)))] = $this->makeCorrectStr($arr);
                    } elseif(count($arr) > 0 && count($arr) <= 2) {
                        $newArr[str_replace(' ', '_', trim($arr[0]))] = trim($arr[1]);
                    }
                } 
            } 
            $prodDescs = $newArr;*/
            $prodDesc = explode(',', $getBook->product_details);
        }

        $data['category'] = $category;
        $data['book_id'] = $getBook->id;
        $data['book_title'] = $getBook->book_title;
        $data['book_path'] = $getBook->book_path;
        //$data['thumb_img'] = $getBook->thumb_img;
        $data['thumb_img'] = 'https://littleprodigybooks.in/storage/app/public/uploads/img/'.$getTable->series_table_name.'/thumb/'.$getBook->thumb_img;
        //$data['product_details'] = $prodDescs;
        $data['product_details'] = $prodDesc;
        $data['actual_price'] = $getBook->actual_price;
        $data['offer_price'] = $getBook->offer_price;
        $data['sale'] = $getBook->sale;
        $data['in_stock'] = $getBook->in_stock;
        $data['sku'] = $getBook->sku;
        $data['categories'] = $getBook->categories;
        $data['tags'] = $getBook->tags;
        $data['description'] = $getBook->description;
        $data['additional_info'] = $getBook->additional_info;
        $data['review'] = $getBook->review;
        $data['relatedProducts'] = $getRelatedProducts;
        $data['series_image'] = $getTable->series_table_name;
        $data['series_id'] = $getTable->id;
        $data['series_name'] = $getTable->series_name;
        $data['age_group'] = $getTable->age_group;
        return $this->sendResponse($data, 'Product details has been retrieved successfully!');
    }

    public function getDistributorship() {
        $data['distributors'] = Distributorship::get();
        return $this->sendResponse($data, 'Distributors been retrieved successfully!');
    }

    public function getEbookDetails($id) {
        $data['category'] = DB::table('categories')->where('id', $id)->first();
        $table = $data['category']->series_table_name;
        $ebooks = DB::table($table)->get();
        foreach ($ebooks as $pro) {
            $pro->thumb_img = 'https://littleprodigybooks.in/storage/app/public/uploads/img/'.$table.'/thumb/'.$pro->thumb_img;
        }
        $data['ebooks'] = $ebooks;
        return $this->sendResponse($data, 'Ebook details have been retrieved successfully!');
    }

    public function getReadEbook($category, $sku) {

        $getTable = DB::table('categories')->where('id', $category)->first();
        $getBook = DB::table($getTable->series_table_name)->where('sku', $sku)->first();

        $getBook->thumb_img = 'https://littleprodigybooks.in/storage/app/public/uploads/img/'.$getTable->series_table_name.'/thumb/'.$getBook->thumb_img;
        $dirname = storage_path('app/public/uploads/book/'.$getBook->book_path);
        $images = glob($dirname."/*.jpg");
        $res_images = [];
        foreach ($images as $image) {
            $arr = explode($getBook->book_path.'/', $image);
            $res_images[] = 'https://littleprodigybooks.in/storage/app/public/uploads/book/'.$getBook->book_path.'/'.$arr[1];
        }
        $data['book'] = $getBook;
        $data['pages_count'] = count($res_images);
        $data['book_pages'] = $res_images;
        return $this->sendResponse($data, 'Ebook has been retrieved successfully!');
    }

    public function getSubscribe(Request $request) {
        //echo "subscribe";
        //print_r($request->all());
        $data["txnid"] = "Txn" . rand(10000,99999999);
        $data["amount"] = 50;// can use plan price or total book price here i.e $total
        $data["pinfo"] = 123;// can use plan id or total book id here i.e $books
        $data["user_id"] = 25;
        $data["fname"] = 'Vinoth';
        $data["email"] = 'test@test.com';
        $data["udf5"] = "BOLT_KIT_PHP7";
        $hash = $this->getHash($data);
        $return_url = 'https://littleprodigybooks.com/api/subscribe/process/response';
        $data['hash'] = $hash;
        $data['return_url'] = $return_url;
        $data['payu_key'] = config("app.payu_key");
        $data['payu_salt'] = config("app.payu_salt");
        //$return_url = $this->getCallbackUrl();
        return $this->sendResponse($data, 'For payment required details have retrieved successfully!');
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

    public function getSubscribeProcess(Request $request) {
        echo "Process";
        $user = User::find(283);
        print_r($user);
        $plan = DB::table('user_plan')->where('user_id', 283)->first();
        print_r($plan);
        //print_r($request->all());
    }

    public function getSubscribeResponse(Request $request) {
        echo "Response";
        print_r($request->all());
    }

    public function getCouponsList() {
        $coupons = Coupon::select('coupon')->get();
        return $this->sendResponse($coupons, 'Coupons have retrieved successfully!');
    }

    public function postPaymentDetails(Request $request) {
        Log::info(Auth::user()->id);
        Log::info($request->all());

        //type,amount,transaction_id,payment_mode, payment_datetime, coupon,plan(if membership), product_id, sku, category_id(if add to cart product), box, book_count, category_id, product_id, sku(if box purchase)

        //Memebership Plan
        if($request->type == 1) {
            //For coupon code implementation
            $date = date_create(date("Y-m-d"));                    
            if($request->plan == 'BASIC') {
                $expiryDate = date_add($date, date_interval_create_from_date_string("365 days")); 
                $plan = 1;
            } elseif(strtoupper($request->plan) == 'ADVANCED') {
                $expiryDate = date_add($date, date_interval_create_from_date_string("730 days"));
                $plan = 2;
            }
            DB::table('user_plan')->insert([
                'txn_id' => "Txn" . rand(10000,99999999),
                'plan_id' => $plan,
                'user_id' => Auth::user()->id,
                'status' => '1',                        
                //'address' => $address1,
                'txn_details' => $request->transaction_id,
                'expiry' => $expiryDate,
                //'phone' => $phone
            ]);
        }

        //Book purchase
        if($request->type == 2) {
            // create json data category_id, product_id, sku
            $product_details = '';
            DB::table('user_books')->insert([
                'txn_id' => "Txn" . rand(10000,99999999),
                //'product_details' => $product_details,
                'user_id' => Auth::user()->id,
                //'address' => $address1,
                //'phone' => $phone,
                'txn_details' => $request->transaction_id,
            ]);
        }

        //Box products purchase
        if($request->type == 3) {
            /*foreach ($productInfo['box_product_id'] as $pro) {
                DB::table('user_box_books')->insert([
                    'txn_id' => $txnid,
                    'box_product_id' => $pro,
                    'user_id' => Auth::user()->id,      
                    'address' => $address1,
                    'phone' => $phone,
                    'txn_details' => $mihpayid,
                    'product_details' => json_encode($productInfo),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                DB::table('box_products')->where('id', $pro)->update(['status' => '2']);
                $cart_ids = DB::table('box_products')->where('id', $pro)->value('cart_ids');
                $carts = json_decode($cart_ids, true);
                DB::table('cart-products')->whereIn('id', $carts)->update(['status' => '2']);
            }*/
        }
        $data['info'] = $request->all();
        return $this->sendResponse($data, 'Payment details have been stored successfully!');
    }

    public function postGPSTrack(Request $request) {  
        $gps = new GpsTrack;
        $gps->user_id = \Auth::id();
        $gps->location = $request->location;
        $gps->lng = $request->longitude; 
        $gps->lat = $request->latitude;
        $gps->save();
        return $this->sendResponse('', 'Location details have been stored successfully!');
    }
}