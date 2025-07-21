<?php

use App\User;
use App\Blog;
use App\Mail\CommentMail;
use Illuminate\Support\Facades\Mail;

function sendCommonMail($type, $data) {
	if($type == 'blog')
	{
	
		$return = Mail::to($data['to_email']);
		if(isset($data['cc_email']))
		{
		$return->cc($data['cc_email']);
		}
		$return->send(new CommentMail($data));
		
	}
		if($type == 'mail_queue')
	{
		$return = Mail::to($data['to_email']);
		if(isset($data['cc_email']))
		{
		$return->cc($data['cc_email']);
		}
		//$return->send(new CommentMail($data));
		$to = $data['to_email'];
		// $subject = urlencode($data['subject']);
		// $body = urlencode($data['plan']);
		//$data = file("http://13.232.174.209/mail/index.php?to=".$to."&subject=".$subject."&body=".$body);
		$userData = DB::table('users')->join('offline_users', 'users.id', '=', 'offline_users.user_id')->where('email', $to)->get()->first();
		$mailBodyData = DB::table('mail_body')->get()->first();

		if($userData->plan_id ==2){
			$plan = "Two";
		}else{
			$plan = "One";
		}
		// dd($mailBodyData->id);
		$email = $to;
		$subject = str_replace("{year}", $plan, $mailBodyData->subject);
		$body = str_replace("{year}", $plan, $mailBodyData->body);
		$body = str_replace("{name}", $userData->name, $body);
		$body = str_replace("{password}", "LP@BOOKS", $body);
		$body = str_replace("{email}", $email, $body);
		$to = $email;
		$subject = urlencode($subject);
		$body = urlencode($body);
		// $data = file("http://13.232.174.209/mail/index.php?to=".$to."&subject=".$subject."&body=".$body);
		$data = array('to' => $to, 'subject' => $subject,'body' => $body);
		$url = "http://13.232.174.209/mail/index.php";
		// use key 'http' even if you send the request to https://...
		$options = array('http' => array(
		'method'  => 'POST',
		 'header'  => 'Content-Type: application/x-www-form-urlencoded',
		'content' => http_build_query($data)
		));
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
	}
	if($type == 'invoice')
	{
		$return = Mail::to($data['to_email']);
		if(isset($data['cc_email']))
		{
		$return->cc($data['cc_email']);
		}
		$return->send(new CommentMail($data));
	}
	if($type == 'user_expiry')
	{
		$return = Mail::to($data['to_email']);
		if(isset($data['cc_email']))
		{
		$return->cc($data['cc_email']);
		}
		$return->send(new CommentMail($data));
	}
	  if($type == 'singleofflineuser')
	{
		$return = Mail::to($data['to_email']);
		if(isset($data['cc_email']))
		{
		$return->cc($data['cc_email']);
		}
		$return->send(new CommentMail($data));
	}
}

function formatOrderDate($datetime) {
    //return date('M,d Y H:i', strtotime($datetime));
    return date('d-m-Y H:i', strtotime($datetime));
}