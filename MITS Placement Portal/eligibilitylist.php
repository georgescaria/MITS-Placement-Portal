<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if ( $_SESSION['admin_logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}


else if (isset($_POST['next'])!=1)
  {   $_SESSION['message'] = "You must enter company details first!";
                header("location: error.php");
  
  }


else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $usertype = $_SESSION['usertype'];
    $college_id = $_SESSION['college_id'];
    $branch = $_SESSION['branch'];

    $next=$_POST['next'];
    $company_name=$_POST['company_name'];
    $package=$_POST['package'];  
    $designation=$_POST['designation'];
    $job_description=$_POST['job_description'];
    $drive_date=$_POST['drive_date'];
    $last_date=$_POST['last_date'];


 if (isset($_POST['minimum_cgpa']))
        $minimum_cgpa = $_POST['minimum_cgpa'];
 else
      $minimum_cgpa=0;


 if (isset($_POST['backlogs']))
        $backlogs = $_POST['backlogs'];
 else
      $backlogs=0;
    

 if (isset($_POST['minimum_percent']))
        $minimum_percent= $_POST['minimum_percent'];
 else
      $minimum_percent=0;

   if (isset($_POST['minimum_10th']))
        $minimum_10th = $_POST['minimum_10th'];
 else
      $minimum_10th=0;

   if (isset($_POST['minimum_12th']))
        $minimum_12th = $_POST['minimum_12th'];
 else
      $minimum_12th=0;

   if (isset($_POST['placement_status']))
        $placement_status = $_POST['placement_status'];
 else
      $placement_status="Both";

  if (isset($_POST['companyselect']))
        $companyselect = $_POST['companyselect'];
    else
        $companyselect=[];

 if (isset($_POST['academicselect']))
        $academicselect = $_POST['academicselect'];
    else
        $academicselect=["10th_mark","12th_mark","CGPA","backlogs"];

 if (isset($_POST['personalselect']))
        $personalselect = $_POST['personalselect'];
    else
        $personalselect=["phone","dob"];



    $companies = $mysqli->query("SELECT distinct company from placed");
    $academic_details = $mysqli->query("SELECT * FROM user_academics");
    $personal_details = $mysqli->query("SELECT * FROM user_personal_details");


    $result=$mysqli->query("SELECT * FROM users where usertype ='Student' or usertype='student'");
  }

?>

<!DOCTYPE html>
<html>
    

<head>
        <meta charset="UTF-8">
        <title>MITS | <?= $name?></title>   
         
         <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="author" content="George Scaria">

      
        <link rel="stylesheet" href="assets/docs/css/bootstrap-3.3.2.min.css" type="text/css">
        <link rel="stylesheet" href="assets/docs/css/bootstrap-example.min.css" type="text/css">
        <link rel="stylesheet" href="assets/docs/css/prettify.min.css" type="text/css">

        <script type="text/javascript" src="assets/docs/js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="assets/docs/js/bootstrap-3.3.2.min.js"></script>
        <script type="text/javascript" src="assets/docs/js/prettify.min.js"></script>

        <link rel="stylesheet" href="assets/dist/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="assets/dist/js/bootstrap-multiselect.js"></script>


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
                <link href="assets/libs/jquery-datatables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
                <link href="assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css" rel="stylesheet" type="text/css" />
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


<script type="text/javascript">
    $(document).ready(function() {
        $('#company-select').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
    });


$(document).ready(function() {
        $('#academic-select').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
    });


$(document).ready(function() {
        $('#personal-select').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
    });
</script>





    </head>

 




    <body class="fixed-left">



<?php
           require 'logout.php'; 

?>	
	<!-- Modal Logout -->
       <!-- Modal End -->	
	<!-- Begin page -->
	<div id="wrapper">
		
        <div class="topbar">
            <div class="topbar-left">
                <div class="logo">
                    <h1><a href="#"><img src="assets/img/logo.png" alt="Logo"></a></h1>
                </div>
                <button class="button-menu-mobile open-left">
                <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>

        
        <?php require 'userheader.php'; ?>


        
        <?php require 'admin_left.php'; ?>


        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
								<!-- Page Heading Start -->
				<div class="page-heading">
            		<h1><i class='fa fa-table'></i> <?= $company_name?> Drive </h1>
            		<h3></h3>            	
                </div>
            	<!-- Page Heading End-->				<!-- Your awesome content goes here -->




				<div class="row">
                    <div class="form-group">
                        <label  class="col-md-11 ">Minimum criteria<br></label>
                       

                       <form class="form-horizontal" method="POST" action="eligibilitylist.php">
                            <div class="col-sm-2">
                                


                                <input type="number" id="minimum_cgpa" onchange="cgpaChange()" min=0 max=10 step=0.001 class="form-control" placeholder="Enter CGPA" name="minimum_cgpa" value="<?=$minimum_cgpa?>">
                                    <p class="help-block"> CGPA</p>
                             </div>
                            
                             <div class="col-sm-2">
                            
                                <input type="number" id="minimum_percent" onchange="percentChange()" min=0 max=100 step=0.01 class="form-control" placeholder="Enter Btech aggregate" name="minimum_percent" value="<?=$minimum_percent?>">
                                    <p class="help-block"> Btech %</p>
                            
                            </div>
                            
                            <div class="col-sm-2">
                              
                                <input type="number"  min=0 max=100 step=0.001 class="form-control" placeholder="Enter 10th %" name="minimum_10th" value="<?=$minimum_10th?>">
                                    <p class="help-block"> 10th %</p>
                            
                            </div>
                            
                            <div class="col-sm-2">
                          
                                <input type="number"  min=0 max=100 step=0.001 class="form-control" placeholder="Enter 12th %" name="minimum_12th" value="<?=$minimum_12th?>">
                                    <p class="help-block"> 12th %</p>
                                
                            </div>

                        <?php
                        /*
                             <div class="col-sm-2">
                          
                                <select class="form-control" placeholder="Enter Branch" name="branch" value="<?=$minimum_12th?>">
                                    <option>Computer Science & Engineering</option>
                                    <option>Civil Engineering</option>
                                    <option>Electrical & Electronics Engineering</option>
                                    <option>Electronics & Communication Engineering</option>
                                    <option>Mechanical Engineering</option>

                                    </select>
                                    <p class="help-block"> Branch</p>
                                
                            </div>
                */    ?>
                            <div class="col-sm-2">
                          
                                <input type="number"  min=0 max=10 step=1 class="form-control" placeholder="Enter maximum backlogs" name="backlogs" value="<?=$backlogs?>">
                                    <p class="help-block"> Backlogs </p>
                                
                            </div>


                            <div class="col-sm-2">
                          
                                <select class="form-control"  name="placement_status" value="<?=$placement_status?>" onchange="showUser(this.value)">
                                    <option <?php if($placement_status=="Both") echo "selected" ?> value="Both">Both</option>
                                    <option <?php if($placement_status=="Placed") echo "selected" ?> value="Placed">Placed</option>
                                    <option <?php if($placement_status=="Not placed") echo "selected" ?> value="Not placed">Not placed</option>

                                </select><p class="help-block">Placement status</p>
                                
                            </div>



                            <div class="col-sm-2">


                                <select id="company-select" value="<?=$companyselect?>" name="companyselect[]" multiple="multiple">
                                    
                                <?php   
                                        while($row=$companies->fetch_array()) 
                                        { 

                                       
                                         ?>
                                            <option <?php if((in_array($row['company'],$companyselect))||$placement_status=="Both"||$placement_status=="Placed") echo "selected"; ?> value="<?=$row['company']?>"><?=$row['company']?></option>
                                                         
                                <?php 
                                        
                                    
                                        }   
                                ?>

                                </select>
                                <p class="help-block">Include Companies</p>
                   
                                <br>
                            </div>

                           
                        <label  class="col-md-11 ">Details to view<br></label>

                            <div class="col-sm-2">


                                <select id="academic-select" value="<?=$academicselect?>" name="academicselect[]" multiple="multiple">
                                    
                               
                                            <option  <?php if(in_array("10th_school",$academicselect)) echo "selected"; ?> value="10th_school">10th School Name </option>
                                            <option  <?php if(in_array("10th_mark",$academicselect)) echo "selected"; ?> value="10th_mark">10th Mark </option>
                                            <option  <?php if(in_array("12th_school",$academicselect)) echo "selected"; ?> value="12th_school">12th School Name </option>
                                            <option  <?php if(in_array("12th_mark",$academicselect)) echo "selected"; ?> value="12th_mark">12th Mark </option>
                                            <option  <?php if(in_array("s1",$academicselect)) echo "selected"; ?> value="s1">S1 SGPA </option>
                                            <option  <?php if(in_array("s2",$academicselect)) echo "selected"; ?> value="s2">S2 SGPA </option>
                                            <option  <?php if(in_array("s3",$academicselect)) echo "selected"; ?> value="s3">S3 SGPA </option>
                                            <option  <?php if(in_array("s4",$academicselect)) echo "selected"; ?> value="s4">S4 SGPA </option>
                                            <option  <?php if(in_array("s5",$academicselect)) echo "selected"; ?> value="s5">S5 SGPA </option>
                                            <option  <?php if(in_array("s6",$academicselect)) echo "selected"; ?> value="s6">S6 SGPA </option>
                                            <option  <?php if(in_array("s7",$academicselect)) echo "selected"; ?> value="s7">S7 SGPA </option>
                                            <option  <?php if(in_array("s8",$academicselect)) echo "selected"; ?> value="s8">S8 SGPA </option>
                                            <option  <?php if(in_array("CGPA",$academicselect)) echo "selected"; ?> value="CGPA">CGPA </option>
                                            <option  <?php if(in_array("backlogs",$academicselect)) echo "selected"; ?> value="backlogs">Backlogs </option>
                             
                                </select>
                                <p class="help-block">Academic details</p>
                   
                                <br>
                            </div>
                            

                            <div class="col-sm-2">


                                <select id="personal-select" value="<?=$personalselect?>" name="personalselect[]" multiple="multiple">
                                    
                              
                                            <option  <?php if(in_array("phone",$personalselect)) echo "selected"; ?> value="phone">Phone </option>
                                            <option  <?php if(in_array("address",$personalselect)) echo "selected"; ?> value="address">Address </option>
                                            <option  <?php if(in_array("dob",$personalselect)) echo "selected"; ?> value="dob">Date of Birth </option>
                                            <option  <?php if(in_array("father",$personalselect)) echo "selected"; ?> value="father">Father's name </option>
                                            <option  <?php if(in_array("mother",$personalselect)) echo "selected"; ?> value="mother">Mother's name </option>
                                            <option  <?php if(in_array("gender",$personalselect)) echo "selected"; ?> value="gender">Gender </option>
                                                         
                                

                                </select>
                                <p class="help-block">Personal details</p>
                   
                                <br>
                            </div>





                             <div class="col-sm-12">

                                <button name="search" type="submit" class="btn btn-primary"  >Search</button>

                                <button name="export" id="export" type="submit" class="btn btn-primary" onclick="exportTableToExcel('datatables-4')"  >Export</button>

                                <button name="apply" type="submit" class="btn btn-primary" style="float:right" > Request to apply  </button>

                            </div>

                            <input type="hidden"  name="next" value="<?= $next ?>">
                            <input type="hidden"  name="company_name" value="<?= $company_name ?>">
                            <input type="hidden"  name="package" value="<?= $package ?>">
                            <input type="hidden"  name="designation" value="<?= $designation ?>">
                            <input type="hidden"  name="job_description" value="<?= $job_description ?>">
                            <input type="hidden"  name="drive_date" value="<?= $drive_date ?>">
                            <input type="hidden"  name="last_date" value="<?= $last_date ?>">



                            </div>


                             </form>
            

            

					<div class="col-md-12">
                        <br>
						<div class="widget">
						
							<div class="widget-content">
				
								<div class="table-responsive" id="student_list">
                                    
									<form class='form-horizontal' role='form'>

                                        

									<table id="datatables-4" class="table table-striped table-bordered" cellspacing="0" width="100%">
									    <thead>
									        <tr>
                                                <th>College ID</th>
									            <th>Student Name</th>
									            <th>Branch</th>
                                                <th>Batch</th>
                                                <th>Email</th>

                                        <?php  if(in_array("phone",$personalselect)) 
                                                   echo  "<th>Phone</th>";
                                                if(in_array("address",$personalselect))
                                                    echo "<th>Address</th>";
                                                if(in_array("dob",$personalselect))
                                                    echo "<th>Date of Birth</th>";
                                                if(in_array("father",$personalselect))
                                                    echo "<th>Father's name</th>";
                                                if(in_array("mother",$personalselect))
                                                    echo "<th>Mother's name</th>";
                                                if(in_array("gender",$personalselect))
                                                    echo "<th>Gender</th>";


                                                if(in_array("10th_school",$academicselect))
                                                    echo "<th>10th School name</th>";
                                                if(in_array("10th_mark",$academicselect))
                                                    echo "<th>10th Mark</th>";
                                                if(in_array("12th_school",$academicselect))
                                                    echo "<th>12th School name</th>";
                                                if(in_array("12th_mark",$academicselect))
                                                    echo "<th>12th Mark</th>";

                                                if(in_array("s1",$academicselect))
                                                    echo "<th>S1 SGPA</th>";
                                                if(in_array("s2",$academicselect))
                                                    echo "<th>S2 SGPA</th>";
                                                if(in_array("s3",$academicselect))
                                                    echo "<th>S3 SGPA</th>";
                                                if(in_array("s4",$academicselect))
                                                    echo "<th>S4 SGPA</th>";
                                                if(in_array("s5",$academicselect))
                                                    echo "<th>S5 SGPA</th>";
                                                if(in_array("s6",$academicselect))
                                                    echo "<th>S6 SGPA</th>";
                                                if(in_array("s7",$academicselect))
                                                    echo "<th>S7 SGPA</th>";
                                                if(in_array("s8",$academicselect))
                                                    echo "<th>S8 SGPA</th>";
                                                if(in_array("CGPA",$academicselect))
                                                    echo "<th>CGPA</th>";

                                                    echo "<th>BTech aggregate</th>";
                                                if(in_array("backlogs",$academicselect))
                                                    echo "<th>Backlogs</th>";
                                              
                                                
									     ?>

									        </tr>
									    </thead>
									 

									 
									    <tbody>
                                        <?php

                                        
                                            if($placement_status=="Placed")
                                            {     
                                                
                                            $result=$mysqli->query("SELECT * FROM users where (usertype ='Student' or usertype='student') and college_id in (select college_id from placed)");
                                           
                                            }
                                            else if($placement_status=="Not placed")
                                            {     
                                                
                                            $result=$mysqli->query("SELECT * FROM users where (usertype ='Student' or usertype='student') and (college_id  not in (select college_id from placed) or college_id in (select college_id from placed where company in('" . implode($companyselect, "', '") . "')))");
                                           
                                            }
                                            else
                                                $result=$mysqli->query("SELECT * FROM users where usertype ='Student' or usertype='student'");
                                        
                            

                          //  print_r($_POST);
                                            while($row=$result->fetch_array()) 
                                            { 

                                            $id=$row['college_id'];
                                       
                                            $academics = ($mysqli->query("SELECT * FROM user_academics where college_id='$id'"))->fetch_assoc();

                                             $personal = ($mysqli->query("SELECT * FROM user_personal_details where college_id='$id'"))->fetch_assoc();


                                             if (isset($_POST['search'])) 
                                             {  
                                                
                                                      
                                                      if($academics['CGPA']>=$minimum_cgpa&&$academics['10th_mark']>=$minimum_10th&&$academics['12th_mark']>=$minimum_12th&&$academics['CGPA']*10-3.75>=$minimum_percent&&$academics['backlogs']<=$backlogs)    
                                                      {                        
                                                ?>
									        
                                            <tr>
                                                 

                                                <td> <?php echo $row['college_id'] ?> </td>                                              
                                                <td> <?php echo $row['name'] ?> </td>
                                                <td> <?php echo $row['branch'] ?> </td>
                                                <td> <?php echo $row['batch'] ?> </td>
                                                <td> <?php echo $row['emailid'] ?> </td>

                                        <?php

                                                if(in_array("phone",$personalselect)) 
                                                   echo  "<td>".$personal['phone']."</td>";
                                                if(in_array("address",$personalselect))
                                                    echo  "<td>".$personal['address']."</td>";
                                                if(in_array("dob",$personalselect))
                                                    echo  "<td>".$personal['dob']."</td>";
                                                if(in_array("father",$personalselect))
                                                    echo  "<td>".$personal['father']."</td>";
                                                if(in_array("mother",$personalselect))
                                                    echo  "<td>".$personal['mother']."</td>";
                                                if(in_array("gender",$personalselect))
                                                    echo  "<td>".$personal['gender']."</td>";


                                                if(in_array("10th_school",$academicselect))
                                                    echo  "<td>".$academics['10th_school']."</td>";
                                                if(in_array("10th_mark",$academicselect))
                                                    echo  "<td>".$academics['10th_mark']."</td>";
                                                if(in_array("12th_school",$academicselect))
                                                    echo  "<td>".$academics['12th_school']."</td>";
                                                if(in_array("12th_mark",$academicselect))
                                                    echo  "<td>".$academics['12th_mark']."</td>";

                                                if(in_array("s1",$academicselect))
                                                    echo  "<td>".$academics['s1']."</td>";
                                                if(in_array("s2",$academicselect))
                                                    echo  "<td>".$academics['s2']."</td>";
                                                if(in_array("s3",$academicselect))
                                                    echo  "<td>".$academics['s3']."</td>";
                                                if(in_array("s4",$academicselect))
                                                    echo  "<td>".$academics['s4']."</td>";
                                                if(in_array("s5",$academicselect))
                                                    echo  "<td>".$academics['s5']."</td>";
                                                if(in_array("s6",$academicselect))
                                                    echo  "<td>".$academics['s6']."</td>";
                                                if(in_array("s7",$academicselect))
                                                    echo  "<td>".$academics['s7']."</td>";
                                                if(in_array("s8",$academicselect))
                                                    echo  "<td>".$academics['s8']."</td>";
                                                if(in_array("CGPA",$academicselect))
                                                    echo  "<td>".$academics['CGPA']."</td>";

                                                    echo "<td>". ($academics['CGPA']*10-3.75) ."</td>";
                                                if(in_array("backlogs",$academicselect))
                                                    echo "<td>".$academics['backlogs']." </td>";
                                              
                                               
                                      

									       echo "</tr>";
		
									       
                                       }
                                       }
                                       else
                                       {
                                        ?>
                                        
                                        <tr>
                                                
                                                <td> <?php echo $row['college_id'] ?> </td>                                                 
                                                <td> <?php echo $row['name'] ?> </td>
                                                <td> <?php echo $row['branch'] ?> </td>
                                                <td> <?php echo $row['batch'] ?> </td>
                                                <td> <?php echo $row['emailid'] ?> </td>

                                            <?php

                                                if(in_array("phone",$personalselect)) 
                                                   echo  "<td>".$personal['phone']."</td>";
                                                if(in_array("address",$personalselect))
                                                    echo  "<td>".$personal['address']."</td>";
                                                if(in_array("dob",$personalselect))
                                                    echo  "<td>".$personal['dob']."</td>";
                                                if(in_array("father",$personalselect))
                                                    echo  "<td>".$personal['father']."</td>";
                                                if(in_array("mother",$personalselect))
                                                    echo  "<td>".$personal['mother']."</td>";
                                                if(in_array("gender",$personalselect))
                                                    echo  "<td>".$personal['gender']."</td>";


                                                if(in_array("10th_school",$academicselect))
                                                    echo  "<td>".$academics['10th_school']."</td>";
                                                if(in_array("10th_mark",$academicselect))
                                                    echo  "<td>".$academics['10th_mark']."</td>";
                                                if(in_array("12th_school",$academicselect))
                                                    echo  "<td>".$academics['12th_school']."</td>";
                                                if(in_array("12th_mark",$academicselect))
                                                    echo  "<td>".$academics['12th_mark']."</td>";

                                                if(in_array("s1",$academicselect))
                                                    echo  "<td>".$academics['s1']."</td>";
                                                if(in_array("s2",$academicselect))
                                                    echo  "<td>".$academics['s2']."</td>";
                                                if(in_array("s3",$academicselect))
                                                    echo  "<td>".$academics['s3']."</td>";
                                                if(in_array("s4",$academicselect))
                                                    echo  "<td>".$academics['s4']."</td>";
                                                if(in_array("s5",$academicselect))
                                                    echo  "<td>".$academics['s5']."</td>";
                                                if(in_array("s6",$academicselect))
                                                    echo  "<td>".$academics['s6']."</td>";
                                                if(in_array("s7",$academicselect))
                                                    echo  "<td>".$academics['s7']."</td>";
                                                if(in_array("s8",$academicselect))
                                                    echo  "<td>".$academics['s8']."</td>";
                                                if(in_array("CGPA",$academicselect))
                                                    echo  "<td>".$academics['CGPA']."</td>";

                                                    echo "<td>". ($academics['CGPA']*10-3.75) ."</td>";
                                                if(in_array("backlogs",$academicselect))
                                                    echo "<td>".$academics['backlogs']." </td>";
                                              
                                               
                                      

                                           echo "</tr>";

                                                
                                      

                                       }
                                    }

                                ?>

                                
									    </tbody>
                                        

									</table>


                                        <?php

                                        if (isset($_POST['apply'])) 
                                            
                                            { 

                                            $emails=array();

                                            if($placement_status=="Placed")
                                            {     
                                                
                                            $result=$mysqli->query("SELECT * FROM users where (usertype ='Student' or usertype='student') and college_id in (select college_id from placed)");
                                           
                                            }
                                            else if($placement_status=="Not placed")
                                            {     
                                                
                                            $result=$mysqli->query("SELECT * FROM users where (usertype ='Student' or usertype='student') and college_id  not in (select college_id from placed)");
                                           
                                            }
                                            else
                                                $result=$mysqli->query("SELECT * FROM users where usertype ='Student' or usertype='student'");
                                        
                            
                                            while($row=$result->fetch_array()) 
                                            { 

                                            $id=$row['college_id'];
                                       
                                            $academics = ($mysqli->query("SELECT * FROM user_academics where college_id='$id'"))->fetch_assoc();
                                            $personal = ($mysqli->query("SELECT * FROM users where college_id='$id'"))->fetch_assoc();

                                             
                                               

                                                        date_default_timezone_set('Asia/Kolkata');
                                                        $date_added=date('Y-m-d H:i:s');

                                                      
                                                      if($academics['CGPA']>=$minimum_cgpa&&$academics['10th_mark']>=$minimum_10th&&$academics['12th_mark']>=$minimum_12th&&$academics['CGPA']*10-3.75>=$minimum_percent&&$academics['backlogs']<=$backlogs)    
                                                      {                        
                                               


                                                        $insertn = ($mysqli->query("INSERT INTO new_drive values('$company_name','$id','Not applied','$package','$designation','$job_description','$drive_date','$last_date','$date_added')"));
                                                        
                                                        array_push($emails, $personal['emailid']);
                                                        


                                                       }

                                                        
                                                       
                                                       }

                                                       $content="Apply for $company_name drive!";
                                                        date_default_timezone_set('Asia/Kolkata');
                                                        $timestamp=date('Y-m-d H:i:s');

                                                        $post=($mysqli->query("INSERT INTO newsfeed(date,name,college_id,content) values('$timestamp','$name','$college_id','$content')"));

                                                        $serialized = rawurlencode(serialize($emails));

                                                        echo "<script> type='text/javascript'    
                                                                window.location = 'sendmail.php?company=$company_name&emails=$serialized';
                                                         </script>";

                                                      // require 'sendmail.php?company=<?=$company_name
                                                   
                                                       
                                    }

                                ?>



    								</form>
								</div>
							</div>
						</div>
					</div>

                    



				</div>


<script type="text/javascript">

             






function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var companyName="<?php echo $company_name ?>";
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':companyName+' drive data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}



