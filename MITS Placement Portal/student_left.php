	<?php?>



    	    <!-- Left Sidebar Start -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
               <!-- Search form -->
               
                <div class="clearfix"></div>
                <!--- Profile -->
                <div class="profile-info">
                    <div class="col-xs-4">
                      <a href="studentuser.php" class="rounded-image profile-image"><img src="<?= $_SESSION['profilepic'] ?>" alt="profile/user.png" ></a>
                    </div>
                    <div class="col-xs-8">
                        <div class="profile-text"><b><?= $name?></b></div>
                        <div class="profile-buttons">
                  
                          <a href="studentuser.php" ><i class="fa fa-comments"></i></a>
                          <a class="md-trigger" data-modal="logout-modal" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
                        </div>
                    </div>
                </div>
                <!--- Divider -->
                <div class="clearfix"></div>
                <hr class="divider" />
                <div class="clearfix"></div>
                <!--- Divider -->
                <div id="sidebar-menu">
                   
                      <ul><li><a href='placementdrive.php'><i ><img src="img/drive.png" style="max-height: 15px;"></i><span>Placement drive</span> <span class="pull-right"></span></a></li></ul>

                      <ul><li><a href='editstudentuser.php'><i ><img src="img/edit_details.png" style="max-height: 15px;"></i><span>Edit Details</span> <span class="pull-right"></span></a></li></ul>   

                      <ul><li><a href='addnewdetails.php'><i ><img src="img/add_placement.png" style="max-height: 15px;"></i><span>Add Projects / Internships</span> <span class="pull-right"></span></a></li></ul>  

                      <ul><li><a href='upload_resume.php'><i ><img src="img/upload.png" style="max-height: 15px;"></i><span>Upload Resume</span> <span class="pull-right"></span></a></li></ul> 

                      <ul><li><a href='showtests.php'><i ><img src="img/mcq_test.png" style="max-height: 15px;"></i><span>Attend Test</span> <span class="pull-right"></span></a></li></ul>                                   
<br><br><br><br><br><br><br><br><br><br>
                    <div class="clearfix"></div>
                </div>
            

            <div class="clearfix"></div>
            <div class="portlets">


         
            </div>
            <div class="clearfix"></div><br><br>
        </div>
        
        </div>
        <!-- Left Sidebar End -->	

        <?php?>