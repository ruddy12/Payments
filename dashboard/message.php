<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thanks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--favicon-->
       <link rel="icon" type="image/png" href="https://karirinjama.co.ke/img/favicon/favicon-32x32.png" sizes="32x32" />
</head>
<body>

<div class="container">
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="col-md-12">
      <div class="thumbnail">
      <img src="https://karirinjama.co.ke/img/thanks/thanks.jpg">
      <div class="caption">
      <center><p class="text-danger" style="font-size:2em;">Happy New year.</p></center>
     <center><p class="text-warning" style="font-size:1.7em;">You are signed in now!</p></center>
     
      <p><center><img src="https://karirinjama.co.ke/img/thanks/njamasasa.jpg" class="img-responsive"></center></p>
     <center><a href="index.php"><button class="btn btn-primary btn-lg">Back</button></a></center>
     </div>
     </div>
     </div>
    </div>
  </div>
</div>
  
</div>

</body>
</html>



<?php

//include db

include('Auth/db/db_connection.php');

if(isset($_POST['txt_blog'])){
  //declare variables
  $title= $_POST['txt_title'];
  $description= $_POST['txt_desc'];
  //$url= $_POST['txt_url'];
  $article= $_POST['txt_article'];
  //$_SESSION['insert_id']=mysqli_insert_id($con);
 // $user_id = $_SESSION['insert_id'];
  //insert into db
  $insert = "insert into tbl_blog(title,description,article,user_id)VALUES('$title','$description','$article','$user_id')";
  if (mysqli_query($con,$insert)) {
    
     // echo "<script> $('#myModal').modal('show');</script>";
    echo "<script>alert('blog updated successfully')</script>";
    //refresh page
    //echo "<script>alert('$user_id')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    
  }
  else {
    echo "<script>alert('update failed check ur code')</script>";
    //refresh page
    echo "<script>window.open('index.php','_self')</script>";
  }

}

 ?>