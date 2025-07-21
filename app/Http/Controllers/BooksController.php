<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogComments;
use App\BlogCommentReplies;
use Auth;
use Session;
use DB;

class BooksController extends Controller
{
    public function viewBooks(Request $request)
    {
        dd($request->path(), "Test");
        $books = DB::table($request->path())->get(); //find(1)
        // $findCategory = DB::table('categories')->limit(1)->get();
        $findCategory = DB::table('categories')->where('id', $books[0]->categories_id)->get();
        // dd($books[0]->categories_id, $findCategory[0]->series_name);
        return view('pages/single-series-book')->with('books', $books)->with('seriesName', $findCategory[0]->series_name);
    }


}
