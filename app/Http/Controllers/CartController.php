<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\BoxProduct;
use App\Box;
use App\Categories;

class CartController extends Controller
{	
	public function __construct()
    {
        
    }

    public function addToCart(Request $request) {
        // dd(Auth::user()->id);
        DB::table('cart-products')->insert([
            'book_title'=> $request['book_title'],
            'category_id'=> $request['category_id'],
            'user_id' => Auth::user()->id,
            'sku'=> $request['sku'],
            'qty'=> $request['qty'],
            'amount'=> $request['amount'],
            'book_id'=> $request['book_id']

            ] );
        $qtyCount = DB::table('cart-products')->where('user_id',Auth::user()->id)->where('status', '1')->sum('qty');
        $totalAmount = DB::table('cart-products')->where('user_id',Auth::user()->id)->where('status', '1')->sum('amount');
        $response = [
            "qty" => $qtyCount,
            "totalAmount" => $totalAmount
        ];
        Session::put('totalAmount', $totalAmount);
        Session::put('qty', $qtyCount);
        return $response;
    }

    public function getCarts(Request $request){ 
    	$array = DB::table("forestseries")->get();

    	return view("payments.cart")->with("items",$array);
    }  

    public function viewCart(Request $request) {
        // dd(Auth::user());
        if (!empty(Auth::user())){
        $user_id = Auth::id();
            $getItems = DB::table('cart-products as c')
        ->select('c.id','c.sku', 'c.book_title', 'c.amount','c.status', 'c.qty', 'cat.series_table_name')
        ->join('categories as cat','c.category_id','cat.id')
        ->where('user_id',Auth::user()->id)    
        ->where('c.status', '1')
        ->where('c.amount', '>', 0)
        ->get();
            // dd($getItems);
        // $defaultPath = 
        $getTable = [];$total=0;
        foreach ($getItems as $k=>$item) {
            // dd($item->id);
            $cat_img = DB::table($item->series_table_name)->select('thumb_img')->where("sku",$item->sku)->first();
            // dd($item, $cat_img);
            $getTable[$k]["image"] = url("/")."/storage/app/public/uploads/img/".$item->series_table_name."/thumb/".$cat_img->thumb_img;
            $getTable[$k]["sku"] = $item->sku;
            $getTable[$k]["id"] = $item->id;
            $getTable[$k]["book_title"] = $item->book_title;
            $getTable[$k]["amount"] = $item->amount;
            $getTable[$k]["qty"] = $item->qty;
            $final_price = intval($item->amount) * intval($item->qty);
            $getTable[$k]["curr_total"] = $final_price;
            $total += $final_price;
        }

       
        /*$boxes = DB::table('box_products')->select('box_products.*')->where('box_products.user_id', $user_id)->where('box_products.status', "=", 1)->get(); 
        $i = 1;
        $lineItems = [];
        foreach ($boxes as $box) {
            $lineItems[$i]['box'] = $box;
            $lineItems[$i]['box_title'] = Box::where('id',$box->box_id)->value('plan');
            $lineItems[$i]['box_category'] = Categories::where('id', $box->category_id)->value('series_name');
            $total += $box->box_amount;
            $cart_ids = json_decode($box->cart_ids);
            $boxItems = DB::table('cart-products as c')
                ->select('c.id','c.sku', 'c.book_title', 'c.amount','c.status', 'c.qty', 'cat.series_table_name')
                ->join('categories as cat','c.category_id','cat.id')
                ->where('user_id',Auth::user()->id)
                ->whereIn('c.id', $cart_ids)
                ->where('c.status', '1')
                ->get();
            foreach ($boxItems as $k=>$item) {
                // dd($item->id);
                $cat_img = DB::table($item->series_table_name)->select('thumb_img')->where("sku",$item->sku)->first();
                // dd($item, $cat_img);
                $boxTable[$k]["image"] = url("/")."/storage/app/public/uploads/img/".$item->series_table_name."/thumb/".$cat_img->thumb_img;
                $boxTable[$k]["sku"] = $item->sku;
                $boxTable[$k]["id"] = $item->id;
                $boxTable[$k]["book_title"] = $item->book_title;
                $boxTable[$k]["amount"] = $item->amount;
                $boxTable[$k]["qty"] = $item->qty;
                $final_price = intval($item->amount) * intval($item->qty);
                $boxTable[$k]["curr_total"] = $final_price;
                $total += $final_price;
            }
            $lineItems[$i]['items'] = $boxTable;
            $i++;
        }    */    
        
        return view('pages/viewCart')->with('cartItems', $getTable)->with('total', $total);
        }else {
            return redirect('login');
        }
        
    }

