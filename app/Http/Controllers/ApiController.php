<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogComments;
use App\BlogCommentReplies;
use Auth;
use Session;
use DB;
use Schema;

class ApiController extends Controller
{
    
    public function store(Request $request){
        
        // Validate the request
        $displayCategories = $request->input('displayCategories');
        
        // Check if displayCategories exists and is not empty
        if (!$displayCategories || !is_array($displayCategories)) {
            return response()->json([
                'success' => false,
                'message' => 'displayCategories parameter is required and must be an array'
            ], 400);
        }
        
        $arr = implode(",", $displayCategories);
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
        try {
            foreach ($tables as $table) {
                // Sanitize table name to prevent SQL injection
                $table = trim($table);
                if (empty($table)) {
                    continue;
                }
                
                // Check if table exists before querying
                if (!\Schema::hasTable($table)) {
                    continue;
                }
                
                // $categories[] = DB::table('categories as c')->leftjoin($table.' as sc','sc.categories_id','c.id')->limit(5)->get();
                $categories[] = DB::table('categories as c')
                    ->leftjoin($table.' as sc','sc.categories_id','c.id')
                    ->get();
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving categories: ' . $e->getMessage()
            ], 500);
        }
        
        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
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
