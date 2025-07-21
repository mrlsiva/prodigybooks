<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Categories;
use Auth;
use Session;
use DB;


class HomeContentsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }
    public function viewCategories(Request $request)
    {
        
        $categories = Categories::all(); //find(1)
        if (Auth::user()){
            $offlineUser = DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->where('registration_mode', 'offline')
                        ->where('user_updated_password', '0')
                        ->first();
            $offlineUserPlan = DB::table('offline_users')
                        ->where('user_id', Auth::user()->id)
                        ->first();
            if($offlineUser !== null) {
                // dd($offlineUser->id, 'test');
                return view("resetPassword")
                        ->with('offlineUser', $offlineUser->id)
                        ->with('uname', $offlineUser->name)
                        ->with('email', $offlineUser->email)
                        ->with('plan', $offlineUserPlan->plan_id);
            }
            else{
                return view('welcome')
                    ->with('categories', $categories)
                    ->with('offlineUser', '');
            }
        }
        else{
            return view('welcome')
                ->with('categories', $categories)
                ->with('offlineUser', '');
        }
        
    }

    public function updatePassword(Request $request)
    {
        // dd($request->all(),Auth::user()->id, 'test');
        $matchPassword = Hash::check($request['old_password'], Auth::user()->password);
        // dd($matchPassword);
            // $plan = DB::table('users')->where('id', Auth::user()->id)->get();
            // dd($plan, $request['plan-id']);
        if($matchPassword) {
            
            $date = date_create(date("Y-m-d"));
            if($request['plan-id'] == 1) {
                $expiryDate = date_add($date, date_interval_create_from_date_string("365 days")); 
            }
            else {
                $expiryDate = date_add($date, date_interval_create_from_date_string("730 days")); 
            }
            // dd($request->all(), $expiryDate);
            // dd($matchPassword);
            $message = "Password Updated Successfully!!";
            
            DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'user_updated_password' => '1'
            ]);

            DB::table('user_additional_details')
            // ->where('id', Auth::user()->id)
            ->insert([
                'user_id' => Auth::user()->id,
                'age' => $request['age'],
                'country' => $request['country'],
                'state' => $request['state'],
                'city' => $request['city'],
                'school' => $request['school'],
                'grade' => $request['grade'],
                'section' => $request['section'],
            ]);

            DB::table('offline_users')
                ->where('user_id', Auth::user()->id)
                ->update([
                    'user_updated_password' => '1'
                ]);

            DB::table('user_plan')
            ->insert([
                'user_id' => Auth::user()->id,
                'plan_id' => $request['plan-id'],
                'status' => '1',
                'expiry' => $expiryDate
            ]);
            return redirect('/password/updated');
        }
        else {
            $plan = $request['plan-id'];
            $message = "Old password is incorrect";
            $uname = $request['name'];
            $email = $request['email'];
            // Session::flash('passwordMessage', $message);
            return view('resetPassword',compact('plan', 'message', 'uname', 'email'));
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
