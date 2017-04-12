<?php

//connect to db
include'db/db_connection.php';
//delete using id
$delete_id = $_GET['del'];
$delete_query = "delete from user WHERE id = '$delete_id'";
$run = mysqli_query($con, $delete_query);
if ($run) {
  //javascript to open the same window i.e. users.php
	echo "<script>alert('Blog Deleted Succesfully')</script>";
  echo "<script>window.open('../voters.php?deleted=user has been deleted','_self')</script>";
  
  
}

 ?>