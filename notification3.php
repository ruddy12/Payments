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
 $productname    = $data['productName'];
 $transactionid    = $data['transactionId'];
 $transactionfee    = $data['transactionFee'];
 $status    = $data['status'];
 $description    = $data['description'];
 $productname    = $data['productName'];
 $providerFee    = $data['providerFee'];
 $providerRefId    = $data['providerRefId'];
 $transactionDate    = $data['transactionDate'];


if ( $category == "MobileCheckout" && $status == "Success" ) {

  //DB Update -------------------------------------

   

require_once "dashboard/Auth/db/db_connection.php";

 $sauti_request = "insert into sauti_pay(
source,value,provider,providerChannelCode,category,
productName,transactionId,transactionFee,status,
description,providerFee,providerRefId,transactionDate) VALUES(
'$phoneNumber',' $value','$provider','$provider_channel','$category',
'$productname','$transactionid','$transactionfee','$status',
'$description','$providerFee','$providerRefId','$transactionDate')";
  $transaction = mysqli_query($con,$sauti_request);

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

 else {
  //DB Update -------------------------------------




  //send mail -------------------------------------
echo "<h3>No data sent to db</h3>";
 
    }



 ?>

 