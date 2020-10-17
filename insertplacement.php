
<?php
$con=mysqli_connect("localhost","root","","placement");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$batch=$_POST['batch'];
$college_id=$_POST['college_id'];
$name=$_POST['student_name'];
$company=$_POST['company'];
$salary=$_POST['salary'];
// Perform queries 
mysqli_query($con,"INSERT INTO placed (college_id,student_name,company,salary_package,batch) values ('$college_id','$name','$company','$salary','$batch')");

header("location: addsuccess.php");  

mysqli_close($con);






?>

