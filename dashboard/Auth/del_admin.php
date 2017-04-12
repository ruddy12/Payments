<?php

//connect to db
include'db/db_connection.php';
//delete using id
$delete_id = $_GET['del'];
$delete_query = "delete from users WHERE id = '$delete_id'";
$run = mysqli_query($con, $delete_query);
if ($run) {
  //javascript to open the same window i.e. users.php
echo "<script>alert('Admin Deleted Succesfully')</script>";

  echo "<script>window.open('../admin_users.php?deleted=user has been deleted','_self')</script>";
  //sleep(5);
  
}

 ?>