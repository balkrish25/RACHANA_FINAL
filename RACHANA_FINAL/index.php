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
</style>
 
</head>
<body>
<div class="page-wrapper-blue">
<?php include_once("2_header.php");?>

<!--====================  hero slider area ====================-->
<div class="hero-slider-area mb-40">
<!--=======  hero slider wrapper  =======-->
<div class="hero-slider-wrapper">
<div class="ht-slick-slider"
data-slick-setting='{
"slidesToShow": 1,
"slidesToScroll": 1,
"arrows": false,
"dots": true,
"autoplay": true,
"autoplaySpeed": 5000,
"speed": 1000,
"fade": true
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

<!--=======  single slider item  =======-->

<div class="single-slider-item">
<div class="hero-slider-item-wrapper hero-slider-item-wrapper--fullwidth hero-slider-bg-10">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="hero-slider-content">
<p class="slider-title slider-title--small" style="color:white"><br><br><br><br></p>
<p class="slider-title slider-title--big-bold" style="color:white">We Deliver</p>
<p class="slider-title slider-title--big-light" style="color:white">Best Service to <br> Our Clients</p>
</div>
</div>
</div>
</div>
</div>
</div>
 
<div class="single-slider-item">
<div class="hero-slider-item-wrapper hero-slider-item-wrapper--fullwidth hero-slider-bg-11">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="hero-slider-content">
<p class="slider-title slider-title--small" style="color:white"><br></p>
<p class="slider-title slider-title--big-bold" style="color:white;float:right;text-align:center;">The Best Customized <br> Acrylic Trophies</p><br>
</div>
</div>
</div>
</div>
</div>
</div> 
<!--=======  End of single slider item  =======-->

</div>
</div>

<!--=======  End of hero slider wrapper  =======-->
</div>

<!--====================  End of hero slider area  ====================-->

<!--====================  split banner area ====================-->

<div class="split-banner-area mb-40 mb-sm-30">
<div class="container">
<div class="row row-5">
<div class="col-md-6 mb-sm-10">
<!--=======  single split banner  =======-->

<div class="single-split-banner">
<div class="single-split-banner__image">
<a href="shop-left-sidebar.html">
<img src="assets/img/banners/banner8.jpg" class="img-fluid" alt="">
<div class="single-split-banner__image__content">
<p class="split-banner-title split-banner-title--light">We Manufacture the</p>
<p class="split-banner-title split-banner-title--bold">Best Trophy <br>& Medals in Town</p>
</div>
</a>
</div>
</div>

<!--=======  End of single split banner  =======-->
</div>
<div class="col-md-6 mb-sm-10">
<!--=======  single split banner  =======-->

<div class="single-split-banner">
<div class="single-split-banner__image">
<a href="shop-left-sidebar.html">
<img src="assets/img/banners/banner9.jpg" class="img-fluid" alt="">
<div class="single-split-banner__image__content">
<p class="split-banner-title split-banner-title--light">We have More than</p>
<p class="split-banner-title split-banner-title--bold">100+ Happy <br>Clients</p>
</div>
</a>
</div>
</div>

<!--=======  End of single split banner  =======-->
</div>
</div>
</div>
</div>

<!--====================  End of split banner area  ====================-->
<!--====================  product single row counter slider area ====================-->

<div class="product-single-row-slider-area mb-40">
<div class="container">

<div class="row align-items-center">
<div class="col-lg-7">
<!--=======  section title  =======-->
<div class="section-title mb-20">
<h2>New Arrivals</h2>
</div>
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

<!--=======  single slider product  =======-->

<?php 
$sql=$conn->prepare("SELECT * FROM product_details pd,product_category pc,stock_details sd,product_size ps,product_type pt,product_units pu WHERE pd.pc_id=pc.pc_id AND pd.pd_id=sd.pd_id AND pd.ps_id=ps.ps_id AND pd.pt_id=pt.pt_id AND ps.pu_id=pu.pu_id ORDER BY pd.pd_id ASC LIMIT 10");   
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

<!--=======  single slider product  =======-->
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
<?php
}
?> 
<!--=======  End of single slider product  =======-->
<!--=======  End of single slider product  =======-->
</div>
</div>
<!--=======  End of product single row slider wrapper  =======-->
</div>
</div>
</div>
</div>
<!--====================  End of product single row counter slider area  ====================-->
<!--====================  icon feature area ====================-->

<div class="icon-feature-area mb-40">
<div class="container">
<div class="row">
<div class="col-lg-12">
<!--=======  icon feature wrapper  =======-->

<div class="icon-feature-wrapper">
<div class="row row-5">
<div class="col-6 col-lg-3 col-sm-6">
<!--=======  single icon feature  =======-->

<div class="single-icon-feature">
<div class="single-icon-feature__icon">
<img src="assets/img/icons/free_shipping-blue.png" class="img-fluid" alt="">
</div>
<div class="single-icon-feature__content">
<p class="feature-title">Free Shipping</p>
<p class="feature-text">Free shipping on order</p>
</div>
</div>

<!--=======  End of single icon feature  =======-->
</div>
<div class="col-6 col-lg-3 col-sm-6">
<!--=======  single icon feature  =======-->

<div class="single-icon-feature">
<div class="single-icon-feature__icon">
<img src="assets/img/icons/support247-blue.png" class="img-fluid" alt="">
</div>
<div class="single-icon-feature__content">
<p class="feature-title">Support 24/7</p>
<p class="feature-text">Contact us 24 hrs a day</p>
</div>
</div>

<!--=======  End of single icon feature  =======-->
</div>
<div class="col-6 col-lg-3 col-sm-6">
<!--=======  single icon feature  =======-->

<div class="single-icon-feature">
<div class="single-icon-feature__icon">
<img src="assets/img/icons/moneyback-blue.png" class="img-fluid" alt="">
</div>
<div class="single-icon-feature__content">
<p class="feature-title">100% Money Back</p>
<p class="feature-text">You’ve 30 days to Return</p>
</div>
</div>

<!--=======  End of single icon feature  =======-->
</div>
<div class="col-6 col-lg-3 col-sm-6">
<!--=======  single icon feature  =======-->

<div class="single-icon-feature">
<div class="single-icon-feature__icon">
<img src="assets/img/icons/payment_secure-blue.png" class="img-fluid" alt="">
</div>
<div class="single-icon-feature__content">
<p class="feature-title">Payment Secure</p>
<p class="feature-text">100% secure payment</p>
</div>
</div>

<!--=======  End of single icon feature  =======-->
</div>
</div>
</div>

<!--=======  End of icon feature wrapper  =======-->
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