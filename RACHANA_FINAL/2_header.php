<style>
 @media (min-width: 992px){
.offset-lg-4 {
/*    margin-left: 36.333333%;*/
 }
 }
 hr{
margin-top:5px;
color: white;
width: 50%;
border-radius:5px;   
margin-bottom:0px; 
border:2px solid #e6ca6c;   
} 
</style>
<div class="header-area header-sticky">
<div class="navigation-top">
<div class="navigation-top-topbar pt-10 pb-10"> 
<div class="container">
<div class="row align-items-center">
<div class="col-lg-4 col-md-6 text-center text-md-left">
<div class="header-top-social-links">
<?php  
if($customer_session==TRUE)
{
?> 
<div class="headertop-dropdown-container">
<div class="header-top-single-dropdown">
<a href="javascript:void(0)" class="active-dropdown-trigger" id="user-options" style="color:black;font-weight:bold;text-transform: uppercase;">WELCOME <?php echo $fullname;?><i class="ion-ios-arrow-down"></i></a>
<div class="header-top-single-dropdown__dropdown-menu-items deactive-dropdown-menu extra-small-mobile-fix">
<ul>
<li><a href="product_order_summary.php"><i class="fa fa-sign-out">&nbsp;</i>ORDER SUMMARY</a></li>
<li><a href="customer_change_profile.php"><i class="fa fa-sign-out">&nbsp;</i>CHANGE PROFILE</a></li>
<li><a href="customer_logout.php"><i class="fa fa-sign-out">&nbsp;</i>LOGOUT</a></li>
</ul>
</div>
</div>
</div>  
<?php
}
else{
?>
<a href="customer_login_register.php" class="btn btn-info">LOGIN/REGISTER</a> 
<?php
} 
?>

</div>
</div>
<div class="col-lg-5 col-md-6 col-sm-10">
<?php include_once("7_product_ajax_search_css.php");?>
<div class="search-bar">
<?php //include('7_product_ajax_search_css.php');?>
<div class="row">      
<form name="f1" method="post" action="products_description.php">         
<input type="text" name="typeahead" class="typeahead" autocomplete="off" spellcheck="false" placeholder="Search Products" size="60" required>     
<button type="submit"><b><i class="icon-search"></i></b></button>
</form>
</div>
</div> 
</div> 
<div class="col-lg-3 col-md-6">
<!--=======  header top dropdown container  =======-->
<div class="headertop-dropdown-container justify-content-center justify-content-md-end">
<div class="header-cart-icon">
<a href="products_shopping_cart.php" id="" class="small-cart-trigger">
<i class="icon-shopping-cart"></i>
<span class="cart-counter" id="cart_ra_icon">0</span>
</a>
</div>

</div>
<!--=======  End of header top dropdown container  =======-->
</div>
</div>
</div>
</div>

<!--====================  End of navigation section  ====================-->
<div class="container">
<div class="row">
<div class="col-lg-12">
<!--====================  navigation top search ====================-->
<div class="navigation-top-search-area pt-25 pb-25">
<div class="row align-items-center">
<div class="offset-lg-4 col-lg-8 col-sm-12 mt-md-25 mt-sm-25">
<div class="logo">
<a href="admin_login/index.php">
<h3 style="font-family: Verdana, Arial, Helvetica, sans-serif;color:white;text-align:center;"><span style="font-size:45px;color:#e6ca6c"><i class="fa fa-trophy">&nbsp;</i>R</span>ACHANA<span style="font-size:45px;color:#e6ca6c">&nbsp;A</span>RTS <span style="font-size:45px;color:#e6ca6c"><i class="fa fa-trophy"></i></span>
<hr> 
</h3> 
 
 
<!--<img src="assets/img/logo-alula4.png" class="img-fluid" alt="">-->
</a>
</div>
</div>
</div>
</div>
<!--====================  End of navigation top search  ====================-->
</div>
</div>
</div>
</div>

<!--====================  End of Navigation top  ====================-->

<!--====================  navigation menu ====================-->

<div class="navigation-menu-area">
<div class="container-fluid">
<div class="row">
<div class="offset-lg-2 col-lg-10 col-sm-12 col-sm-12-custom col-xs-12" style="padding-left: 40px;padding-top:6px;padding-bottom:6px;">
<!-- navigation section -->
<div class="main-menu d-none d-lg-block">
<nav>
<ul>
<li><a href="index.php">HOME</a></li> 
<?php 
$sql1=$conn->prepare("SELECT * FROM product_category ORDER BY pc_id ASC");
$sql1->execute();
$result1=$sql1->get_result();
while($row1=$result1->fetch_assoc()){
?>
<li><a href="products.php?pc_id=<?php echo $row1['pc_id'];?>"><?php echo $row1["pc_name"];?></a></li>
<?php } ?>  
<li><a href="portfolio.php">PORTFOLIO</a></li>   
</ul>
</nav>
</div>
<!-- end of navigation section -->
<!-- Mobile Menu -->
<div class="mobile-menu-wrapper d-block d-lg-none pt-15">
<div class="mobile-menu"></div>
</div>
</div>
</div>
</div>
</div>

<!--====================  End of navigation menu  ====================-->
</div>
<!--
<style>
    .navigation-top{
        background-color: aqua;
    }


</style>-->
