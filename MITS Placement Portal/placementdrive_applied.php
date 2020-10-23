<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if ( $_SESSION['admin_logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");
}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $usertype = $_SESSION['usertype'];
    $college_id = $_SESSION['college_id'];
    $branch = $_SESSION['branch'];
//    $batch = $_SESSION['batch'];


//News Feed


    if (isset($_GET['company']))
    {
        $company_name=$_GET['company'];
        $result = ($mysqli->query("SELECT * FROM new_drive where company_name='$company_name' order by college_id asc"));
    }
    else
    {
        $_SESSION['message'] = "You must select company name first!";
        header("location: error.php");

    }

    if (isset($_POST['apply_status']))
    {
        $apply_status = $_POST['apply_status'];
    }
    else
    {
      $apply_status="Both";
    }


    if (isset($_POST['academicselect']))
        $academicselect = $_POST['academicselect'];
    else
        $academicselect=["10th_mark","12th_mark","CGPA","backlogs"];

    if (isset($_POST['personalselect']))
        $personalselect = $_POST['personalselect'];
    else
        $personalselect=["phone","dob"];



        $academic_details = $mysqli->query("SELECT * FROM user_academics");
        $personal_details = $mysqli->query("SELECT * FROM user_personal_details");

}
?>

<!DOCTYPE html>
<html>


<head>
        <meta charset="UTF-8">
        <title>MITS | <?= $name?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">


         <link rel="stylesheet" href="assets/docs/css/bootstrap-3.3.2.min.css" type="text/css">
        <link rel="stylesheet" href="assets/docs/css/bootstrap-example.min.css" type="text/css">
        <link rel="stylesheet" href="assets/docs/css/prettify.min.css" type="text/css">

        <script type="text/javascript" src="assets/docs/js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="assets/docs/js/bootstrap-3.3.2.min.js"></script>
        <script type="text/javascript" src="assets/docs/js/prettify.min.js"></script>

        <link rel="stylesheet" href="assets/dist/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="assets/dist/js/bootstrap-multiselect.js"></script>



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


        <!--For multselect-->


        <script type="text/javascript">

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

<!-- Top Bar Start -->
<div class="topbar">
    <div class="topbar-left">
        <div class="logo">
            <h1><a href="#"><img src="assets/img/logo.png" alt="Logo"></a></h1>
        </div>
        <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
        </button>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->

</div>

        <?php require 'userheader.php'; ?>

            <!-- Left Sidebar Start -->

        <?php require 'admin_left.php'; ?>


        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
								<!-- Page Heading Start -->
				<div class="page-heading">
            		<h1><i class='fa fa-table'></i>  <?= $company_name ?></h1>
            		<h3></h3>            	</div>
            	<!-- Page Heading End-->				<!-- Your awesome content goes here -->


				<div class="row">





                     <div class="form-group">
                        <label  class="col-md-11 ">Apply status<br><br></label>


                                <form method="POST">


                          <div class="col-sm-2">

                                <select class="form-control"  name="apply_status" value="<?=$apply_status?>" onchange="showUser(this.value)">
                                    <option <?php if($apply_status=="Both") echo "selected" ?> value="Both">Both</option>
                                    <option <?php if($apply_status=="Applied") echo "selected" ?> value="Applied">Applied</option>
                                    <option <?php if($apply_status=="Not Applied") echo "selected" ?> value="Not applied">Not applied</option>

                                </select>
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


                             <div class="col-md-12">

                                <button name="search" type="submit" class="btn btn-primary" >Search</button>

                                <button name="export" id="export" type="submit" class="btn btn-primary" onclick="exportTableToExcel('datatables-4')"  >Export</button>

                                <br>
                                <br>

                            </div>



                             </form>
            </div>

					<div class="col-md-12">
						<div class="widget">

							<div class="widget-content">
							<br>
								<div class="table-responsive">
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

                                                echo "<th>Apply Status</th>";


                                         ?>


									        </tr>
									    </thead>



									    <tbody>
                                        <?php


                                            if(!strcasecmp($apply_status,"Applied"))
                                            {

                                            $result=$mysqli->query("SELECT * FROM new_drive where company_name='$company_name' and apply_status='Applied' order by college_id asc");

                                            }
                                            else if(!strcasecmp($apply_status,"Not applied"))
                                            {

                                            $result=$mysqli->query("SELECT * FROM new_drive where company_name='$company_name' and apply_status='Not applied' order by college_id asc");

                                            }
                                            else
                                            {
                                            $result=$mysqli->query("SELECT * FROM new_drive where company_name='$company_name' order by college_id asc");
                                            }


                                            while($row = mysqli_fetch_array($result)) {

                                            $id=$row['college_id'];
                                            $student = ($mysqli->query("SELECT * FROM users where college_id='$id'"))->fetch_assoc();
                                            $personal = ($mysqli->query("SELECT * FROM user_personal_details where college_id='$id'"))->fetch_assoc();
                                            $academics = ($mysqli->query("SELECT * FROM user_academics where college_id='$id'"))->fetch_assoc();
                                            $name = $student['name'];
                                                ?>

                                            <tr>

                                                <td> <?php echo $row['college_id'] ?> </td>
                                                <td> <?php echo $name ?> </td>
                                                <td> <?php echo $student['branch'] ?> </td>
                                                <td> <?php echo $student['batch'] ?> </td>
                                                <td> <?php echo $student['emailid'] ?> </td>


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

                                                    echo "<td>". $row['apply_status'] ."</td>";



                                           echo "</tr>";







                                        }


                                        ?>
                                        
									    </tbody>
									</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>




                   <script>


                            function exportTableToExcel(tableID, filename = ''){
                                var downloadLink;
                                var companyName="<?php echo $company_name ?>";
                                var dataType = 'application/vnd.ms-excel';
                                var tableSelect = document.getElementById(tableID);
                                var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                                // Specify file name
                                filename = filename?filename+'.xls':companyName+' drive.xls';

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


                    </script>
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

	</div>
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

	<!-- Demo Specific JS Libraries -->
	<script src="assets/libs/prettify/prettify.js"></script>

	<script src="assets/js/init.js"></script>
	<!-- Page Specific JS Libraries -->
	<script src="assets/libs/jquery-datatables/js/jquery.dataTables.min.js"></script>
	<script src="assets/libs/jquery-datatables/js/dataTables.bootstrap.js"></script>
	<script src="assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<script src="assets/js/pages/datatables.js"></script>
	</body>

</html>
