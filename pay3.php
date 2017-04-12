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
     <center><h3>Data has been insert into sauti_pay successfully </h3></center>
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
$phoneNumber = $_POST['txt_phonenumber'];
$value = $_POST['txt_value'];
$transactionid = $_POST['txt_transactionid'];
$provider= $_POST['txt_provider'];
$providerRefId= $_POST['txt_providerrefid'];
$provider_channel= $_POST['txt_provider_channel'];
$productname= $_POST['txt_productname'];
$transactionfee= $_POST['txt_transactionfee'];
$providerFee= $_POST['txt_providerFee'];
$status= $_POST['txt_status'];
$description= $_POST['txt_description'];
$transactionDate= $_POST['txt_transactionDate'];

//$sauti_request = "insert into sauti_incoming(msidn,amount,email) VALUES('$pyment','$doh','$sauti_mail')";
  $mpesa_query ="insert into sauti_pay(transactionid,provider,providerRefId,providerChannelCode,productname,source, value,transactionfee, providerFee,status,transactionDate) VALUES('$transactionid','$provider','$providerRefId','$provider_channel','$productname','$phoneNumber','$value','$transactionfee','$providerFee','$status','$description','$transactionDate')";  

  if (mysqli_query($con,$mpesa_query)) {

echo "<script> $('#friend').modal('show');</script>";

}
else{
  echo "<h3>No data inserted<h3>";
}
}