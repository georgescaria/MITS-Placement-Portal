<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';



$filename = "Placed.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$user_query = $mysqli->query("SELECT * from placed");
// Write data to file
$flag = false;
while ($row = mysqli_fetch_array($user_query)) {
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}

?>
