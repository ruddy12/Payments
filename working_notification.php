<?php 

$data  = json_decode(file_get_contents('php://input'), true);
print_r($data);

// Process the data...
$category = $data["category"];
$status = $data["status"];
$phoneNumber = $data["source"];
 $value       = $data["value"];
 //$account     = $data["clientAccount"];
 $provider    = $data['provider'];
 $provider_channel    = $data['providerChannelCode'];
// $productname    = isset($data['productName']);
 $transactionid    = $data['transactionId'];
 $sourceType    = $data['sourceType'];
 $destinationType    = $data['destinationType'];
 $destination    = $data['destination'];
 $transactionfee    = $data['transactionFee'];
 //$status    = isset($data['status']);
 $description    = $data['description'];
 $productname    = $data['productName'];
 $providerFee    = $data['providerFee'];
 $providerRefId    = $data['providerRefId'];
 $requestMetadata    = $data['requestMetadata'];
 $transactionDate    = $data['transactionDate'];

require_once "dashboard/Auth/db/db_connection.php";


if ( $category == "MobileCheckout" && $status == "Success" ) {

  //DB Update -------------------------------------

   
 $sauti_request = "insert into sauti_pay_backup(
transactionId,category,provider,providerRefId,providerChannelCode,productName,sourceType,source,destinationType,destination,value,
transactionFee,providerFee,status,
description,requestMetadata,providerMetadata,transactionDate) VALUES(
'$transactionid','$category','$provider','$providerRefId','$provider_channel','$productname','$sourceType','$phoneNumber','$destinationType','$destination',' $value',
'$transactionfee','$providerFee','$status','$description','$requestMetadata','$providerMetadata','$transactionDate')";
  $transaction = mysqli_query($con,$sauti_request);

if ($transaction) {

  
  //send mail -------------------------------------
  $to = "rufusngash@gmail.com";
  $subj = "MobileCheckout";
  // the message
  //$msg = file_get_contents('templates/mpesa_template.html');
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
   <p style='color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0'>A payment of <span style='color:#404040;'>$value</span> has been paid by <span style='color:#404040; font-size:1em;'>$phoneNumber</span>,
      This is a payment confrimation receipt is  <span style='color:#8a6d3b;'>$transactionid<span> </p><br>
           
      </td>
      </tr>
      <tr>
      <td colspan='4'>
      <div style='width:100%;text-align:center;margin:30px 0'>
      <table align='center' cellpadding='0' cellspacing='0' style='font-family:HelveticaNeue-Light,Arial,sans-serif;margin:0 auto;padding:0'>
      <tbody>
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
  //include 'templates/mpesa_template.php';

  // Set content-type for sending HTML email
  $headers = 'MIME-Version: 1.0'."\r\n";
  $headers .= 'Content-type:text/html;charset=UTF-8'."\r\n";

  // Additional headers
  $headers .= 'From: Rufus<teamkariri@karirinjama.co.ke>'."\r\n";

  // send email
  if(mail($to,$subj,$msg,$headers)){
    echo"<h3>A message has been sent to your friend:</h3>".$phoneNumber. "";
  }else{
    echo"Fail";
  }
     // echo "<script> $('#friend').modal('show');</script>";
      echo " mail sent to ruffy";
    //refresh page
    //echo "<script>window.open('index.php','_self')</script>";
  }

$sauti_request_backup = "insert into sauti_pay(
transactionId,category,provider,providerRefId,providerChannelCode,productName,sourceType,source,destinationType,destination,value,
transactionFee,providerFee,status,
description,requestMetadata,providerMetadata,transactionDate) VALUES(
'$transactionid','$category','$provider','$providerRefId','$provider_channel','$productname','$sourceType','$phoneNumber','$destinationType','$destination',' $value',
'$transactionfee','$providerFee','$status','$description','$requestMetadata','$providerMetadata','$transactionDate')";
  $transaction_backup = mysqli_query($con,$sauti_request_backup);

