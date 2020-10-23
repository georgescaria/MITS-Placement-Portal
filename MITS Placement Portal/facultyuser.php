<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if ( $_SESSION['faculty_logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $usertype = $_SESSION['usertype'];
    $college_id = $_SESSION['college_id'];
    $branch = $_SESSION['branch'];
    $profilepic = $_SESSION['profilepic'];
//    $batch = $_SESSION['batch'];


//News Feed
    $newsfeed=$mysqli->query("SELECT * FROM newsfeed order by date desc;");


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
                <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <link href="assets/css/style-responsive.css" rel="stylesheet" />






 
    </head>
    <body class="fixed-left">
        <!-- Modal Start -->
        	<!-- Modal Task Progress -->	
	

<?php
    require 'logout.php'; 

    ?>
		
		
	<!-- Begin page -->
	<div id="wrapper">
		
        <?php require 'userheader.php'; ?>

		    <!-- Left Sidebar Start -->
        
        <?php require 'faculty_left.php'; ?>

        <!-- Left Sidebar End -->		  	
		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
			<div class="profile-banner" style="background-image: url(img/imj.jpg);">
				<div class="col-sm-3 avatar-container">
					<img src="<?= $profilepic ?>" class="img-circle profile-avatar" alt="User avatar">
				</div>
			
			</div>
            <div class="content">

				<div class="row">
					<div class="col-sm-3">
						<!-- Begin user profile -->
						<div class="text-center user-profile-2">
							<h4><b><?= $name?></b></h4>
							
							<h5><?= $usertype?></h5>
							<ul class="list-group" style="text-align: left;">
							  <li class="list-group-item">
								<span class="badge"><?= $college_id ?></span>College ID
							  </li>
							  <li class="list-group-item">
								<span class="badge"><?= $branch ?></span>Branch
							  </li>

                              <?PHP if(!(strcasecmp($usertype,'Student')))
                                    {
                                        ?>
						      <li class="list-group-item">
                                <span class="badge"><?= $batch ?></span>Batch
                              </li>


                              <?php  }  ?>
							</ul>
								
								<!-- User button -->
							<div class="user-button">
								<div class="row">
								
								</div>
							</div><!-- End div .user-button -->
						</div><!-- End div .box-info -->
						<!-- Begin user profile -->
					</div><!-- End div .col-sm-4 -->
					
					<div class="col-sm-9">
						<div class="widget widget-tabbed">
							<!-- Nav tab -->
							<ul class="nav nav-tabs nav-justified">
							  <li class="active"><a href="#my-timeline" data-toggle="tab"><i class="fa fa-pencil"></i> Timeline</a></li>
							 
							  
						
							</ul>
							<!-- End nav tab -->

							<!-- Tab panes -->
							<div class="tab-content">
								
								
								<!-- Tab timeline -->
								<div class="tab-pane animated active fadeInRight" id="my-timeline">
									<div class="user-profile-content">
										
										<!-- Begin timeline -->
										<div class="the-timeline">
									            <form role="form" class="post-to-timeline" method="POST">
                                                <textarea name="content" class="form-control" style="height: 70px;" placeholder="Whats on your mind..."></textarea>
                                                <div class="row">
                                                <div class="col-sm-6">
                                                
                                                </div>
                                                <div class="col-sm-6 text-right"><button name="postnews" type="submit" class="btn btn-primary">Post</button></div>
                                                </div>
                                            </form>



                                          <?php 
                                             if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                                                {   


                                                if(isset($_POST['postnews']))
                                                    {
                                                        $content=$_POST['content'];
                                                        date_default_timezone_set('Asia/Kolkata');
                                                        $timestamp=date('Y-m-d H:i:s');

                                                        $post=($mysqli->query("INSERT INTO newsfeed(date,name,college_id,content) values('$timestamp','$name','$college_id','$content')"));
                                                    }

                                            ?>
                        <script type="text/javascript">
                        window.location = "adminuser.php";
                        </script>

                                        <?PHP
                                                }
                                                ?>
                                           
                       


                                        
											<br>
											<ul>
                                                    


                                    <?php 
                                        while ($row=mysqli_fetch_array($newsfeed)) {

                                         $date = strtotime($row['date']);
                                         $post_author_name = $row['name'];
                                         $post_author_id = $row['college_id'];
                                         $news_content = $row['content'];
                                         $month = date('M', $date);
                                         $day = date('d', $date);
                                         $time = date('G:i', $date);
                                         $am_or_pm = date('G', $date);
                                     
                                         if($am_or_pm>=12)
                                            { $am_pm='pm';}
                                        else
                                            {$am_pm='am';}
                                    ?>    
                                                <li>
                                                    <div class="the-date">
                                                        <span><?= $day?></span>
                                                        <small><?= $month?></small>
                                                    </div>
                                                    <h4><b><?= $post_author_name?> </b> </h4>
                                                    <p> 
                                                    <?= $news_content ?> <br>  <br>

                                                    <?= $time, $am_pm?>
                                                    </p>
                                                </li>
                                        <?php
                                    }

                                    ?>
												
											</ul>
										</div><!-- End div .the-timeline -->
										<!-- End timeline -->
									</div><!-- End div .user-profile-content -->
								</div><!-- End div .tab-pane -->
								<!-- End Tab timeline -->
								
					
								
								
								<!-- Tab user activities -->
	
								<!-- End Tab user activities -->
								
								<!-- Tab user messages -->
					
								<!-- End Tab user messages -->
							</div><!-- End div .tab-content -->
						</div><!-- End div .box-info -->
					</div>
				</div>
				</div>

				            <!-- Footer Start -->
            <footer style="text-align: center;">
                George Scaria &copy; 2018
                
            </footer>
            <!-- Footer End -->			
            
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        
		<!-- End right content -->

	</div>
	<!-- End of page -->
</div>
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
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="assets/libs/jquery-gmap3/gmap3.min.js"></script>
	<script src="assets/js/pages/google-maps.js"></script>
	</body>


</html>