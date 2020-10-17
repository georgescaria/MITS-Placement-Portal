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



    //Fetch Personal details



    if(isset($_POST['next']))
    {
       $next=$_POST['next'];
       $questions=$_POST['no_of_questions'];
       $_SESSION['test_title']=$_POST['test_title'];  

       $_SESSION['time_limit']=$_POST['hours']*3600 + $_POST['minutes']*60;
       $_SESSION['rules']=$_POST['rules'];
    }
        
    else
     {   $next=0;
     }
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
            		<h1><i class='fa fa-check'></i> <?php echo ($next?$_POST['test_title']:'Create'); ?> test</h1>
            		            	</div>
            	<!-- Page Heading End-->	
								
				<!-- Your awesome content goes here -->
				 <div class="row">
                    <div class="col-sm-12 portlets">
                        <div class="widget">
                           
                            <div class="widget-content padding">
                                <ul id="demo1" class="nav nav-tabs">
                            
                        <?php


                            if($next==0)
                            {   

                        ?>
                                
                                    <li class="active">
                                        <a href="#personal-details" data-toggle="tab">Test Details </a>
                                    </li>

                            <?php } 

                                else
                                {   

                            ?>


                                    <li class="active">
                                        <a href="#projects" data-toggle="tab">Add questions </a>
                                    </li> 

                                    <li class="">
                                        <a href="#test-import" data-toggle="tab"> Import Questions </a>
                                    </li>     

                            <?php

                                      }

                            ?>                        
                                
                                </ul>
                              


                                <div class="tab-content">


                        <?php


                            if($next==0)
                            {   

                        ?>

                                    <div class="tab-pane fade active in" id="personal-details">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                            <form class="form-horizontal" role="form" method="POST" action="createtest.php">


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Title</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="test_title" placeholder="Test title" required>
                                                </div>
                                              </div>  


                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Number of questions</label>
                                                <div class="col-sm-10">
                                                  <input type="number" class="form-control" id="input-text" name="no_of_questions" placeholder="Enter number of questions" required>
                                                </div>
                                              </div>
                                          

                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Time Limit ( hr : min )</label>
                                                <div class="col-sm-10">
                                                  <input type="number" name="hours" placeholder="Hours" min="00" class="form-control" id="input-text" name="time_limit" required>
                                               

                                               
                                                  <input type="number" name="minutes" placeholder="Minutes" min="00" max="59" class="form-control" id="input-text" name="time_limit" required>
                                                </div>
                                              </div>

                                               <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Rules</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="rules" placeholder="Enter rules, if any">
                                                </div>
                                              </div>                   


                                              

                                            
                                             <button name="next" type="submit" value='1' class="btn btn-primary" style="float: right;">Next</button>

                                        </form>

                                        </div>

                                        
                                    </div>
                                </div>
                                 <!-- / .tab-pane -->

                                <?php 
                            } 
                                
                                   
                           


                            if($next==1)
                            {   

                            ?>

                                    <div class="tab-pane fade active in" id="projects">
                                        <div class="widget">
                                 
                                            <div class="widget-content padding">
                                            <form class="form-horizontal" role="form" method="POST">

                                            <?php 
                                                   if(isset($_POST['no_of_questions'])) 

                                                   {


                                                  
                                                    $i=1;
                                                  

                                                    while($i<=$questions)
                                                    {   
                                            ?>

                                              <div class="form-group">
                                                <label for="input-text-disabled" class="col-sm-2 control-label">Question <?= $i?></label>
                                                <div class="col-sm-10">
                                                  <textarea type="text" rows='6' class="form-control" id="input-text" name="question[]"  ></textarea>                                                  
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Option A</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="option_a[]" >
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Option B</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="option_b[]"  >
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Option C</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="option_c[]"  >
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Option D</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="option_d[]" >
                                                </div>
                                              </div>
                                            

                                              <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Answer</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="input-text" name="answer[]"  >
                                                </div>
                                              </div>

                                              <br><br>


                                            <?php 
                                                

                                                $i+=1;
                                               }

                                           }

                                
                                            ?>

                                            
                                             <button name="save" type="submit" class="btn btn-primary" style="float: right;">Save</button>

                                        </form>

                                        </div>

                                        
                                    </div>
                                </div> <!-- / .tab-pane -->


                                <div class="tab-pane fade " id="test-import">
                                    
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
                                                                

                                                                <a href="uploads/Import test format.xls" target="_BLANK">Download</a> sample format

                                                                <br>
                                                                <br>
                                                             <button style="display: block; margin: 0 auto;" name="import" type="submit" class="btn btn-primary" >Import</button>
                                                    
                                                        </div>
                                                    
                                                    </form>
                         
                                            </div>

                                             <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
                                            <br>

                                        </div>

                                        
                                    </div>

                                </div> 
        
                        <?php

                                } ?>




                                </div> <!-- / .tab-content -->
                        
                                
                                

                            </div>


                        </div>

                        
                         
                    </div>
                
                </div>
				<!-- End of your awesome content -->


			<?php 
                  

                        if(isset($_POST['save']))
                        {

                            date_default_timezone_set('Asia/Kolkata');
                            $test_date=date('Y-m-d H:i:s');

                  
                            $test_title= $_SESSION['test_title'];
                            $time_limit= $_SESSION['time_limit'];
                            $rules= $_SESSION['rules'];
                           

                            $test_id=$test_title.$test_date;

                            
                           
                            $question=$_POST['question'];

                            $option_a=$_POST['option_a'];
                            $option_b=$_POST['option_b'];
                            $option_c=$_POST['option_c'];
                            $option_d=$_POST['option_d'];
                            
                            $answer=$_POST['answer'];



                             for($i=0;$i<count($question)&&($question[$i]!='');$i++)
                             {
                              
  
                               $add = ($mysqli->query("INSERT INTO test values('$test_id','$test_date','$test_title','$time_limit','$rules','$question[$i]','$option_a[$i]','$option_b[$i]','$option_c[$i]','$option_d[$i]','$answer[$i]')"));
                              
                             }


                           }



                             if (isset($_POST["import"]))
                                        {
                                            

                                          date_default_timezone_set('Asia/Kolkata');
                                          $test_date=date('Y-m-d H:i:s');

                  
                                          $test_title= $_SESSION['test_title'];
                                          $time_limit= $_SESSION['time_limit'];
                                          $rules= $_SESSION['rules'];
                           

                                          $test_id=$test_title.$test_date;


                                            
                                          $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
                                          
                                          if(in_array($_FILES["file"]["type"],$allowedFileType))
                                          {

                                                $targetPath = 'uploads/'.$_FILES['file']['name'];
                                                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                                                
                                                $Reader = new SpreadsheetReader($targetPath);
                                                
                                                $sheetCount = count($Reader->sheets());
                                                for($i=0;$i<$sheetCount;$i++)
                                                {
                                                    
                                                    $Reader->ChangeSheet($i);
                                                    
                                                    foreach ($Reader as $Row)
                                                    {
                                                  
                                                        $question = "";
                                                        if(isset($Row[0])) {
                                                            $question = mysqli_real_escape_string($mysqli,$Row[0]);
                                                        }

                                                        $option_a = "";
                                                        if(isset($Row[1])) {
                                                            $option_a = mysqli_real_escape_string($mysqli,$Row[1]);
                                                        }

                                                        $option_b = "";
                                                        if(isset($Row[2])) {
                                                            $option_b = mysqli_real_escape_string($mysqli,$Row[2]);
                                                        }
                                                       
                                                        $option_c = "";
                                                        if(isset($Row[3])) {
                                                            $option_c = mysqli_real_escape_string($mysqli,$Row[3]);
                                                        }

                                                         $option_d = "";
                                                        if(isset($Row[4])) {
                                                            $option_d = mysqli_real_escape_string($mysqli,$Row[4]);
                                                        }

                                                        $answer = "";
                                                        if(isset($Row[5])) {
                                                            $answer = mysqli_real_escape_string($mysqli,$Row[5]);
                                                        }
                                                        

                                                        
                                                        
                                                        if (!empty($question) || !empty($option_a) || !empty($option_b)|| !empty($option_c) || !empty($option_d) || !empty($answer)) 
                                                        {
                                                            $result = ($mysqli->query("INSERT INTO test values('$test_id','$test_date','$test_title','$time_limit','$rules','$question','$option_a','$option_b','$option_c','$option_d','$answer')"));

                                                            
                                                        
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

                                                                echo "<script> type='text/javascript'> alert('Problem while importing test. Check the sample format!');  
                                                                        window.location = 'adminuser.php';
                                                                 </script>";
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
                                        



                      ?>

                        <script type="text/javascript">
                        window.location = "adminuser.php";
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