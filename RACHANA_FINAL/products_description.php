<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php include_once("1_metatags.php");?>
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
   color:#ce882f;
   font-weight: bold;
 } 
 .td_text{   
   color:#232f3e;
   font-weight: bold;
 }  
</style> 
</head>
<body>
<div class="page-wrapper-blue"> 
<?php include_once("2_header.php");?>
<?php
if(isset($_POST["typeahead"]))
{
$unit_price="";
$discount="";      
$sql=$conn->prepare("SELECT * FROM product_details pd,product_category pc,stock_details sd,product_size ps,product_type pt,product_units pu WHERE pd.pc_id=pc.pc_id AND pd.pd_id=sd.pd_id AND pd.ps_id=ps.ps_id AND pd.pt_id=pt.pt_id AND ps.pu_id=pu.pu_id AND pd.pd_name=? ORDER BY pd.pd_id DESC");
$sql->bind_param("s",$_POST["typeahead"]);    
}
else
{ 
?>
<?php
$pc_id=$_REQUEST["pc_id"]; 
$pd_id=$_REQUEST["pd_id"]; 
 
$sql=$conn->prepare("SELECT * FROM product_details pd,product_category pc,stock_details sd,product_size ps,product_type pt,product_units pu WHERE pd.pc_id=pc.pc_id AND pd.pd_id=sd.pd_id AND pd.ps_id=ps.ps_id AND pd.pt_id=pt.pt_id AND ps.pu_id=pu.pu_id AND pd.pc_id=? AND pd.pd_id=?");  
$sql->bind_param("ii",$pc_id,$pd_id); 
}
$sql->execute();
$result=$sql->get_result(); 
$row=$result->fetch_assoc();
$pc_id_filter=$row["pc_id"]; 
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
<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
<div class="container">
<div class="row">
<div class="col-lg-12">
<!--=======  breadcrumb content  =======-->
<div class="breadcrumb-content">
<ul>
<li class="has-child"><a href="index.php">Home</a></li>
<li class="has-child"><?php echo $row["pc_name"];?></li>
<li class="has-child"><?php echo $row["pd_name"];?></li>
</ul>
</div>
<!--=======  End of breadcrumb content  =======-->
</div>
</div>
</div>
</div>
<!--====================  End of breadcrumb area  ====================-->
<!--====================  product details area ====================-->
<div class="product-details-area mb-40">
<div class="container">
<div class="row">
<div class="col-lg-6 mb-md-30 mb-sm-25">
<!--=======  product details slider  =======-->
<!--=======  big image slider  =======-->
<div class="big-image-slider-wrapper big-image-slider-wrapper--change-cursor">
<div class="ht-slick-slider big-image-slider99"
data-slick-setting='{
"slidesToShow": 1,
"slidesToScroll": 1,
"dots": false,
"autoplay": false,
"autoplaySpeed": 5000,
"speed": 1000
}'
data-slick-responsive='[
{"breakpoint":1501, "settings": {"slidesToShow": 1} },
{"breakpoint":1199, "settings": {"slidesToShow": 1} },
{"breakpoint":991, "settings": {"slidesToShow": 1} },
{"breakpoint":767, "settings": {"slidesToShow": 1} },
{"breakpoint":575, "settings": {"slidesToShow": 1} },
{"breakpoint":479, "settings": {"slidesToShow": 1} }
]'
>

<div class="big-image-slider-single-item">
<img src="admin/photos/<?php echo $row["pd_image1"];?>" class="img-fluid" alt="" style="width:540px;height:540px">
</div>        

</div>
</div>
<!--=======  End of big image slider  =======-->
<!--=======  End of product details slider  =======-->
</div>

<div class="col-lg-6">
<!--=======  product details content  =======-->

<div class="product-detail-content">
<h3 class="product-details-title mb-15"><?php echo $row["pd_name"];?></h3>
<table>
<tr>
 <td class="td_class">PROD SIZE&nbsp;:&nbsp;</td>
 <td class="td_text"><?php echo $row["ps_size"];?>&nbsp;<?php echo $row["pu_type"];?></td>
</tr>
<tr>
 <td class="td_class">QUALITY&nbsp;:&nbsp;</td>
 <td class="td_text"><?php echo $row["pt_name"];?>(<?php echo $row["pt_quality"];?>)</td>
</tr> 
</table> 
<p class="product-price product-price--big mb-10"><span class="discounted-price">&#8377;<?php echo $unit_price;?></span> <span class="main-price discounted"><?php 
            if($discount!=0){
            ?>
            &#8377;
            <?php
            echo $discount;    
            }
            ?></span></p>

