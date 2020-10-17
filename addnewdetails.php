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
?><!DOCTYPE html>
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
		


        <?php require 'userheader.php'; ?>

        <?php require 'student_left.php'; ?>


        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
								<!-- Page Heading Start -->
				<div class="page-heading">
            		<h1><i class='fa fa-check'></i> Edit details</h1>
            		            	</div>
            	<!-- Page Heading End-->	
								
				<!-- Your awesome content goes here -->
				 <div class="row">
                    <div class="col-sm-12 portlets">
                        <div class="widget">
                           
                            <div class="widget-content padding">
                            
                                <ul id="demo1" class="nav nav-tabs">                               

                                    <li class="active">
                                        <a href="#projects" data-toggle="tab">Projects </a>
                                    </li>      

                                     <li class="">
                                        <a href="#internships" data-toggle="tab">Internships </a>
                                    </li>                            
                                
                                </ul>

                                <div class="tab-content">
                            
                                   


                                    <div class="tab-pane fade active in" id="projects">
                                        <div class="widget">
                                 <?php A:  { ?>
                                            <div class="widget-content padding">
                                            <form class="form-horizontal" role="form" method="POST">

                                                    

                                              <div class="form-group">
                                                <label for="input-text-disabled" class="col-sm-2 control-label">Project name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="proj_topic[]" placeholder="Enter project topic" >                                                  
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Description</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="proj_info[]" placeholder="Enter description about the project" >
                                                </div>
                                              </div>

                                                   <div class="form-group">
                                                <label for="input-text-disabled" class="col-sm-2 control-label">Project name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="proj_topic[]" placeholder="Enter project topic" >                                                  
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Description</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="proj_info[]" placeholder="Enter description about the project" >
                                                </div>
                                              </div>
                                          
                                               
                                       
                                            
                                             <button name="save2" type="submit" class="btn btn-primary" style="float: right;">Add</button>



                                        </form>

                                        </div>

                                        
                                    </div>
                                </div> <!-- / .tab-pane -->
 <?php } ?>
        
                         <div class="tab-pane fade " id="internships">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                            <form class="form-horizontal" role="form" method="POST">

                                         

                                              <div class="form-group">
                                                <label for="input-text-disabled" class="col-sm-2 control-label">Company name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="company[]" placeholder="Enter company name" >                                                  
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Topic</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="topic[]" placeholder="Enter topic" >
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Description</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="internship_info[]" placeholder="Enter description of the work" >
                                                </div>
                                              </div>
                                          

                                         

                                            
                                            <button name="save3" type="submit" class="btn btn-primary" style="float: right;">Add</button>

                                        </form>

                                        </div>

                                        
                                    </div>
                                </div> <!-- / .tab-pane -->




                                </div> <!-- / .tab-content -->
                        
                                
                                

                            </div>


                        </div>

                        
                         
                    </div>
                
                </div>
				<!-- End of your awesome content -->


			<?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                    {   


                        if(isset($_POST['save2']))
                        {
                             $proj_topic=$_POST['proj_topic'];
                             $proj_info=$_POST['proj_info'];
                             
                             for($i=0;($i<count($proj_topic)&&($proj_topic[$i]!=''));$i++)
                             {
                              
                        //       mysql_query("insert into user_projects(college_id,project_topic,project_info) values('$proj_topic[$i]','$project_info[$i]'");  
                               
                               $update = ($mysqli->query("INSERT INTO user_projects(college_id,project_topic,project_info) values('$college_id','$proj_topic[$i]','$proj_info[$i]')"));
                              
                             }
      

                        }   

                        else if(isset($_POST['save3']))
                        {
                             $company=$_POST['company'];
                             $topic=$_POST['topic'];
                             $internship_info=$_POST['internship_info'];
                             
                             for($i=0;$i<count($company)&&($company[$i]!='');$i++)
                             {
                              
                        //       mysql_query("insert into user_projects(college_id,project_topic,project_info) values('$proj_topic[$i]','$project_info[$i]'");  
                               
                               $update = ($mysqli->query("INSERT INTO user_internships(college_id,company,internship_topic,internship_info) values('$college_id','$company[$i]','$topic[$i]','$internship_info[$i]')"));
                              
                             }
                   

                        }  
                        ?>
                        <script type="text/javascript">
                        window.location = "studentuser.php";
                        </script>

            <?php 
                     }       
            ?>



</div>



				            <!-- Footer Start -->
 <footer style="text-align: center;">
                George Scaria &copy; 2018
                
            </footer>
            <!-- Footer End -->			
            </div>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        </div>
		<!-- End right content -->

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