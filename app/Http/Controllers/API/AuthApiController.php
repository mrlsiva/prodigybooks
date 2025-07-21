<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordOTPMail;
use Validator;
use DB;

class AuthApiController extends BaseController
{   
    public function __construct()
    {
       /* header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:GET, POST, PUT, PATCH, DELETE, OPTIONS");*/
        header("Access-Control-Allow-Headers:Origin, X-Requested-With, Accept, Content-Type, Authorization");
    }

    function getRandomNumber() {
        return mt_rand(100000,999999);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|max:10',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){            
            return $this->validationErrors($this->sendingError($validator));
        }

        $data = $request->all();
        if(User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ])) {
            $success['name'] = $data['name'];      
            return $this->sendResponse($success, 'User successfully registered.');
        }
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'mobile_no' => 'required|regex:/[0-9]{10}/|digits:10',
            'email' =>'required|email',
            'password' => 'required'
        ]);
        
        if($validator->fails()){            
            return $this->validationErrors($this->sendingError($validator));
        }

        $user = User::select('id', 'name')->where('email', $request->email)->first();      
     
        if(isset($user)) {
            // Set Auth Details
            //$credentials = $request->only('mobile_no', 'password');
            $inputArr = ['email'=>$request->email, 'password' => $request->password];
            if (\Auth::attempt($inputArr)) {
                $user = \Auth::user();
                $user = $request->user();
                //$user->token()->delete(); 
                $tokenResult = $user->createToken('FlipBookPassport');
                $token = $tokenResult->token;
                /*if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);*/
                $token->expires_at = date('Y-m-d H:i:s', strtotime('+1 years'));
                $token->save();

               /* return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);*/
                $nUser = Auth::user();
                $success['access_token'] = $tokenResult->accessToken;
                $success['token_type'] = 'Bearer';
                $success['expires_at'] = $token->expires_at;
                $success['user_id'] = $user->id;
                $success['name'] = $user->name;
                $success['email'] = $user->email; 

                $success['subscribed_user'] = 0;
                $date = date_create(date("Y-m-d"));
                $user_plan = DB::table('user_plan')->where('user_id', $user->id)->where('status', 1)->where('expiry_status', 1)->first();                    // dd($user);
                $expired_user = 0;
                if($user_plan != null) {                
                    $expDate = date_create($user_plan->expiry);
                    if ( $date >= $expDate) {
                        DB::table('user_plan')->where('user_id', $user->id)->where('status', 1)->where('expiry_status', 1)->update([
                            'status' => '0'
                        ]);
                        $expired_user = 1;
                    } else {
                        $success['subscribed_user'] = 1;
                    }
                }

                $success['expired_user'] = $expired_user;
                $success['offline_user'] = 0;
                if($user->registration_mode == "Offline") {
                    $success['offline_user'] = 1;
                    $success['update_profile'] = 1;               

                    $offlineUser = DB::table('users')
                        ->where('id', $user->id)
                        ->where('registration_mode', 'Offline')
                        ->where('user_updated_password', '0')
                        ->first();
                    $offlineUserPlan = DB::table('offline_users')
                        ->where('user_id', $user->id)
                        ->first();
                    
                    if($offlineUser !== null) {
                        $success['update_profile'] = 0;
                        $success['offline_id'] = $offlineUser->id;
                        $success['plan_id'] = $offlineUserPlan->plan_id;
                        //->with('uname', $offlineUser->name)
                        //->with('email', $offlineUser->email)
                    }
                }
                return $this->sendResponse($success, 'User logged in successfully.');
            } else {
                //return $this->sendError('Your email or password does not match..!', 'Your email or password does not match..!');
                $errors['message'] = 'Your email or password does not match...!';
                return $this->sendError('Validation Error.', $errors);
            }
        } else {          
            //return $this->sendError('Your email or password does not match..!', 'Your email or password does not match..!', 401);
            $errors['message'] = 'Your email or password does not match..!';
            return $this->sendError('Validation Error.', $errors);
        } 
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        /*$user = Auth::user();
        $nUser = User::find($user->id);
        //$nUser->device_token = NULL;
        $nUser->update();*/

        $id = \Auth::user()->id;
        if(!empty($id)){
            DB::table('users')->where('id', $id)->update([
                'session_id'=> NULL
            ]);
            DB::table('sessions')->where('user_id', $id)->delete();
            DB::table('cart-products')->where('user_id', $id)->delete();
        }

        //\Auth::logout();
        //$request->session()->flush();

        $request->user()->token()->revoke();
        //$request->user()->token()->delete(); 
        //\Auth::logout();
        return $this->sendResponse(true, 'Successfully logged out!');
    }

    protected function revokeAccessAndRefreshTokens($tokenId) {
        $tokenRepository = app('Laravel\Passport\TokenRepository');
        //$refreshTokenRepository = app('Laravel\Passport\Bridge\RefreshTokenRepository');

        $tokenRepository->revokeAccessToken($tokenId);
        //$refreshTokenRepository->revokeRefreshTokensByAccessTokenId($tokenId);
        //$refreshTokenRepository->revokeRefreshToken($tokenId);
    }

  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        //print_r($request->user()->tokens);
        
        /*$user = $request->user();
        $value = $request->bearerToken();*/
        
        //echo $id = (new Parser())->parse($value)->getHeader('jti');
        //print_r($token = $user->tokens->find($id));
        //$token->revoke();

        /*$request->user()
        ->tokens
        ->each(function ($token, $key) {
            $this->revokeAccessAndRefreshTokens($token->id);
            echo $token->id;
            echo "<br />";
        });*/

        // die();

        $user = \Auth::user();
        //return response()->json(['success' => $user], $this->successStatus);
        //return response()->json($user);
        $user->subscribed_user = 0;
        $date = date_create(date("Y-m-d"));
        $user_plan = DB::table('user_plan')->where('user_id', $user->id)->where('status', 1)->where('expiry_status', 1)->orderBy('id', 'DESC')->first();                    // dd($user);
        if($user_plan != null) {                
            $expDate = date_create($user_plan->expiry);
            if ( $date >= $expDate) {
                DB::table('user_plan')->where('user_id', $user->id)->where('status', 1)->where('expiry_status', 1)->update([
                    'status' => '0'
                ]);
            } else {
                $user->subscribed_user = 1;
                $user->plan = $user_plan->plan_id;
            }
        }

        $user->offline_user = 0;
        if($user->registration_mode == "Offline") {
            $user->offline_user = 1;            
            $user->update_profile = 1;
               
            $offlineUser = DB::table('users')
                ->where('id', $user->id)
                ->where('registration_mode', 'Offline')
                ->where('user_updated_password', '0')
                ->first();
            $offlineUserPlan = DB::table('offline_users')
                ->where('user_id', $user->id)
                ->first();
            
            if($offlineUser !== null) {
                $user->update_profile = 0;
                $user->offline_id = $offlineUser->id;
                $user->plan_id = $offlineUserPlan->plan_id;
                //->with('uname', $offlineUser->name)
                //->with('email', $offlineUser->email)
            } else {
                $user->additional_details = DB::table('user_additional_details')
                ->where('user_id', $user->id)
                ->first(); 
            }       
        }
        return $this->sendResponse($user, 'User information retrieved successfully!');
    }

    public function updateFirstProfile(Request $request) {
        $request = $request->all();
        $matchPassword = Hash::check($request['oldPassword'], Auth::user()->password);
        if($matchPassword) {
            $user = \Auth::user();
            if($user->registration_mode == "Offline") {
                $date = date_create(date("Y-m-d"));
                if($request['plan_id'] == 1) {
                    $expiryDate = date_add($date, date_interval_create_from_date_string("365 days")); 
                } else {
                    $expiryDate = date_add($date, date_interval_create_from_date_string("730 days")); 
                }

                DB::table('offline_users')
                    ->where('user_id', $user->id)
                    ->update([
                        'user_updated_password' => '1'
                    ]);

                DB::table('user_plan')
                ->insert([
                    'user_id' => $user->id,
                    'plan_id' => $request['plan_id'],
                    'status' => '1',
                    'expiry' => $expiryDate
                ]);

                $message = "Password Updated Successfully!!";            
                DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['newPassword']),
                    'user_updated_password' => '1'
                ]);

                DB::table('user_additional_details')
                // ->where('id', Auth::user()->id)
                ->insert([
                    'user_id' => $user->id,
                    'age' => $request['age'],
                    'country' => $request['country'],
                    'city' => $request['city'],                
                    /*'state' => $request['state'],
                    'school' => $request['school'],
                    'grade' => $request['grade'],
                    'section' => $request['section']*/
                ]);
                $data['subscribed_user'] = 1;
                $data['update_profile'] = 1;            
                return $this->sendResponse($data, "Profile informations have been updated successfully!!!");
            }
        } else {           
            $errors['message'] = "Old password is incorrect!";
            return $this->sendError('Validation Error.', $errors);
        } 
    }

    public function postUpdatePassword(Request $request) {        
        $matchPassword = Hash::check($request->old_password, Auth::user()->password);
        if($matchPassword) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:6|max:10',
                'confirm_password' => 'required|same:password'
            ]);
            $request = $request->all();
            if($validator->fails()){
                return $this->validationErrors($this->sendingError($validator));
            } else {
                $id = \Auth::id();
                $user = User::find($id);
                $user->password = Hash::make($request['password']);
                $user->save();
                return $this->sendResponse('', "Password has been updated successfully!");
            }
        } else {
            $errors['message'] = "Old password is incorrect!";
            //return $this->sendError('Validation Error.', $errors);
            return $this->validationErrors('Old password is incorrect!');
        }
    }
    
    public function postUpdateProfile(Request $request) {
        $user = \Auth::user();
        $request = $request->all();
       /* if($user->registration_mode == 'Offline') {
            DB::table('user_additional_details')
            ->where('user_id', $user->id)
            ->insert([
                'age' => $request['age'],
                'country' => $request['country'],
                'city' => $request['city'],                
               
            ]);
        } */

        /*'state' => $request['state'],
        'school' => $request['school'],
        'grade' => $request['grade'],
        'section' => $request['section']*/

        DB::table('users')
        ->where('id', $user->id)
        ->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        return $this->sendResponse('', "Profile details have been updated successfully!");
    }

    public function postForgotPassword(Request $request) {
        $user = User::where('email', $request->email)->first();
        if($user !== null /*isset($user)*/) {
            $otp = $this->getRandomNumber();
            $user->otp = $otp;
            $user->save();
            $dat['otp'] = $otp;
            $dat['id'] = $user->id;
            $dat['email'] = $user->email;
            //Mail OTP Send 
            try {         
                $data['to_email'] = $user->email; //'ligorism@gmail.com';
                $data['to_name'] = $user->name;
                $data['subject'] = "Reset Password OTP";
                $data['otp'] = $otp;
                Mail::to($data['to_email'])->send(new PasswordOTPMail($data));
            }
            catch(Exception $ex) {
                //$this->populate_array[] = array($row[2] => $ex->getLine());
                //return "We've got errors!";
            }
            catch(\Swift_TransportException $e) {
                $response = $e->getMessage();
            }
            catch(\Illuminate\Database\QueryException $ex) {
                //$this->populate_array[] = array($row[2] => $ex->getLine());
            }
            return $this->sendResponse($dat, "OTP has been sent to registered email successfully!");
        } else {
            //return $this->sendError("Given email does not exists!");
            $errors['message'] = "Given email does not exists!";
            return $this->sendError('Validation Error.', $errors);
        }
    }

    public function postVerifyOtpPassword(Request $request) {
        $user = User::where('email', $request->email)->first();
        if($user !== null /*isset($user)*/) {
            if($user->otp == $request->otp) {
                $user->otp = '';
                $user->save();
                $dat['id'] = $user->id;
                $dat['email'] = $user->email;
                return $this->sendResponse($dat, "OTP has been verified successfully!");
            } else {
                //return $this->sendError("","Given OTP does not match! Please enter correct OTP!");
                $errors['message'] = "Given OTP does not match! Please enter correct OTP!";
                return $this->sendError('Validation Error.', $errors);
            }
        } else {
            $errors['message'] = "Given email does not exists!";
            return $this->sendError('Validation Error.', $errors);
        }
    }

    public function postResetPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:10',
            'confirm_password' => 'required|same:password'
        ]);
        if($validator->fails()){
            return $this->validationErrors($this->sendingError($validator));
        } else {
            $request = $request->all();
            $user = User::where('email', $request['email'])->first();
            if($user !== null) {
                //$user = User::find($id);
                $user->password = Hash::make($request['password']);
                $user->save();
                return $this->sendResponse('', "Password has been updated successfully!");
            } else {
                //return $this->sendError('User not found in our records!');
                $errors['message'] = "User not found in our records!";
                return $this->sendError('Validation Error.', $errors);
            }
        }
    }

    public function membershipDetails() {
       if(!(empty(\Auth::user()))){
            $user = DB::table('users')->where('id', \Auth::user()->id)->first(); 
            $userPlan = DB::table('user_plan')->where('user_id', \Auth::user()->id)->where('status', 1)->where('expiry_status', 1)->first(); 
            if($userPlan != null) {
                if($userPlan->plan_id == 1) {
                    $level = "Basic";
                    //$billing = 'INR. 500';
                    $billing = ($userPlan->coupon?'INR. 450':'INR. 500');
                } elseif($userPlan->plan_id == 2) {
                    $level = "Advanced";
                    //$billing = 'INR. 700';
                    $billing = ($userPlan->coupon?'INR. 630':'INR. 700');
                }
                $dat['level'] = $level;
                $dat['billing'] = $billing;
                $dat['created_on'] = date('d M Y h:i A',strtotime($userPlan->created_on));
                $dat['expiry_on'] = date('d M Y h:i A',strtotime($userPlan->expiry));
                return $this->sendResponse($dat, "Membership details have been retrieved successfully!");
            } else {
                $errors['message'] = "You don't have any membership plan!";
                return $this->sendError("You don't have any membership plan!", $errors);
            }
        } else {
            $errors['message'] = "User didn't login!";
            return $this->sendError('You should login', $errors);
        } 
    }

    public function getDeleteUserAllAccessToken() {
        $user_id = 283;

        $count = 0;
        $users = DB::table('oauth_access_tokens')->where('user_id', $user_id)->where('revoked', 0)->get();
        if(null !== $users) {
            $count = count($users);
        }

        $response = [
            'success' => true,
            'data'    => $count
        ];
        return response()->json($response, 200);

    }
}