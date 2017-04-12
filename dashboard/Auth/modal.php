<?php
session_start();//session starts here

?>



<!DOCTYPE html>
<html>
<head>
    <title>Mustard Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
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
   <a href="../index.html"> <img  style="width:160px; height: 35px; align=left;" src="../img/musstardssed.png" style="float:center;     margin-left: calc(45% - 2em - 50px);" ></a>

        
      </a>
    </div>
    
  </div><!-- /.container-fluid -->
</nav>
<section>

<div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#account">APPLY</button>

  <!-- Modal -->
  <div class="modal fade" id="account" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center><span class="glyphicon glyphicon-pencil"></span>Job Application</center></h4>
        </div>
        <div class="modal-body">

            <div class="row">
            <div class="col-md-12">
                    <div class="col-md-6 col-md-offset-3 well">
                       <form role="form" class="form-horizontal" action="register.php" method="POST" name="contactform">
            <fieldset>
    
                <legend><center> <span class="glyphicon glyphicon-user"></span></center> <center> APPLY THE JOBS ABOVE</center> <center><span class="glyphicon glyphicon-user"></span></center> </legend>

                <div class="form-group">
                    
                    <div class="col-md-12">
                        
                        <input class="form-control" name="txt_name" placeholder="Your Full Name" type="text" />
                                           </div><!--col-md-12-->
                </div><!--form-group-->

                <div class="form-group">
                    
                    <div class="col-md-12">
                        
                        <input class="form-control" name="email" placeholder="Your Email" type="email" autofocus />
                        
                    </div><!--form-group-->
                </div><!--form-group-->

                <div class="form-group">
                    
                    <div class="col-md-12">
                        
                        <input class="form-control" name="txt_number" placeholder="Your Phone Number eg. +2547..." type="text" />
                        
                    </div><!--col-md-12-->
                </div><!--form-group-->
              
                <div class="form-group">
                    
                    <div class="col-md-12">
                        
                        <input class="form-control" name="txt_pass" placeholder="Your Password" type="password" />
                        
                    </div><!--col-md-12-->
                </div><!--form-group-->
                 <div class="form-group">
                    
                    <div class="col-md-12">
                        
                        <input class="form-control" name="confirm_pass" placeholder="confirm Password" type="password" />
                    </div><!--col-md-12-->
                </div><!--form-group-->

                <div class="form-group">
                  
                  <div class="col-md-12">
                    
                     <select class="form-control" name="txt_jobs" value="">
                    
                              <option>Accountant</option>
                              <option>Clerk</option>
                              <option>Cashier</option>
                              <option>Banker</option>

                            </select>

                  </div><!--col-md-12-->

                </div><!--form-group-->
                
                <div class="form-group">
                    <div class="col-md-12">
                       
                         <input class="btn btn-lg btn-warning btn-block" type="submit" value="Register" name="register" style="font-size:1.25em;" >

                    </div><!--col-md--12-->
                </div><!--form-group-->
            </fieldset>
            </form>
        </div><!--col-md--12-->
        </div><!--col-md-12-->
        </div><!--row-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</section>
        

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</body>
</html>
