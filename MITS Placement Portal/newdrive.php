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
 
<?php
    require 'logout.php'; 

    ?>
        


    <div id="wrapper">
        
        
        <?php require 'userheader.php'; ?>

            <!-- Left Sidebar Start -->
        
        <?php require 'admin_left.php'; ?>


       <div class="content-page">   


            <div class="content">
                                <!-- Page Heading Start -->
                <div class="page-heading">
                    <h1><i class='fa fa-check'></i> New Drive</h1>
                                    </div>
                <!-- Page Heading End-->    
                                
                <!-- Your awesome content goes here -->
                 <div class="row">
                    <div class="col-sm-12 portlets">
                        <div class="widget">
                           
                            <div class="widget-content padding">
                                <ul id="demo1" class="nav nav-tabs">
                            
                     
                                    <li class="active">
                                        <a href="#new-drive" data-toggle="tab">Company Details </a>
                                    </li> 

                                                                           
                                </ul>
                              


                                <div class="tab-content">



                                    <div class="tab-pane fade active in" id="new-drive">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                            <form class="form-horizontal" role="form" method="POST" action="eligibilitylist.php">


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="company_name" placeholder="Enter company name" required>
                                                </div>
                                              </div>  


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Designation</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="designation" value="" placeholder="Enter designation" >
                                                </div>
                                              </div>
                                          

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Job Description</label>
                                                <div class="col-sm-10">
                                                  <textarea type="text" rows='6' class="form-control" id="input-text" name="job_description" value="" placeholder="Enter job description" > </textarea>
                                                </div>
                                              </div>

                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Package</label>
                                                <div class="col-sm-10">
                                                  <input type="number" name="package" placeholder="Enter in LPA" min=00 step=0.01 value="" class="form-control" id="input-text" name="package" >                                                 
                                                </div>
                                              </div>

                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Scheduled date</label>
                                                <div class="col-sm-10">
                                                  <input type="date" class="form-control" id="input-text" name="drive_date" value="" min=<?php echo date('Y-m-d');?> placeholder="Enter date">
                                                </div>
                                              </div>   


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Last date to apply</label>
                                                <div class="col-sm-10">
                                                  <input type="date" class="form-control" id="input-text" name="last_date" value="" min=<?php echo date('Y-m-d');?> placeholder="Enter date">
                                                </div>
                                              </div>                  

                                         
                                            
                                             <button name="next" type="submit" class="btn btn-primary" style="float: right;">Next</button>

                                        </form>

                                        </div>

                                        
                                    </div>
                                </div>
                                 <!-- / .tab-pane -->

                         
                           


                            


 
                    <!-- Footer Start -->
       
             <footer style="text-align: center;">
                George Scaria &copy; 2018
                
            </footer>
       
            <!-- Footer End -->     
            </div>

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