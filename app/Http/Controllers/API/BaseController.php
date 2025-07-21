<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Validator;

class BaseController extends Controller
{
    public function __construct()
    {
        // header("Access-Control-Allow-Origin:*");
        // header("Access-Control-Allow-Headers:Origin, X-Requested-With, Accept, Content-Type, Authorization");
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    public function sendFailure($result, $message)
    {
        $response = [
            'success' => false,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 200)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMessages)){
            $response['error'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    public function sendingError($validator) {
        $errMsg = '';
        foreach($validator->errors()->all() as $error) {
            $errMsg .= $error;
        }
        $errors['message'] = $errMsg;
        return $errors;
    }
}