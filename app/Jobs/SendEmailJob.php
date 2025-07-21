<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailTest;
use Illuminate\Support\Facades\Mail;
   
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  
    protected $details;
  
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
   
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       /*  $when = now()->addMinutes(10);
        $return = Mail::to($this->details['to_email']);
		if(isset($this->details['cc_email']))
		{
		$return->cc($this->details['cc_email']);
		}
        $return->later($when, new SendEmailTest($this->details)); */
        //$when = now()->addMinutes(3);
        /*  print_r($this->details['to_email']);
        exit; */ 
       /*  $email = new SendEmailTest($this->details);
        Mail::to($this->details['to_email'])->send($email); */
        //$recipients = explode(',', $this->details['to_name']);
        Mail::to($this->details['to_email'])->send(new SendEmailTest($this->details));
    }
}