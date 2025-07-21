<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogComments;
use App\BlogCommentReplies;
use Auth;
use Session;
use DB;

class SessionController extends Controller
{
    public function validateActiveSession(Request $request)
    {
        // $url_segment = \Request::segment(2);
        // dd($request->all(), $request['currentSession'], Auth::user()->id, "Test");
        DB::table('users')->where('id', Auth::user()->id)->update([
            'session_id' => $request['currentSession']
        ]);
        DB::table('sessions')->where('id', '!=', $request['currentSession'])
            ->where('user_id', '=', Auth::user()->id)->delete();
            /*->update([
                'user_id'=> NULL
            ]);*/
            
        // DB::table('sessions')->where('id', '!=', Auth::user()->id)
        // ->where('user_id', '!=', Auth::user()->id)
        // ->delete();
        // return view('viewPost')->with('blogData', $blogData)->with('blogComments', $blogComments);
        $message = "Success";
        //return $message;
        $paidUser = DB::table('user_plan')
                        ->where('user_id', Auth::user()->id)
                        ->where('status', '1')->first();
        // dd($paidUser);
        $url = 'home';
        if(isset(Auth::user()->role_id) && Auth::user()->role_id == 1){
            //return redirect('/admin/dashboard');
            $url = 'admin/dashboard';
        } else if(!empty($paidUser)){
            //return redirect('/our-e-series');
            $url = 'our-e-series';
        } else{
            //return redirect('/home');
        }
        return ['msg' => $message, 'return_url' => $url];
    }

    public function confirmLoginData(Request $request)
    {
        // $url_segment = \Request::segment(2);
        // dd( Session::all(), Auth::user()->id, "Test");
        return view('confirmLogin')->
            with('currentSession', Session::get('currentSession'))->
            with('currentUser', Auth::user()->id)->
            with('warning', 'Your account is in use!');
    }

    public function logoutActiveSession(Request $request)
    {
        // dd($request->all(), "Test");
        Auth::logout();
        // $blogData = Blog::all(); //find(1)
        // $categories = DB::table('categories')->get();
        // return view('blogPage')->with('blogData', $blogData)->with('categories', $categories);
        $message = "Success";
        return $message;
    }


}
