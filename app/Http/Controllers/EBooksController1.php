<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogComments;
use App\BlogCommentReplies;
use Auth;
use Session;
use DB;

class EBooksController extends Controller
{
    public function viewEBooks(Request $request)
    {
        $getTableName = explode('/', $request->path());
        // dd($getTableName[1], "Test");
        $date = date_create(date("Y-m-d"));
        $user = DB::table('user_plan')->where('user_id', Auth::user()->id)->first();
        $expDate = date_create($user->expiry);
        if ( $date >= $expDate) {
            // dd($date, $expDate);
            DB::table('user_plan')->where('user_id', Auth::user()->id)->update([
                'status' => '0'
            ]);
        }
        $Ebooks = DB::table($getTableName[1])->get(); //find(1)
        $findCategory = DB::table('categories')->where('id', $Ebooks[0]->categories_id)->get();
        // dd($findCategory);
        return view('pages/single-e-book-series-book')->with('Ebooks', $Ebooks)->with('seriesName', $findCategory[0]->series_name)->with('seriesDesc', $findCategory[0]->series_desc)->with('seriesTableName', $findCategory[0]->series_table_name);


        
    }

    public function readEBook(Request $request) {

        $getPath = explode('/', $request->path());
        $getCategory = $getPath[1];
        $getSKU = $getPath[2];

        if((empty(Auth::user()))){
            return redirect('/login');
        }
        else{
            $getAccess = DB::table('user_plan')
            ->where('user_id', Auth::user()->id)
            ->where('status', '1')
            ->count();
            // dd($getAccess);
            if(isset($getAccess) && $getAccess > 0) {
                $getTable = DB::table('categories')->where('id', $getCategory)->get();
                $getBook = DB::table($getTable[0]->series_table_name)->where('sku', $getSKU)->get();
                $prodDesc = explode(',', $getBook[0]->product_details);

                return view('pages/e-book')
                ->with('book_path', $getBook[0]->book_path)
                ->with('thumb_img', $getBook[0]->thumb_img)
                ->with('series_table_name', $getTable[0]->series_table_name);
            }
            else{
                return redirect('/membership-plans');
            }
            // return view('pages/membership-plan');

        }
        
    }


}
