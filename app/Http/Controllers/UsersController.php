<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Session;
use DB;
use App\Categories;
use App\Blog;
use Auth;

class UsersController extends Controller
{
    public function __construct(){
        // Only admin is allowed restriction can be given here 
        //$this->middleware('admin');
    }

    public function currentUser(){
        if(!(empty(Auth::user()))){
            $user = DB::table('users')->where('id', Auth::user()->id)->first(); 
            $userPlan = DB::table('user_plan')->where('user_id', Auth::user()->id)->first(); 
            // dd($userPlan, $user);
            return view('pages.membership-account',compact('user', 'userPlan'));
        }
        else {
            return redirect('/login');
        }
       
        //->with('categories',$categories);
    }

    public function updateProfile(Request $request) {
        // dd($request->all());
        DB::table('users')->where('id', Auth::user()->id)
            ->update([
                "name" => $request['user'],
                "email" => $request['email']
            ]); 
        $message = "Profile Updated Successfully!!";
        Session::flash('profileMessage', $message);
        return redirect('/membership-account');
    }

    
    public function updatePassword(Request $request) {
        $matchPassword = Hash::check($request['old_password'], Auth::user()->password);
        // dd($matchPassword);
        if($matchPassword) {
            
            // dd($matchPassword);
            DB::table('users')->where('id', Auth::user()->id)
            ->update([
                'password' => Hash::make($request['password']),
            ]);
            $message = "Password Updated Successfully!!";
        }
        else {
            
            $message = "Please provide valid details";
        }
       
        
        Session::flash('passwordMessage', $message);
        return redirect('/membership-account');
    }

    
}
