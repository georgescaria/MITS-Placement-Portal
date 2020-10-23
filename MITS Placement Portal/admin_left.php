	<?php

  ?>



    	    <!-- Left Sidebar Start -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
               <!-- Search form -->
               
                <div class="clearfix"></div>
                <!--- Profile -->
                <div class="profile-info">
                    <div class="col-xs-4">
                      <a href="adminuser.php" class="rounded-image profile-image"><img src="<?= $_SESSION['profilepic'] ?>"></a>
                    </div>
                    <div class="col-xs-8">
                        <div class="profile-text"><b><?= $name?></b></div>
                        <div class="profile-buttons">

                          <a href="adminuser.php" ><i class="fa fa-comments"></i></a>
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
                   
                   <ul><li><a href='studentlist.php'><i ><img src="img/student list.png" style="max-height: 15px;"></i><span>Student List</span> <span class="pull-right"></span></a></li></ul>

                   <ul><li><a href='placementdrive_admin.php'><i ><img src="img/drive.png" style="max-height: 15px;"></i><span>Placement drives</span> <span class="pull-right"></span></a></li></ul>

                   <ul><li><a href='newdrive.php'><i ><img src="img/new_drive.png" style="max-height: 15px;"></i><span>New Drive</span> <span class="pull-right"></span></a></li></ul>

                   <ul><li><a href='approve_request.php'><i ><img src="img/approve.png" style="max-height: 15px;"></i><span>Approve changes</span> <span class="pull-right"></span></a></li></ul>

                   <ul><li><a href='addusers.php'><i ><img src="img/add_user.png" style="max-height: 15px;"></i><span>Add Users</span> <span class="pull-right"></span></a></li></ul>

                   <ul><li><a href='addplacement.php'><i ><img src="img/add_placement.png" style="max-height: 15px;"></i><span>Add placement</span> <span class="pull-right"></span></a></li></ul>     

                   <ul><li><a href='placement_admin.php'><i ><img src="img/placement_statistics.png" style="max-height: 15px;"></i><span>Placement statistics</span> <span class="pull-right"></span></a></li></ul>     

                   <ul><li><a href='createtest.php'><i ><img src="img/mcq_test.png" style="max-height: 15px;"></i><span>Create test</span> <span class="pull-right"></span></a></li></ul>  

                   <ul><li><a href='showtests_admin.php'><i ><img src="img/result.png" style="max-height: 15px;"></i><span>Test Results</span> <span class="pull-right"></span></a></li></ul>   

                   <ul><li><a href='resume.php'><i ><img src="img/resume.png" style="max-height: 15px;"></i><span>Student Resume</span> <span class="pull-right"></span></a></li></ul>                   

                    <div class="clearfix"></div>
                </div>
            

            <div class="clearfix"></div>
            <div class="portlets">
     

         
            </div>
            <div class="clearfix"></div><br><br><br>
        </div>
        
        </div>
        <!-- Left Sidebar End -->	

        <?php?>