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
            		<h2><b> Upload resume <b></h2>
            	</div>
            	<!-- Page Heading End-->	
								




				 <div class="row">
                    <div class="col-sm-12 portlets">
                      <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="pdf"/>
                            <input type="submit" name="submit" value="Upload"/>
                        </form>
                         
                    </div>
                <br>
                
                

				<!-- End of your awesome content -->




<?php 
                    $errors=1;
             //Targeting Folder
             $target="resume/";
              
            if(isset($_POST['submit']))
            {
             $target=$target.basename($_FILES['pdf']['name']);
             //Getting Selected PDF Type
             $type=pathinfo($target,PATHINFO_EXTENSION);
             //Allow Certain File Format To Upload
             if($type!='pdf' && $type!='doc' && $type!='docx' && $type!='epub' && $type!='jpeg' && $type!='jpg' && $type!='png')
             {
              echo "Only PDF,DOC,DOCX,Epub files format are allowed to Upload";
              echo '<br>';
              $errors=0;
             }
             //Checking for File Size 1000000 bytes== 1MB
              $filesize=$_FILES['pdf']['size'];
            if ($filesize < 100 && $filesize< 2000000)
            {
               echo 'You cannot Upload Large File(2MB)'; 
               echo '<br>';
                $errors=0;
               }
              //checking for Exsisting Doc File Files
              if(file_exists($target))
              {
               echo "File already exists";
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
               //Moving The PDF or Doc file to Desired Directory
              $uplaod_success=move_uploaded_file($_FILES['pdf']['tmp_name'],$target);
              if($uplaod_success==TRUE){

                date_default_timezone_set('Asia/Kolkata');
                            $date_added=date('Y-m-d');

               //Getting Selected PDF Information
               $file_name=$_FILES['pdf']['name'];
               $size=$_FILES['pdf']['size'];
               $result=($mysqli->query("INSERT INTO resume (college_id,student_name,file_name,date_added,size,type) VALUES ('$college_id','$name','$file_name','$date_added','$size','$type')"));
               if($result==TRUE){
                echo "Your file '$file_name' was successfully uploaded!";
               }
 }
}
}
?>
  
<br>
<br>

  <div class="table-responsive">
    <form class='form-horizontal' role='form'>   

<table id="datatables-4" class="table table-striped table-bordered" cellspacing="0" width="100%">
 <tr>
   <th><span>File name</span></th>
   <th><span>Date added</span></th>
   <th><span>Size</span></th>
   <th><span>Action</span></th>
  </tr>
 <?php
 $result=$mysqli->query("SELECT*FROM resume WHERE college_id='$college_id' ORDER by date_added DESC");
 while($row=$result->fetch_array()){?>
  <tbody>
  <tr>
  <td><?php echo $row['file_name'];?></td>
  <td><?php echo $row['date_added'];?></td>  
  <td><?php echo number_format($row['size']/(1024*1024),2);?>MB</td>
  <td><a href="resume/<?php echo $row['file_name'];?>" target="_BLANK">Download</a></td>
  </tr>
  <?php }?>
</tbody>
  </table> 
</form>

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