<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogComments;
use App\BlogCommentReplies;
use Auth;
use Session;
use DB;
use Mail;

class ProductController extends Controller
{
    public function viewProduct(Request $request)
    {
        // dd($request->path(), 'Test');
        $getPath = explode('/', $request->path());
        $getCategory = $getPath[1];
        $getSKU = $getPath[2];

        $getTable = DB::table('categories')->where('id', $getCategory)->get();
        // $Ebooks = DB::table($getBookName[1])->get(); //find(1)
        $getBook = DB::table($getTable[0]->series_table_name)->where('sku', $getSKU)->get();
        $getRelatedProducts = DB::table($getTable[0]->series_table_name)->where('sku', '!=', $getSKU)->get();
        
        // dd($getPath[1], $getPath[2], $getRelatedProducts, $getTable[0]->series_table_name, $getBook, "Test");
        // dd($findCategory);
        $prodDesc = explode(',', $getBook[0]->product_details);
        // dd($prodDesc);
        return view('pages/product-details')
            ->with('category', $getCategory)
            ->with('book_id', $getBook[0]->id)
            ->with('book_title', $getBook[0]->book_title)
            ->with('book_path', $getBook[0]->book_path)
            ->with('thumb_img', $getBook[0]->thumb_img)
            ->with('product_details', $prodDesc)
            ->with('actual_price', $getBook[0]->actual_price)
            ->with('offer_price', $getBook[0]->offer_price)
            ->with('sale', $getBook[0]->sale)
            ->with('in_stock', $getBook[0]->in_stock)
            ->with('sku', $getBook[0]->sku)
            ->with('categories', $getBook[0]->categories)
            ->with('tags', $getBook[0]->tags)
            ->with('description', $getBook[0]->description)
            ->with('additional_info', $getBook[0]->additional_info)
            ->with('review', $getBook[0]->review)
            ->with('relatedProducts', $getRelatedProducts)
            ->with('series_image', $getTable[0]->series_table_name)
            ->with('series_id', $getTable[0]->id)
            ->with('series_name', $getTable[0]->series_name)
            ->with('age_group', $getTable[0]->age_group);

        
    }

    public function mailTest() {
        echo "Mail teting";

        
    
        try {
            $data = array('name'=>"Sling");
            Mail::send('mail', $data, function($message) {
             //$message->to('ligorism@gmail.com', 'Books Point')->subject
             //$message->to('littleprodigybooks@gmail.com', 'Books Point')->subject
             $message->to('pradipshende143@gmail.com', 'Books Point')->subject
                ('Laravel HTML Testing Mail');
                //$message->from('littleprodigybooks@gmail.com','Sling');
                $message->from('books@littleprodigybooks.in','Sling');
            });
            echo "HTML Email Sent. Check your inbox.";
        }
        catch(Exception $ex) {
            //$this->populate_array[] = array($row[2] => $ex->getLine());
            // return "We've got errors!";
            echo "We've got errors!";
        }
        catch(\Swift_TransportException $e) {
            $response = $e->getMessage();
            echo "We've got errors!";
        }
        catch(\Illuminate\Database\QueryException $ex) {
            //$this->populate_array[] = array($row[2] => $ex->getLine());
            echo "We've got errors!";
        }
    }


}
