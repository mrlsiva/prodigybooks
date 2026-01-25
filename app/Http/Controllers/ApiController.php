<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogComments;
use App\BlogCommentReplies;
use Auth;
use Session;
use DB;

class ApiController extends Controller
{
    
    public function store(Request $request){
       
        $arr = implode(",",$request->input('displayCategories'));
        $tables = explode(',', $arr);

        // dd(
        //     $request->all(), 
        //     'Test', 
        //     // explode(',', $request->input('displayCategories')),
        //     $request->input('displayCategories'),
        //     $arr,
        //     $tables
        // );
        $categories = array();
        foreach ($tables as $table) {
            // $categories[] = DB::table('categories as c')->leftjoin($table.' as sc','sc.categories_id','c.id')->limit(5)->get();
            $categories[] = DB::table('categories as c')->leftjoin($table.' as sc','sc.categories_id','c.id')->get();
        }
        
        return $categories;
    }

    public function categories(Request $request) {
        $categories = DB::table('categories')->get();
        return $categories;
    }
    public function ourdistributorship(Request $request) {
        $ourdistributorship = DB::table('ourdistributorship')->get();
        return $ourdistributorship;
    }
    // ourdistributorship


}
