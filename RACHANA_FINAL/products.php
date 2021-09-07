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
<?php 
if(isset($_REQUEST["pc_id"])){
$pc_id=$_REQUEST["pc_id"];
$sql11=$conn->prepare("SELECT * FROM product_category WHERE pc_id=?");
$sql11->bind_param("i",$pc_id);
$sql11->execute();
$result11=$sql11->get_result();
$row11=$result11->fetch_assoc();
$pc_name=$row11["pc_name"];
?> 
<div class="breadcrumb-content">
<ul>
<li class="has-child"><a href="index.php">Home</a></li>
<li class="has-child"><a><?php echo $pc_name; ?></a></li>
</ul>
</div>
<?php
}
?> 
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
 
$pc_id=$_REQUEST["pc_id"];  
$sql=$conn->prepare("SELECT * FROM product_details pd,product_category pc,stock_details sd,product_size ps,product_type pt,product_units pu WHERE pd.pc_id=pc.pc_id AND pd.pd_id=sd.pd_id AND pd.ps_id=ps.ps_id AND pd.pt_id=pt.pt_id AND ps.pu_id=pu.pu_id AND pd.pc_id=? ORDER BY pd.pd_id DESC LIMIT $page1,8");  
$sql->bind_param("i",$pc_id);  
$sql->execute();
$result=$sql->get_result();
$count=$result->num_rows;//For Pagination     
while($row=$result->fetch_assoc()){
if($row["sd_discount"]!=0)
{
$unit_price=$row["sd_unitprice"]-$row["sd_discount"];    
$discount=$row["sd_unitprice"];  
}
else
{
$unit_price=$row["sd_unitprice"];    
$discount=0;  
}
?>
<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-20" style="height:500px!important">
<!--=======  grid view product  =======-->
<div class="single-slider-product grid-view-product">
<div class="single-slider-product__image">
<a href="products_description.php?pc_id=<?php echo $row["pc_id"];?>&pd_id=<?php echo $row["pd_id"];?>">
<img src="admin/photos/<?php echo $row["pd_image1"];?>" class="img-fluid" alt="" style="width:255px;height:200px;">
</a>
</div>

<div class="single-slider-product__content" style="height:303px;">
<p class="product-title"><a href="products_description.php?pc_id=<?php echo $row["pc_id"];?>&pd_id=<?php echo $row["pd_id"];?>"><?php echo $row["pd_name"];?></a></p>
<div class="rating">
<h4>&#8377;<?php echo $unit_price;?>
        <strike>
            <?php 
            if($discount!=0)
            echo $discount;    
            ?>
        </strike>
</h4>
</div>
<?php
if($row["sd_status"]=="NOT AVAILABLE"){  
?>        
<p style="color:red;font-size:18px;font-weight:bold;text-align:center">NOT AVAILABLE</p>
<?php 
}
else{
?>
<p style="color:green;font-size:18px;font-weight:bold;text-align:center">AVAILABLE</p>
<?php 
} 
?> 
<table>
 <tr>
  <td class="td_class">SIZE&nbsp;:&nbsp;</td>
  <td class="td_text"><?php echo $row["ps_size"];?>&nbsp;<?php echo $row["pu_type"];?></td>
 </tr>
 <tr>
  <td class="td_class">QUALITY&nbsp;:&nbsp;</td>
  <td class="td_text"><?php echo $row["pt_name"];?><br>(<?php echo $row["pt_quality"];?>)</td>
 </tr> 
</table> 
<br> 
<a href="products_description.php?pc_id=<?php echo $row["pc_id"];?>&pd_id=<?php echo $row["pd_id"];?>" class="btn btn-primary btn-block"><i class="fa fa-play">&nbsp;</i>VIEW DESCRIPTION</a>
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
$pc_id=$_REQUEST["pc_id"]; 
$sql11=$conn->prepare("SELECT * FROM product_details pd,product_category pc,stock_details sd,product_size ps,product_type pt,product_units pu WHERE pd.pc_id=pc.pc_id AND pd.pd_id=sd.pd_id AND pd.ps_id=ps.ps_id AND pd.pt_id=pt.pt_id AND ps.pu_id=pu.pu_id AND pd.pc_id=? ORDER BY pd.pd_id DESC");
$sql11->bind_param("i",$pc_id);    
$sql11->execute();
$result11=$sql11->get_result();
$count=$result11->num_rows;
$per_page=$count/8;
$per_page=ceil($per_page);                      
for($b=1;$b<=$per_page;$b++)
{
?>  
<li class="active"><a class="page-link" href="products.php?pc_id=<?php echo $pc_id;?>&page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
<?php
}
?>
</ul>
<div class="pagination-text">
Showing 1 to 8 of <?php echo $count;?>
</div>
</div>

<!--=======  End of pagination  =======-->
</div>
</div>
</div>
</div>

<!--====================  End of page content  ====================-->

<?php include_once("3_footer.php");?>
</div> 
<?php include_once("4_footer_scripts.php");?>
<?php include_once("8_json_scripts.php");?> 
</body>
</html>