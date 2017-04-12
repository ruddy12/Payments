<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thanks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--favicon-->
       <link rel="icon" type="image/png" href="https://karirinjama.co.ke/img/favicon/favicon-32x32.png" sizes="32x32" />
</head>
<body>

<div class="container">
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    	<div class="col-md-12">
    	<div class="thumbnail">
    	<img src="https://karirinjama.co.ke/img/thanks/thanks.jpg">
    	<div class="caption">
    	<center><p class="text-danger" style="font-size:2em;">Happy New year.</p></center>
     <center><p class="text-warning" style="font-size:1.7em;">You are signed in now!</p></center>
     <center><p class="text-success" style="font-size:1.7em;">We'll contact you soon<img src='https://karirinjama.co.ke/img/thanks/logo2.PNG' /></p></center>
    	<p><center><img src="https://karirinjama.co.ke/img/thanks/njamasasa.jpg" class="img-responsive"></center></p>
     <center><a href="index.php"><button class="btn btn-primary btn-lg">Back to website</button></a></center>
     </div>
     </div>
     </div>
    </div>
  </div>
</div>
  
</div>

</body>
</html>



<?php

//include db

include('db/db_connection.php');

if(isset($_POST['txt_message'])){
	//declare variables
	$name= $_POST['txt_name'];
	$email= $_POST['txt_email'];
	$number= $_POST['txt_number'];
	$message=$_POST['txt_message'];

	//insert into db
	$insert = "insert into user(name,email,number,message)VALUES('$name','$email','$number','$message')";
	if (mysqli_query($con,$insert)) {
		//send mail
		require 'mailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
		$mail->Host = "smtp.ipage.com";
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->Username = "rufusnga@gmail.com";
		$mail->Password = "80528052";
		$mail->setFrom('rufusnga@gmail.com', 'Kariri Njama chief');
		$mail->addReplyTo('rufusnga@gmail.com', 'Kariri Njama Chief');
		$mail->addAddress($email, $name);
		$mail->Subject = 'Welcome Message';
		$body = '
		<html>
		<body>
		<p>Hi '.$name.',</p>
		<p>Thank you for taking your time to talk to us, we will respond to you soon</p>
		
		<p>Regards,<br />Kariri Njama Chief Team</p>
		</body>
		</html>
		';
		$mail->msgHTML($body);
		if (!$mail->send()) {
			$rmsg = "Mailer Error. Please confirm your entries and try again ";
			
		}
		else{
			$mmsg="message not sent";
			echo "<script>alert($mmsg)</script>";
		}

			echo "<script> $('#myModal').modal('show');</script>";
		//refresh page
		//echo "<script>window.open('index.php','_self')</script>";
	}

}

 ?>