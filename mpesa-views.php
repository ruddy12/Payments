<!DOCTYPE html>
<html>
<head>
  <title>views</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <!-- Bootstrap -->
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

  <div class="jumbotron">
  <div class="col-md-12">
    <ul class="breadcrumb">
 
 <li> <center><a href="print.php"><button class="btn btn-success" >Want to Print? </button></a></center> </li>
<!--<li> <center><button class="btn btn-warning" onclick="printContent('div3')">Print Content</button></center> </li>-->
 <li> <center><a href="dashboard/Auth/export2.php"><button class="btn btn-danger">EXPORT To Excel</button></a></center> </li>
 <li> <center><a href="dashboard/Auth/export-pdf.php"><button class="btn btn-danger">EXPORT To PDF</button></a></center> </li>
  </ul>
  </div><!--col-md-12-->
</div><!--jumbotron-->
<div class="jumbotron">
  
<div clas="col-md-12">
<div class="table-scrol">
  <div class="table-responsive">
 
    <table class="table table-bordered" style="table-layout:fixed">
      <thead>
       
           <th class="success">Id</th>
            <th class="success" style="width:15%">transactionid</th>
            
            <th class="success" style="width:8%;">Provider</th>
            <th class="success" style="width:9%;">providerRefId</th>
            <th class="success">PayBill</th>
            <th class="success" style="width:8%;">Productname</th>
            <th class="success" style="width:9%">PhoneNumber</th>
            <th class="success">Amount</th>
            <th class="success" style="width:7%;">Transaction fee</th>
            <th class="success" style="width:8%">ProviderFee</th>
            <th class="success">Status</th>
            <th class="success" style="width:8%;">Description</th>
            <th class="success" style="width:8%;">Transaction Date</th></tr>
         
          
      </thead>
      <?php
      //connect to db
      //connect to db
      include 'dashboard/Auth/db/db_connection.php';

      //select query to view users
      $selectquery = " select * from sauti_pay ORDER BY id desc limit 10";
      //run the sql query

      $run = mysqli_query($con, $selectquery);

      //while fetches  the result and store in an array row

      while ($data = mysqli_fetch_array($run)) {
        $user_id=$data['id'];
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

       
      

       ?>
      
       <tr>
       
         <!-- show those results in the table -->
         <td class=""><?php echo $user_id; ?></td>
         <td class=""><?php echo $transactionid; ?></td>
        
         <td class=""><?php echo $provider; ?></td>
         <td class=""><?php echo $providerRefId; ?></td>
         <td class=""><?php echo $provider_channel; ?></td>
         <td class=""><?php echo $productname; ?></td>
         <td class=""><?php echo $phoneNumber; ?></td>
         <td class=""><?php echo $value; ?></td>
         <td class=""><?php echo  $transactionfee; ?></td>
         <td class=""><?php echo $providerFee; ?></td>
         <td class=""><?php echo $status; ?></td>
         <td class=""><?php echo $description; ?></td>
         <td class=""><?php echo $transactionDate; ?></td>
        
        
        <!--td><a href="deleteadmin.php?del=<#?php echo $admin_id ?>"><button class="btn btn-warning">Delete Admin</button></a></td>-->
       </tr>
       <?php } ?>
    </table>
  </div>
</div>
</div><!--col-md-12 -->

<!--<div class="col-md-8">
  <div class="jumbotron">
    <h1>My page</h1>
<div id="div1">DIV 1 content...</div>
<button onclick="printContent('div1')">Print Content</button>
<div id="div2">DIV 2 content...</div>
<button onclick="printContent('div2')">Print Content</button>
<p id="p1">Paragraph 1 content...</p>
<button class="btn btn-warning" onclick="printContent('p1')">Print Content</button>
  </div>
</div>-->

</div><!--well -->

<!-- print part of a page witha specified div-->
<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>
<script>
function mustard() {
    window.print();
}
</script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
