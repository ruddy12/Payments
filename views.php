<!DOCTYPE html>
<html>
<head>
  <title>POST JOB</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet">
<link href="css/site.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap-wysihtml5.css">




    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
     <link rel="stylesheet" href="css/updateprofile.css">
     <!--link href="css/editors.css" rel="stylesheet"-->
          <style type="text/css">

          .post_jobs{
   height: auto;
  width: 100%;
  padding: 40px 0;
  overflow: hidden;
  color: black;
 /*background-image: url("https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRWX6JKymovdy82Lsj0loepdN_dYNayblulZNvC5BCgH3AO3pRK");*/

}

     </style>
</head>
  <body data-spy="scroll" data-target="#uxt" data-offset="70" class="jumbotron">
<div class="table-scrol">
  <div class="table-responsive">
    <table class="table  table-hover table-striped" style="table-layout:fixed">
      <thead>
        <tr class="success">
         <th>phoneNumber</th>
         <th>value</th>
         <th> Account </th>
         <th>provider </th>
         <th>ProductName </th>
         <th>TransactionID</th>




      </thead>
<?php 

$data  = json_decode(file_get_contents('php://input'), true);
print_r($data);
// Process the data...
$category = $data["category"];
if ( $category == "MobileC2B" ) {
   // We have been paid by one of our customers!!
   $phoneNumber = $data["source"];
   $value       = $data["value"];
   $account     = $data["clientAccount"];
   $provider    = $data['provider'];
   $productname    = $data['productName'];
   $transactionid    = $data['transactionId'];

   // manipulate the data as required by your business logic
   // Perhaps send an SMS to confirm the payment using our APIs...?>
   <tr class='info'>
         
         <td><?php echo $phoneNumber; ?></td>
         <td><?php echo $value; ?></td>
         <td><?php echo $account; ?></td>
         <td><?php echo $provider; ?></td>
         <td><?php echo $productname; ?></td>
         <td><?php echo $transactionid; ?></td>
               </tr>
       
    </table>

   <?php
      } else { 
echo "<center><h2 class='text-danger'>No Response and notifications from Africa Talking's end </h2></center>";
}

?> 

      
         </div>

    </div><!--post-->

  </div><!--panel-->
</body>
</html>