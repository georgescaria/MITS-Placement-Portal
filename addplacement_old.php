<?php
/* Displays user information and some useful messages */
require 'db.php';
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['admin_logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
   
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">

  <title>MITS | Add Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="css/style.css">

  
</head>
<header> <div class="container">
        <div id="branding">
          <h1><span class="highlight">MITS</span> Placement Portal </h1>
        </div>
        <nav>
          <ul>

            <li><a href="adminuser.php"><?= $name ?></a></li>
            <li><a href="index.php"><img src="img/logout.png" width="17" height="17"></a></li>

          </ul>
        </nav>
      </div>
    </header>

  <?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  { 
      if (isset($_POST['add'])) { //user logging in

          require 'insertplacement.php';
          
      }
   
  }
  ?>


<body id="addbackground">
  <div class="form">
      
    
      
      <div class="tab-content">
       
        </div>
        
        <div id="add">   

          
          <form action="addplacement.php" method="post">
          
            <div class="field-wrap">
            <label>
              Batch<span class="req">*</span>
            </label>
            <input name="batch" list="batch" type="text"required autocomplete="off"/>
            <datalist id="batch">
                <option value="2013-2017">
                <option value="2014-2018">
                <option value="2015-2019">
                <option value="2016-2020">
            </datalist>
          </div>


           <div class="field-wrap">
            <label>
              College ID<span class="req">*</span>
            </label>
            <input name="college_id" type="text"required autocomplete="off"/>
          </div>


           <div class="field-wrap">
            <label>
             Student Name<span class="req">*</span>
            </label>
            <input name="student_name" type="text"required autocomplete="off"/>
          </div>

          
          <div class="field-wrap">
            <label>
              Company<span class="req">*</span>
            </label>
            <input name="company" type="text"required autocomplete="off"/>
          </div>
          

          <div class="field-wrap">
            <label>
              Salary Package (lakh / annum)<span class="req">*</span>
            </label>
            <input name="salary" type="text"required autocomplete="off"/>
          </div>

          
        <a href="addplacement.php" ><button name="add" type="submit" class="button button-block" >Add</button></a>
        
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
    <footer>
      <p>MITS CSE, Copyright &copy; 2017</p>
    </footer>
</html>
