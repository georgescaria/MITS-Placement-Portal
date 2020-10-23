<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if ( $_SESSION['student_logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $usertype = $_SESSION['usertype'];
    $college_id = $_SESSION['college_id'];
    $branch = $_SESSION['branch'];
    $batch = $_SESSION['batch'];



    if (isset($_GET['test_id'])) {

            $test_id=$_GET['test_id'];
            $test_details = ($mysqli->query("SELECT * FROM test where test_id='$test_id'"))->fetch_assoc();
            $questions = ($mysqli->query("SELECT * FROM test where test_id='$test_id'"));
            $test_title = $test_details['test_title'];
            $total_questions= mysqli_num_rows($questions);
           



            if(isset($_SESSION['mark']))
            {
                $mark=$_SESSION['mark'];
                $total_questions=$_SESSION['total_questions'];


               $percent= ($mark*100)/$total_questions;
               $percentage=round($percent,2);
            }
            else
             {       $_SESSION['message'] = "Invalid info!";
   						header("location: error.php"); 
            }



  }

    else
  {
    $_SESSION['message'] = "Invalid info!";
    header("location: error.php"); 
    }
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
<?php require 'testheader.php'; ?>




	


			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
								<!-- Page Heading Start -->
				<div class="page-heading">
            		<h2 style="text-align: center; margin-top: 40px"><b> <?= $test_title ?>  <b></h2>
            	</div>
            	<!-- Page Heading End-->	
								




				 <div class="row">

				 		<h4 style="text-align: center;">You scored <b><?= $mark ?> </b> out of <b><?= $total_questions?></b></h4>
				 		<br>
				 		<br>
				 		<h4 style="text-align: center;">Percentage : <b><?= $percentage ?> </b>%</h4>
				 		<br> 
                    
                    <form method="POST">
       				<button style="display: block; margin: 0 auto;" name="continue" type="submit" class="btn btn-primary" >Continue</button>
       				</form>
                  
               
                </div>
				<!-- End of your awesome content -->




            <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                    {                     
                
                       if(isset($_POST['continue']))
                        {   
  
                            unset($_SESSION['attended']);

                            $percent= ($mark*100)/$total_questions;
                            $percentage=round($percent,2);


                            $attempt_check = $mysqli->query("SELECT * FROM test_scores WHERE college_id='$college_id' and test_id='$test_id'");


                            if ( $attempt_check->num_rows == 0 )
                            {
          				  		$add = ($mysqli->query("INSERT INTO test_scores values('$college_id','$test_id','$mark','$total_questions','$percentage')"));
          				  	}
   			?>

                        <script type="text/javascript">
                 		window.location = "studentuser.php";
                        </script>  

            <?php
                }

            }
            ?>




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
	<script src="assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="assets/libs/bootstrap-inputmask/inputmask.js"></script>
	<script src="assets/libs/bootstrap-xeditable/js/bootstrap-editable.min.js"></script>
	<script src="assets/libs/bootstrap-xeditable/demo/jquery.mockjax.js"></script>
	<script src="assets/libs/bootstrap-xeditable/demo/demo-mock.js"></script>
	<script src="assets/libs/bootstrap-select2/select2.min.js"></script>
	<script src="assets/libs/jquery-clndr/moment-2.5.1.js"></script>
	<script src="assets/libs/bootstrap-typeahead/bootstrap3-typeahead.min.js"></script>
	<script src="assets/libs/ckeditor/ckeditor.js"></script>
	<script src="assets/libs/ckeditor/adapters/jquery.js"></script>
	<script src="assets/js/pages/advanced-forms.js"></script>
	</body>

</html>