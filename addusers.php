<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';

//For excel import
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');


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
                    <h1><i class='fa fa-check'></i> Add Users</h1>
                                    </div>
                <!-- Page Heading End-->    
                                
                <!-- Your awesome content goes here -->
            <div class="row">
                    <div class="col-sm-12 portlets">
                        <div class="widget">
                           
                            <div class="widget-content padding">
                            
                                <ul id="demo1" class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#import-users" data-toggle="tab">Import Users </a>
                                    </li>

                                    <li class="">
                                        <a href="#add-user" data-toggle="tab">Add User </a>
                                    </li>

                                              
                                
                                </ul>
                              


                                <div class="tab-content">

                                        <div class="tab-pane fade active in" id="import-users">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                                <div class="col-sm-12 portlets">
                                               <form action="" method="post"
                                                        name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                                                        <div>
                                                            <label>Choose File:</label> <input type="file" name="file"
                                                                id="file" accept=".xls,.xlsx">

                                                                <br>
                                                                <br>
                                                                

                                                                <a href="uploads/Import format.xls" target="_BLANK">Download</a> sample format

                                                                <br>
                                                                <br>
                                                             <button style="display: block; margin: 0 auto;" name="import" type="submit" class="btn btn-primary" >Import</button>
                                                    
                                                        </div>
                                                    
                                                    </form>
                         
                                            </div>

                                             
                                            <br>

                                        </div>

                                        
                                    </div>




                                </div>   

                                <div class="tab-pane fade" id="add-user">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                            <form class="form-horizontal" role="form" method="POST">

                                          

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">College ID</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="add_college_id" placeholder="Enter college ID">
                                                </div>
                                              </div>   


                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="add_name" placeholder="Enter student or admin name">
                                                </div>
                                              </div>   


                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Branch</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="add_branch" placeholder="Enter branch">
                                                </div>
                                              </div>   


                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Batch</label>
                                                <div class="col-sm-10">
                                                  <input type="text" name="add_batch" placeholder="Enter batch" value="" class="form-control" id="input-text" name="package" >                                                 
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Email ID</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="add_emailid" placeholder="Enter email id">
                                                </div>
                                              </div>  

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">User type</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="add_usertype" placeholder="student or admin">
                                                </div>
                                              </div>  
            
                                            
                                             <button style="display: block; margin: 0 auto;"  name="add" type="submit" class="btn btn-primary" >Add</button>

                                        </form>

                                        </div>

                                        
                                    </div>
                                </div>                                 


                                </div>

                                </div>
                                </div>
                                </div>
                                </div>
                                 <!-- / .tab-pane -->
</div>
                         
                           <?php


                                    if (isset($_POST['add'])) 
                                            { 
                                               

                                                    $add_college_id=$_POST['add_college_id'];
                                                    $add_name=$_POST['add_name'];
                                                    $add_branch=$_POST['add_branch'];
                                                    $add_batch=$_POST['add_batch']; 
                                                    $add_emailid=$_POST['add_emailid'];
                                                    $add_usertype=$_POST['add_usertype'];

                                                    $insertn = ($mysqli->query("INSERT INTO users values ('$add_college_id','$add_name','profile/user.png','$add_branch','$add_batch','$add_college_id','$add_emailid','mits1234','$add_usertype')"));

                                                    if($insertn)
                                                    {
                                                        echo "<script> type='text/javascript'> alert('Successfully added');  
                                                                window.location = 'adminuser.php';
                                                         </script>";
                                                    }
                                                       
                                            }



                                   if (isset($_POST["import"]))
                                        {
                                            
                                            
                                          $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
                                          
                                          if(in_array($_FILES["file"]["type"],$allowedFileType)){

                                                $targetPath = 'uploads/'.$_FILES['file']['name'];
                                                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                                                
                                                $Reader = new SpreadsheetReader($targetPath);
                                                
                                                $sheetCount = count($Reader->sheets());
                                                for($i=0;$i<$sheetCount;$i++)
                                                {
                                                    
                                                    $Reader->ChangeSheet($i);
                                                    
                                                    foreach ($Reader as $Row)
                                                    {
                                                  
                                                        $import_college_id = "";
                                                        if(isset($Row[0])) {
                                                            $import_college_id = mysqli_real_escape_string($mysqli,$Row[0]);
                                                        }

                                                        $import_name = "";
                                                        if(isset($Row[1])) {
                                                            $import_name = mysqli_real_escape_string($mysqli,$Row[1]);
                                                        }

                                                        $import_branch = "";
                                                        if(isset($Row[2])) {
                                                            $import_branch = mysqli_real_escape_string($mysqli,$Row[2]);
                                                        }

                                                        $import_batch = "";
                                                        if(isset($Row[3])) {
                                                            $import_batch = mysqli_real_escape_string($mysqli,$Row[3]);
                                                        }
                                                        
                                                        $import_emailid = "";
                                                        if(isset($Row[4])) {
                                                            $import_emailid = mysqli_real_escape_string($mysqli,$Row[4]);
                                                        }

                                                        $import_usertype = "";
                                                        if(isset($Row[5])) {
                                                            $import_usertype = mysqli_real_escape_string($mysqli,$Row[5]);
                                                        }
                                                        
                                                        if (!empty($import_college_id) || !empty($import_name) || !empty($import_branch)|| !empty($import_batch) || !empty($import_emailid) || !empty($import_usertype)) {
                                                            $query = "insert into users values('".$import_college_id."','".$import_name."','"."profile/user.png"."','".$import_branch."','".$import_batch."','".$import_college_id."','".$import_emailid."','"."mits1234"."','".$import_usertype."')";
                                                            $result = mysqli_query($mysqli, $query);

                                                            
                                                        
                                                            if (! empty($result)) {
                                                                $type = "success";
                                                                $message = "Excel Data Imported into the Database";
                                                                
                                                                echo "<script> type='text/javascript'> alert('Successfully added');  
                                                                        window.location = 'adminuser.php';
                                                                 </script>";
                                                    
                                                            } 
                                                            else {
                                                                $type = "error";
                                                                $message = "Problem in Importing Excel Data";
                                                            }
                                                        }
                                                     }
                                                
                                                 }
                                          }
                                          else
                                          { 
                                                $type = "error";
                                                $message = "Invalid File Type. Upload Excel File.";
                                          }
                                        }
                                        ?>
                                                       
                                                       
                                    

                             



                            
     

 
                    <!-- Footer Start -->
       
             <footer style="text-align: center;">
                George Scaria &copy; 2018
                
            </footer>
       
            <!-- Footer End -->     
       

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