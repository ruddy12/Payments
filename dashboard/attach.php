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


if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
 // Loop $_FILES to execute all files
 
}
//include db

include('Auth/db/db_connection.php');

$valid_formats = array( "png","jpeg","jpg","GIF");
$max_file_size = 1024*1000; //100 kb
$path = "img/"; // Upload directory
$count = 0;

//if(isset($_POST['txt_blog'])){
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
  //declare variables
  $title= $_POST['txt_title'];
  $description= $_POST['txt_desc'];
  $url= $_POST['txt_url'];
  $article= $_POST['txt_article'];
  //$_files= $_POST[' files'];
 // $_SESSION['insert_id']=mysqli_insert_id($con);
 // $user_id = $_SESSION['insert_id'];
  //insert into db
  foreach ($_FILES['files']['name'] as $f => $name) {
     if ($_FILES['files']['error'][$f] == 4) {
         continue; // Skip file if any error found
     }
     if ($_FILES['files']['error'][$f] == 0) {
         if ($_FILES['files']['size'][$f] > $max_file_size) {
             $message[] = $mess4;  
            
             echo $mess4= "<span class='badge'>$name is too large!.</span>";
            // echo"<h3>A message has been sent to your friend:</h3>".$email. "";
             continue; // Skip large files
         }
     elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
      $mess3 = "<span class='badge'>$name is not a valid format or have a similar image inserted already</span>";
       $message[] = $mess3;
       echo $mess3;

     // echo "<script>$('#thankyouModal').modal('show')</script>";
       continue; // Skip invalid file formats
     }
         else{ // No error found! Move uploaded files
             if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name)) {
                
                $insert = "insert into tbl_blog(title,description,url,article,name,path)VALUES('$title','$description','$url','$article','$name','$path$name')";
  if (mysqli_query($con,$insert)) {
    
    
              // $query ="insert into image(name,path) values('$name','$path$name')";
               $ros = mysqli_query($con,$query);
               //$_SESSION['insert_id']=mysqli_insert_id($con);
               // $user_id = $_SESSION['insert_id'];
               if($ros!=true)
               {
                $mess="<span class='text-danger'>Error inserting image contact admin, cant connect to db </span>";
                 $message[]= $mess;
                 
                 echo $mess;
                 continue;
               }
               else{
                $success ="<span class='text-success badge'> $name image,Upload successfully</span>";
                echo $success;
               echo $user_id;
               }
               $count++; // Number of successfully uploaded files
             } else {
              $mess2 = "<h2 class='text-danger'>Unable to move file</h2>";
$message[]= $mess2;  
echo $mess2;
           }
         }
     }
 }
  

}
}

 ?>