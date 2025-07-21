<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogComments;
use App\BlogCommentReplies;
use Auth;
use Session;
use DB;
use Hash;
use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Excel;
use App\Exports\CollectionExport;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use Response;

class GuestUserController extends Controller
{
    use RegistersUsers;
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function registerOfflineUsers(Request $request) {
        // echo "<pre>";print_r($request);
        // exit();
        // dd($request['email'], User::get(), User::where('email',$request['email'])->get());
        $userexist = User::where('email',$request['email'])->get();
        if(isset($userexist) & sizeof($userexist) > 0) {
            $msg = "Email address already taken";
            Session::flash('userExist', $msg); 
            return redirect('/register-offline-users');
        }
        else{
            $offUser = DB::table('users')
            ->insertGetId([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'registration_mode' => 'Offline',
                'user_updated_password' => '0'
            ]);
            
            DB::table('offline_users')->insert([
            'user_id' => $offUser,
            'plan_id' => $request['user-plan'],
            'user_updated_password' => '0'
        ]);
         /*     $date = date_create(date("Y-m-d"));
     
        $expiryDate = '';
        if($request['user-plan'] == 1) {
            $expiryDate = date_add($date, date_interval_create_from_date_string("365 days")); 
        }
        else {
            $expiryDate = date_add($date, date_interval_create_from_date_string("730 days")); 
        }
        DB::table('user_plan')->insert([
            'user_id' => $offUser,
            'plan_id' => $request['user-plan'],
            'expiry' => $expiryDate
        ]);*/
       /*  $admin_details = User::where('role_id',1)->first();
        $data['email_type'] = 'singleofflineuser';
        $data['to_email'] = $request['email'];
        $data['to_name'] = $request['name'];
       
        $data['plan'] = 'User';
        $data['subject'] = "New User";
        $data['singleofflineuser'] = 'Single User';
        //$data['comment'] = 'Offline User Created';
        sendCommonMail('singleofflineuser', $data);*/
   
               if($request['user-plan'] == 1)
    			{
    				$plan_detail = "One Year";
    			}
    			{
    				$plan_detail = "Two Year";
    			}
		        $data['email_type'] = 'cron_mail';
                $data['to_email'] = $request['email'];
                $data['to_name'] = $request['name'];
                /* $data['cc_email'] = $data['to_email'];
                $data['cc_name'] = 'ccSupplier'; */
				$data['plan'] = $plan_detail;
                //$data['mail_queue'] = "mail";
                $data['cron_mail'] = "mail";
                $data['subject'] = "Intimation";
                //$data['comment'] = $request->input('comment');
                sendCommonMail('mail_queue', $data);
                
        $message = "Offline User Created Successfully";
        Session::flash('message', $message); 
        return redirect('/admin/dashboard');
       
    }
}
    public function importOfflineUsers(Request $request) {
        $file = $request->file('name');
		$type = $request->type;
		// File Details 
		$filename =time().'_'.$file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();
		$tempPath = $file->getRealPath();
		$fileSize = $file->getSize();
		$mimeType = $file->getMimeType();
		// Valid File Extensions
		$valid_extension = array("csv");
		$maxFileSize = 2097152; 
		if(in_array(strtolower($extension),$valid_extension)){
			// Check file size
			if($fileSize <= $maxFileSize){
				$filepath   = public_path('uploads');
				$file->move($filepath,$filename);
				$filepath = public_path('uploads'.'/'.$filename);
				// Reading file
				$file = fopen($filepath,'r');
				$importData_arr = array();
				$i = 0;
				while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE){
					$num = count($filedata );
					if($i == 0){
						$i++;
						continue; 
					}
					for($c=0; $c < $num; $c++){
						$importData_arr[$i][] = $filedata [$c];
					}
					$i++;
				}			
				fclose($file);
					// Insert to MySQL database
                $i=0;
                $notinsertData = array();
                $email = array();
                $email_name = array();
                $kk = array();
				foreach($importData_arr as $importData){
                    //$mypassword = "0101";
                    $password = Hash::make($request['password']);
                    $users = User::where('email', $importData[1])->get();

                    # check if email is more than 1
                    if(sizeof($users) > 0){
                        $notinsertData[] = array("name"=>$importData[0],"email"=>$importData[1],"plan_id"=>$importData[2]);
                    }
                    else
                    {
                        /* $insertData = array("name"=>$importData[0],"email"=>$importData[1],"password"=>$password);
                        User::insert($insertData); */
                       /* $offUser = DB::table('users')
                        ->insertGetId([
                            'name' => $importData[0],
                            'email' => $importData[1],
                            'password' => $password,
                            'registration_mode' => 'Offline',
                            'user_updated_password' => '0'
                        ]);
                        
                        DB::table('offline_users')->insert([
                            'user_id' => $offUser,
                            'plan_id' => $importData[2],
                            'user_updated_password' => '0'
                        ]);
                        $i++; */
                        //$details['email'] = 'venkateshpsna@gmail.com';
  
                        //dispatch(new SendEmailJob($details));
                        //$admin_details = User::where('role_id',1)->first();
                    /*     $details['email_type'] = 'bulk_user_upload';
                        $details['to_email'] = $importData[1];
                        $details['to_name'] = $importData[0];
                       
                        $details['subject'] = "Test New User Added";
                        $details['created_by'] = Auth::user()->name;
                        dispatch(new SendEmailJob($details))->delay(Carbon::now()->addMinutes(5));  */
                        //sendCommonMail('userupload', $data);
                        //$data = "'".$importData[1]."'";
                        if($importData[1] != '')
                        {
                        array_push($email_name,$importData[0]);
                        array_push($email,$importData[1]);
                        } 
                        //$email['one'] = implode(' , ' , $importData[1]);
                        //$email[] = array($importData[1]); 
                    }
                   
                }
              /*   $kk = "'".implode("','",$email)."'";
               // $kk1 = trim($kk);
               // $kk = implode(',', array_values($email));
                $start = "[";
                $end = "]";
                $email_format = $start.$kk.$end; */
                /* print_r($email_format);
                exit;
                $email = ['venkateshftn@gmail.com', 'venkateshftn+1@gmail.com', 'venkateshftn+2@gmail.com', 'venkateshftn+4@gmail.com','venkateshftn+5@gmail.com','venkateshftn+6@gmail.com','venkateshftn+7@gmail.com'
                ,'venkateshftn+8@gmail.com','venkateshftn+9@gmail.com','venkateshftn+10@gmail.com','venkateshftn+511@gmail.com','venkateshftn+12@gmail.com','venkateshftn+13@gmail.com']; */
                /* $email = ['venkateshftn@gmail.com', 'venkateshftn+1@gmail.com', 'venkateshftn+2@gmail.com', 'venkateshftn+4@gmail.com','venkateshftn+5@gmail.com','venkateshftn+6@gmail.com','venkateshftn+7@gmail.com'
                ,'venkateshftn+8@gmail.com','venkateshftn+9@gmail.com','venkateshftn+10@gmail.com','venkateshftn+511@gmail.com','venkateshftn+12@gmail.com','venkateshftn+13@gmail.com']; */
				if(count($email) > 0)
				{
						$details['email_type'] = 'bulk_user_upload';
                        $details['to_email'] = $email;
                        $details['to_name'] = 'Customer';
                        $details['subject'] = "New User Added";
                        $details['created_by'] = Auth::user()->name;
                        dispatch(new SendEmailJob($details))->delay(now()->addMinutes(5));
				}
                /* dd($notinsertData);
                exit; */
                if(sizeof($notinsertData)>1)
                {
                    return Excel::download(new CollectionExport($notinsertData), 'export.xlsx');
                   /*  Excel::download('Filename', function($excel) {

                        $excel->sheet('Sheetname', function($sheet) {
                    
                            $sheet->fromArray(array(
                                $notinsertData
                            ));
                    
                        });
                    
                    })->export('xls'); */
                }

			}else{
                //Session::flash('flash_message','File too large. File must be less than 2MB.');
                $message = "File too large. File must be less than 2MB";
                Session::flash('message', $message); 
                return redirect('/admin/dashboard');
			}
		}
		else{
           
            $message = "Invalid File Extension";
                Session::flash('message', $message); 
                return redirect('/admin/dashboard');
        }
        $message = "Offline User Created Successfully";
            Session::flash('message', $message); 
        return redirect('/admin/dashboard');
   
	}
	    public function cronimportOfflineUsers(Request $request) {
        $file = $request->file('name');
		$type = $request->type;
		// File Details 
		$filename =time().'_'.$file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();
		$tempPath = $file->getRealPath();
		$fileSize = $file->getSize();
		$mimeType = $file->getMimeType();
		// Valid File Extensions
		$valid_extension = array("csv");
		$maxFileSize = 2097152; 
		if(in_array(strtolower($extension),$valid_extension)){
			// Check file size
			if($fileSize <= $maxFileSize){
				$filepath   = public_path('uploads');
				$file->move($filepath,$filename);
				$filepath = public_path('uploads'.'/'.$filename);
				// Reading file
				$file = fopen($filepath,'r');
				$importData_arr = array();
				$i = 0;
				while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE){
					$num = count($filedata );
					if($i == 0){
						$i++;
						continue; 
					}
					for($c=0; $c < $num; $c++){
						$importData_arr[$i][] = $filedata [$c];
					}
					$i++;
				}			
				fclose($file);
					// Insert to MySQL database
                $i=0;
                $notinsertData = array();
                $email = array();
                $email_name = array();
                $kk = array();
				foreach($importData_arr as $importData){
                    //$mypassword = "0101";
                    $password = Hash::make($request['password']);
                    $users = User::where('email', $importData[1])->get();

                    # check if email is more than 1
                    if(sizeof($users) > 0){
                        $notinsertData[] = array("name"=>$importData[0],"email"=>$importData[1],"plan_id"=>$importData[2]);
                    }
                    else
                    {
						 $offUser = DB::table('users')
                        ->insertGetId([
                            'name' => $importData[0],
                            'email' => $importData[1],
                            'password' => $password,
                            'registration_mode' => 'Offline',
                            'user_updated_password' => '0'
                        ]);
                        
                        DB::table('offline_users')->insert([
                            'user_id' => $offUser,
                            'plan_id' => $importData[2],
                            'user_updated_password' => '0'
                        ]);
                         /* $date = date_create(date("Y-m-d"));
                          
                            $expiryDate = '';
                            if($importData[2] == 1) {
                                $expiryDate = date_add($date, date_interval_create_from_date_string("365 days")); 
                            }
                            else {
                                $expiryDate = date_add($date, date_interval_create_from_date_string("730 days")); 
                            }
                            DB::table('user_plan')->insert([
                                'user_id' => $offUser,
                                'plan_id' => $importData[2],
                                'expiry' => $expiryDate
                            ]); */
                            
                        $offUser2 = DB::table('mail_queue')
                        ->insertGetId([
                            'name' => $importData[0],
                            'email' => $importData[1],
                            'plan' => $importData[2]
                        ]);
                    }
                   
                }
                if($notinsertData)
                {
                    return Excel::download(new CollectionExport($notinsertData), 'export.xlsx');
                }

			}else{
                //Session::flash('flash_message','File too large. File must be less than 2MB.');
                $message = "File too large. File must be less than 2MB";
                Session::flash('message', $message); 
                return redirect('/admin/dashboard');
			}
		}
		else{
           
            $message = "Invalid File Extension";
                Session::flash('message', $message); 
                return redirect('/admin/dashboard');
        }
        $message = "Offline User Created Successfully";
            Session::flash('message', $message); 
        return redirect('/admin/dashboard');
   
    }
	  public function sampleExcel()
    {
        $file = public_path()."/sampleTemplate.csv";
        header("Content-type: text/csv");
        return Response::download($file,'SampleTemplate.csv');
        //return Excel::download(new CollectionExport($notinsertData), 'export.xlsx');
    }

}
