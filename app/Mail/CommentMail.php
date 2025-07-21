<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(isset($this->data['txnid']))
        {
            return $this->subject($this->data['subject'])->markdown('emails.blog.invoice')->with(['data'=>$this->data]);
        }
        else if(isset($this->data['mail_queue']))
        {
            return $this->subject($this->data['subject'])->markdown('emails.blog.importuser')->with(['data'=>$this->data]);
        }
        else if(isset($this->data['user_expiry']))
        {
            return $this->subject($this->data['subject'])->markdown('emails.expiry')->with(['data'=>$this->data]);
        }
		else if(isset($this->data['cron_mail']))
        {
            return $this->subject($this->data['subject'])->markdown('emails.blog.cronplanuser')->with(['data'=>$this->data]);
        }
        	else if(isset($this->data['singleofflineuser']))
        {
             return $this->subject($this->data['subject'])->markdown('emails.blog.cronplanuser')->with(['data'=>$this->data]);
        }
        
        else
        {
        return $this->subject($this->data['subject'])->markdown('emails.blog.comment_blog')->with(['data'=>$this->data]);
        }
        
    }
}