<?php 

require 'db.php';
session_start();
if ( isset($_GET['college_id']) ) 
  {
    // Makes it easier to read
    $college_id = $_GET['college_id'];

    $result = ($mysqli->query("SELECT * FROM users WHERE college_id='$college_id'"))->fetch_assoc();

    $name = $result['name'];
    $usertype = $result['usertype'];
    $college_id = $_GET['college_id'];
    $branch = $result['branch'];
    $batch = $result['batch'];
    $profilepic = $result['profilepic'];





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
    $project_no=0;



    //Fetch placements

    $user_placements=$mysqli->query("SELECT distinct(company),package FROM placed where college_id='$college_id'");
    $placement_no=0;
        //Fetch Internship details

    $user_internships=$mysqli->query("SELECT * FROM user_internships where college_id='$college_id'");
    $internships = ($mysqli->query("SELECT * FROM user_internships where college_id='$college_id'"))->fetch_assoc();
    $internship_no=0;
}

if ( isset($_POST['typeahead']) ) 
  {
    // Makes it easier to read
    $user = $_POST['typeahead'];

    $result = ($mysqli->query("SELECT * FROM users WHERE name='$user'"))->fetch_assoc();

    $name = $result['name'];
    $usertype = $result['usertype'];
    $college_id = $result['college_id'];
    $branch = $result['branch'];
    $batch = $result['batch'];
    $profilepic = $result['profilepic'];


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
    $project_no=0;



    //Fetch placements

    $user_placements=$mysqli->query("SELECT distinct(company),package FROM placed where college_id='$college_id'");
    $placement_no=0;
        //Fetch Internship details

    $user_internships=$mysqli->query("SELECT * FROM user_internships where college_id='$college_id'");
    $internships = ($mysqli->query("SELECT * FROM user_internships where college_id='$college_id'"))->fetch_assoc();
    $internship_no=0;
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
		
<!-- Top Bar Start -->





	  	
		<!-- Start right content -->
     
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
			<div class="profile-banner" style="background-image: url(img/bg2.jpg);">
				<div class="col-sm-3 avatar-container">
					<img src="<?= $profilepic ?>" class="img-circle profile-avatar" alt="User avatar">
				</div>
			
			</div>


            <br><br><br>


            <div style="margin:3%;" class="content">

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

                              <?php if(!(strcasecmp($usertype,'student')))
                                    {
                                        ?>
						      <li class="list-group-item">
                                <span class="badge"><?= $batch ?></span>Batch
                              </li>


                              <?php  }  ?>
							</ul>
								
								<!-- User button -->
							<div class="user-button">

                            <div class="widget-content padding">
                                <h4><b>Score</b></h4>

                                    <?php 
                                       $test_scores=$mysqli->query("SELECT * from test_scores where college_id='$college_id'");
                                        $score=0;
                                        $total_questions=0;


                                    if($test_scores->num_rows!=0)
                                     {
                                       while($row=mysqli_fetch_array($test_scores))
                                       {
                                            $score=$score+$row['score'];
                                            $total_questions= $total_questions+$row['total_questions'];
                                            $percentage=$score*100/$total_questions;
                                            $percentage=round($percentage,2);
                                       }

                                       ?>



                                <input class="knob" style="font-size:50px;" data-width=150 data-height=300 data-fgColor="#08528c" value='<?=$percentage?>' data-readOnly=true>

                        <?php
                            }
                            else
                              { 
                            ?>
                              <input class="knob" data-width=150 data-height=300 data-fgColor="#08528c" value='0' data-readOnly=true>
                            <?php    
                                }
                                ?>
                            </div>
							</div><!-- End div .user-button -->
						</div><!-- End div .box-info -->
						<!-- Begin user profile -->
					</div><!-- End div .col-sm-4 -->
					
					<div class="col-sm-9">
						<div class="widget widget-tabbed">
							<!-- Nav tab -->
							<ul class="nav nav-tabs nav-justified">

							  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> About</a></li>
							  <li><a href="#user-activities" data-toggle="tab"><i class="fa fa-laptop"></i> Academics</a></li>
             
						
							</ul>
							<!-- End nav tab -->

							<!-- Tab panes -->
							<div class="tab-content">
								
								

								
								<!-- Tab about -->
								<div class="tab-pane animated active fadeInRight" id="about">
									<div class="user-profile-content">
										<h5><strong>ABOUT ME</strong></h5>
										<p>
										<?= $about ?>
										</p>
										<hr />
										<div class="row">
											 <div class="col-sm-6">
                                                <address>
                                                     <h5><strong>CONTACT ME</strong></h5>
                                                </address>
                                                    <address>
                                                        <strong>Phone</strong><br>
                                                        <p title="Phone"><?= $phone ?></p>
                                                    </address>
                                                    <address>
                                                        <strong>Email</strong><br>
                                                        <a href="mailto:<?= $email ?>"><?= $email ?></a>
                                                    </address>
                                                    <address>
                                                        <strong>Website</strong><br>
                                                        <a href="<?= $website ?>"><?= $website ?></a>
                                                    </address>
                                            </div>

                                            <div class="col-sm-6">
                                                <address>
												<h5><strong>PERSONAL INFORMATION</strong></h5>
												</address>
														<p><strong>Date Of Birth:</strong> <?= $dob ?></p>
														
													
													
														<p><strong>Father's Name:</strong><?= $father ?></p>
													
													
														<p><strong>Mother's Name:</strong><?= $mother ?></p>
													
                                                        <p><strong>Gender:</strong><?= $gender ?></p>
                                                 
                                                       
                                                   
											</div>
											</div>
										
                                 
                                </div><!-- End div .user-profile-content -->
								</div><!-- End div .tab-pane -->
								<!-- End Tab about -->
								
								
								<!-- Tab user activities -->
				<div class="tab-pane animated fadeInRight" id="user-activities">
				<div class="row">
                

                <div class="col-sm-6">
                        <div class="widget">
                       
                            <div class="widget-content padding">
                                <h3>Education</h3>
                                <div class="panel-group accordion-toggle" id="education">
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#education" href="#10th_school">
                                          <b>10<sup>th</sup> : </b><?= $school_10th ?>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="10th_school" class="panel-collapse collapse ">
                                      <div class="panel-body">
                                        CGPA/Percentage : <?= $mark_10th ?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#education" href="#12th_school">
                                           <b>12<sup>th</sup> : </b><?= $school_12th ?>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="12th_school" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        Percentage : <?= $mark_12th ?>%
                                      </div>
                                    </div>
                                  </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#10th_school" href="#college">
                                           <b>College :</b> Muthoot Institute of Technology &amp; Science
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="college" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <b>Branch : </b><?= $branch?><br><br>
                                        <b>SGPA</b><br>
                                        <b>S1 : </b><?= $sgpa_s1 ?><br><b>S2 : </b><?= $sgpa_s2 ?><br><b>S3 : </b><?= $sgpa_s3 ?><br><b>S4 : </b><?= $sgpa_s4 ?><br><b>S5 : </b><?= $sgpa_s5 ?><br><b>S6 : </b><?= $sgpa_s6 ?><br><b>S7 : </b><?= $sgpa_s7 ?><br><b>S8 : </b><?= $sgpa_s8 ?><br><b>CGPA : </b><?= $college_cgpa ?>
                                      </div>
                                    </div>
                                  </div>
                             
                                </div>
                               
                          

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="widget">
                       
                            <div class="widget-content padding">
                                <h3>Projects</h3>
                                <div class="panel-group accordion-toggle" id="projects">

                                  <?php 
                                        while ($row=mysqli_fetch_array($user_projects)) {

                                         $project_topic = $row['project_topic'];
                                         $project_info = $row['project_info'];

                                         ?>
                                            
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#projects" href="#projects<?= $project_no?>">
                                            <?= $project_topic ?>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="projects<?= $project_no?>" class="panel-collapse collapse ">
                                      <div class="panel-body">
                                            <?= $project_info ?>
                                      </div>
                                    </div>
                                  </div>
                               
                             <?php
                             $project_no+=1;
                                }
                                ?>

                                </div>
                    

                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                  <div class="col-sm-6">
                        <div class="widget">
                       
                            <div class="widget-content padding">
                                <h3>Placements</h3>
                                <div class="panel-group accordion-toggle" id="placement">

                                  <?php 
                                        while ($row=mysqli_fetch_array($user_placements)) {

                                         $company = $row['company'];
                                         $package = $row['package'];

                                         ?>
                                            
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#placement" href="#placement<?= $placement_no?>">
                                            <?= $company ?>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="placement<?= $placement_no?>" class="panel-collapse collapse ">
                                      <div class="panel-body">
                                            Package: <?= $package ?> LPA
                                      </div>
                                    </div>
                                  </div>
                               
                             <?php
                             $placement_no+=1;
                                }
                                ?>

                                </div>
                    

                            </div>
                        </div>
                    </div>




                      <div class="col-sm-6">
                        <div class="widget">
                       
                            <div class="widget-content padding">
                                <h3>Internships</h3>
                                <div class="panel-group accordion-toggle" id="internships">

                                  <?php 
                                        while ($row=mysqli_fetch_array($user_internships)) {

                                         $company = $row['company'];
                                         $internship_topic = $row['internship_topic'];
                                         $internship_info = $row['internship_info'];

                                         ?>
                                            
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#internships" href="#internships<?= $internship_no?>">
                                            <?= $company ?>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="internships<?= $internship_no?>" class="panel-collapse collapse ">
                                      <div class="panel-body">
                                            <b>Topic : </b><?= $internship_topic ?><br><br>
                                            <?= $internship_info ?>
                                      </div>
                                    </div>
                                  </div>
                               
                             <?php
                             $internship_no+=1;
                                }
                                ?>

              
                        </div>
                    </div>


                </div>
								</div><!-- End div .tab-pane -->
								<!-- End Tab user activities -->
								
								<!-- Tab user messages -->
					
								<!-- End Tab user messages -->
							</div><!-- End div .tab-content -->
						</div><!-- End div .box-info -->
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
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="assets/libs/jquery-gmap3/gmap3.min.js"></script>
	<script src="assets/js/pages/google-maps.js"></script>


    <!-- Rank Display -->
    <script src="assets/libs/jquery-easypiechart/jquery.easypiechart.min.js"></script>
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="assets/js/pages/other-charts.js"></script>


	</body>


</html>