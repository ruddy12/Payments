
<?php 

$data  = json_decode(file_get_contents('php://input'), true);
print_r($data);
// Process the data...
$category = $data["category"];
if ( $category == "MobileC2B" ) {
   // We have been paid by one of our customers!!
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
   $paybill    = $data['providerChannelCode'];
   $productname    = $data['productName'];
   $description    = $data['description'];
   $providerFee    = $data['providerFee'];
   $providerRefId    = $data['providerRefId'];
   $transactionDate    = $data['transactionDate'];

   // manipulate the data as required by your business logic
   // Perhaps send an SMS to confirm the payment using our APIs...
   //include db
   include "dashboard/Auth/db/db_connection.php";
   $mpesa_query ="insert into sauti_pay(transactionid,provider,providerRefId,providerChannelCode,productname,source, value,transactionfee, providerFee,status,transactionDate) VALUES('$transactionid','$provider','$providerRefId','$provider_channel','$productname,$phoneNumber','$value','$transactionfee','$providerFee','$status',$description,$transactionDate')";  
         if (mysqli_query($con,$mpesa_query)) {
    
    //send mail

$to = "rufusngash@gmail.com";
$subj = "MPESA TRANSACTION";
// the message
$msg = file_get_contents('templates/mpesa_template.html');

// Set content-type for sending HTML email
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'."\r\n";

// Additional headers
$headers .= 'From: Rufus<teamkariri@karirinjama.co.ke>'."\r\n";

// send email
if(mail($to,$subj,$msg,$headers)){
  echo"<h3>MPESA TRANSACTION COMPLETE:</h3>".$email. "";
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
echo "<center><h2 class='text-danger'>No Response and notifications from Africa Talking's end </h2></center>";
}

?> 

      
         