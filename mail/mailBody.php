<?php
	
class body{
	function getBody($toemail,$toName){
		// $toemail ="ashishzade73362@gmail.com";
		// $toName ="ashishzade";
		// $email= "littleprodigybooks@gmail.com";  /*****ENTER_FROM_EMAIL_ADDRESS*****/
		// $name= "ENTER_A_NAME";				/*****ENTER_A_NAME*****/
		$body= '<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body>
			<table>
				<tr>';
					$body .=str_replace('{{name}}',ucfirst($toName),'<td style="font-family: Helvetica;color: rgb(61,72,82);">Dear {{name}},</td>');
				$body .='</tr>
				<tr>
					<td style="font-family: Helvetica;color: rgb(61,72,82); margin: 0in 0in 0.0001pt;line-height: 18pt;background: rgb(251,252,253);font-size: 12pt;">Thank you for visiting The Little Prodigy Books. We welcome you to a world of knowledge and fun!</td>
				</tr>
				<tr>
					<td style="font-family: Helvetica;color: rgb(61,72,82); margin: 0in 0in 0.0001pt;line-height: 18pt;background: rgb(251,252,253); font-size: 12pt;">
						You have now subscribed to an <b>One Year Exclusive Membership</b> access to all our E-Books from The Little Prodigy Books banner .
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;line-height:18pt;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="background-color: rgb(228,55,80);font-family: Helvetica;color: white;line-height: 18pt;">
						<b>How to read our books ?</b>
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;line-height:18pt;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-family: Helvetica;color: rgb(61,72,82);">
						Please follow these simple steps below :
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;line-height:18pt;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-family:Helvetica;color:rgb(61,72,82)">
						1. <b>Goto</b>
						<a href="https://littleprodigybooks.in/login"> Login</a>
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;line-height:18pt;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-family:Helvetica;color:rgb(61,72,82)">
						2. Fill in your Credentials
					</td>
				</tr>
				<tr>
					<td style="margin:0in 0in 0.0001pt;text-align:center;font-size:12pt;font-family:Calibri,sans-serif">
						<b><span style="font-family: Helvetica;color: rgb(116,120,126);">UserName :'; 
							$body .=str_replace('{{email}}', $toemail, '<a href="mailto:'.$toemail.'">{{email}}</a>'); 
						$body .='</span>
						</b>
					</td>
				</tr>
				<tr>
					<td style="margin:0in 0in 0.0001pt;text-align:center;font-size:12pt;font-family:Calibri,sans-serif">
						<b><span style="font-family:Helvetica;color:rgb(116,120,126)">Password : LP@BOOKS</span></b>
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;line-height:18pt;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-family:Helvetica;color:rgb(61,72,82)">
						3. Create your Profile page
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;line-height:18pt;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-family:Helvetica;color:rgb(61,72,82)">
						4. Kindly fill in your Basic details and click <b>submit</b>
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;line-height:18pt;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-family:Helvetica;color:rgb(61,72,82)">
						5. Click Read books and Enjoy Reading!
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;line-height:18pt;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-family:Helvetica;color:rgb(61,72,82)">
						We are also available now at both Android/IOs Play-Stores@ <b>Little Prodigy Books</b> 
					</td>
				</tr>
				<tr>
					<td >
						<img src="http://13.232.174.209/public/images/store_logo.png" alt="E-Store Logos .png" width="477" height="47">
					</td>
				</tr>
				<tr style="font-family:Calibri,sans-serif;font-size:12pt;text-align:center">
					<td style="font-size:9pt;font-family:Helvetica;color:rgb(80,80,80)">
						Copyright © 2021* *Little Prodigy Books*, All rights reserved.
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;text-align:center;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-size:9pt;font-family:Helvetica;color:rgb(80,80,80)">
						<b>Our Website:-</b>
					</td>			
				</tr>
				<tr style="margin:0in 0in 0.0001pt;text-align:center;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-size:9pt;font-family:Helvetica;color:rgb(80,80,80)">
						<a href="https://littleprodigybooks.in" style="font-size:9pt;color:rgb(106,204,59)">https://littleprodigybooks.in</a>
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;text-align:center;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-size:9pt;font-family:Helvetica;color:rgb(80,80,80)">
						<b>Our mailing address is:</b>
					</td>			
				</tr>
				<tr style="margin:0in 0in 0.0001pt;text-align:center;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-size:9pt;font-family:Helvetica;color:rgb(80,80,80)">
						<a href="books.littleprodigybooks.in" style="font-size:9pt;color:rgb(106,204,59)">books.littleprodigybooks.in</a>
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;text-align:center;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-size:9pt;font-family:Helvetica;color:rgb(80,80,80)">
						<a href="mailto:books.littleprodigy@gmail.com" style="font-size:9pt;color:rgb(106,204,59)">books.littleprodigy@gmail.com</a>
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;text-align:center;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-size:13.5pt;font-family:Helvetica;color:rgb(80,80,80)">
						<b>WhatsApp</b>
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;text-align:center;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-size:13.5pt;font-family:Helvetica;color:rgb(80,80,80)">
						<b>+91 8856914939</b>
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;text-align:center;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-size:13.5pt;font-family:Helvetica;color:rgb(80,80,80)">
						<b>+91 9011524939</b>
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;text-align:center;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td style="font-size:9pt;font-family:Helvetica;color:rgb(80,80,80)">
						Want to change how you receive these emails?
					</td>
				</tr>
				<tr style="margin:0in 0in 0.0001pt;text-align:center;background:rgb(251,252,253);font-size:12pt;font-family:Calibri,sans-serif">
					<td>
						<span style="font-size:9pt;font-family:Helvetica;color:rgb(80,80,80)">You can</span>
						<span style="font-family:Helvetica;color:rgb(80,80,80)"><a href="" style="font-size:9pt;color:rgb(106,204,59)">update your preferences</a></span>
						<span style="font-size:9pt;font-family:Helvetica;color:rgb(80,80,80)">or</span>
						<span style="font-family:Helvetica;color:rgb(80,80,80)"><a href="" style="font-size:9pt;color:rgb(106,204,59)"> unsubscribe from this list.</a></span>
					</td>
				</tr>
			</table>
		</body>
		</html>';
	return $body;
	}
}

?>