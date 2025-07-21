<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use DB;
use Session;

class TableController extends Controller
{
    
    public function createTable($table_name, $fields = [])
    {
        // check if table is not already exists
        try{
            if (!Schema::hasTable($table_name)) {
                Schema::create($table_name, function (Blueprint $table) use ($fields, $table_name) {
                    $table->increments('id');
                    if (count($fields) > 0) {
                        foreach ($fields as $field) {
                            $table->{$field['type']}($field['name']);
                        }
                    }
                    $table->timestamps();
                });

                //return response()->json(['message' => 'Given table has been successfully created!'], 200);
                $response = 'Given table has been successfully created!';
            }

            $response = 'Given table is already existis.';
            return $response;
        }catch(\Exception $e){
            // dd($e);
        }
    }

    public function operate(Request $request)
    {
        // set dynamic table name according to your requirements
        
        // $table_name = 'demo1';        
        $table_name = $request->input('db_category');
// dd($request->all(),'Test', $table_name);
        // set your dynamic fields (you can fetch this data from database this is just an example)
        $fields = [
            ['name' => 'book_title', 'type' => 'string'],
            ['name' => 'thumb_img', 'type' => 'text'],
            ['name' => 'product_img', 'type' => 'integer'],
            ['name' => 'product_details', 'type' => 'longText'],
            ['name' => 'actual_price', 'type' => 'string'],
            ['name' => 'offer_price', 'type' => 'text'],
            ['name' => 'sale', 'type' => 'integer'],
            ['name' => 'in_stock', 'type' => 'text'],
            ['name' => 'sku', 'type' => 'integer'],
            ['name' => 'categories', 'type' => 'string'],
            ['name' => 'tags', 'type' => 'string'],
            ['name' => 'description', 'type' => 'text'],
            ['name' => 'additional_info', 'type' => 'integer'],
            ['name' => 'categories_id', 'type' => 'integer'],
            ['name' => 'review', 'type' => 'longText']
        ];

        //return $this->createTable($table_name, $fields);
        $this->createCategory($request->all());
                
        $message = $this->createTable($table_name, $fields);
        Session::flash('message', $message); 
        /*
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        */
        return redirect("admin/add-books");
        
    }

    public function createCategory($request)
    {
        //  dd($request,'Test',$request['cat_name']);
        DB::table('categories')->insert(
            ['series_name' => $request['cat_name'], 'series_table_name' => $request['db_category'], 'age_group' => $request['age_group'], 'banner_img' => $request['cat_banner']]
        );  
        //DB::getPdo()->lastInsertId()
        return true;
    }

    /**
     * To delete the tabel from the database 
     * 
     * @param $table_name
     *
     * @return bool
     */
    public function removeTable($table_name)
    {
        Schema::dropIfExists($table_name); 
        
        return true;
    }
}
