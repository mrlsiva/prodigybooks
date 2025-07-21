<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('Test');
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        // 
        // dd($request->all());
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){

            // if(auth()->user()->confirmed==0){
            //     Auth::logout();
            //     return back()->with('warning', 'Your account has not yet been activated. Please check Your email');
            // }
            // dd(\Session::getId(),Auth::user()->id, 'Test login');
            try{
                $exists = DB::table('users')->where('id', Auth::user()->id)->whereNull('session_id')->count();
                // dd($exists, 'user');
                if ($exists) {
                    $data = $request->session()->all();

                    // dd($data, 'Home');
                    DB::table('users')->where('id', Auth::user()->id)->update([
                        'session_id'=> \Session::getId()
                    ]);
                } else{
                    // dd(\Session::getId(), Auth::user()->id, $exists, $request->session()->has('key'), 'check login');
                    //Auth::logout();
                    // Auth::user();
                    // return back()->with('warning', 'Your account is in use')->with('currentSession', \Session::getId())->with('user', Auth::user()->id);
                    return redirect('/confirm-login')->with('currentSession', \Session::getId());
                }
                // if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                //     // The user is being remembered...
                // }
                
                // dd(\Session::getId());
                $paidUser = DB::table('user_plan')
                            ->where('user_id', Auth::user()->id)
                            ->where('status', '1')->first();
                // dd($paidUser);
                if(isset(Auth::user()->role_id) && Auth::user()->role_id == 1){
                    return redirect('admin/dashboard');
                } else if(!empty($paidUser)){
                    return redirect('our-e-series');
                } else{
                    return redirect('home');
                }
            } catch(\Exception $e) {
                dd($e);
            }
        }else {
            return back()->with('warning', 'Address email or/and password are incorrect.');
        }
    }

    public function logout(Request $request){
        $id = Auth::user()->id;
        if(!empty($id)){
            DB::table('users')->where('id', Auth::user()->id)->update([
                'session_id'=> NULL
            ]);
            DB::table('sessions')->where('user_id', Auth::user()->id)->delete();
            DB::table('cart-products')->where('user_id', Auth::user()->id)->delete();
        }

        Auth::logout();
        $request->session()->flush();
        return redirect('home');
    }
}
