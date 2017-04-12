<?php
if(isset($_POST['pay'])){

$pyment = $_POST['txt_pay'];
$email = $_POST['txt_email'];
}
 ?>
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
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="col-md-12">
      <div class="thumbnail">
      <img src="https://karirinjama.co.ke/img/thanks/thanks.jpg">
      <div class="caption">
      
     <center><p class="text-warning" style="font-size:1.7em;">

     You are Now signed in to our Newsletters!</p></center>
     <img src="img/sauti-Dates-PGN-Blog.png" style="margin-right:40%;">
    <a href="index.php"> <button class="btn btn-warning btn-block" style="font-size:1.8em;" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>Back to blog">Back</button></a></center>
     </div>
     </div>
     </div>
    </div>
  </div>
</div>

<div id="friend" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="col-md-12">
      <div class="thumbnail">
      <img src="https://karirinjama.co.ke/img/thanks/thanks.jpg">
      <div class="caption">
      
     <center><p class="text-warning" style="font-size:1.7em;">
		
     <?php echo $email; ?>your Transaction id has been sent to your email<?php #echo $transactionId; ?></p>
     <center><h3>Now use the prompt in your phone to transact</h3></center>
     </center>
     <img src="img/sauti-Dates-PGN-Blog.png" style="margin-right:40%;">
    <a href="index.php"> <button class="btn btn-warning btn-block" style="font-size:1.8em;" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>Back to blog">NEXT</button></a></center>
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
if(isset($_POST['pay'])){
$pyment = $_POST['txt_pay'];
$doh = $_POST['txt_amount'];


require_once "AfricasTalkingGateway.php";
//Specify your credentials
$username = "ruffy12";
$apiKey   = " 43edb29362c8c463fb70012c73896b5f0015011a3f0dc2cc31b52f1761aaa042";
// NOTE: If connecting to the sandbox, please use your sandbox login credentials
//Create an instance of our awesome gateway class and pass your credentials
$gateway = new AfricasTalkingGateway($username, $apiKey,"sandbox");
// NOTE: If connecting to the sandbox, please add the sandbox flag to the constructor:
/*************************************************************************************
             ****SANDBOX****
$gateway    = new AfricasTalkingGateway($username, $apiKey, "sandbox");
**************************************************************************************/
// Specify the name of your Africa's Talking payment product
$productName  = "Mconnect";
// The phone number of the customer checking out
$phoneNumber  = $pyment;
// The 3-Letter ISO currency code for the checkout amount
$currencyCode = "KES";
// The checkout amount
$amount       = $doh;
// Any metadata that you would like to send along with this request
// This metadata will be  included when we send back the final payment notification
$metadata     = array("agentId"   => "654",
                      "productId" => "321");
try {
  // Initiate the checkout. If successful, you will get back a transactionId
  $transactionId = $gateway->initiateMobilePaymentCheckout($productName,
                               $phoneNumber,
                               $currencyCode,
                               $amount,
                               $metadata);
  
  		 $transact_id= "The id here is ".$transactionId;
	$email = $_POST['txt_email'];
	//$email = "rufusngash@gmail.com";
$to = $email;
$subj = "Sautidates";
// the message
$msg = file_get_contents('templates/mpesa_template.php');
// Set content-type for sending HTML email
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'."\r\n";
// Additional headers
$headers .= 'From: Sautidates<info@sautidates.com>'."\r\n";
// send email
if(mail($to,$subj,$msg,$headers)){
	//echo"Suceess";
	echo "<script> $('#friend').modal('show');</script>";
}else{
	echo"Fail";
}

 
  //echo "<script>$('#friend').modal('show');</script>";
}
catch(AfricasTalkingGatewayException $e){
  echo "Received error response: ".$e->getMessage();
	


}
}