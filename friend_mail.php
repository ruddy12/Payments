<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thanks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--favicon-->
       
		 <link href="img/favicon.png" rel="shortcut icon" type="image/x-icon">
</head>
<body>

<div class="container">
  <div id="mail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="col-md-12">
      <div class="thumbnail">
      <img src="https://karirinjama.co.ke/img/thanks/thanks.jpg">
      <div class="caption">
      
     <center><p class="text-warning" style="font-size:1.7em;">we will contact your friend/Lover!</p></center>
     <img src="img/sauti-Dates-PGN-Blog.png" style="margin-right:40%;">
    <a href="index.php"> <button class="btn btn-warning btn-block" style="font-size:1.8em;" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>Back to blog">Back</button></a></center>
     </div>
     </div>
     </div>
    </div>
  </div>
</div>
 </div>
<script type="text/javascript">  
$(function() { 
    $(".btn").click(function(){
        $(this).button('loading').delay(1000).queue(function() {
            $(this).button('reset');
            $(this).dequeue();
        });        
    });
});   
</script>
</body>
</html>

<?php
//include db

//include('Auth/db/db_connection.php');
if(isset($_POST['txt_friend_mail'])){

	//declare variable

	$email = $_POST['txt_mail'];
$to = $email;
$subj = "Sautidates";
// the message
$msg = file_get_contents('templates/email_template.html');

// Set content-type for sending HTML email
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'."\r\n";

// Additional headers
$headers .= 'From: Sautidates<info@sautidates.com>'."\r\n";

// send email
if(mail($to,$subj,$msg,$headers)){
	//echo"Suceess";
	echo "<script> $('#mail').modal('show');</script>";
}else{
	echo"Fail";
}
}
?>