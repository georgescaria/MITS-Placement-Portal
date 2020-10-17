<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if ( ($_SESSION['admin_logged_in'] != 1 ) && ($_SESSION['student_logged_in'] != 1 )){
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $usertype = $_SESSION['usertype'];
    $college_id = $_SESSION['college_id'];
    
}
?>

<!DOCTYPE html>
<html>
    

<head>
        <meta charset="UTF-8">
         <title>MITS | <?= $name?> </title>  
         <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="author" content="George Scaria">  


        <!-- Base Css Files -->
        <link href="assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/libs/fontello/css/fontello.css" rel="stylesheet" />
        <link href="assets/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
        <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" /> 
        <link href="assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" /> 
        <link href="assets/libs/pace/pace.css" rel="stylesheet" />
        <link href="assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
        <!-- Code Highlighter for Demo -->
        <link href="assets/libs/prettify/github.css" rel="stylesheet" />
        
                <!-- Extra CSS Libraries Start -->
                <link href="assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
                <link href="assets/libs/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" />
                <link href="assets/libs/bootstrap-xeditable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
                <link href="assets/libs/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" />
                <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->

        <link href="assets/libs/jquery-notifyjs/styles/metro/notify-metro.css" rel="stylesheet" type="text/css" />        
        <link href="assets/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />
    </head>
    <body class="fixed-left">
        <!-- Modal Start -->
        	<!-- Modal Task Progress -->	


<?php
    require 'logout.php'; 

    ?>

	<!-- Begin page -->
	<div id="wrapper">
		

        <!-- Top Bar Start -->
<?php require 'userheader.php'; ?>

<?php 

        if($_SESSION['usertype'] == "admin" )
            require 'admin_left.php'; 
        else if($_SESSION['usertype'] == "student" )
            require 'student_left.php'; 
        ?>




	

        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
								<!-- Page Heading Start -->
				<div class="page-heading">
            		<h1><i class='fa fa-check'></i> Change password</h1>
            	</div>
            	<!-- Page Heading End-->	
								




				 <div class="row">
                    <div class="col-sm-12 portlets">
                        <div class="list-group">

                            <div class="widget">
                            <div class="widget-header transparent">
                                
                            </div>
                            <div class="widget-content padding">
                                <form role="form" method="post">

                                  <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" name="old_password" required>
                                    <p style="color:darkred" id="wrong" ></p>
                                    
                                  </div>

                                  <div class="form-group">
                                    <label>New Password</label>
                                    <input onkeyup="minimum()" type="password" id="new_password" class="form-control" name="new_password" required>
                                  <p style="color:darkred" id="minimum" ></p>
                                  </div>
                                  

                                  <div class="form-group">
                                    <label>Retype password</label>
                                    <input  onkeyup="checkpass()" type="password" id="retype_password" class="form-control" name="retype_password" required>
                                    <p style="color:darkred" id="match" ></p>
                                  </div>
          


                                  <button type="submit" id="submit" disabled class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                        

                        </div>

                        
                         
                    </div>
                
                </div>

              </div>
				<!-- End of your awesome content -->

                                <?php


                                       if (isset($_POST['old_password'])) 
                                            { 

                                               

                                                    $result = $mysqli->query("SELECT * FROM users WHERE college_id='$college_id'")->fetch_assoc();
                                                    $check_password = $result['password'];

                                                    $new_password=$_POST['new_password'];
                                                    
                                                    if ( password_verify($_POST['old_password'],$check_password))
                                                    {   
                                                        $hash= password_hash($new_password, PASSWORD_BCRYPT);

                                                        $update_password = ($mysqli->query("UPDATE users set password='$hash'"));

                                                        echo "<script> type='text/javascript'> alert('Password changed successfully');  
                                                                
                                                         </script>";
                                                    }
                                                    else
                                                    {
                                                        echo "<script> type='text/javascript'> alert('Incorrect password. Try again!');  
                                                                
                                                         </script>";
                                                         
                                                    }


                                                    

                                                   
                                                        
                                                    
                                                       
                                            }

                                ?>





 <script>

 notify('error');

function checkpass() {
    
   var new_password = document.getElementById("new_password").value;

   var retype_password = document.getElementById("retype_password").value;
   var n = 1;

   var x = document.getElementById("new_password").value.length;

    var n = new_password.localeCompare(retype_password);

    if(n!=0)
    {    document.getElementById("match").innerHTML="Passwords doesn't match.";
        document.getElementById("submit").disabled = true;
    }

    if((n==0)&&(x>=8))
    {    document.getElementById("match").style.display="none";
        document.getElementById("submit").disabled = false;
    }
}



function minimum() {
    
   var x = document.getElementById("new_password").value.length;
   
  
  //  notify('error');

    if ((x>=1)&&(x<8)) 
        {
            document.getElementById('minimum').innerHTML="Password must be of minimum 8 characters.";
            document.getElementById("submit").disabled = true;
        };
     if (x>=8) 
        {
            document.getElementById("minimum").style.display="none";
        };
}



</script>








				            <!-- Footer Start -->
             <footer style="text-align: center;">
                George Scaria &copy; 2018
                
            </footer>
            <!-- Footer End -->			
            
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        </div>
		<!-- End right content -->

	</div>
	<!-- End of page -->
		<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
	<script>
		var resizefunc = [];
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
	<script src="assets/libs/jquery-detectmobile/detect.js"></script>
	<script src="assets/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
	<script src="assets/libs/ios7-switch/ios7.switch.js"></script>
	<script src="assets/libs/fastclick/fastclick.js"></script>
	<script src="assets/libs/jquery-blockui/jquery.blockUI.js"></script>
	<script src="assets/libs/bootstrap-bootbox/bootbox.min.js"></script>
	<script src="assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="assets/libs/jquery-sparkline/jquery-sparkline.js"></script>
	<script src="assets/libs/nifty-modal/js/classie.js"></script>
	<script src="assets/libs/nifty-modal/js/modalEffects.js"></script>
	<script src="assets/libs/sortable/sortable.min.js"></script>
	<script src="assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
	<script src="assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="assets/libs/bootstrap-select2/select2.min.js"></script>
	<script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script> 
	<script src="assets/libs/pace/pace.min.js"></script>
	<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/libs/jquery-icheck/icheck.min.js"></script>

	<!-- Demo Specific JS Libraries -->
	<script src="assets/libs/prettify/prettify.js"></script>

	<script src="assets/js/init.js"></script>
	<!-- Page Specific JS Libraries -->
	   <script src="assets/libs/bootstrap-validator/js/bootstrapValidator.min.js"></script>
    <script src="assets/js/pages/form-validation.js"></script>

    <script src="assets/libs/jquery-notifyjs/notify.min.js"></script>
    <script src="assets/libs/jquery-notifyjs/styles/metro/notify-metro.js"></script>
    <script src="assets/js/pages/notifications.js"></script>
	</body>


</html>