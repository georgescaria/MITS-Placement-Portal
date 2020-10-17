<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if (!isset( $_SESSION['admin_logged_in'] ) && !isset($_SESSION['faculty_logged_in'])) {
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

$result = ($mysqli->query("SELECT * FROM approve_academics  order by reqest_date desc"));
    
  
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

        
        <?php require 'userheader.php'; ?>

            <!-- Left Sidebar Start -->
        
               <?php if(isset($_SESSION['admin_logged_in']))
                    require 'admin_left.php'; 

                else if(isset($_SESSION['faculty_logged_in']))

                    require 'faculty_left.php'; ?>



        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
								<!-- Page Heading Start -->
				<div class="page-heading">
            		<h1><i class='fa fa-table'></i> Approve Requests</h1>
            		<h3></h3>            	</div>
            	<!-- Page Heading End-->				<!-- Your awesome content goes here -->


				<div class="row">


				
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
									            <th>Name</th>
                                                <th>Branch</th>
                                                <th>10th mark</th>
                                                <th>12th mark</th>
                                                <th>S1 SGPA</th>
                                                <th>S2 SGPA</th>
                                                <th>S3 SGPA</th>
                                                <th>S4 SGPA</th>
                                                <th>S5 SGPA</th>
                                                <th>S6 SGPA</th>
                                                <th>S7 SGPA</th>
                                                <th>S8 SGPA</th>

                                                <th>CGPA</th>
                                                
                                                <th>Backlogs</th>
                                                <th>Approve</th>
                                                <th>Reject</th>
                                                
                                                
									            

									        </tr>
									    </thead>
									 
									
									 
									    <tbody>
                                        <?php

                                        
                                           
                                        
                                            $result=$mysqli->query("SELECT * FROM approve_academics order by request_date desc");
                                                                        

                                            while($row = mysqli_fetch_array($result)) { 

                                            $id=$row['college_id'];
                                            $student = ($mysqli->query("SELECT * FROM users where college_id='$id'"))->fetch_assoc();
                                            $personal = ($mysqli->query("SELECT * FROM user_personal_details where college_id='$id'"))->fetch_assoc();
                                            $academics = ($mysqli->query("SELECT * FROM user_academics where college_id='$id'"))->fetch_assoc();
                                            $sname = $student['name'];


                                            

                                                ?>
									        
                                            <tr>
                                                                                          
                                                <td style='background-color : <?php echo 'WhiteSmoke'; ?>'> <?php echo $row['college_id'] ?> </td>
                                                <td style='background-color : <?php echo 'WhiteSmoke'; ?>'> <?php echo $sname ?> </td>
                                                <td style='background-color : <?php echo 'WhiteSmoke'; ?>'> <?php echo $student['branch'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['10th_mark']==$row['10th_mark']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['10th_mark'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['12th_mark']==$row['12th_mark']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['12th_mark'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['s1']==$row['s1']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['s1'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['s2']==$row['s2']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['s2'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['s3']==$row['s3']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['s3'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['s4']==$row['s4']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['s4'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['s5']==$row['s5']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['s5'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['s6']==$row['s6']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['s6'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['s7']==$row['s7']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['s7'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['s8']==$row['s8']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['s8'] ?> </td>

                                                <td style='background-color : <?php echo ($academics['CGPA']==$row['CGPA']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['CGPA'] ?> </td>
                                                <td style='background-color : <?php echo ($academics['backlogs']==$row['backlogs']?'WhiteSmoke':'Aquamarine'); ?>'> <?php echo $row['backlogs'] ?> </td>
                                                <td> <a class="btn btn-success" href="approve.php?college_id=<?=$id?>" >Approve</a> </td>
                                                <td> <a class="btn btn-danger" href="reject.php?college_id=<?=$id?>" >Reject</a> </td>
   

									        </tr>
		
									       <?php

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
	<script src="assets/libs/jquery-datatables/js/jquery.dataTables.min.js"></script>
	<script src="assets/libs/jquery-datatables/js/dataTables.bootstrap.js"></script>
	<script src="assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<script src="assets/js/pages/datatables.js"></script>
	</body>

</html>