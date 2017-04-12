<!DOCTYPE html>
<html>
<head>
    <title>Kariri Njama</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <!--favicon-->
       <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32" />

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

   <nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">

      <!-- Brand and toggle get grouped for better mobile display -->
    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
     </button>
      <a class="navbar-brand">
   <a href="register.php"><img  style=" align=left" src="img/logo2.PNG" ></a>

        
      </a>
    </div>
    
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <form role="form" class="form-horizontal" action="super_register.php" method="POST" name="contactform">
            <fieldset>
    
                <legend><center><span class="glyphicon glyphicon-user"></span> Super Admin Credentials <span class="glyphicon glyphicon-user"></span></center></legend>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_name" class="control-label">Full Name</label>
                    </div>
                    <div class="col-md-12">
                        <!--<input class="form-control" name="txt_name" placeholder="Your Full Name" type="text" value="<?php if($error) echo $name; ?>" />-->
                        <input class="form-control" name="txt_name" placeholder="Your Full Name" type="text" />
                       <!-- <span class="text-danger"><?php #if (isset($name_error)) echo $name_error; ?></span>-->
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_email" class="control-label">Email</label>
                    </div>
                    <div class="col-md-12">
                        <!--<input class="form-control" name="txt_email" placeholder="Your Email" type="email" value="<?php #if($error) echo $fromemail; ?>" />-->
                        <input class="form-control" name="txt_email" placeholder="Your Email" type="email" autofocus />
                        <!--<span class="text-danger"><?php #if (isset($fromemail_error)) echo $fromemail_error; ?></span>--> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_email" class="control-label">PhoneNumber</label>
                    </div>
                    <div class="col-md-12">
                        <!--<input class="form-control" name="txt_email" placeholder="Your Email" type="email" value="<?php #if($error) echo $fromemail; ?>" />-->
                        <input class="form-control" name="txt_number" placeholder="phonenumber eg2547..." type="text" autofocus />
                        <!--<span class="text-danger"><?php #if (isset($fromemail_error)) echo $fromemail_error; ?></span>--> 
                    </div>
                </div>
              
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_subject" class="control-label">Password</label>
                    </div>
                    <div class="col-md-12">
                        <!--<input class="form-control" name="txt_pass" placeholder="Your Password" type="password" value="<?php #if($error) echo $pass; ?>" />-->
                        <input class="form-control" name="txt_pass" placeholder="Your Password" type="password" />
                        <!--<span class="text-danger"><?php #if (isset($pass_error)) echo $pass_error; ?></span>-->
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_subject" class="control-label">Confirm Password</label>
                    </div>
                    <div class="col-md-12">
                        <!--<input class="form-control" name="txt_pass" placeholder="Your Password" type="password" value="<?php #if($error) echo $pass; ?>" />-->
                        <input class="form-control" name="confirm_pass" placeholder="confirm Password" type="password" />
                        <!--<span class="text-danger"><?php #if (isset($pass_error)) echo $pass_error; ?></span>-->
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-12">
                       <!-- <input name="submit" type="submit" class="btn btn-primary" value="Register" />-->
                         <input class="btn btn-lg btn-primary btn-block" type="submit" value="Register Super Admin" name="register" style="font-size:1.25em;" >

                    </div>
                </div>
            </fieldset>
            </form>
           <?php #if (isset($alertmsg)) { echo $alertmsg; } ?>
            <center><b>Already registered ?</b> <br></b><a href="super_login.php" style="font-size:1em;">Login here</a></center><!--for centered text-->
        </div>
    </div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</body>
</html>
<?php

include("db/db_connection.php");//make connection here

    //set validation error flag as false
   # $error = false;
    //check if form is submitted
    
    if (isset($_POST['register']))
    {
        $name = $_POST['txt_name'];
        $user_email = $_POST['txt_email'];
        $number = $_POST['txt_number'];
        $pass = $_POST['txt_pass'];
        $confirm_pass = $_POST['confirm_pass'];
      

        

        if ($name=='') {
            
            echo "<script>alert('Please enter your full name')</script>";
            exit();
        }
      
        if (empty($user_email)) {
            echo "<script>alert('Please Enter your email')</script>";
            exit();
        }
        if (empty($number)) {
            echo "<script>alert('Please Enter your Number')</script>";
            exit();
        }

        if(empty($pass))
        {
            
            echo "<script>alert('Please enter your password')</script>";
            exit();
        }
        if ($pass != $confirm_pass) {
        echo"<script>alert('Error... Passwords do not match')</script>";
            exit();

                 }
        
       


    $check_email_query="select * from users WHERE email=' $user_email '";
    $run_query=mysqli_query($con,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
       $welcome="<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";
 
        echo $welcome;

    }
//insert the user into the database.

    $insert_user="insert into users (name,email,number,password) VALUES ('$name','$user_email','$number',md5('$pass'))";

    if(mysqli_query($con,$insert_user))
    {
       

          $login = "<script>window.open('super_login.php','_self')</script>";        
        echo $login;
        
          
    }
    
     

    }
?>

