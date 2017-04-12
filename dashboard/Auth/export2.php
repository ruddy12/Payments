<?php
// Database Connection

$host="localhost";
$uname="root";
$pass="";
$database = "blogs"; 

$connection=mysql_connect($host,$uname,$pass); 

if(!$connection){
	echo "<script>window.open('404PageNotfound.html','_self')</script>";
}

//or die("Database Connection Failed");
$selectdb=mysql_select_db($database) or 
die("Database could not be selected"); 
$result=mysql_select_db($database)
or die("database cannot be selected <br>");

// Fetch Record from Database

$output = "";
$table = "sauti_pay"; // Enter Your Table Name 
$sql = mysql_query("select * from $table");
$columns_total = mysql_num_fields($sql);

// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= '"'.$heading.'",';
}
$output .="\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .='"'.$row["$i"].'",';
}
$output .="\n";
}

// Download the file

$filename = "SautidatesMpesa_Transactions.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

//Back to dashboard
#echo "<script>window.open('../voters.php','_self</script>";

?>