function cgpaChange()
{


    document.getElementById("minimum_percent").value = document.getElementById("minimum_cgpa").value*10-3.75;
}


function percentChange()
{


    document.getElementById("minimum_cgpa").value = document.getElementById("minimum_percent").value/10+.375;
}


 </script>  
				            <!-- Footer Start -->
       
             <footer style="text-align: center;">
                George Scaria &copy; 2018
                
            </footer>
       
            <!-- Footer End -->			
            </div>



        </div>

    </div>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

		<!-- End right content -->

	<!-- End of page -->
		<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
	<script>
		var resizefunc = [];
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->




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
    <!--script src="assets/libs/bootstrap-select/bootstrap-select.min.js"></script-->
    <script src="assets/libs/bootstrap-select2/select2.min.js"></script>

    <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script> 
    <script src="assets/libs/pace/pace.min.js"></script>
    <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script src="assets/libs/jquery-icheck/icheck.min.js"></script>

    <script src="assets/libs/prettify/prettify.js"></script>

    <script src="assets/js/init.js"></script>


     <!-- Page Specific JS Libraries -->
    <script src="assets/libs/jquery-datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/jquery-datatables/js/dataTables.bootstrap.js"></script>
    <script src="assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="assets/js/pages/datatables.js"></script>


	</body>

</html>