<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $usertype = $_SESSION['usertype'];
    $college_id = $_SESSION['college_id'];
    $branch = $_SESSION['branch'];



    //Fetch Personal details
    $personal_details = ($mysqli->query("SELECT * FROM user_personal_details where college_id='$college_id'"))->fetch_assoc();
    $phone = $personal_details['phone'];
    $email = $personal_details['emailid'];
    $website = $personal_details['website'];
    $father = $personal_details['father'];
    $mother = $personal_details['mother'];
    $dob = $personal_details['dob'];
    $gender = $personal_details['gender'];
    $religion = $personal_details['religion'];
    $about = $personal_details['about'];

    //Fetch Academic details
    $academics = ($mysqli->query("SELECT * FROM user_academics where college_id='$college_id'"))->fetch_assoc();
    $school_10th = $academics['10th_school'];
    $school_12th = $academics['12th_school'];
    $mark_10th = $academics['10th_mark'];
    $mark_12th = $academics['12th_mark'];
    $sgpa_s1 = $academics['s1'];
    $sgpa_s2 = $academics['s2'];
    $sgpa_s3 = $academics['s3'];
    $sgpa_s4 = $academics['s4'];
    $sgpa_s5 = $academics['s5'];
    $sgpa_s6 = $academics['s6'];
    $sgpa_s7 = $academics['s7'];
    $sgpa_s8 = $academics['s8'];
    $college_cgpa = $academics['CGPA'];

    //Fetch Project details

    $user_projects=$mysqli->query("SELECT distinct(project_topic),project_info FROM user_projects where college_id='$college_id'");
    $projects = ($mysqli->query("SELECT distinct(project_topic),project_info FROM user_projects where college_id='$college_id'"))->fetch_assoc();

    $project_no=1;
    $addnew_proj=0;

        //Fetch Internship details

    $user_internships=$mysqli->query("SELECT * FROM user_internships where college_id='$college_id'");
    $internships = ($mysqli->query("SELECT * FROM user_internships where college_id='$college_id'"))->fetch_assoc();
    $internship_no=0;

}

?>



 <!DOCTYPE html>
<html>
    
<!-- Mirrored from hubancreative.com/projects/templates/coco/classy/advanced-forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Feb 2018 18:44:50 GMT -->
<head>
        <meta charset="UTF-8">
         <title>MITS | <?= $name?> </title>    


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




      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>


         <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
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

		
	<!-- Modal Logout -->
	<div class="md-modal md-just-me" id="logout-modal">
		<div class="md-content">
			<h3><strong>Logout</strong> Confirmation</h3>
			<div>
				<p class="text-center">Are you sure want to logout from this awesome system?</p>
				<p class="text-center">
				<button class="btn btn-danger md-close">Nope!</button>
				<a href="login.html" class="btn btn-success md-close">Yeah, I'm sure</a>
				</p>
			</div>
		</div>
	</div>        <!-- Modal End -->	
	<!-- Begin page -->
	<div id="wrapper">
		
