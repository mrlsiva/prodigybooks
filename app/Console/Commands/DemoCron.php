<?php
   
namespace App\Console\Commands;
   
use Illuminate\Console\Command;
use DB;
   
class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    
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
        //\Log::info("Mail Cron is working fine!");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
        $delusers = array();
        $mail_queue = DB::table('mail_queue')->get();
        if($mail_queue)
        {
		foreach($mail_queue as $admin_details)
		{
			if($admin_details->plan == 1)
			{
				$plan_detail = "One Year";
			}
			{
				$plan_detail = "Two Year";
			}
		     $data['email_type'] = 'cron_mail';
                $data['to_email'] = $admin_details->email;
                $data['to_name'] = $admin_details->name;
                /* $data['cc_email'] = $data['to_email'];
                $data['cc_name'] = 'ccSupplier'; */
				$data['plan'] = $plan_detail;
                //$data['mail_queue'] = "mail";
                $data['cron_mail'] = "mail";
                $data['subject'] = "Intimation";
                //$data['comment'] = $request->input('comment');
                sendCommonMail('mail_queue', $data);
                array_push($delusers,$admin_details->id);
               
        }
        DB::table('mail_queue')->whereIn('id',$delusers)->delete();
     }
        //$this->info('Demo:Cron Cummand Run successfully!');
    }
}