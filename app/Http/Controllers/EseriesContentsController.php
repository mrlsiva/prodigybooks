<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Auth;
use Session;
use DB;

class EseriesContentsController extends Controller
{
    public function viewCategories(Request $request)
    {
        // dd(Categories::all(), "Test");
        $categories = Categories::all(); //find(1)
        // dd($categories, "Test");
        if(!empty(Auth::user())) {
            $plan = DB::table('user_plan')
                ->where("user_id",Auth::user()->id)
                ->first();
            return view('pages/our-e-series')->with('plan', $plan)->with('categories', $categories);
        } else {
            return view('pages/our-e-series')->with('categories', $categories);
        }
        
    }

    public function thumbnailBooks(Request $request)
    {
        $allCategories = DB::table('categories')->select('id','series_name','series_table_name','no_of_books','age_group')->get();
        return json($allCategories);
    }
    // public function oureseries(Request $request)
    // {
    //     $categories = Categories::all(); //find(1)
    //     return view('our-e-series')->with('categories', $categories);
    // }

    
}
