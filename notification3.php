<?php 
$data  = json_decode(file_get_contents('php://input'), true);
print_r($data);

// Process the data...
$category = $data["category"];
$status = $data["status"];

if ( $category == "MobileCheckout" && $status == "Success" ) {

 // We have been paid by one of our customers!!
/* $phoneNumber = $data["source"];
 $value       = $data["value"];
 $account     = $data["clientAccount"];

  $valueArray=explode(' ', $value);
  $valAmt=trim(end($valueArray));   */
  //DB Update -------------------------------------

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


   // manipulate the data as required by your business logic
   // Perhaps send an SMS to confirm the payment using our APIs...
   //include db
   //include "dashboard/Auth/db/db_connection.php";
   //connect to db
  require_once "dashboard/Auth/db/db_connection.php";
/*insert into sauti_pay(transactionid,category,destination,source, value,transactionfee,status,transactionDate) VALUES('ATPid_b9a7200e01dd0c70a3befbf4dfa01ec3','MobileCheckout','Wallet','+254724816442','KES 10.00','KES 0.10','Success','1:42 pm April 11, 2017')*/

  // $mpesa_query ="insert into sauti_pay(transactionid,provider,providerRefId,providerChannelCode,productname,source, value,transactionfee, providerFee,status,transactionDate) VALUES('$transactionid','$provider','$providerRefId','$provider_channel','$productname','$phoneNumber','$value','$transactionfee','$providerFee','$status','$description','$transactionDate')";  
//$mpesa_query ="insert into sauti_pay(source,value,provider,providerChannelCode,productName,transactionId,transactionFee,status,description,providerChannelCode,productName,providerFee,providerRefId,transactionDate)VALUES('$phoneNumber','$value','$provider','$provider_channel','$productname ','$transactionid','$transactionfee','$status','$description','$paybill','$productname','$providerFee','$providerRefId',' $transactionDate')" ;
$sauti_request = "insert into sauti_pay(source,value,provider,providerChannelCode,productName,transactionId,transactionFee,status,productName,providerFee,providerRefId,transactionDate) VALUES('$phoneNumber',' $value ','$provider','$provider_channel','$productname','$transactionid','$transactionfee','$status','$description','$paybill','$productname',$providerFee,$providerRefId,$transactionDate)";

if (mysqli_query($con,$sauti_request)) {

  
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