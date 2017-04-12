<?php
session_start();
 if(!$_SESSION['email']){
  header('location: Auth/login.php');
} 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Editor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
  <link href="img/favicon.png" rel="shortcut icon" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <!--img src="img/logos/logo2.PNG"-->
                   <h1 style="color:white;">Sautidates Blog's Editor</h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form" style="color:white; font-size: 2em;">
	                       
	                      <h3> <?php
                        echo $_SESSION['email'];
                        ?></h3>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          
	                          <!--li><a href="login.html">Logout</a></li-->
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index2.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="calendar.html"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics</a></li>
                    <li><a href="voters.php"><i class="glyphicon glyphicon-list"></i> Comments from Blog </a></li>
                    <li class="current"><a href="editors.php"><i class="glyphicon glyphicon-pencil"></i> Websit's Editors</a></li>
                                    </ul>
             </div>
		  </div>
		  <div class="col-md-10">

      <div id="success" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="col-md-12">
      <div class="thumbnail">
      <img src="https://s-media-cache-ak0.pinimg.com/736x/ef/51/fd/ef51fd136b9e359549ceef3673b0dc31.jpg">
      <div class="caption">
      <center><p class="text-warning" style="font-size:2em;"> Blog added Successfully
      </center>


     <center><a href="index.php"><button class="btn btn-warning btn-lg">Back</button></a></center>
     </div>
     </div>
     </div>
    </div>
  </div>
</div>

</div>
<!--div id="error" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="col-md-12">
      <div class="thumbnail">
      <img src="https://s-media-cache-ak0.pinimg.com/736x/bb/1a/6a/bb1a6aaba320bacb96cbdf94d1eb6687.jpg"
      <div class="caption">
      <center><p class="text-danger" style="font-size:2em;">
      POST FAILED 
      </center>
    

     <center><a href="editors.php"><button class="btn btn-danger btn-lg">Back</button></a></center>
     </div>
     </div>
     </div>
    </div>
  </div>
</div-->


        <div class="content-box-large">
          <div class="heading">
          <div class="title"><h2 style="text-align:center;"></h2></div>
          
         
        </div>
        <div class="">
        <?php
//$user_id = $_SESSION['id'];

    // $email=$_SESSION['id'];
    // echo $email;
    // if(!$_SESSION){
    //   header("location: mkonnect/login.php");
    // }
        //include db 
       include 'Auth/db/db_connection.php';
       // $user_id =$_SESSION['id'];
        //$con = mysqli_connect("localhost", "root", "", "blogs");
       $valid_formats = array( "png","jpeg","jpg","GIF");
$max_file_size = 1024*1000; //100 kb
$path = "img/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
 // Loop $_FILES to execute all files
  $title = $_POST['txt_title'];
  $desc= $_POST['txt_desc'];
  $url= $_POST['txt_url'];
  $article = $_POST['txt_article'];
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
                
               $query ="insert into tbl_blog(title,description,url,article,img_name,img_path) values('$title','$desc','$url','$article','$name','$path$name')";
               $ros = mysqli_query($con,$query);
               $_SESSION['insert_id']=mysqli_insert_id($con);
                $user_id = $_SESSION['insert_id'];
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
}?>
      
        <form action="" method="post" enctype="multipart/form-data">
          
      <!--input type="submit" value="Upload your C.V." class="btn btn-warning" style="margin-top: 1%; font-size: 1.4em;"-->
      </form>
        <form method="post" enctype="multipart/form-data">
          <div class="col-md-6">
            <div class="form-group">
            <label class="control-label" style="color:black;"><h3 class="text-warning">upload image</h3></label>
       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #f0ad4e;">Valid Formats</span>&nbsp;&nbsp;<span class="" > "png","jpeg"</span>
      <input id="input-6" type="file" name="files[]" multiple="multiple" style="color:#000;">
            <label for="email" class="control-label" style="margin-top:4%;">Blog title</label>
              <input type="text" class="form-control" name="txt_title" placeholder="Blog Title" style="margin-bottom:2%; margin-top:4%;">
              <label for="email" class="control-label">Blog's Short Description</label>
               <textarea class="form-control" rows="5" id="comment" name="txt_desc"></textarea>
               <label for="email" class="control-label" style="margin-top:4%;">Blog's URL</label>
              <input type="text" class="form-control" name="txt_url" placeholder="Blog url" style="margin-top: 4%;">
            </div>
            
          <div class="panel-body">
            <textarea id="tinymce_full" name="txt_article"></textarea>
          </div>
          <center><button class="btn btn-success btn-block" name="txt_blog" style="margin-bottom: 4%;">POST BLOG</button></center><br>
        </div>
        </div>
        </form>
        </div>  
        <div class="col-md-12">
          
        
   <div class="table-scrol">
  <div class="table-responsive">
    <table class="table table-hover table-striped" style="table-layout:fixed">
      <thead>
        <tr class="info">
         <th>Blog Id</th>
            <th>Blog Title</th>
            <th>Blog Description</th>
            <th>Blog URL</th>
            <th>Article</th>
            <th>Image Name</th>
            <th>Image url</th>
            <th>Date Posted</th>
          <th>Delete User</th></tr>
      </thead>
      <?php
      //connect to db
      include 'Auth/db/db_connection.php';
      
      //select query to view users
      $view_users_query = " select * from tbl_blog ORDER BY id desc";
      //run the sql query

      $run = mysqli_query($con, $view_users_query);

      //while fetches  the result and store in an array row

      while ($row = mysqli_fetch_array($run)) {
        
        $blog_id = $row[0];
        $blog_title = $row[1];
        $blog_desc = $row[2];
        $blog_url = $row[3];
        $blog_article= $row[4];
        $blog_img= $row[5];
        $blog_img_url= $row[6];
        $blog_post= $row[7];

       ?>
       <tr>
         <!-- show those results in the table -->
         <td><?php echo $blog_id; ?></td>
         <td><?php echo $blog_title; ?></td>
         <td><?php echo $blog_desc; ?></td>
         <td><?php  echo $blog_url; ?></td>
         <td><?php echo $blog_article ?></td>
         <td><?php echo $blog_img ?></td>
         <td><?php echo $blog_img_url ?></td>
         <td><?php echo $blog_post; ?></td>
        
         <td><a href="delete.php?del=<?php echo $blog_id ?>"><button class="btn btn-danger">Delete Post</button></a></td>
       </tr>
       <?php } ?>
    </table>
  </div>
</div>
</div>

    </div>

    

     <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

    <script src="vendors/ckeditor/ckeditor.js"></script>
    <script src="vendors/ckeditor/adapters/jquery.js"></script>

    <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/editors.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
       This must be loaded before fileinput.min.js -->
  <script src="js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
  <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
       This must be loaded before fileinput.min.js -->
  <script src="js/plugins/sortable.min.js" type="text/javascript"></script>
  <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
       This must be loaded before fileinput.min.js -->
  <script src="js/plugins/purify.min.js" type="text/javascript"></script>
  <!-- the main fileinput plugin file -->
  <script src="js/fileinput.min.js"></script>
   <script>
    $(document).on('ready', function() {
        $("#input-6").fileinput({
            showUpload: false,
            maxFileCount: 6,
            mainClass: "input-group-lg"
        });
    });

  </script>

  </body>
</html>