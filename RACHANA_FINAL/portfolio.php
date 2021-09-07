<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php include_once("1_metatags.php");?>
</head>
<style>
 h4 {
  text-align: center;
 }
 .product-title {
  text-align: center;
 } 
 .product-title a{
  font-size: 20px;
  font-weight: 600;
  color: #ce882f;
 } 
.form-control:focus {
    outline:0!important;
    box-shadow: none;
} 
.td_class{
   float:right;
   color:#ce882f;
   font-weight: bold;
 } 
 .td_text{   
   color:#232f3e;
   font-weight: bold;
 } 
</style>
<body>
<div class="page-wrapper-blue">
<?php include_once("2_header.php");?>    
<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
<div class="container">
<div class="row">
<div class="col-lg-12"> 
<div class="breadcrumb-content">
<ul>
<li class="has-child"><a href="index.php">Home</a></li>
<li class="has-child"><a>PORTFOLIO</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>

<div class="page-section pb-40">
<div class="container">
<div class="row">
<div class="col-lg-12 order-1 order-lg-2">
<div class="shop-banner mb-30">
<img src="assets/img/banners/shop-banner.jpg" class="img-fluid" alt="">
</div>
<div class="row shop-product-wrap grid three-column mb-10">
<?php   
$unit_price="";
$discount="";    
$page=@$_GET["page"];
if($page=="" ||$page=="1"){
$page1=0;
}
else{
$page1=($page*8)-8;
}
 
$sql=$conn->prepare("SELECT * FROM portfolio ORDER BY pf_id DESC LIMIT $page1,8");  
$sql->execute();
$result=$sql->get_result();
$count=$result->num_rows;//For Pagination     
while($row=$result->fetch_assoc()){
?>
<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-20" style="height:500px!important">
<!--=======  grid view product  =======-->
<div class="single-slider-product grid-view-product">
<div class="single-slider-product__image">
<img src="admin/photos/portfolio/<?php echo $row["pf_image"];?>" class="img-fluid" alt="" style="width:255px;height:250px;">
</div>

<div class="single-slider-product__content" style="height:200px;">
<p class="product-title"><?php echo $row["pf_name"];?></p> 
<p class="product-title" style="color:#ce882f;font-weight: bold;text-align:center">DATE : <?php echo $row["pf_date"];?></p> 
<p><?php echo $row["pf_description"];?></p> 
<br> 
</div>
</div>
</div>
<?php
}
?>
</div>
<!--=======  End of shop page content  =======-->

<!--=======  pagination  =======-->

<div class="pagination-section mb-md-30 mb-sm-30">
<ul class="pagination">
<?php
$sql11=$conn->prepare("SELECT * FROM portfolio ORDER BY pf_id DESC");
$sql11->execute();
$result11=$sql11->get_result();
$count=$result11->num_rows;
$per_page=$count/8;
$per_page=ceil($per_page);                      
for($b=1;$b<=$per_page;$b++)
{
?>  
<li class="active"><a class="page-link" href="portfolio.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
<?php
}
?>
</ul>
<div class="pagination-text">
Showing 1 to 8 of <?php echo $count;?>
</div>
</div>
<p><br><br><br><br><br><br><br><br><br><br></p>
<!--=======  End of pagination  =======-->
</div>
</div>
</div>
</div>

<!--====================  End of page content  ====================-->
 
<?php include_once("3_footer.php");?>
</div> 
<?php include_once("4_footer_scripts.php");?>
<?php //include_once("8_json_scripts.php");?> 

</body>
</html>