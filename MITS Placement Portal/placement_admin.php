<?php

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


    $batches = $mysqli->query("SELECT distinct batch from placed");

    $result = $mysqli->query("SELECT * FROM placed");


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
            		<h1><i class='fa fa-table'></i> Placement Statistics</h1>
            		<h3></h3>            	</div>
            	<!-- Page Heading End-->				<!-- Your awesome content goes here -->




				<div class="row">
                    <div class="form-group">


                        <form method="POST">

                             <div class="col-sm-2">
                                <select class="form-control" name="batch" onchange="showUser(this.value)">

                                            <option value="All batches">All Batches</option>

                                    <?php
                                        while($row=$batches->fetch_array())
                                        {  ?>
                                            <option value="<?=$row['batch']?>"><?=$row['batch']?></option>

                                <?php }

                                ?>


                                </select><p class="help-block">Batch</p>

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

                             <div class="col-sm-7">

                                <button name="search" type="submit" class="btn btn-primary" >Search</button>

                                <button name="export" id="export" type="submit" class="btn btn-primary" onclick="exportTableToExcel('datatables-3')"  >Export</button>

                            </div>


                             </form>
            </div>



					<div class="col-md-12">
                        <br>
						<div class="widget">

							<div class="widget-content">

								<div class="table-responsive" id="student_list">
                                    <br>
									<form class='form-horizontal' role='form'>



									<table id="datatables-3" class="table table-striped table-bordered" cellspacing="0" width="100%">
									    <thead>
									        <tr>
                                                <th>College ID</th>
                                                <th>Name</th>
                                                <th>Batch</th>
                                                <th>Package(LPA)</th>
                                                <th>Company</th>


									        </tr>
									    </thead>



									    <tbody>
                                        <?php

                                          if (isset($_POST['batch']))
                                          {
                                            $batchs=$_POST['batch'];
                                            if(strcasecmp($batchs, "All batches"))
                                                $result = $mysqli->query("SELECT * FROM placed WHERE batch='$batchs'");

                                          }



                                            while($row=$result->fetch_array()) {

                                              ?>

                                            <tr>

                                                <td> <?php echo $row['college_id'] ?> </a></td>
                                                <td> <?php echo $row['student_name'] ?> </td>
                                                <td> <?php echo $row['batch'] ?> </td>
                                                <td> <?php echo $row['package'] ?> </td>
                                                <td> <?php echo $row['company'] ?> </td>


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




                 <script>



function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'Placement data.xls';

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