<div class="product-short-desc mb-25">
<?php
if($row["pc_name"]=="INTERIOR DESIGN"){
?>
<p><textarea name="order_description" id="order_description<?php echo $row['pd_id'];?>" class="form-control" rows="5" placeholder="Enter Content Description" readonly style="text-align:center;">NOT APPLICABLE</textarea>
<span id="order_description_error<?php echo $row['pd_id'];?>"></span> 
</p> 
<?php
}else{
?>
<p><textarea name="order_description" id="order_description<?php echo $row['pd_id'];?>" class="form-control" rows="5" placeholder="Enter Content Description"></textarea>
<span id="order_description_error<?php echo $row['pd_id'];?>"></span> 
</p> 
<?php
} 
?>
</div>
 
<div class="">
<?php
if($row["sd_status"]!="NOT AVAILABLE"){  
?>        
<!--    THIS FOR ADDING ITEMS TO CART    -->
<input type="hidden" name="pd_size" id="pd_size<?php echo $row['pd_id'];?>" value="<?php echo $row["ps_size"];?>&nbsp;<?php echo $row["pu_type"];?>">            
<input type="hidden" name="pd_quality" id="pd_quality<?php echo $row['pd_id'];?>" value="<?php echo $row["pt_name"];?>(<?php echo $row["pt_quality"];?>)">            
<input type="hidden" name="pd_name" id="pd_name<?php echo $row['pd_id'];?>" value="<?php echo $row['pd_name'];?>">            
<input type="hidden" name="unit_price" id="pd_price<?php echo $row['pd_id'];?>" value="<?php echo $row['sd_unitprice'];?>">
<input type="hidden" name="discount" id="pd_discount<?php echo $row['pd_id'];?>" value="<?php echo $row['sd_discount'];?>">
<input type="hidden" name="image" id="pd_image<?php echo $row['pd_id'];?>" value="<?php echo $row['pd_image1'];?>">
<input type="hidden" name="min_qty_allowed" id="min_qty_allowed<?php echo $row['pd_id'];?>" value="<?php echo $row['sd_min_qty_order'];?>">    
<input type="hidden" name="max_qty_allowed" id="max_qty_allowed<?php echo $row['pd_id'];?>" value="<?php echo $row['sd_max_qty_order'];?>">    
<!--    THIS FOR ADDING ITEMS TO CART    -->

<select name="qty" id="qty<?php echo $row['pd_id'];?>" style="padding:1px!important;border-radius:4px;outline:0px!important;margin-bottom: 8px;" class="form-control">
<?php
for($i=$row['sd_min_qty_order'];$i<=$row["sd_max_qty_order"];$i++){
?>
<option value="<?php echo $i;?>">&nbsp;Qty <?php echo $i;?></option>        
<?php } ?>
</select>
<button  id="<?php echo $row['pd_id'];?>" class="btn btn-success btn-block cart"><i class="fa fa-shopping-cart"></i>&nbsp;Add To Cart</button>
<button  id="<?php echo $row['pd_id'];?>" class="btn btn-primary btn-block buyNow"><i class="fa fa-play"></i>&nbsp;Buy Now</button>   
<?php 
}
else
{
?>
<button class="btn btn-danger btn-block" disabled>NOT AVAILABLE</button>           
<?php
} 
?> 
</div>
<?php
$sql3=$conn->prepare("SELECT * FROM extra_charges");
$sql3->execute();
$result3=$sql3->get_result();
$row3=$result3->fetch_assoc(); 
?> 
<div class="product-details-feature-wrapper d-flex justify-content-start mt-20">
<!--=======  single icon feature  =======-->
<div class="single-icon-feature single-icon-feature--product-details">
<div class="single-icon-feature__icon">
<img src="assets/img/icons/free-shipping.png" class="img-fluid" alt="">
</div>
<div class="single-icon-feature__content">
<p class="feature-text">Get Discount on Order</p>
<p class="feature-text">Above <?php echo $row3["ec_min_amount"];?></p>
</div>
</div>

<!--=======  End of single icon feature  =======-->
<!--=======  single icon feature  =======-->

<div class="single-icon-feature single-icon-feature--product-details ml-30 ml-xs-0 ml-xxs-0">
<div class="single-icon-feature__icon">
<img src="assets/img/icons/guarantee.png" class="img-fluid" alt="">
</div>
<div class="single-icon-feature__content">
<p class="feature-text">Lowest Price</p>
<p class="feature-text">Guarantee</p>
</div>
</div>
<!--=======  End of single icon feature  =======-->
</div>


</div>

<!--=======  End of product details content  =======-->                    
</div>
</div>
</div>
</div>

