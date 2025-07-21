<?php
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
   
class RegisterController extends BaseController
{
    public function __construct()
    {
        //header("Access-Control-Allow-Origin:*");
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User register successfully.');
    }
   
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user =\ Auth::user();
            print_r($user);
            //$success['token'] = $user->createToken('MyApp')->accessToken; 
            $success['name'] = $user->name;   
            return $this->sendResponse($success, 'User login successfully.');
        } else { 
            echo "Comes here";
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
	
	public function logout()
	{
		try {
            $user = Auth::user();
            $success['name'] =  $user->name;
			Auth::logout();
            return $this->sendResponse($success, 'User logout successfully.');
		}
		catch(\Exception $e) {
            return $this->sendError('Logout error', ['error'=>'Logout error']);
		}
	}
}