    public function viewCartProducts(Request $request) {
        // dd(Auth::user());
        if (!empty(Auth::user())){
            $user_id = Auth::id();
            $boxTable = [];
            $total=0;

            $boxes = DB::table('box_products')->select('box_products.*')->where('box_products.user_id', $user_id)->where('box_products.status', "=", 1)->get();
            $i = 1;
            $lineItems = [];
            $getTable = [];
            foreach ($boxes as $box) {
                $lineItems[$i]['box'] = $box;
                $lineItems[$i]['box_title'] = Box::where('id',$box->box_id)->value('plan');
                //$lineItems[$i]['box_category'] = Categories::where('id', $box->category_id)->value('series_name');
                $total += $box->box_amount;
                $cart_ids = json_decode($box->cart_ids);
                $boxItems = DB::table('cart-products as c')
                    ->select('c.id','c.sku', 'c.book_title', 'c.amount','c.status', 'c.qty', 'cat.series_table_name', 'cat.series_name')
                    ->join('categories as cat','c.category_id','cat.id')
                    ->where('user_id',Auth::user()->id)
                    ->whereIn('c.id', $cart_ids)
                    ->where('c.status', '1')
                    ->where('c.amount', 0)
                    ->get();
                foreach ($boxItems as $k=>$item) {
                    $cat_img = DB::table($item->series_table_name)->select('thumb_img')->where("sku",$item->sku)->first();
                    $boxTable[$k]["image"] = "https://littleprodigybooks.in/"."/storage/app/public/uploads/img/".$item->series_table_name."/thumb/".$cat_img->thumb_img;
                    $boxTable[$k]["category"] = $item->series_name;
                    $boxTable[$k]["sku"] = $item->sku;
                    $boxTable[$k]["id"] = $item->id;
                    $boxTable[$k]["book_title"] = $item->book_title;
                    $boxTable[$k]["amount"] = $item->amount;
                    $boxTable[$k]["qty"] = $item->qty;
                    $final_price = intval($item->amount) * intval($item->qty);
                    $boxTable[$k]["curr_total"] = $final_price;
                    $total += $final_price;
                }
                $lineItems[$i]['items'] = $boxTable;
                $i++;
            }        

            return view('pages/viewCartProducts', compact('lineItems'))->with('cartItems', $getTable)->with('total', $total);
        } else {
            return redirect('login');
        }        
    }

    public function deleteItem(Request $request) {
        // $get_item = DB::table('cart-products')->where("id",$request->id)->first();
        // DB::table('cart-temp')->insert([
        //     "temp_id" => $request->id,
        //     "user_id" => $get_item->user_id,
        //     "book_title" => $get_item->book_title,
        //     "category_id" => $get_item->category_id,
        //     "sku" => $get_item->sku,
        //     "qty" => $get_item->qty,
        //     "amount" => $get_item->amount,
        //     "book_id" => $get_item->book_id,
        //     "status" => $get_item->status,
        // ]);
        // DB::table('cart-products')->where("id",$request->id)->delete();
        DB::table('cart-products')->where("id",$request->id)->update([
            'status' => '0'
        ]);
        $qtyCount = DB::table('cart-products')
                    ->where('user_id',Auth::user()->id)
                    ->where('status', '1')
                    ->sum('qty');
        $totalAmount = DB::table('cart-products')->where('user_id',Auth::user()->id)->where('status', '1')->sum('amount');
        
        Session::put('totalAmount', $totalAmount);
        Session::put('qty', $qtyCount);
        $msg = $request->id;
        return $msg;
        // dd($request->id, $get_item);
    }

    public function redoDeleteItem(Request $request) {
        DB::table('cart-products')->where("id",$request->id)->update([
            'status' => '1'
        ]);
        $qtyCount = DB::table('cart-products')
                    ->where('user_id',Auth::user()->id)
                    ->where('status', '1')
                    ->sum('qty');
        $totalAmount = DB::table('cart-products')->where('user_id',Auth::user()->id)->where('status', '1')->sum('amount');
        
        Session::put('totalAmount', $totalAmount);
        Session::put('qty', $qtyCount);
        $msg = $request->id;
        return $msg;
    }

    public function getSubscribe(Request $request){     	

    	$exists_plan = DB::table("user_plan")->where('user_id',\Auth::user()->id)->where('status',1)->count();    	    	
    	$plans = DB::table("plans")->where('id',1)->first();
    	    	

    	return view("payments.subscribe")->with("exists_plan",$exists_plan)->with("plans",$plans);
    }   
}
