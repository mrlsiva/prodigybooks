<?php 

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
			return $response;
		} catch (Exception $e) {
			return 2;
		    // echo 'Caught exception: '. $e->getMessage() ."\n";
		}
	}
	
}
?>