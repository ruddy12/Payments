<?php
//include db
include 'dashboard/Auth/db/db_connection.php';
if(isset($_POST['txt_search'])){
	

//select query
$select= "select * FROM tbl_blog WHERE id like'%$user_id%'";
$search_id = $_user_id;
//query
$query = mysqli($con,$select);

while($row=mysqli_fetch_assoc($query)){
echo "id".$row['id'];
}
}
 ?>