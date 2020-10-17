<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
   
}
?>


<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>MITS | <?= $name?> </title>
  <link rel="shortcut icon" href="http://d15dxvojnvxp1x.cloudfront.net/assets/favicon.ico">
  <?php include 'css/css.html'; ?>

</head> 

<header>

      <div class="container">
        <div id="branding">
          <h1><span class="highlight">MITS</span> Placement Portal </h1>
        </div>
        <nav>
          <ul>
            <!--li><img src="add_child.png" width="200" height="142"></li-->
            <li ><a href="adminuser.php"><?= $name?></a></li>
            <li><a href="index.php"><img src="img/logout.png" width="17" height="17"></a></li>

          </ul>
        </nav>
      </div>
    </header>
<body id="addbackground">
 <section id="boxes">
      <div class="container">
        <div class="box">
          <img src="./img/plus_image.png">
          <div class="overlay">
               <img class="hoverimg" src="./img/plus_image.png">
          <div class="text"><a href="addplacement.php">NEW</a></div>
        
          </div>
            <p>Add new placement information</p>
        </div>
        <div class="box">
          <img src="./img/placement_info.png">
         <div class="overlay">
          <img class="hoverimg" src="./img/placement_info.png">
          <div class="text"><a href="userplacement.php">VIEW </a></div>
       
          </div>
          <p>View placement statistics</p>
        </div>
         <div class="box">
          <img src="./img/test.png">
         <div class="overlay">
          <img class="hoverimg" src="./img/test.png">
          <div class="text"><a href="userplacement.php">TEST</a></div>
       
          </div>
          <p>Create or manage tests</p>
        </div>
         
     
      </div>
    </section>

</body>



    </html>