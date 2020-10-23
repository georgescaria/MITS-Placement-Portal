<?php ?>





    <!-- Button mobile view to collapse sidebar menu -->

        <div class="container" style="background:#606163">
          
         
                <ul class="nav navbar-nav navbar-right top-navbar">
           

                    <li class="dropdown iconify hide-phone" ><a href="#" onclick="javascript:toggle_fullscreen()"><i style="color:white" class="icon-resize-full-2"></i></a></li>
                    <li class="dropdown topbar-profile">
                        <a href="#" class="dropdown-toggle" style="color:white" data-toggle="dropdown"><span class="rounded-image topbar-profile-image" ><img src="images/users/user.png"></span> <strong><?=$name?></strong> <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">My Profile</a></li>
                            <li><a href="#">Change Password</a></li>
                            <li><a href="#">Account Setting</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-help-2"></i> Help</a></li>
                           
                            <li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
                        </ul>
                    </li>
                
                </ul>
          
            <!--/.nav-collapse -->
       
    </div>

<?php ?>
<!-- Top Bar End -->