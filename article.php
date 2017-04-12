<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
//elect query
$con = mysqli_connect("localhost", "root", "", "blogs");
            $select = " select * FROM tbl_blog ORDER BY id desc limit 4";
          $query = mysqli_query($con, $select);
            while($row=mysqli_fetch_array($query)){ ?>
              <div class="col-md-3">
              <div class="thumbnail">
              <?php
             echo "<img src='dashboard/$row[img_path]' style='width:100%;height:100%;'>";
              ?>          
      
            <div class="caption">
              <?php #$user_id = $_SESSION['insert_id']; ?>
              <h3><?php echo $row['title']; ?></h3>
              <p><?php echo $row['article']; ?></p>
              <p><?php echo $row['Date posted']; ?></p>
              <p> 
              <div class="fb-share-button" data-href="http://sautidates.com/" data-layout="box_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsautidates.com%2F&amp;src=sdkpreparse">Share</a></div> </p>
              <p><a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=Sautidates" data-size="large">
Tweet</a></p>
  <?php echo "<a href='article2.php?id=$row[id]'>Read More</a>"; ?>
            </div>
            </div>
            </div>
            <?php } ?>
                </div>
                </body>
                </html>


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      