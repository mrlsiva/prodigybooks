<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Email Template</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body style="padding: 0; margin: 0;">
    <div align="center" style="width: 100%; overflow: hidden;">
        <div style="max-width: 680px; width: 100%; margin-top: 5px;">
            <div>
                <img src="https://littleprodigybooks.in/resources/img/logo.png" style="width: 100%; max-width:250px" alt="" border="0 " />
            </div>
            <div style="background-color: #fbfcfd; border-top: thick double #cccccc; text-align: left; width: 100%;">
                <div style="padding: 20px; width: 100%;">
                    <p style="width: 80%;">
                        Dear {{$data['to_name']}} Congratulations,<br> <br>Thank you for visiting <strong>The Little Prodigy Books.</strong> We welcome you to a world of knowledge and fun! <br> <br> You have now subscribed to a <strong>{{$data['plan']}} Exclusive Membership</strong> Access to all our E-Books from The Little Prodigy Books banner .
                    </p>
                    <p style="width: 90%;background-color: #e43750;padding: 10px;color: #fff;margin: 0;"> How to read our books ?</p>
                    <p style="width: 100%;"> Please follow these simple steps below :</p>
                    <p style="text-align: left; width: 100%;">1. <strong>Goto </strong> <a href='https://littleprodigybooks.in/login' target="_blank ">Login</a> </p>
                    <p style="text-align: left; width: 100%;">2. Fill in your Credentials</p>

                    <table style="text-align: left; width: 100%;">
                        <tr>
                            <th>UserName : {{$data['to_email']}}</th>
                        </tr>
                        <tr>
                            <th>Password : LP@BOOKS</th>
                        </tr>
                    </table>


                    <p style="text-align: left; width: 100%;">3. Create your Profile page</p>
                    <p style="text-align: left; width: 100%;">4. Kindly fill in your Basic details and click <strong>submit</strong></p>
                    <p style="text-align: left; width: 100%;">5. Click Read books and Enjoy Reading!</p>
                    <p style="text-align: left; width: 100%;">Please revert back for any clarifications</p>
                    <table style="text-align: left; width: 100%;">
                        <tr>
                            <th>Whatsapp: +91 90115 24939, +91 88569 14929</th>
                            
                        </tr>
                        <tr>
                            <th>Mail : Books.liitleprodigy@gmail.com</th>
                        </tr>
                    </table>

                    <br>
                    <p style="text-align: left; width: 100%;">We are also available now at both Android/IOs Play-Stores@ <strong>Little Prodigy Books</strong></p>
                    
                    <table style="text-align: left; width: 100%;">
                        <tr style="float:left; text-align: right; width: 50%;">
                            <th><a href=""><img src="https://littleprodigybooks.in/resources/images/android.png" alt=""></a></th>
                        </tr>
                        <tr style="float:left; text-align: left; width: 50%;">
                            <th><a href=""><img src="https://littleprodigybooks.in/resources/images/ios.png" alt=""></a></th>
                        </tr>
                    </table>

                    <br>
                    
                    

                    <div style="text-align: Right; width: 100%; margin-left: -45px; ">
                        Thank you with warm regards,<br> Little Prodigy Books Team
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>