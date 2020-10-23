<?php


require 'db.php';
session_start();
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$username="";
$username = $_POST['username'];

$result = $mysqli->query("SELECT * FROM users WHERE college_id='$username'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'],$user['password']) && (!strcasecmp($user['usertype'], 'admin'))) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['profilepic'] = $user['profilepic'];
        $_SESSION['usertype'] = $user['usertype'];
        $_SESSION['college_id'] = $user['college_id'];
        $_SESSION['branch'] = $user['branch'];
        $_SESSION['password'] =$user['password'];
  //      $_SESSION['active'] = $user['active'];
        
        // This is how we'll know the user is logged in
  //      $_SESSION['logged_in'] = true;
        $_SESSION['admin_logged_in'] = 1;
        
        header("location: adminuser.php");
    }

    else if ( password_verify($_POST['password'],$user['password']) && (!strcasecmp($user['usertype'], 'faculty'))) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['profilepic'] = $user['profilepic'];
        $_SESSION['usertype'] = $user['usertype'];
        $_SESSION['college_id'] = $user['college_id'];
        $_SESSION['branch'] = $user['branch'];
  //      $_SESSION['active'] = $user['active'];
        
        // This is how we'll know the user is logged in
  //      $_SESSION['logged_in'] = true;
        $_SESSION['faculty_logged_in'] = 1;
        
        header("location: facultyuser.php");
    }

    else if ( password_verify($_POST['password'], $user['password']) && (!strcasecmp($user['usertype'], 'student'))) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['profilepic'] = $user['profilepic'];
        $_SESSION['usertype'] = $user['usertype'];
        $_SESSION['college_id'] = $user['college_id'];
        $_SESSION['branch'] = $user['branch'];
        $_SESSION['batch'] = $user['batch'];
  //      $_SESSION['active'] = $user['active'];
        
        // This is how we'll know the user is logged in

        $_SESSION['student_logged_in'] = 1;
        
        header("location: studentuser.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

