<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Auth;
use Session;
use DB;

class MembershipController extends Controller
{
    public function checkMembership(Request $request)
    {
        // dd(Auth::check());
        
        if(Auth::user()) {
        $getUser = DB::table("user_plan")
                    ->where("user_id",Auth::user()->id)
                    ->where("status","1")
                    ->first();
        
        if($getUser !== null){
            Session::put('subscription', 'yes');
        }
        else {
            Session::put('subscription', 'no');
        }
        return view('pages.membership')
                ->with('plan', $request->plan)
                ->with('amount', $request->amount);
        }
        else{
            $msg = "Please sign in to become a member!";
            Session::flash('loginToSubscribe', $msg);
            return redirect('/login');
        }
    }

    public function choosePlan(Request $request) {
        // dd($request->all());
        $plan = $request->plan;
        $amount = $request->amount;
        return view('pages.membership')
                ->with('plan', $plan)
                ->with('amount', $amount);
    }

    public function listPlans(Request $request) {
        // dd($request->all());
        $plan = DB::table('user_plan')
            ->where("user_id",Auth::user()->id)
            ->first();
        // dd($plan);
        return view('pages.membership-plan')
                ->with('plan', $plan);
                // ->with('amount', $amount);
    }

}
