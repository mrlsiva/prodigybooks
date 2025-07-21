<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogComments;
use App\BlogCommentReplies;
use Auth;
use Session;
use DB;

class ProductSeriesController extends Controller
{
    public function SeriesController(Request $request)
    {
        // dd($request->path(), 'Test');
        $getPath = explode('/', $request->path());
        $getCategory = $getPath[1];

        $getTable = DB::table('categories')->where('series_table_name', $getCategory)->get();
        $getAllProducts = DB::table($getCategory)->get();
        
        // dd($getAllProducts, $getTable[0]->series_table_name, "Test");
        return view('pages/single-series-book')
            ->with('category', $getCategory)
            ->with('relatedProducts', $getAllProducts)
            ->with('series_image', $getTable[0]->series_table_name)
            ->with('series_id', $getTable[0]->id)
            ->with('series_name', $getTable[0]->series_name)
            ->with('age_group', $getTable[0]->age_group);

        
    }


}
