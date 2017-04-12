<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Blog</title>
		<meta name="description" content="Sautidates Blog" />
		
		 <!-- Bootstrap Core CSS -->
		 <link href="img/favicon.png" rel="shortcut icon" type="image/x-icon">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/agency.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div id="st-container" class="st-container">
			<!-- 	
				example menus 
				these menus will be on top of the push wrapper
			-->
			
			
			<!-- content push wrapper -->
			<div class="st-pusher">
				<!-- 	
					example menus 
					these menus will be under the push wrapper
				-->
				
				<nav class="st-menu st-effect-6" id="menu-6">
					<a class="brand" href="#">
                    <img src="img/logo.png" alt=""></a>
					<ul>
					<div id="st-trigger-effects" class="column">
							<div class="fb-like" data-href="https://www.facebook.com/DatingSitesinKenya/" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>	
				<a href="https://twitter.com/sautidates" class="twitter-follow-button" data-show-count="false" style="margin-top:-35%;">Follow @sautidates</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
						<span class="badge"> Click anywhere on the previous page to go back</span>
						<li><a class="icon icon-data" href="#">Home</a></li>
						<li><a class="icon icon-location" href="#">About Us</a></li>
						<li><a class="icon icon-study" href="#">Sign Up</a></li>
						<li><a class="icon icon-photo" href="#">Login</a></li>
						<li><a class="icon icon-wallet" href="#">Blog</a></li>
						<li><a class="icon icon-wallet" href="404PageNotfound.html">404 Page</a></li>
					</ul>
				</nav>

				
				<div class="st-content"><!-- this is the wrapper for the content -->
					<div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
						<!-- Top Navigation -->
						<div class="codrops-top clearfix" id="myNav" data-spy="affix" style=" top: 0px; z-index: 99; width: 100%; height:10%;">
						
            <!--img src="img/sauti-Dates-PGN-Blog.png" alt=""--></a>
							<div id="st-trigger-effects" class="column">
						<button data-effect="st-effect-6" style="font-size: 1em; margin-top: -1%"> <i class="fa fa-bars"   style="float:left; font-size: 1em;"></i> Menu </button>
							<div class="fb-like" data-href="https://www.facebook.com/DatingSitesinKenya/" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true" data-spy="affix" data-offset-top="205"></div>	
							</div>	
			
					<a href="https://twitter.com/sautidates" class="twitter-follow-button" data-show-count="false" style="margin-top:-35%;" data-spy="affix" data-offset-top="205">Follow @sautidates</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
						<a class="brand" href="#" style="background-color:;">
					
						
						</div>
						<header class="codrops-header" style="margin-top:0%; margin-right: 100%; ">
							<!--h1 class="text-warning" style="margin-right:65%; margin-top: 40%"> Sautidates </h1-->
						</header>
						<div class="row" style="margin-top:6%; margin-left:6%;">
						<div class="col-md-9">
						<div class="panel">
							<h3 class="text-warning"><center>BLOG Archive</center></h3>
							</div>
							<div class="col-md-12">
								
									<?php
							$con = mysqli_connect("localhost", "root", "", "blogs");

						//query
					//select query
						$select = " select * FROM tbl_blog ORDER BY id desc";
					$query = mysqli_query($con, $select);
						while($row=mysqli_fetch_array($query)){ ?>
							<div class="col-md-8">
							<div class="thumbnail">
							<?php
						 echo "<img src='dashboard/$row[img_path]' style='width:100%;height:100%;'>";
							?>					
			
						<div class="caption">
							<?php #$user_id = $_SESSION['insert_id']; ?>
							<h3><?php echo $row['title']; ?></h3>
							<p><?php echo $row['description']; ?></p>
							<p><?php echo $row['Date_posted']; ?></p>
							<p> 
							<div class="fb-share-button" data-href="http://sautidates.com/" data-layout="box_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsautidates.com%2F&amp;src=sdkpreparse">Share</a></div> </p>
							<p><a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=Sautidates" data-size="large">
Tweet</a></p>
	<?php echo "<a href='article2.php?id=$row[id]'><button>Read More</button></a>"; ?>
						</div>
						</div>
						</div>
						<?php } ?>
								</div>
								
						</div>
						<div class="col-md-3">
							<div class="well">
								<button data-toggle="collapse" href="#subscribe" aria-expanded="false" aria-controls="collapseExample" data-loading-text=" <i class='fa fa-hand-o-down" aria-hidden="true'></i>Enter Email Below">Subscribe</button>
								<div id="subscribe" class="collapse">
									<form method="POST" action="mail.php">
								<input type="email" class="form-control" id="inputPassword" placeholder="enter email" name="txt_email" required="">
							<button class="btn btn-warning" name="txt_mail" >Subscribe</button>
									</form>
								</div>

							<button data-toggle="collapse" href="#friend" aria-expanded="false" aria-controls="collapseExample">Email to friend/Lover</button>
								<div id="friend" class="collapse">
									<form method="POST" action="mail.php">
								<input type="email" class="form-control" id="inputPassword" placeholder="enter email" name="txt_email" required="">
									<button class="btn btn-info" name="txt_mail">Send Mail to friend/lover</button>
									</form>
								</div>
							</div>
							<span class="badge">Search By topic</span>
							<button data-toggle="collapse" href="#search" aria-expanded="false" aria-controls="collapseExample" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>Back to blog">Search Filter</button>
							
								<div id="search" class="collapse">
									<div class="panel">
										<form method="POST" action="pay2.php">
											<input type="text" class="form-control" id="inputPassword" placeholder="enter phonenumber" name="txt_pay" required="">
											<br>
											<input type="number" class="form-control" id="inputPassword" placeholder="enter amount" name="txt_amount" required="">
											<br>
											<input type="email" class="form-control" id="inputPassword" placeholder="enter email" name="txt_email" required="">
											<br>
											<button class="btn btn-warning" name="pay">Pay</button><br>
										</form>
									<form method="POST" action="">
										<select class="form-control">
											<?php
						//connect to db
		$con = mysqli_connect("localhost", "root", "", "blogs") or die('cannt connect please contact Admin');

						//select query
						$select = " select * FROM tbl_blog";
					$query = mysqli_query($con, $select);
						while($row=mysqli_fetch_assoc($query)){
						echo "<option value='".$row['id']."' name='".$row['id']."'>".$row['title']."</option>"; 
												} 

											 ?>
										</select>
										
								<button class="btn btn-primary" name="txt_search">Search</button>
								
									</form>
								</div>
								</div>
								<div class="fb-page" data-href="https://www.facebook.com/SautiDates/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SautiDates/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SautiDates/">SautiDates</a></blockquote></div>
								<a class="twitter-timeline" href="https://twitter.com/sautidates">Tweets by sautidates</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
						</div></div> 
						</div>
						
						<div class="col-md-12" id="footer">
						<footer>
							footer
							<h3 style="color:#fff;">
							<i class="fa fa-twitter"></i>
							<i class="fa fa-facebook"></i>
							
							</h3>
							
						</footer>
						</div>
						</div>
						<!--div class="main clearfix" style="margin-right: 35%;">
							
							<div class="column">
								<p>Sidebar menus or off-canvas navigations can be revealed in many creative ways.</p>
								<p>Here is some inspiration for showing them in style using CSS transitions.</p>
							</div>
							<div class="info">
								<p>If you enjoyed this demo you might also like:</p>
								<p><a href="http://tympanus.net/Development/HeaderEffects/">On Scroll Header Effects</a></p>
								<p><a href="http://tympanus.net/Development/PageTransitions/">A Collection of Page Transitions</a></p>
							</div>
						</div--><!-- /main -->
					</div><!-- /st-content-inner -->
				</div><!-- /st-content -->
			</div><!-- /st-pusher -->
		</div><!-- /st-container -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
  <button type="button" class="close" data-dismiss="modal" style="color:#fff; font-size:5em;" ><h2>&times;</h2></button>
    <div class="modal-content">
    	<div class="col-md-12">
    	<div class="thumbnail">
    	<img src="img/banner3.jpg">
    	<div class="caption" style="background-color: #F68d20;">
    	<!--center><p class="text-danger" style="font-size:2em;">Happy New year.</p></center-->
     <center><p class="text-primary" style="font-size:2em;">Subscribe to our Newsletter <span class="text-primary">Below!</span></p></center>
     <form method="POST" action="mail.php">
	<input type="email" class="form-control" id="inputPassword" placeholder="enter email" name="txt_email" required="">
	<center><button class="btn btn-primary btn-lg" name="txt_mail" style="color:#000;" >Subscribe</button></center>
	</form>
     
     </div>
     </div>
     </div>
    </div>
  </div>
</div>


		<script src="js/classie.js"></script>
		<script src="js/sidebarEffects.js"></script>
		 <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!--jquerycookie-->
<script src="js/jquery.cookie.js"></script>
    <!--loading-->
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
    <script type="text/javascript">
$(document).ready(function(){
    $("#myNav").affix({
        offset: { 
            top: $(".header").outerHeight(true)  /* Set top offset equal to header outer height including margin */
        }
    });
});
</script>
<!--facebook live feed-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=975666619202237";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--facebook like-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=975666619202237";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
   $(window).load(function(){
        setTimeout(function(){
       $('#myModal').modal('show');
   }, 180000);
            });
        </script>
        <!--share-->
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=975666619202237";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--twitter js-->
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
<!--script type="text/javascript">
 $(document).ready(function() {
     if ($.cookie(‘pop’) == null) {
         $(‘#myModal’).modal(‘show’);
         $.cookie(‘pop’, ’7′);
     }
 });
</script-->
	</body>
</html>