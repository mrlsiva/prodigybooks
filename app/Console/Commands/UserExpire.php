<?php
   
namespace App\Console\Commands;
   
use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;
   
class UserExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'userexpiry:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User Expiry';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //\Log::info("User Expiry!");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
		/* $mail_queue = DB::table('mail_queue')->get();
		foreach($mail_queue as $admin_details)
		{
			if($admin_details->plan == 1)
			{
				$plan_detail = "Yearly";
			}
			{
				$plan_detail = "Monthly";
			} */
				$current_date = Carbon::now();
			$user = DB::table('users')->where('role_id', 1)->first();
			$user_expire = DB::table('user_plan')
							->join('users','users.id','user_plan.user_id')
							->select('users.email as useremail','users.name as username','users.id as userid')
							->where('user_plan.expiry','<',$current_date)
							->where('user_plan.expiry_status',0)
							->get();
			foreach($user_expire as $user_expire)
			{
		     $data['email_type'] = 'user_expiry';
                $data['to_email'] = $user_expire->useremail;
                $data['to_name'] = $user_expire->username;
                $data['cc_email'] = $user->email;
                $data['cc_name'] = $user->name;
				//$data['plan'] = '';
                $data['user_expiry'] = "mail";
				$data['subject'] = "User Expired";
                //$data['comment'] = $request->input('comment');
                sendCommonMail('user_expiry', $data);
				
				DB::table('user_plan')
							->where('user_id', $user_expire->userid)
							->update(['expiry_status'=>1]);
			} 
      
        //$this->info('Demo:Cron Cummand Run successfully!');
    }
}