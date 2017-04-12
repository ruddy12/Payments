<?php
session_start();//session starts here

?>

<!DOCTYPE html>
<html>
<head>

	<title>Admin Login</title>
	<!--responsive-->
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	 <!--favicon-->
       <link rel="icon" type="image/png" href="img/favicon.PNG" sizes="32x32" />

    <!--jequery-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

<header>
	
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
      <a class="navbar-brand" >
      	<a href="register.php"><img  style=" align=left" src="img/favicon.PNG" ></a>
      	
      </a>
    </div>
    

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="navbarCollapse">
    
      <ul class="nav navbar-nav navbar-right" style="font-size:1.2em;">
        
        <li class="active"><a href="register.php">Register</a></li>
        
      </ul>
       
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</header>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 well">
			<form role="form" class="form-horizontal" action="login.php" method="POST" name="contactform">

				<fieldset>
					<legend> <center><span class="glyphicon glyphicon-user"></span>ADMIN Login <span class="glyphicon glyphicon-user"></span></center> </legend>

			
						<div class="form-group">

						<div class="col-md-12">
							
							<label for="email" class="control-label">Email</label>

						</div><!--col-md-12-->

						<div class="col-md-12">
							
							<input type="email" name="email" placeholder="Enter email" class="form-control" value="<?php if(isset($email_error)) echo $email_error; ?>">

						</div><!--col-md-12-->

						</div><!--form-group-->

						<div class="form-group">

						<div class="col-md-12">
							
							<label for="password" class="control-label">Password</label>

						</div><!--col-md-2-->

						<div class="col-md-12">
							
							<input type="password" name="password" placeholder="Enter Password" class="form-control" value="<?php if(isset($password)) echo $password; ?>">

						</div><!--col-md-12-->

						</div><!--form-group-->

						<div class="form-group">
                  <div class="col-md-12">
                     <div class="checkbox">
               <label><input type="checkbox" name="re"> Remember me</label>
                    </div><!--checkbox-->
                  </div><!--col-md-12-->
                </div><!-- form-group-->
	

						<div class="form-group"

							<div class="col-md-12">

							
							<center><button class="btn btn-sm btn-success btn-block" name="login" type="submit" value="<?php if(isset($success)) echo $success; elseif(isset($log_error)) echo $log_error; ?>" style="font-size:1.25em;">Login</button></center>

							</div><!--col-md-12-->

						</div><!--form-group-->

						
					
				</fieldset>


			</form>
		</div><!--row-->
		</div><!--well-->
	</div><!--container-->
</section>


</body>
</html>

<?php

include 'db/db_connection.php';

//declare varialbes

if (isset($_POST['login'])) {
	
	
	$user_email = $_POST['email'];
	$pass = $_POST['password'];
	$remember = $_POST['re'];

	//encrypt password

	$pass = md5($pass);


	$error = false;

	//Validation


	if (empty($user_email)) {
		
		#$error = true;
		#echo $email_error='<span class="text-danger">Please Enter Email<br></span>';
		
		echo $email_error ='<div class= "alert alert-danger alert-small" role="alert"> <center> Please Enter your Email </center> <br> </div> '; 
		#echo "<script>alert('Please Enter your email')</script>";
		exit();
	}

	if (empty($pass)) {
		
		#echo "<script>alert('Please Enter Your Password')</script>";
		echo $password ='<div class= "alert alert-danger alert-small" role="alert"> <center> Please Enter your password </center> <br> </div> ';
		#echo $password='<span class="text-danger">Please Enter Password <br></span>';
		exit();
	}


	//set remember for 1hr if remember is on

	if ($remember &&  $remember == 'on') {
		
		setcookie("email", $user_email, time()+(20*60*1));
        setcookie("password", $pass, time()+(20*60*1));

	}

	//remember me not checked
        else{
        	session_start();

					$_SESSION['email'] = $user_email;
					$_SESSION['password'] = $pass;
         
            }

            //query db to check user's credentials

            $check = " Select * from users WHERE email = '$user_email' AND password = '$pass' ";

            // run query

            $run = mysqli_query($con, $check);

            //get number of rows n run query

            if (mysqli_num_rows($run)) {

            	$success = " <div class=' alert alert-success alert-small role= alert'><center>Login Succesful</center></div> ";

            	echo $success;

            	$welcome="<script> window.open('../index.php', '_self'); </script>";

            	echo $welcome;

            	//here session is used and value of $user_email store in $_SESSION.

      		  $_SESSION['email']=$user_email;
            	

            }

            else {

            	



            	$log_error = " <div class=' alert-danger alert-small role=' alert'> <center> Login Failed,please check your credentials correctly and try again</center> </div>"; 

            	echo $log_error;

            	//sleep 5seconds
            	sleep(20);

            	//redirect page

            	 $refresh="<script>window.location.replace('login.php' ,'_self')</script>";
            	 sleep(20);  

            	 echo $refresh;
            }



	
}


 ?>