<!-- Top Bar Start -->
<div class="topbar">
    <div class="topbar-left">
        <div class="logo">
            <h1><a href="#"><img src="assets/img/mits.png" alt="Logo"></a></h1>
        </div>
        <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
        </button>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-collapse2">
                
                <ul class="nav navbar-nav navbar-right top-navbar">
                    <li class="dropdown iconify hide-phone">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i><span class="label label-danger absolute">4</span></a>
                        <ul class="dropdown-menu dropdown-message">
                            <li class="dropdown-header notif-header"><i class="icon-bell-2"></i> New Notifications<a class="pull-right" href="#"><i class="fa fa-cog"></i></a></li>
                            <li class="unread">
                                <a href="#">
                                    <p><strong>John Doe</strong> Uploaded a photo <strong>&#34;DSC000254.jpg&#34;</strong>
                                        <br /><i>2 minutes ago</i>
                                    </p>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <p><strong>John Doe</strong> Created an photo album  <strong>&#34;Fappening&#34;</strong>
                                        <br /><i>8 minutes ago</i>
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p><strong>John Malkovich</strong> Added 3 products
                                        <br /><i>3 hours ago</i>
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p><strong>Sonata Arctica</strong> Send you a message <strong>&#34;Lorem ipsum dolor...&#34;</strong>
                                        <br /><i>12 hours ago</i>
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p><strong>Johnny Depp</strong> Updated his avatar
                                        <br /><i>Yesterday</i>
                                    </p>
                                </a>
                            </li>
                            <li class="dropdown-footer">
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-primary"><i class="icon-ccw-1"></i> Refresh</a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-danger"><i class="icon-trash-3"></i> Clear All</a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-success">See All <i class="icon-right-open-2"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown iconify hide-phone">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="label label-danger absolute">3</span></a>
                        <ul class="dropdown-menu dropdown-message">
                            <li class="dropdown-header notif-header"><i class="icon-mail-2"></i> New Messages</li>
                            <li class="unread">
                                <a href="#" class="clearfix">
                                    <img src="images/users/chat/2.jpg" class="xs-avatar ava-dropdown" alt="Avatar">
                                    <strong>John Doe</strong><i class="pull-right msg-time">5 minutes ago</i><br />
                                    <p>Duis autem vel eum iriure dolor in hendrerit ...</p>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#" class="clearfix">
                                    <img src="images/users/chat/1.jpg" class="xs-avatar ava-dropdown" alt="Avatar">
                                    <strong>Sandra Kraken</strong><i class="pull-right msg-time">22 minutes ago</i><br />
                                    <p>Duis autem vel eum iriure dolor in hendrerit ...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="clearfix">
                                    <img src="images/users/chat/3.jpg" class="xs-avatar ava-dropdown" alt="Avatar">
                                    <strong>Zoey Lombardo</strong><i class="pull-right msg-time">41 minutes ago</i><br />
                                    <p>Duis autem vel eum iriure dolor in hendrerit ...</p>
                                </a>
                            </li>
                            <li class="dropdown-footer"><div class=""><a href="#" class="btn btn-sm btn-block btn-primary"><i class="fa fa-share"></i> See all messages</a></div></li>
                        </ul>
                    </li>
                    <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
                    <li class="dropdown topbar-profile">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="images/users/user.png"></span> <strong><?=$name?></strong> <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">My Profile</a></li>
                            <li><a href="#">Change Password</a></li>
                            <li><a href="#">Account Setting</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-help-2"></i> Help</a></li>
                            <li><a href="lockscreen.html"><i class="icon-lock-1"></i> Lock me</a></li>
                            <li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
                        </ul>
                    </li>
                 
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->
		    <!-- Left Sidebar Start -->
       <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
               <!-- Search form -->
               
                <div class="clearfix"></div>
                <!--- Profile -->
                <div class="profile-info">
                    <div class="col-xs-4">
                      <a href="adminuser.php" class="rounded-image profile-image"><img src="images/users/user.png"></a>
                    </div>
                    <div class="col-xs-8">
                        <div class="profile-text"><b><?= $name?></b></div>
                        <div class="profile-buttons">
                          <a href="javascript:;"><i class="fa fa-envelope-o pulse"></i></a>
                          <a href="#connect" class="open-right"><i class="fa fa-comments"></i></a>
                          <a href="javascript:;" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
                        </div>
                    </div>
                </div>
                <!--- Divider -->
                <div class="clearfix"></div>
                <hr class="divider" />
                <div class="clearfix"></div>
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul><li class='has_sub'><a href='javascript:void(0);'><i class='icon-home-3'></i><span>Dashboard</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a><ul><li><a href='index.html'><span>Dashboard v1</span></a></li><li><a href='index2.html'><span>Dashboard v2</span></a></li></ul></li></ul>                    <div class="clearfix"></div>

                    
                </div>
            <div class="clearfix"></div>
            <div class="portlets">
                <div id="chat_groups" class="widget transparent nomargin">
                    <h2>Chat Groups</h2>
                    <div class="widget-content">
                        <ul class="list-unstyled">
                            <li><a href="javascript:;"><i class="fa fa-circle-o text-red-1"></i> Colleagues</a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle-o text-blue-1"></i> Family</a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle-o text-green-1"></i> Friends</a></li>
                        </ul>
                    </div>
                </div>

         
            </div>
            <div class="clearfix"></div><br><br><br>
        </div>
        
        </div>
        <!-- Left Sidebar End -->		

<script>
 
function passData() {
var name = document.getElementById("no_of_questions").value;
var dataString = 'data_to_be_pass=' + name;
if (name == '') {
alert("Please Enter the Anything");
} else {
// AJAX code to submit form.

$.ajax({
type: "POST",
url: "ch.php",
data: dataString,
cache: false,
success: function(data)
{ 


alert(data);

<?php include 'ch.php';
require 'ch.php';
 ?>
}
});
}

}
 
</script>

        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
                                <!-- Page Heading Start -->
                <div class="page-heading">
                    <h1><i class='fa fa-magic'></i> Create Test</h1>
                                
                </div>
                <!-- Page Heading End-->                
                <div class="row">
                    <div class="col-md-12 portlets">
                        <!-- Your awesome content goes here -->
                        <div class="widget animated fadeInDown">
                            <form id="myWizard">
                                <section class="step" data-step-title="First step">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputEmail">Number of questions</label>
                                                <input type="text" id="no_of_questions" onblur="passData();" placeholder="Enter number of questions" class="form-control">
                                            </div>
                                       
                                        </div>
                                        
                                    </div>


     <?php
 
 if(isset($_POST["data_to_be_pass"])&& !empty($_POST["data_to_be_pass"]))
 {
$questions=$_POST['data_to_be_pass'];
  echo $questions;


}
 ?>

   





                                </section>
                                <section class="step" data-step-title="Second step">

                                    <?php 

                                    if(isset($questions))
                                    { ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputUsername">Username</label>
                                                <input type="text" id="inputUsername" placeholder="Username" class="form-control" >
                                            </div>
                                        </div>
                                        
                                    </div>


                                    <?php } ?>
                                </section>
                                <section class="step" data-step-title="Third step">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputFirstname">Firstname</label>
                                                <input type="text" id="inputFirstname" placeholder="Firstname" class="form-control" value="<?=$questions?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputCity">City</label>
                                                <input type="text" id="inputCity" placeholder="City" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </section>
                            </form>
                        </div>
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


        <!-- Page Specific JS Libraries -->
    <script src="assets/libs/jquery-wizard/jquery.easyWizard.js"></script>
    <script src="assets/js/pages/form-wizard.js"></script>
	</body>

<!-- Mirrored from hubancreative.com/projects/templates/coco/classy/advanced-forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Feb 2018 18:44:56 GMT -->
</html>