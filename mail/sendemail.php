<?php 

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;
		// require 'vendor/autoload.php';
require(".././vendor/autoload.php");
class SendEmail{

	public function SendMail($toemail,$toName,$body){
		$subject= "Initmation Mail";
		$key ='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';
		$email = new \SendGrid\Mail\Mail(); 
		$email->setFrom("littleprodigybooks@gmail.com", "The Little Prodigy Books");
		$email->setSubject($subject);
		$email->addTo($toemail, $toName);
		$email->addContent(
		    "text/html", $body
		);
		$sendgrid = new \SendGrid($key);
		
		try {
		    $response = $sendgrid->send($email);
			return 1;
		} catch (Exception $e) {
			return 2;
		    // echo 'Caught exception: '. $e->getMessage() ."\n";
		}
	}
	public function sendSmtpMail($toemail,$toName,$body){
		$subject= "Initmation Mail";

		$mail = new PHPMailer(true);
		try {
		    //Server settings
		    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		    $mail->isSMTP();                                            //Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $mail->Username   = 'Thelittleprodigybooks@gmail.com';                     //SMTP username
		    $mail->Password   = 'Tpomruqbmsxtwttg';                               //SMTP password

		    //Recipients
		    $mail->setFrom('Thelittleprodigybooks@gmail.com', 'The Little Prodigy Books');
		    $mail->addAddress($toemail, $toName);     //Add a recipient
		 

		    //Content
		    $mail->isHTML(true);                                  //Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $body;
		    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    print_r( 'Message has been sent');exit();
		} catch (Exception $e) {
		    print_r(  "Message could not be sent. Mailer ");exit;
		}
	}
}
?>