<?php
ini_set('max_execution_time', 100000);
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require_once ('./mailBody.php');
$bodyObj = new body;
$toemail ="ashishzade73362@gmail.com";
$toName ="ashu";


function csv_content_parser($content) {
      foreach (explode("\n", $content) as $line) {
        // Generator saves state and can be resumed when the next value is required.
        yield str_getcsv($line);
      }
    }
    // Get content from csv file.
    $content = file_get_contents('C:/xampp/htdocs/emailcomposer/siva.csv');
    // Create one array from csv file's lines.
    $emailcomposer = array();
    $sr=0;
    foreach (csv_content_parser($content) as $fields) {
     if($sr>0 && $sr <= 5){
         if($fields[0]!=''){
             $toName =(string)$fields[0];
             $toemail =(string)$fields[1];
             echo "<pre>";print_r($sr);
             echo "<pre>";print_r($toemail);
             echo "<pre>";print_r($toName);
             // $body = $bodyObj->getBody($toemail,$toName);
             // send($toemail,$toName,$body);
             // $mail = $data->SendMail($toemail,$toName,$body);
                    
         }

     }
         $sr ++;
    }
    $v =csv_content_parser($content);
print_r($v);exit;
 $toemail ="ashishzade73362@gmail.com";
 $toName ="ashish test";
 $body = $bodyObj->getBody($toemail,$toName);
  
 // send($toemail,$toName,$body);
   



// print_r($body);exit;


function send($toemail,$toName,$body){
    $subject= "Initmation Mail";
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    // print_r(urldecode($_POST['subject']));exit;
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'Thelittleprodigybooks@gmail.com';                     //SMTP username
        $mail->Password   = 'Tpomruqbmsxtwttg';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('Thelittleprodigybooks@gmail.com', 'The Little Prodigy Books');
            $mail->addAddress($toemail, $toName);     //Add a recipient     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: ";
    }
}
