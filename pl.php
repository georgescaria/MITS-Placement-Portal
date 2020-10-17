
<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();

$result = $mysqli->query("SELECT * FROM placed");

?>

<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>MITS | Placements</title>
  <meta name="author" content="Jake Rocheleau">
  <link rel="shortcut icon" href="http://d15dxvojnvxp1x.cloudfront.net/assets/favicon.ico">
  <link rel="icon" href="http://d15dxvojnvxp1x.cloudfront.net/assets/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
</head> 
<header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">MITS CSE</span> Placement </h1>
        </div>
        <nav>
          <ul>
            <!--li><img src="add_child.png" width="200" height="142"></li-->
            <li><a href="index.php">Home</a></li>
           
            <li class="current"><a href="placement.php">Placements</a></li>
            <li><a href="login.php">LOGIN</a></li>

          </ul>
        </nav>
      </div>
    </header>

<body>
 <div id="wrapper">

  
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>College ID</span></th>
        <th><span>Name</span></th>
        <th><span>Company</span></th>
        <th><span>Package(lakh/annum)</span></th>
        <th><span>Batch</span></th>
      </tr>
    </thead>
    <tbody>
<?php 
$total = 0;
foreach ($result as $rows) :?>
  <
        <td> <?php echo $rows['college_id']; ?></td>
        <td> <?php echo $rows['student_name']; ?></td>
        <td> <?php echo $rows['company']; ?></td>
        <td> <?php echo $rows['salary_package']; ?></td>
        <td> <?php echo $rows['batch']; ?></td>
  </tr>
<?php endforeach;?>
    </tbody>
  </table>
 </div> 
<script type="text/javascript">
$(function(){
  $('#keywords').tablesorter(); 
});
</script>
</body>

</html>
