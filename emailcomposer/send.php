<?php 
ini_set('max_execution_time', 10000);
	require_once 'sendemail.php';
	require_once 'sendgrid.php';
	require_once 'mailBody.php';
	$sendMail = new sendMail;
	$data = new SendEmail;
	$bodyObj = new body;


	// // Parse all content from csv file and generate array from line.
	// function csv_content_parser($content) {
	//   foreach (explode("\n", $content) as $line) {
	//     // Generator saves state and can be resumed when the next value is required.
	//     yield str_getcsv($line);
	//   }
	// }
	// // Get content from csv file.
	// $content = file_get_contents('C:/xampp/htdocs/emailcomposer/siva.csv');
	// // Create one array from csv file's lines.
	// $emailcomposer = array();
	// $sr=0;
	// foreach (csv_content_parser($content) as $fields) {
	// 	if($sr> 2 && $sr <=4){
	// 		if($fields[0]!=''){
	// 			$toName =$fields[0];
	// 			$toemail =$fields[1];
	// 			echo "<pre>";print_r($sr);
	// 			echo "<pre>";print_r($toName);
	// 			echo "<pre>";print_r($toemail);
	// 			// $body = $bodyObj->getBody($toemail,$toName);
	// 			// $mail = $data->SendMail($toemail,$toName,$body);
	//   				// array_push($emailcomposer, $fields);
	// 		}

	// 	}
	// 		$sr ++;
	// }


	$toemail ="books.littleprodigy@gmail.com";
	$toemail ="ashishzade73362@gmail.com";
	$toName ="Ashwin es";
	$body = $bodyObj->getBody($toemail,$toName);
	// $mail = $sendMail->send($toemail,$toName,$body);
	$mail = $data->SendMail($toemail,$toName,$body);
	 echo "<pre>";print_r("success full send to");


	echo "<pre>";print_r($mail);exit();
		exit();


	
	
	//LP@BOOKS
	$toemail ="ashishzade73362@gmail.com";
	// $toemail ="books.littleprodigy@gmail.com";
	$toName ="Ashwin";
	$body = $bodyObj->getBody($toemail,$toName);
	// $mail = $sendMail->send($toemail,$toName,$body);
	$mail = $data->SendMail($toemail,$toName,$body);
	print_r($mail);
	//LP@BOOKS

// 	LOAD DATA INFILE 'C:/xampp/htdocs/emailcomposer/siva.csv'  
// INTO TABLE users 
// FIELDS TERMINATED BY ',' 
// ENCLOSED BY '"'
// LINES TERMINATED BY '\n'
// IGNORE 1 ROWS (name,email,isExportUser)
// ;

?>