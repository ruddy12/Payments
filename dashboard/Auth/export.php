<?php
// Connection 
include 'db/db_connection.php';
//$conn=mysql_connect('localhost','root','');
//$db=mysql_select_db('excel',$conn);

$filename = "SautidatesMpesaTransactions.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$user_query = mysqli_query('select source,value from sauti_pay ORDER by id desc');
// Write data to file
$flag = false;
while ($row = mysqli_fetch_assoc($user_query)) {
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
?>