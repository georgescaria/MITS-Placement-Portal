<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if ( $_SESSION['admin_logged_in'] != 1 ) {
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

		$delete_academics = ($mysqli->query("DELETE from approve_academics WHERE college_id='$c_id'"));

		echo "<script> type='text/javascript'    
                 window.location = 'approve_request.php';
              </script>";

       }

    
  
}


?>