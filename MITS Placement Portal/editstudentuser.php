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
    $address = $personal_details['address'];
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
    $cgpa = $academics['CGPA'];
    $backlogs = $academics['backlogs'];

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
                                        <a href="#profile-picture" data-toggle="tab">Profile Picture </a>
                                    </li>

                                    <li class="">
                                        <a href="#personal-details" data-toggle="tab">Personal Details </a>
                                    </li>

                                    <li class="">
                                        <a href="#projects" data-toggle="tab">Projects </a>
                                    </li>      

                                     <li class="">
                                        <a href="#internships" data-toggle="tab">Internships </a>
                                    </li>      

                                    <li class="">
                                        <a href="#academics" data-toggle="tab">Academics </a>
                                    </li>                      
                                
                                </ul>

                 <div class="tab-content">



                                    <div class="tab-pane fade active in" id="profile-picture">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                                <div class="col-sm-12 portlets">
                                                <form method="POST" enctype="multipart/form-data">
                                                      <input type="file" name="jpg"/>
                                                      <input type="submit" name="submit" value="Upload"/>
                                                </form>
                         
                                            </div>
                                            <br>

                                        </div>

                                        
                                    </div>

<?php 
                    $errors=1;
             //Targeting Folder
             $target="profile/";
              
            if(isset($_POST['submit']))
            {
             $target=$target.$college_id.basename($_FILES['jpg']['name']);
             //Getting Selected Type
             $type=pathinfo($target,PATHINFO_EXTENSION);
             //Allow Certain File Format To Upload







             if($type!='jpeg' && $type!='jpg' && $type!='png' && $type!='JPEG' && $type!='JPG' && $type!='PNG')

             {
              echo "Only Jpeg or PNG files format are allowed to Upload";
              echo '<br>';
              $errors=0;
             }
             //Checking for File Size 1000000 bytes== 1MB
              $filesize=$_FILES['jpg']['size'];
            if ($filesize < 100 && $filesize< 2000000)
            {
               echo 'You cannot Upload Large File(2MB)'; 
               echo '<br>';
                $errors=0;
               }
         
             // Check if $errors is set to 0 by an error
             if($errors==0)
             {
              echo 'Upload failed! Try uploading later';
              echo '<br>';
             }else
             {
              //if not error encountered 
               //Moving file to Desired Directory
              $upload_success=move_uploaded_file($_FILES['jpg']['tmp_name'],$target);
              if($upload_success==TRUE){

                date_default_timezone_set('Asia/Kolkata');
                            $date_added=date('Y-m-d');

               //Getting Selected PDF Information
               $file_name=$target;

               $result=($mysqli->query("UPDATE users set profilepic='$file_name' where college_id='$college_id'"));
               if($result==TRUE){
                $_SESSION['profilepic']=$target;
                echo "Your profile picture was successfully updated!";

                echo "<script>window.location = 'studentuser.php';  </script>";
               }
 }
}
}
?>



                                </div>                                    

                                <div class="tab-pane fade " id="personal-details">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                            <form class="form-horizontal" role="form" method="POST">

                                              <div class="form-group">
                                                <label for="input-text-disabled" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text-disabled" name="name" placeholder="<?= $name ?>" disabled>
                                                </div>
                                              </div>


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Phone</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="phone" placeholder="Enter phone number" value="<?= $phone ?>">
                                                </div>
                                              </div>


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Email id</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="email" placeholder="Enter email id" value="<?= $email ?>">
                                                </div>
                                              </div>


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="address" placeholder="Enter current address" value="<?= $address ?>">
                                                </div>
                                              </div>
                                          
                                            
                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Website</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="website" placeholder="Enter your website" value="<?= $website ?>">
                                                </div>
                                              </div>                   


                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">About You</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="about" placeholder="Say something about you" value="<?= $about ?>">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-3">
                                                  <input type="text" class="form-control datepicker-input" name="dob" value="<?= $dob ?>" >
                                                </div>
                                              </div>
                                              
                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Father's Name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="father" placeholder="Enter Father's name" value="<?= $father ?>">
                                                </div>
                                              </div> 

                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Mother's Name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="mother" placeholder="Enter Mother's name" value="<?= $mother ?>">
                                                </div>
                                              </div> 

                                             <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Gender</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="gender" placeholder="Select Gender" value="<?= $gender ?>">
                                                </div>
                                              </div> 

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Religion</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="religion" placeholder="Enter religion" value="<?= $religion ?>">
                                                </div>
                                              </div> 

                                            
                                             <button name="save1" type="submit" class="btn btn-primary" style="float: right;">Save</button>

                                        </form>

                                        </div>

                                        
                                    </div>
                                </div> <!-- / .tab-pane -->
                                   


                                    <div class="tab-pane fade " id="projects">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                            <form class="form-horizontal" role="form" method="POST">

                                            <?php 
                                                    while ($row=mysqli_fetch_array($user_projects)) {

                                                     $project_topic = $row['project_topic'];
                                                     $project_info = $row['project_info'];
                                             


                                            ?>

                                              <div class="form-group">
                                                <label for="input-text-disabled" class="col-sm-2 control-label">Project <?= $project_no?></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="proj_topic[]" placeholder="Enter project topic" value="<?= $project_topic ?>">                                                  
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Description</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="proj_info[]" placeholder="Enter description about the project" value="<?= $project_info ?>">
                                                </div>
                                              </div>
                                          

                                            <?php 
                                                
                                              $project_no+=1;  }
                                            ?>

                                            
                                             <button name="save2" type="submit" class="btn btn-primary" style="float: right;">Save</button>

                                        </form>

                                        </div>

                                        
                                    </div>
                                </div> <!-- / .tab-pane -->

        
                         <div class="tab-pane fade " id="internships">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                            <form class="form-horizontal" role="form" method="POST">

                                            <?php 
                                                    $internship_no=1;

                                                    while ($row=mysqli_fetch_array($user_internships)) {

                                                     $company = $row['company'];
                                                     $internship_topic = $row['internship_topic'];
                                                     $internship_info = $row['internship_info'];
                                             


                                            ?>

                                              <div class="form-group">
                                                <label for="input-text-disabled" class="col-sm-2 control-label">Internship <?= $internship_no?></label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="company[]" placeholder="Enter company name" value="<?= $company ?>">                                                  
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Topic</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="topic[]" placeholder="Enter topic" value="<?= $internship_topic?>">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Description</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="internship_info[]" placeholder="Enter description of the work" value="<?= $internship_info?>">
                                                </div>
                                              </div>
                                          

                                            <?php 
                                                
                                              $internship_no+=1;  }
                                            ?>

                                            
                                             <button name="save3" type="submit" class="btn btn-primary" style="float: right;">Save</button>

                                        </form>

                                        </div>

                                        
                                    </div>
                                </div> <!-- / .tab-pane -->


                                <div class="tab-pane fade " id="academics">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                            <form class="form-horizontal" role="form" method="POST">

                                              <div class="form-group">
                                                <label for="input-text-disabled" class="col-sm-2 control-label">10th School</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text-disabled" name="school_10th" placeholder="Enter school name" value="<?= $school_10th ?>">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">10th Mark/CGPA</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="mark_10th" placeholder="Enter mark" value="<?= $mark_10th ?>">
                                                </div>
                                              </div>
                                          

                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">12th School</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="school_12th" placeholder="Enter school name" value="<?= $school_12th ?>">
                                                </div>
                                              </div>

                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">12th mark</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="mark_12th" placeholder="Enter marks" value="<?= $mark_12th ?>">
                                                </div>
                                              </div>                   


                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">S1</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="sgpa_s1" placeholder="Enter grade point" value="<?= $sgpa_s1 ?>">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">S2</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="sgpa_s2" placeholder="Enter grade point" value="<?= $sgpa_s2 ?>">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">S3</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="sgpa_s3" placeholder="Enter grade point" value="<?= $sgpa_s3 ?>">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">S4</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="sgpa_s4" placeholder="Enter grade point" value="<?= $sgpa_s4 ?>">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">S5</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="sgpa_s5" placeholder="Enter grade point" value="<?= $sgpa_s5 ?>">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">S6</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="sgpa_s6" placeholder="Enter grade point" value="<?= $sgpa_s6 ?>">
                                                </div>
                                              </div>


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">S7</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="sgpa_s7" placeholder="Enter grade point" value="<?= $sgpa_s7 ?>">
                                                </div>
                                              </div>


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">S8</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="sgpa_s8" placeholder="Enter grade point" value="<?= $sgpa_s8 ?>">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">CGPA</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="cgpa" placeholder="Enter grade point" value="<?= $cgpa ?>">
                                                </div>
                                              </div>


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Backlogs</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="backlogs" placeholder="Enter current backlogs" value="<?= $backlogs ?>">
                                                </div>
                                              </div>




                                             
                                            
                                             <button name="save4" type="submit" class="btn btn-primary" style="float: right;">Save</button>

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
                    {    if(isset($_POST['save1']))
                        {
                         $delete_personal_details = ($mysqli->query("DELETE from user_personal_details WHERE college_id='$college_id'"));
                   /*                                          
                        $update = ($mysqli->query("UPDATE user_personal_details set phone='" . $_POST['phone'] . "' where college_id='$college_id'"));
                        $update = ($mysqli->query("UPDATE user_personal_details set about='" . $_POST['about'] . "' where college_id='$college_id'"));
                        $update = ($mysqli->query("UPDATE user_personal_details set emailid='" . $_POST['email'] . "' where college_id='$college_id'"));
                        $update = ($mysqli->query("UPDATE user_personal_details set website='" . $_POST['website'] . "' where college_id='$college_id'"));
                        $update = ($mysqli->query("UPDATE user_personal_details set father='" . $_POST['father'] . "' where college_id='$college_id'"));
                        $update = ($mysqli->query("UPDATE user_personal_details set mother='" . $_POST['mother'] . "' where college_id='$college_id'"));
                        $update = ($mysqli->query("UPDATE user_personal_details set gender='" . $_POST['gender'] . "' where college_id='$college_id'"));
                        $update = ($mysqli->query("UPDATE user_personal_details set religion='" . $_POST['religion'] . "' where college_id='$college_id'"));
                        $update = ($mysqli->query("UPDATE user_personal_details set dob='" . $_POST['dob'] . "' where college_id='$college_id'"));
                    */    



                        $about=$_POST['about'];
                        $about = str_replace("'", "''", "$about");
                        $phone=$_POST['phone'];
                        $email=$_POST['email'];
                        $address=$_POST['address'];
                        $website=$_POST['website'];
                        $father=$_POST['father'];
                        $mother=$_POST['mother'];
                        $dob=$_POST['dob'];
                        $gender=$_POST['gender'];
                        $religion=$_POST['religion'];
                        $update = ($mysqli->query("INSERT INTO user_personal_details (college_id,about,phone,emailid,address,website,father,mother,dob,gender,religion) values('$college_id','$about','$phone','$email','$address','$website','$father','$mother','$dob','$gender','$religion')"));


              ?>
                             <script type="text/javascript">
                    window.location = "studentuser.php";
                        </script> 

                        <?php

                        }


                        if(isset($_POST['save2']))
                        {
                             $proj_topic=$_POST['proj_topic'];
                             $proj_info=$_POST['proj_info'];
                             
                             $delete_project = ($mysqli->query("DELETE from user_projects WHERE college_id='$college_id'"));

                             for($i=0;$i<count($proj_topic)&&($proj_topic[$i]!='');$i++)
                             {
                              
                        //       mysql_query("insert into user_projects(college_id,project_topic,project_info) values('$proj_topic[$i]','$project_info[$i]'");  
                                
                               $update = ($mysqli->query("INSERT INTO user_projects(college_id,project_topic,project_info) values('$college_id','$proj_topic[$i]','$proj_info[$i]')"));
                              
                             }
                             ?>
                             <script type="text/javascript">
                    window.location = "studentuser.php";
                        </script> 

                        <?php
                        }   

                        if(isset($_POST['save3']))
                        {
                             $company=$_POST['company'];
                             $topic=$_POST['topic'];
                             $internship_info=$_POST['internship_info'];
                             
                            $delete_project = ($mysqli->query("DELETE from user_internships WHERE college_id='$college_id'"));

                             for($i=0;$i<count($company)&&($company[$i]!='');$i++)
                             {
                              
                        //       mysql_query("insert into user_projects(college_id,project_topic,project_info) values('$proj_topic[$i]','$project_info[$i]'");  
                               
                               $update = ($mysqli->query("INSERT INTO user_internships(college_id,company,internship_topic,internship_info) values('$college_id','$company[$i]','$topic[$i]','$internship_info[$i]')"));
                              
                             }

                              ?>
                             <script type="text/javascript">
                    window.location = "studentuser.php";
                        </script> 

                        <?php


                        }  

                         if(isset($_POST['save4']))
                        {
                         $delete_academic_details = ($mysqli->query("DELETE from approve_academics WHERE college_id='$college_id'"));


                         date_default_timezone_set('Asia/Kolkata');
                         $request_date=date('Y-m-d H:i:s');

                        $school_10th=$_POST['school_10th'];
                        $school_12th=$_POST['school_12th'];
                        $mark_10th=$_POST['mark_10th'];
                        $mark_12th=$_POST['mark_12th'];
                        $sgpa_s1=$_POST['sgpa_s1'];
                        $sgpa_s2=$_POST['sgpa_s2'];
                        $sgpa_s3=$_POST['sgpa_s3'];
                        $sgpa_s4=$_POST['sgpa_s4'];
                        $sgpa_s5=$_POST['sgpa_s5'];
                        $sgpa_s6=$_POST['sgpa_s6'];
                        $sgpa_s7=$_POST['sgpa_s7'];
                        $sgpa_s8=$_POST['sgpa_s8'];
                        $cgpa=$_POST['cgpa'];
                        $backlogs=$_POST['backlogs'];

                        $update = ($mysqli->query("INSERT INTO approve_academics values('$college_id','$mark_10th','$mark_12th','$sgpa_s1','$sgpa_s2','$sgpa_s3','$sgpa_s4','$sgpa_s5','$sgpa_s6','$sgpa_s7','$sgpa_s8','$cgpa','$backlogs','$request_date')"));


              ?>
                             <script type="text/javascript">
                    window.location = "studentuser.php";
                        </script> 

                        <?php

                        }

                     }       
?>





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
	</body>


</html>

