<?php

//connect to db
include'db/db_connection.php';
//delete using id
$delete_id = $_GET['del'];
$delete_query = "delete from tbl_blog WHERE id = '$delete_id'";
$run = mysqli_query($con, $delete_query);
if ($run) {
  //javascript to open the same window i.e. users.php
	echo "<script>alert('Blog Deleted Succesfully')</script>";
  echo "<script>window.open('../index.php?deleted=Blog has been deleted','_self')</script>";
  
  
}

 ?>