<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogComments;
use App\BlogCommentReplies;
use App\BoxProduct;
use App\Box;
use App\Categories;
use Auth;
use Session;
use DB;

class BookPurchaseController extends Controller
{
    public function bookPurchase(Request $request){
    	$categories = DB::table('categories')->get();
    	$boxes = DB::table('boxes')->get();
    	$data = []; $i = 1;
		$tables = Categories::select('series_table_name', 'id')->get();
		foreach ($tables as $tab) {
			$table = $tab->series_table_name;
			$products = DB::table($table)->select('id', 'thumb_img', 'book_title')->get();
			$data[$i]['cat_id'] = $tab->id;
			$data[$i]['table'] = $table;
			$data[$i]['products'] = $products;
			$i++;
		}    	
        return view('pages.box', compact('categories', 'boxes', 'data'));
    }

    public function bookPurchaseData(Request $request) {    	
    	$table = Categories::where('id',$request->cat)->value('series_table_name');
    	$products = DB::table($table)->select('id', 'thumb_img', 'book_title')->get();
		$render = view('pages.book-data', compact('table', 'products'))->render();
		return ['status' => 'success', 'data' => $render];
    }

    public function addToBoxProductCart(Request $request) {
        $category_ids = $request->category_ids;
        $book_ids = $request->book_ids;       
        $plan = $request->plan;
        $user_id = Auth::user()->id;
        $box = Box::where('id', $plan)->first();

        $i = 0;
        $cart_ids = [];
        foreach ($category_ids as $cat) {        	
			$table = Categories::where('id', $cat)->value('series_table_name');
			$pro = DB::table($table)->select('id', 'book_title', 'sku')->where('categories_id', $cat)->where('id', $book_ids[$i])->first();
			$id = DB::table('cart-products')->insertGetId([
	            'book_title'=> $pro->book_title,
	            'category_id'=> $cat,
	            'user_id' => $user_id,
	            'sku'=> $pro->sku,
	            'qty'=> 1,
	            'amount'=> 0,
	            'book_id'=> $pro->id,
	            'status' => '1'
            ]);
            $cart_ids[] = $id;
			$i++;
		}      	

	    $bp = new BoxProduct;
	    $bp->user_id = $user_id;
	    $bp->box_id = $plan;
	    $bp->box_amount = $box->plan_amount;
	    $bp->box_count = $box->plan_count;
	    //$bp->cart_ids = json_encode($request->book_ids);
	    $bp->cart_ids = json_encode($cart_ids);
	    $bp->save();
        return ['status' => 'success', 'msg' => "Products has been added to cart successfully!"];
    }
}