if ($transaction_backup) {
	//send mail -------------------------------------
echo "<h2> Backup sent to DB </h2>";


    }

}else if ( $category == "MobileC2B" && $status == "Success" ){

  //DB Update -------------------------------------



  
  //send mail -------------------------------------

  $to = "rufusngash@gmail.com";
  $subj = "MobileC2B";
  // the message
  $msg = file_get_contents('templates/mpesa_template.html');

  // Set content-type for sending HTML email
  $headers = 'MIME-Version: 1.0'."\r\n";
  $headers .= 'Content-type:text/html;charset=UTF-8'."\r\n";

  // Additional headers
  $headers .= 'From: Rufus<teamkariri@karirinjama.co.ke>'."\r\n";

  // send email
  if(mail($to,$subj,$msg,$headers)){
    echo"<h3>A message has been sent to your friend:</h3>".$email. "";
  }else{
    echo"Fail";
  }
       // echo "<script> $('#friend').modal('show');</script>";
        echo " mail sent to ruffy";
      //refresh page
      //echo "<script>window.open('index.php','_self')</script>";
    }

 else if ( $category == "MobileB2C" && $status == "Success" ){
  //DB Update -------------------------------------



  
  //send mail -------------------------------------

  $to = "rufusngash@gmail.com";
  $subj = "MobileB2C";
  // the message
  $msg = file_get_contents('templates/mpesa_template.html');

  // Set content-type for sending HTML email
  $headers = 'MIME-Version: 1.0'."\r\n";
  $headers .= 'Content-type:text/html;charset=UTF-8'."\r\n";

  // Additional headers
  $headers .= 'From: Rufus<teamkariri@karirinjama.co.ke>'."\r\n";

  // send email
  if(mail($to,$subj,$msg,$headers)){
    echo"<h3>A message has been sent to your friend:</h3>".$email. "";
  }else{
    echo"Fail";
  }
       // echo "<script> $('#friend').modal('show');</script>";
        echo " mail sent to ruffy";
      //refresh page
      //echo "<script>window.open('index.php','_self')</script>";


}
elseif ( $category="MobileCheckout" && $status="Fail") {
	
	$sauti_fail = "insert into sauti_pay_fail(
transactionId,category,provider,providerRefId,providerChannelCode,productName,sourceType,source,destinationType,destination,value,
transactionFee,providerFee,status,
description,requestMetadata,providerMetadata,transactionDate) VALUES(
'$transactionid','$category','$provider','$providerRefId','$provider_channel','$productname','$sourceType','$phoneNumber','$destinationType','$destination',' $value',
'$transactionfee','$providerFee','$status','$description','$requestMetadata','$providerMetadata','$transactionDate')";
  $transaction = mysqli_query($con,$sauti_fail);

if ($transaction) {

  
  //send mail -------------------------------------
  $to = "rufusngash@gmail.com";
  $subj = "MobileCheckout";
  // the message
  $msg = file_get_contents('templates/mpesa_template.html');

  // Set content-type for sending HTML email
  $headers = 'MIME-Version: 1.0'."\r\n";
  $headers .= 'Content-type:text/html;charset=UTF-8'."\r\n";

  // Additional headers
  $headers .= 'From: Rufus<teamkariri@karirinjama.co.ke>'."\r\n";

  // send email
  if(mail($to,$subj,$msg,$headers)){
    echo"<h3>A message has been sent to your friend:</h3>".$email. "";
  }else{
    echo"Fail";
  }
     // echo "<script> $('#friend').modal('show');</script>";
      echo " mail sent to ruffy";
    //refresh page
    //echo "<script>window.open('index.php','_self')</script>";
  }
}
 else {
  //DB Update -------------------------------------




  //send mail -------------------------------------
echo "<h3>No data sent to db</h3>";
 
    }



 ?>