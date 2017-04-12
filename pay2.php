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
require_once "dashboard/Auth/db/db_connection.php";
if(isset($_POST['pay'])){
$pyment = $_POST['txt_pay'];
$doh = $_POST['txt_amount'];
$sauti_mail= $_POST['txt_email'];

$sauti_request = "insert into sauti_incoming(msidn,amount,email) VALUES('$pyment','$doh','$sauti_mail')";

if (mysqli_query($con,$sauti_request)) {
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
	$email = $sauti_mail;
	//$email = "rufusngash@gmail.com";
$to = $email;
$subj = "Sautidates";
// the message
//$msg = file_get_contents('templates/mpesa_template.php');
$msg = " <div style='font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#eeeeee'>
	<table align='cente'' width='1'0%' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
    <tbody>
        <tr>
        	<td>
    <table align='center' width='750px' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='width:750px!important'>
       <tbody>
        <tr>
        <td>
      <table width='690' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
      <tbody>
      <tr>
     <td colspan='3' height='80' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='padding:0;margin:0;font-size:0;line-height:0'>
        <table width='690' align='center' border='0' cellspacing='0' cellpadding='0'>
         <tbody>
          <tr>
      	<td width='30'></td>
     <td align='left' valign='middle' style='padding:0;margin:0;font-size:0;line-height:0'><a href='http://www.sautidates.com/' target='_blank'><img src='http://sautidatesweb.cyborgts.com/img/logosdd.png' alt='sautidates logo' ></a></td>
        <td width='30'></td>
          </tr>
       	</tbody>
        </table>
        </td>
        </tr>
        <tr>
     <td colspan='3' align='center'>
    <table width='630' align='center' border='0' cellspacing='0' cellpadding='0'>
       <tbody>
        <tr>
   	<td colspan='3' height='60'></td></tr><tr><td width='25'></td>
      <td align='center'>
      <h1 style='font-family:HelveticaNeue-Light,arial,sans-serif;font-size:48px;color:#404040;line-height:48px;font-weight:bold;margin:0;padding:0'>Sautidates Confirmation Receit</h1>
         </td>
      <td width='25'></td>
        </tr>
        <tr>
 	<td colspan='3' height='40'></td></tr><tr><td colspan='5' align='center'>
   <p style='color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0'>Dear <?php echo $email; ?>,

This is a payment receipt for Invoice <?php echo $transact_id ?></p><br>
           <p style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>
       Try it, and you'll see that online dating is such a natural way to spark up instinctive connections with others.</p>
                                                </td>
                                            </tr>
                                            <tr>
           <td colspan='4'>
      <div style='width:100%;text-align:center;margin:30px 0'>
       <table align='center' cellpadding='0' cellspacing='0' style='font-family:HelveticaNeue-Light,Arial,sans-serif;margin:0 auto;padding:0'>
             <tbody>
            	<tr>
    <td align='center' style='margin:0;text-align:center'><a href='http://www.sautidates.com/' style='font-size:21px;line-height:22px;text-decoration:none;color:#ffffff;font-weight:bold;border-radius:2px;background-color:#0096d3;padding:14px 40px;display:block;letter-spacing:1.2px' target='_blank'>Visit website now!</a><p>http://www.sautidates.com</p></td>
          </tr>
														
														
                                                   	</tbody>
                                                    </table>
                                               	</div>
                                           	</td>
                                       	</tr>
                                        <tr><td colspan='3' height='30'></td></tr>
                                 	</tbody>
                                    </table>
                             	</td>
                   			</tr>
                            
                          	</tbody>
                            </table>
                  			<table align='center' width='750px' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='width:750px!important'>
                            <tbody>
                            	<tr>
                                	<td>
                                        <table width='630' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
                                        <tbody>
                                        	<tr><td colspan='2' height='30'></td></tr>
                                            <tr>
                                            	<td width='360' valign='top'>
                                                	<div style='color:#a3a3a3;font-size:12px;line-height:12px;padding:0;margin:0'>&copy; 2017 Sautidates. All rights reserved.</div>
                                                	<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
                                                	<div style='color:#a3a3a3;font-size:12px;line-height:12px;padding:0;margin:0'>Kenya</div>
                                        		</td>
                                              	<td align='right' valign='top'>
                                                	<span style='line-height:20px;font-size:10px'><a href='https://www.facebook.com/SautiDates-579557628859089/' target='_blank'><img src='http://sautidatesweb.cyborgts.com/img/facebook.png' alt='sautidates facebook' height='25px'width='25px'></a>&nbsp;</span>
                                                    <span style='line-height:20px;font-size:10px'><a href='https://twitter.com/sautidates' target='_blank'><img src='http://sautidatesweb.cyborgts.com/img/twitter.png' alt='sautidates twitter' height='25px' width='25px'></a>&nbsp;</span>
                                                    <span style='line-height:20px;font-size:10px'><a href='https://www.instagram.com/sautidates/' target='_blank'><img src='http://sautidatesweb.cyborgts.com/img/instagram.png' alt='sautidates instagram' height='25px'width='25px'></a>&nbsp;</span>
													<span style='line-height:20px;font-size:10px'><a href='https://www.youtube.com/channel/UCw5qrscgddDbcNZdmQ7sp1g' target='_blank'><img src='http://sautidatesweb.cyborgts.com/img/youtube.png' al'='sautidates youtube' height='25px' width='25px'></a>&nbsp;</span>
                                              	</td>
                                            </tr>
                                            <tr><td colspan='2' height='5'></td></tr>
                                           
                                      	</tbody>
                                        </table>
                                   	</td>
                  				</tr>
                          	</tbody>
                            </table>
                  		</td>
                	</tr>
              	</tbody>
                </table>
            </td>
		</tr>
 	</tbody>
    </table>
</div>  ";
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
}