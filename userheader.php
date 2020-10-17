<?php 
require 'db.php';

/*
if(isset($_SESSION['admin_logged_in']))
{
if ( $_SESSION['admin_logged_in'] == 1 ) 
  $link= "adminuser.php";
}
else if(isset($_SESSION['student_logged_in']) )
{
if ( $_SESSION['student_logged_in'] == 1 ) 
  $link= "studentuser.php";

}

*/
?>

<div class="topbar">
    <div class="topbar-left">
        <div class="logo">
            <h1><a href="index.php"> <img src="assets/img/mits.png" alt="Logo"></a></h1>
        </div>
        <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
        </button>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container" style="background:#606163">
            <div class="navbar-collapse2">
         
                <ul class="nav navbar-nav navbar-right top-navbar">
           

                    <li class="dropdown iconify hide-phone" ><a href="#" onclick="javascript:toggle_fullscreen()"><i style="color:white" class="icon-resize-full-2"></i></a></li>
                    <li class="dropdown topbar-profile">
                        <a href="" class="dropdown-toggle" style="color:white" data-toggle="dropdown"> <strong><?=$name?></strong> <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                         
                           
                            <li class="divider"></li>
                           
                            <li><a href="changepassword.php" ><i ><img src="img/change_password.png" style="max-height: 15px;"></i>  Change password</a></li>
                            <li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
                        </ul>
                    </li>
                
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

<?php ?>
<!-- Top Bar End -->