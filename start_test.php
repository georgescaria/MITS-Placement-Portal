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
    
   


    if (isset($_SESSION['test_id'])) {

            $test_id=$_SESSION['test_id'];
            $test_details = ($mysqli->query("SELECT * FROM test where test_id='$test_id'"))->fetch_assoc();
            $questions = ($mysqli->query("SELECT * FROM test where test_id='$test_id'"));
            $test_title = $test_details['test_title'];
            $time_limit = $test_details['time_limit'];
            $total_questions= mysqli_num_rows($questions);
            


            if(isset($_GET['question_no']))
            {
                $question_no=$_GET['question_no'];
            }
            else
             {   $question_no=1;
            }

            if(isset($_SESSION['attended']))
            {
                $attended=($_SESSION['attended']);
            }
            else
             {   $attended=array('1'=>'a');
            }

            if(!isset($_SESSION['countdown']))
            {
                //Set the countdown to 120 seconds.
                $_SESSION['countdown'] = $time_limit;
                //Store the timestamp of when the countdown began.
                $_SESSION['time_started'] = time();
              
            }
 
//Get the current timestamp.
$now = time();
 
//Calculate how many seconds have passed since
//the countdown began.
$timeSince = $now - $_SESSION['time_started'];
 
//How many seconds are remaining?
$secondsleft = ($_SESSION['countdown'] - $timeSince);
 
//Print out the countdown.

 
//Check if the countdown has finished.
if($secondsleft < 1){

$_POST['submit']=true;
 }

 } 
  
    else
  {
    $_SESSION['message'] = "Invalid info!";
    header("location: error.php"); 
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
        <!-- Modal Start -->
        	<!-- Modal Task Progress -->	


<?php
    require 'logout.php'; 

    ?>

	<!-- Begin page -->
	<div id="wrapper">
		

        <!-- Top Bar Start -->
<?php require 'testheader.php'; ?>




	

        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->

    <style type="text/css">
    .timer {
    width: 500px;
    font-size: 1em;
    
    float: inherit;
    }
</style>



        <script type="text/javascript">
      var seconds = <?php echo(json_encode($secondsleft)); ?>;
      function secondPassed() {
          var minutes = Math.floor(((seconds % 86400) % 3600) / 60)
          var hours = Math.floor((seconds % 86400) / 3600);
          var remainingSeconds = seconds % 60;

          if (remainingSeconds < 10) {
              remainingSeconds = "0" + remainingSeconds;
          }

          document.getElementById('countdown').innerHTML = "Time remaining : " +hours + ":" + minutes + ":" + remainingSeconds;
          if (seconds == 0) {
              clearInterval(countdownTimer);
             //form1 is your form name

           alert('Time is up! Click OK to view the result! ');
           location.reload();
          } else {
              seconds--;
          }
      }
      var countdownTimer = setInterval('secondPassed()', 1000);

</script>
            



            <div class="content">
								<!-- Page Heading Start -->
				<div class="page-heading">
            		<h2><b> <?= $test_title ?>  <b></h2>
            	</div>
            	<!-- Page Heading End-->	
								



        <div class="timer">
            <p> </p>
        <p id="countdown"></p><br><br>

        </div>

				 <div class="row">

                    
                        <?php 
                        $i=1;
                            while ($row=mysqli_fetch_array($questions)) {


                           if($i==$question_no)
                           {    
                            $question = $row['question'];
                            $option_a = $row['option_a'];
                            $option_b = $row['option_b'];
                            $option_c = $row['option_c'];
                            $option_d = $row['option_d'];
                            


                        ?> 
                    <div class="col-sm-12 portlets">
                       

                        <div class="form-group">
                     

                        <form method="POST" name="form1" id="form1">

                        <P style="font-size: 20px;"><?= $question_no; echo "."." ".$question; ?></P>
                            <div class="col-sm-10">
                                
                                <div class="radio iradio">
                                  <label>
                                    <input type="radio" name="selectedOption" id="optionsRadios1" value="<?= $option_a ?>">
                                    <?= $option_a ?>
                                  </label>
                                </div>
                                <div class="radio iradio">
                                  <label>
                                    <input type="radio" name="selectedOption" id="optionsRadios2" value="<?= $option_b ?>">
                                    <?= $option_b ?>
                                  </label>
                                </div>
                                <div class="radio iradio">
                                  <label>
                                    <input type="radio" name="selectedOption" id="optionsRadios2" value="<?= $option_c ?>">
                                    <?= $option_c ?>
                                  </label>
                                </div>
                                <div class="radio iradio">
                                  <label>
                                    <input type="radio" name="selectedOption" id="optionsRadios2" value="<?= $option_d ?>">
                                    <?= $option_d ?>
                                  </label>
                                </div>
                            </div>






                          </div>


                    </div>


                        <?php
                        
                        }
                      
                            $i+=1;
                        



                            } 
                            if($question_no<$total_questions)
                            {

                            ?>
                            <button style="display: block; margin: 0 auto;" name="next"  class="btn btn-primary" >Next</button>

                            <?php

                            }
                            else
                            {
                            
                            echo '<button style="display: block; margin: 0 auto;" name="submit" type="submit" class="btn btn-primary" >Submit</button>';

                            }    

                            ?>

                        </form>
                </div>
				<!-- End of your awesome content -->




            <?php 
                 

                
                       if(isset($_POST['submit']))
                        {   
                            $attended[$question_no]=$_POST['selectedOption'];
                            $_SESSION['attended']=$attended;


                            $i=1;
                            $correct=0;
 
                             foreach($questions as $row) 
                            {
  
                            $answer = $row['answer'];
            

                            if(!strcasecmp(str_replace(' ', '', $answer),str_replace(' ', '',$attended[$i])))
                             {   $correct+=1;
                              }      

                            
                            $i+=1;
                            }

                            $_SESSION['mark']=$correct;
                            $_SESSION['total_questions']=$total_questions ;
                            unset($_SESSION['test_id']);
                            


             ?>               
                           <script type="text/javascript">
                        window.location = "showmark.php?test_id=<?=$test_id?>";
                        </script>     
                         
            <?php
                }
                 else if(isset($_POST['next']))
                        {   
                            $_SESSION['test_id']=$test_id;
                            $_GET['question_no']=$question_no+1;

                             
                            if(isset($_POST['selectedOption']))
                            {
                            $attended[$question_no]=$_POST['selectedOption'];

                           




                            }
                            else
                            $attended[$question_no]="";
                            $_SESSION['attended']=$attended;
                            $question_no+=1;
                           

            ?>
                        <script type="text/javascript">
                        window.location = "start_test.php?question_no=<?=$question_no?>";
                        </script>         
                        

            <?php
                        }






            
            ?>




				            <!-- Footer Start -->
             <footer style="text-align: center;">
                George Scaria &copy; 2018
                
            </footer>
            <!-- Footer End -->			
            
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

            </div>

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