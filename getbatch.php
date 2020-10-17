<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>MITS | Placements</title>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
  <?php include 'css/css.html'; ?>


</head>

<style type="text/css">

#wrapper {
  display: block;
  width: auto;
  background: #eeeeee;

  margin-bottom:20px; 

  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}
</style>



<body>

<?php

$q = intval($_GET['q']);

if($q=='100')
    {   $result=$mysqli->query("SELECT * FROM placed ");
    }
    else
    {
$result=$mysqli->query("SELECT * FROM placed where batch like '%".$q. "%'");
}

?>




<table id="keywords" cellspacing="0" cellpadding="0">
<thead>
<tr>
<th><span>College id</span></th>
<th><span>Name</span></th>
<th><span>Batch</span></th>
<th><span>Package(lakh/annum)</span></th>
<th><span>Company</span></th>
</tr>
</thead>

<tbody>
<?php while($row = mysqli_fetch_array($result)) { ?>

    <td> <?php echo $row['college_id'] ?> </td>
    <td> <?php echo $row['student_name'] ?> </td>
    <td> <?php echo $row['batch'] ?> </td>
    <td> <?php echo $row['salary_package'] ?> </td>
    <td> <?php echo $row['company'] ?> </td>
   </tr>

<?php
}
?>
</tbody>
</table>



</body>
</html>