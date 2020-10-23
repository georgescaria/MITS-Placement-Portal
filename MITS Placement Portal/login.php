<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">

  <title>MITS | Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">

  
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'logincheck.php';
        
    }
 
}
?>

<header> <div class="container">
        <div id="branding">
          <h1><span class="highlight">MITS CSE</span> Placement </h1>
        </div>
        <nav>
          <ul>
<!--           <li><img src="add_child.png" width="200" height="142"></li>   -->
            <li><a href="index.php">Home</a></li>
            <li><a href="placement.php">PLACEMENTS</a></li>
    
            <li class="current"><a href="login.php">Login</a></li>

          </ul>
        </nav>
      </div>
    </header>


<body>
  <div class="form">
      
    
      
      <div class="tab-content">
       
        </div>
        
 <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="login.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="username"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block" name="login" />Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
