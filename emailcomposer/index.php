<?php 

require_once 'sendemail.php';


// first single
$data = new SendEmail;
// print_r($data->SendMail());
// print_r("expression");
exit();




// exit ;
//second mjultiple
$allEmail = ["ashishzade@hotmail.com","ashishzade72263@example.com","pradip.shende@hotmail.com"];
$allName= ["sonu","ashish","pradip"];
$key ='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';
$maindata = (object)  array("personalizations"=>[]);
$obj1=array();
$obj1= array("to"=>[],"cc"=>[],"bcc"=>[]);
$obj1=array("to"=>[]);
for ($i=0; $i < count($allEmail); $i++) { 
	$obj =	array(
			"email"=>$allEmail[$i],
			"name"=>$allName[$i],
		);
	
	 array_push($obj1['to'], (object) $obj);
}
array_push($maindata->personalizations, (object) $obj1);
// $obj2= array("from"=>["email"=>"email","name"=>"sended"],"reply_to"=>[],"subject"=>"subject");
$obj2= array("from"=> (object) ["email"=>"littleprodigybooks@gmail.com","name"=>"The Little Prodigy Books  $key"],"subject"=>"Test bulk Mail test by ashish","content"=>[]);
$singlecontent = array(
	"type" => "text/html",
	"value" => "<strong>  Test eMail test by ashish from sendgrid mail getway</strong>",
);
array_push($obj2['content'], (object) $singlecontent);
array_push($maindata->personalizations, (object) $obj2);
	echo "<pre>";  print_r($maindata);
$personaliz ="{\"personalizations\":[{\"to\":[{\"email\":\"john_doe@example.com\",\"name\":\"John Doe\"},{\"email\":\"julia_doe@example.com\",\"name\":\"Julia Doe\"}],\"cc\":[{\"email\":\"jane_doe@example.com\",\"name\":\"Jane Doe\"}],\"bcc\":[{\"email\":\"james_doe@example.com\",\"name\":\"Jim Doe\"}]},{\"from\":{\"email\":\"sales@example.com\",\"name\":\"Example Sales Team\"},\"to\":[{\"email\":\"janice_doe@example.com\",\"name\":\"Janice Doe\"}],\"bcc\":[{\"email\":\"jordan_doe@example.com\",\"name\":\"Jordan Doe\"}]}],\"from\":{\"email\":\"orders@example.com\",\"name\":\"Example Order Confirmation\"},\"reply_to\":{\"email\":\"customer_service@example.com\",\"name\":\"Example Customer Service Team\"},\"subject\":\"Your Example Order Confirmation\",\"content\":[{\"type\":\"text/html\",\"value\":\"<p>Hello from Twilio SendGrid!</p><p>Sending with the email service trusted by developers and marketers for <strong>time-savings</strong>, <strong>scalability</strong>, and <strong>delivery expertise</strong>.</p><p>%open-track%</p>\"}],\"attachments\":[{\"content\":\"PCFET0NUWVBFIGh0bWw+CjxodG1sIGxhbmc9ImVuIj4KCiAgICA8aGVhZD4KICAgICAgICA8bWV0YSBjaGFyc2V0PSJVVEYtOCI+CiAgICAgICAgPG1ldGEgaHR0cC1lcXVpdj0iWC1VQS1Db21wYXRpYmxlIiBjb250ZW50PSJJRT1lZGdlIj4KICAgICAgICA8bWV0YSBuYW1lPSJ2aWV3cG9ydCIgY29udGVudD0id2lkdGg9ZGV2aWNlLXdpZHRoLCBpbml0aWFsLXNjYWxlPTEuMCI+CiAgICAgICAgPHRpdGxlPkRvY3VtZW50PC90aXRsZT4KICAgIDwvaGVhZD4KCiAgICA8Ym9keT4KCiAgICA8L2JvZHk+Cgo8L2h0bWw+Cg==\",\"filename\":\"index.html\",\"type\":\"text/html\",\"disposition\":\"attachment\"}],\"categories\":[\"cake\",\"pie\",\"baking\"],\"send_at\":1617260400,\"batch_id\":\"AsdFgHjklQweRTYuIopzXcVBNm0aSDfGHjklmZcVbNMqWert1znmOP2asDFjkl\",\"asm\":{\"group_id\":12345,\"groups_to_display\":[12345]},\"ip_pool_name\":\"transactional email\",\"mail_settings\":{\"bypass_list_management\":{\"enable\":false},\"footer\":{\"enable\":false},\"sandbox_mode\":{\"enable\":false},\"spam_check\":{\"enable\":true,\"threshold\":2,\"post_to_url\":\"https://example.com/\"}},\"tracking_settings\":{\"click_tracking\":{\"enable\":true,\"enable_text\":false},\"open_tracking\":{\"enable\":true,\"substitution_tag\":\"%open-track%\"},\"subscription_tracking\":{\"enable\":false}}}";

$jsonDecode = json_decode($personaliz);
$jsonecode = json_encode($maindata);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $jsonecode,
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer $key",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$response = json_decode($response);
// echo "<pre>";  print_r($jsonDecode);
echo "<pre>";  print_r($response);
exit();
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}