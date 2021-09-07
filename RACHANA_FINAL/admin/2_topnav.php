<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark bg-gradient-x-primary navbar-shadow">
<div class="navbar-wrapper">
<div class="navbar-header">
<ul class="nav navbar-nav flex-row">
<li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
<li class="nav-item"><a class="navbar-brand" href="#"><i class="fa fa-trophy" style="font-size:30px;margin-right:0px"></i>
<h2 class="brand-text" style="font-size:25px;padding-left:0px"><span style="font-size:33px">R</span>achana <span style="font-size:33px">A</span>rts</h2>
</a></li>
<li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
</ul>
</div>
<div class="navbar-container content">
<div class="collapse navbar-collapse" id="navbar-mobile">
<ul class="nav navbar-nav mr-auto float-left">
<li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
<li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
</ul>
<ul class="nav navbar-nav float-right">
<?php
$notify="1";
$sender="CUSTOMER";
$sql3=$conn->prepare("SELECT * FROM chat_message WHERE sender=? AND notify=?");
$sql3->bind_param("si",$sender,$notify);
$sql3->execute();
$result3=$sql3->get_result();
$count3=$result3->num_rows;
 
$status="ORDER PLACED";
$sql=$conn->prepare("SELECT * FROM customer_order_details WHERE order_status = ? ");
$sql->bind_param("s",$status);
$sql->execute();
$result=$sql->get_result();
$count=$result->num_rows;
 
$sql2=$conn->prepare("SELECT * FROM "); 
 
$sd_status="NOT AVAILABLE";
$sql1=$conn->prepare("SELECT * FROM stock_details WHERE sd_status=?");
$sql1->bind_param("s",$sd_status);
$sql1->execute();
$result1=$sql1->get_result();
$count1=$result1->num_rows;
?>
 
<li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="chatPopup.php"><span class="btn btn-warning btn-sm">CHAT NOTIFY</span><span class="badge badge-pill badge-danger badge-up"><?php echo $count3;?></span></a>
</li>
 
<li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="stock_details_availability.php"><span class="btn btn-danger btn-sm">OUT OF STOCK</span><span class="badge badge-pill badge-warning badge-up"><?php echo $count1;?></span></a>
</li>
 
<li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="customer_order_placed.php"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-danger badge-up"><?php echo $count;?></span></a>
</li>



<li class="dropdown dropdown-user nav-item">
<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
<span class="avatar avatar-online">
<img src="../admin/vendors/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar">
</span>
<span class="user-name"><?php echo $admin_name;?></span>
</a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="admin_profile.php"><i class="ft-user"></i> Edit Profile</a>
<a class="dropdown-item" href="change_password.php"><i class="ft-lock"></i>Change Password</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="logout.php"><i class="ft-power"></i> Logout</a>
</div>
</li>
</ul>
</div>
</div>
</div>
</nav>
<!-- END: Header-->