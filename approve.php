<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if (!isset( $_SESSION['admin_logged_in'] ) && !isset($_SESSION['faculty_logged_in'])) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $usertype = $_SESSION['usertype'];
    $college_id = $_SESSION['college_id'];
    $branch = $_SESSION['branch'];
//    $batch = $_SESSION['batch'];



if (isset($_GET['college_id'])) 
       {
        $c_id=$_GET['college_id'];

        $academics = ($mysqli->query("SELECT * from approve_academics WHERE college_id='$c_id'"))->fetch_assoc();

        

        $mark_10th=$academics['10th_mark'];
        $mark_12th=$academics['12th_mark'];
        $s1=$academics['s1'];
        $s2=$academics['s2'];
        $s3=$academics['s3'];
        $s4=$academics['s4'];
        $s5=$academics['s5'];
        $s6=$academics['s6'];
		$s7=$academics['s7'];
		$s8=$academics['s8'];
		$cgpa=$academics['CGPA'];
		$backlogs=$academics['backlogs'];


		$update = ($mysqli->query("UPDATE user_academics set 10th_mark='$mark_10th',12th_mark='$mark_12th',s1='$s1',s2='$s2',s3='$s3',s4='$s4',s5='$s5',s6='$s6',s7='$s7',s8='$s8',CGPA='$cgpa',backlogs='$backlogs' where college_id='$c_id'"));

		$delete_academics = ($mysqli->query("DELETE from approve_academics WHERE college_id='$c_id'"));

		echo "<script> type='text/javascript'    
                 window.location = 'approve_request.php';
              </script>";

       }

    
  
}


?>