<!--====================  End of product details area  ====================-->
<div class="product-description-review-area mb-20">
<div class="container">
<div class="row">
<div class="col-lg-12">
<!--=======  product description review container  =======-->
<div class="tab-slider-wrapper product-description-review-container">
<nav>
<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
<a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#product-description" role="tab"
aria-selected="true">Product Description</a>
</div>
</nav>
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="product-description" role="tabpanel" aria-labelledby="description-tab">
<!--=======  product description  =======-->
<div class="product-description">
<p><?php echo $row["pd_description"];?></p>
</div>
<!--=======  End of product description  =======-->
</div>
<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
</div>
</div>
</div>
<!--=======  End of product description review container  =======-->
</div>
</div>
</div>
</div>

<!--====================  product single row slider area ====================-->
<div class="product-single-row-slider-area mb-40">
<div class="container">

<div class="row">
<div class="col-lg-12">
<!--=======  section title  =======-->

<div class="section-title mb-20">
<h2>Related Products</h2>
</div>

<!--=======  End of section title  =======-->
</div>
</div>

<div class="row">
<div class="col-lg-12">
<!--=======  product single row slider wrapper  =======-->

<div class="product-single-row-slider-wrapper">
<div class="ht-slick-slider"
data-slick-setting='{
"slidesToShow": 4,
"slidesToScroll": 1,
"dots": false,
"autoplay": false,
"autoplaySpeed": 5000,
"speed": 1000,
"arrows": true,
"infinite": false,
"prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-left" },
"nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-right" }
}'
data-slick-responsive='[
{"breakpoint":1501, "settings": {"slidesToShow": 4} },
{"breakpoint":1199, "settings": {"slidesToShow": 4} },
{"breakpoint":991, "settings": {"slidesToShow": 3} },
{"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
{"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
{"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
]'
>
<?php 
$sql1=$conn->prepare("SELECT * FROM product_details pd,product_category pc,stock_details sd,product_size ps,product_type pt,product_units pu WHERE pd.pc_id=pc.pc_id AND pd.pd_id=sd.pd_id AND pd.ps_id=ps.ps_id AND pd.pt_id=pt.pt_id AND ps.pu_id=pu.pu_id AND pd.pc_id=? ORDER BY pd.pd_id DESC LIMIT 10");  
$sql1->bind_param("i",$pc_id_filter);  
$sql1->execute();
$result1=$sql1->get_result();
$count=$result1->num_rows;//For Pagination     
while($row1=$result1->fetch_assoc()){
if($row1["sd_discount"]!=0)
{
$unit_price=$row1["sd_unitprice"]-$row1["sd_discount"];    
$discount=$row1["sd_unitprice"];  
}
else
{
$unit_price=$row1["sd_unitprice"];    
$discount=0;  
}
?>

 
<!--=======  single slider product  =======-->
<div class="single-slider-product grid-view-product">
<div class="single-slider-product__image">
<a href="products_description.php?pc_id=<?php echo $row1["pc_id"];?>&pd_id=<?php echo $row1["pd_id"];?>">
<img src="admin/photos/<?php echo $row1["pd_image1"];?>" class="img-fluid" alt="" style="width:255px;height:200px;">
<img src="admin/photos/<?php echo $row1["pd_image2"];?>" class="img-fluid" alt="" style="width:255px;height:200px;">
</a>
</div>

<div class="single-slider-product__content" style="height:303px;">
<p class="product-title"><a href="products_description.php?pc_id=<?php echo $row1["pc_id"];?>&pd_id=<?php echo $row1["pd_id"];?>"><?php echo $row1["pd_name"];?></a></p>
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
if($row1["sd_status"]=="NOT AVAILABLE"){  
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
 <td class="td_class" style="float:right;">SIZE&nbsp;:&nbsp;</td>
 <td class="td_text"><?php echo $row1["ps_size"];?>&nbsp;<?php echo $row1["pu_type"];?></td>
</tr>
<tr>
 <td class="td_class">QUALITY&nbsp;:&nbsp;</td>
 <td class="td_text"><?php echo $row1["pt_name"];?>(<?php echo $row1["pt_quality"];?>)</td>
</tr> 
</table> 
 
<br> 
<a href="products_description.php?pc_id=<?php echo $row1["pc_id"];?>&pd_id=<?php echo $row1["pd_id"];?>" class="btn btn-primary btn-block"><i class="fa fa-play">&nbsp;</i>VIEW DESCRIPTION</a> 
<br> 
</div>
</div>
<?php
}
?> 
<!--=======  End of single slider product  =======-->



</div>
</div>

<!--=======  End of product single row slider wrapper  =======-->
</div>
</div>
</div>
</div>
<?php include_once("3_footer.php");?>
</div> 
<?php include_once("4_footer_scripts.php");?>
<?php include_once("8_json_scripts.php");?>
</body>
</html>