<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';

    // Makes it easier to read
 
    $batches = $mysqli->query("SELECT distinct batch from placed");

    $branches = $mysqli->query("SELECT distinct branch from placed");

    $bar_data= $mysqli->query("SELECT batch, count(*) as num_placed FROM placed GROUP BY batch");

    $result = $mysqli->query("SELECT * FROM placed");
 
    if (isset($_POST['batch']))
    { 
         $batchs=$_POST['batch'];
     }
     else
        $batchs="All batches";


    if (isset($_POST['branch']))
    { 
         $branchs=$_POST['branch'];
     }
     else
        $branchs="All branches";



$total=0;
if((!strcasecmp($batchs, "All batches"))&&(!strcasecmp($branchs, "All branches")))
{   
    $placement_count= $mysqli->query("SELECT count(*) as total_count FROM placed")->fetch_assoc();
    $total=$placement_count['total_count'];
    $chart_data = $mysqli->query("SELECT company, count(*) as num_placed FROM placed 
   GROUP BY company");

     $result = $mysqli->query("SELECT * FROM placed");
}
else if((strcasecmp($batchs, "All batches"))&&(strcasecmp($branchs, "All branches")))
{
    $placement_count= $mysqli->query("SELECT count(*) as total_count FROM placed where batch='$batchs' and branch='$branchs'")->fetch_assoc();
    $total=$placement_count['total_count'];
    $chart_data = $mysqli->query("SELECT company, count(*) as num_placed FROM placed where batch=
        '$batchs' and branch='$branchs'
   GROUP BY company");

     $result = $mysqli->query("SELECT * FROM placed WHERE batch='$batchs' and branch='$branchs'");
}
else if((strcasecmp($batchs, "All batches"))&&(!(strcasecmp($branchs, "All branches"))))
{
    $placement_count= $mysqli->query("SELECT count(*) as total_count FROM placed where batch='$batchs' ")->fetch_assoc();
    $total=$placement_count['total_count'];
    $chart_data = $mysqli->query("SELECT company, count(*) as num_placed FROM placed where batch=
        '$batchs' 
   GROUP BY company");

     $result = $mysqli->query("SELECT * FROM placed WHERE batch='$batchs' ");
}
else if(!(strcasecmp($batchs, "All batches"))&&(strcasecmp($branchs, "All branches")))
{
    $placement_count= $mysqli->query("SELECT count(*) as total_count FROM placed where  branch='$branchs'")->fetch_assoc();
    $total=$placement_count['total_count'];
    $chart_data = $mysqli->query("SELECT company, count(*) as num_placed FROM placed where branch='$branchs'
   GROUP BY company");

     $result = $mysqli->query("SELECT * FROM placed WHERE  branch='$branchs'");
}



$data = array();
while($row = $chart_data->fetch_array())
{
 $data[] = array(
  'label'  => $row["company"],
  'value'  => $row["num_placed"]
 );
}
$data = json_encode($data);



$b_data = array();
while($row = $bar_data->fetch_array())
{
 $b_data[] = array(
  'Batch'  => $row["batch"],
  'Students placed'  => $row["num_placed"]
 );
}
$b_data = json_encode($b_data);

 
?>

<!DOCTYPE html>
<html>
    

<head>
        <meta charset="UTF-8">
        <title>MITS | Placements</title>   
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
        <link href="assets/libs/jquery-datatables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css" rel="stylesheet" type="text/css" />


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" /> 


        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />









                <!-- Extra CSS Libraries End -->

        <link rel="shortcut icon" href="assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />



    <link rel="stylesheet" href="assets/css/main.css" />
   


    </head>
    <body class="fixed-left">


<header id="header">
<a style="font-size:20px; "class="logo" href="index.php"><span style="color:crimson;">MITS</span> Placement Portal</a>



</header>

			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content" style="margin:5%;" >
								<!-- Page Heading Start -->
				<div class="page-heading">
            		<h1><i class='fa fa-table'></i> Placement Statistics</h1>
                </div>
            	<!-- Page Heading End-->				




				<div class="row" >
      
                        

                        <form method="POST">
                       
                             <div class="col-sm-4">
                                <select  name="batch">
                                
                                            <option value="All batches">All Batches</option>

                                    <?php   
                                        while($row=$batches->fetch_array()) 
                                        {  ?>
                                            <option <?php if($batchs==$row['batch']) echo "selected" ?> value="<?=$row['batch']?>"><?=$row['batch']?></option>
                                                         
                                <?php }

                                ?>


                                </select><p >Select Batch</p>
                                
                            </div>

                         
                       
                             <div class="col-sm-4">
                                <select  name="branch">
                                
                                            <option value="All branches">All Branches</option>

                                    <?php   
                                        while($row=$branches->fetch_array()) 
                                        {  ?>
                                            <option <?php if($branchs==$row['branch']) echo "selected" ?> value="<?=$row['branch']?>"><?=$row['branch']?></option>
                                                         
                                <?php }

                                ?>


                                </select><p >Select Branch</p>
                                
                            </div>


                             
                            
                             <div class="col-sm-4">

                                <button name="search" type="submit"  >Search</button>

                                <button name="export" id="export" type="submit"  onclick="exportTableToExcel('datatables-3')"  >Export</button>

                            </div>
          
                 <div id="row">          
                    <div class="col-md-6 portlets"  >
                                     <div id="chart" style="padding-right:10%;"></div>
                                        <h3 style="text-align:center; font-family:system-ui;">Total:<?= $total ?> </h3>
                            </div>


                            <div class="col-md-6 portlets">
                                     <div id="graph"></div>
                                        
                            </div>

                            </form>
                           
</div>
            

        

          

  

					<div class="col-md-12">
                    
						<div class="widget">
						
							<div class="widget-content">
				
								<div class="table-responsive" id="student_list">
                                  
									<form class='form-horizontal' role='form' style="font-family:system-ui;">

                                        

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

$(document).ready(function(){
 
 var donut_chart = Morris.Donut({
     element: 'chart',
     data: <?php echo $data; ?>
    });
  

});


$(document).ready(function(){
 
 var bar_chart = Morris.Bar({
     element: 'graph',
      data: <?php echo $b_data; ?>,
  xkey: 'Batch',
  ykeys: ['Students placed'],
  labels: ['Students placed', 'Z', 'A']
    });
  

});

</script>




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

    <script src="assets/libs/raphael/raphael-min.js"></script>
    <script src="assets/libs/morrischart/morris.min.js"></script>
    <script src="assets/js/pages/morris-charts.js"></script>

	</body>

</html>