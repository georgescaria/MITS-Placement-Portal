<?php

require 'db.php';
session_start();
$display_login=0;


       if(isset($_SESSION['student_logged_in']))
          {

                     echo "<script>   window.location = 'studentuser.php';  </script>";
           }

        else if(isset($_SESSION['admin_logged_in']))
           {
                      echo "<script>   window.location = 'adminuser.php';  </script>";
           }




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>MITS CSE | Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="author" content="George Scaria">


    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="css/search.css" />


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="typeahead.min.js"></script>






<script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>


<style type="text/css">

body, html {
  height: 100%;
}




footer {
  text-align: center;
  height: 50px;
  background: black;
  color: gray;
}

footer:before {
  content: "";
  display: inline-block;
  vertical-align: middle;
  width: 0;
  height: 100%;
  min-height: inherit;
  max-height: inherit;
  padding: 0;
}

.centered { /* the element to center */
  display: inline-block;
  vertical-align: middle;

}

.overlay{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 5;
  background-color: rgba(0,0,0,0.5); /*dim the background*/
}

 #showcase{


      background-image: url("img/mits4.jpg");

  /* Full height */
  height: 91%;
background-position: center;
  background-repeat: no-repeat;
  background-size:cover;


}



  #showcase:after {
    background: linear-gradient(135deg, #75e2f9 0%, #202121 74%);
    content: ' ';
    display: block;
    height: 100%;
    left: 0;
    opacity: 0.6;
    position: absolute;
    top: 0;
    webkit-linear-gradientidth: 100%;
    width: 100%;
    z-index: -1; }



</style>
  </head>


  <body class="is-preload">





<header id="header">
<a style="font-size:20px; "class="logo" href="index.php"><span style="color:crimson;">MITS</span> Placement Portal</a>


<div  style="margin:10px; padding:10px; text-align:center; ">
  <form method="post" action="viewProfile.php">
<input class="typeahead tt-query" style="background-color:#2b2b2b" type="text" name="typeahead" placeholder="Search" >
<button style="display: none;" ></button>
</form>

</div>
<nav>
  <a href="#menu">Menu</a>
</nav>
</header>

<nav id="menu">
<ul class="links">
  <li><a href="index.php">Home</a></li>
  <li><a href='#' onclick="displaylogin()">Login</a></li>
  <li><a href='placementstatistics.php' >Placement statistics</a></li>
</ul>
</nav>


    <section id="showcase">
  <div class="container">


        <h1></h1>




<script type="text/javascript">


    function displaylogin()
    {
       document.getElementById("loginform").style.display="block";
/*
       <?php
        if($_SESSION['student_logged_in']==1)
          {
          ?>
                        window.location = "studentuser.php";
         <?php
           }

        else if($_SESSION['admin_logged_in']==1)
           {
            ?>
                        window.location = "adminuser.php";
         <?php  }

       ?>
    */


    }

  </script>






<div id="loginform" hidden >

 <div  id="overlay" style="margin-top:10vh">


          <form action="logincheck.php" method="post" autocomplete="off">


           <label style="color:black">
              Username<span class="req">*</span>
            </label>

            <input style="margin-top:-4%; background: rgba(141, 141, 141, 0.3);   color:black; font-family:system-ui;"  type="text" required autocomplete="off" name="username" />


            <label style="margin-top:4%; color:black">
              Password<span class="req">*</span>
            </label>
            <input style=" margin-top:-4%; background: rgba(141, 141, 141, 0.3); color:black;" type="password" required autocomplete="off" name="password" />


          <br>


          <button style=" background: rgba(179, 237, 255, 0.3); width=50%; color:black"  name="login" ><span style="color:black; "> Login</span></button>

          </form>

        </div>


</div> <!-- /form -->


    <script  src="js/index.js"></script>



     </div>

    </section>




    <footer>
        <div class="centered">
              George Scaria &copy; 2018
        </div>
    </footer>



<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>


  </body>
</html>
