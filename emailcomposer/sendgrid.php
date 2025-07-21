<?php
	// $toemail ="ashishzade73362@gmail.com";
	// $toName ="ashishzade";
	// $email= "littleprodigybooks@gmail.com";  /*****ENTER_FROM_EMAIL_ADDRESS*****/
	// $name= "ENTER_A_NAME";				/*****ENTER_A_NAME*****/
	//books.littleprodigy@gmail.com;


	class sendMail{
		function send($toemail,$toName,$body){
			$email= "littleprodigybooks@gmail.com"; 
			$subject= "Initmation Mail";
			$headers= array(
				'Authorization: Bearer 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',  
				'Content-Type: application/json'
			);
			$data = array(
				"personalizations" =>  
				array(
				 (object)	array(
						"to" =>array(
							(object) array(
								"email" =>$toemail, /*****ENTER_TO_EMAIL_ADDRESS*****/
								"name"  => $toName
							)
						)
					)

				),
				"from" => (object) array(
					"email"=> $email
				),
				"subject" =>$subject,
				"content" =>array(
						(object) array(

							"type" => "text/html",
							"value" => $body
						)
				)
			);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			$response = curl_exec($ch);

			curl_close($ch);

			return $response;
		}
	}


	


	



	

// $jsonDecode = json_decode($personaliz);
// echo "<pre>";  print_r($data);
// echo "<pre>";  print_r($jsonDecode);exit();
	// print_r(json_encode($data));exit();
	




?>