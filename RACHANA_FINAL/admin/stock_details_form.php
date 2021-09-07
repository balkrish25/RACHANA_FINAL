<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
<?php include_once("1_metatags.php");?>
</head>
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<?php include_once("2_topnav.php");?>
<?php include_once("3_sidebar.php");?>


<!-- BEGIN: Content-->
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
</div>
<div class="content-body">
			<!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
<div class="row justify-content-md-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<center><h4 class="card-title" id="horz-layout-card-center">STOCK DETAILS FORM</h4></center>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
</ul>
</div>
</div>
<div class="card-content collpase show">
<div class="card-body">
<form class="form form-horizontal" action="stock_details_insert.php" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data">
<div class="form-body">


<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput1">SELECT PRODUCT</label>
<div class="col-md-9">
<select name="pd_id" id="pd_id" class="form-control">
 <option value="">--SELECT PRODUCT--</option>
<?php
$sql=$conn->prepare("SELECT * FROM product_details WHERE pd_id NOT IN (SELECT pd_id FROM stock_details) ORDER BY pd_id DESC"); 
$sql->execute();
$result=$sql->get_result();
while($row=$result->fetch_assoc()){
?>
<option value="<?php echo $row["pd_id"];?>"><?php echo $row["pd_name"];?></option> 
<?php 
}
?>
</select> 
<span id="pd_id_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput2">UNIT PRICE</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="Enter Unit Price" name="sd_unitprice" id="sd_unitprice">
<span id="sd_unitprice_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput4">DISCOUNT</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="Enter Discount" name="sd_discount" id="sd_discount">
<span id="sd_discount_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput5">MIN QTY</label>
<div class="col-md-9">
<input type="text"  class="form-control" placeholder="Enter Minimum Quantity Order" name="sd_min_qty_order" id="sd_min_qty_order">
<span id="sd_min_qty_order_error"></span>
</div>
</div>
 
<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput5">MAX QTY</label>
<div class="col-md-9">
<input type="text"  class="form-control" placeholder="Enter Maximum Quantity Order" name="sd_max_qty_order" id="sd_max_qty_order">
<span id="sd_max_qty_order_error"></span>
</div>
</div>
 
<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput5">STOCK STATUS</label>
<div class="col-md-9">
<select name="sd_status" id="sd_status" class="form-control">
 <option value="">--SELECT STOCK STATUS--</option>
 <option value="AVAILABLE">AVAILABLE</option>
 <option value="NOT AVAILABLE">NOT AVAILABLE</option>
</select>
<span id="sd_status_error"></span>
</div>
</div>
 


<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput5">DATE</label>
<div class="col-md-9">
<input type="text"  class="form-control" placeholder="DATE" name="sd_date" id="sd_date" value="<?php echo date('Y-m-d');?>" readonly>
<span id="sd_date_error"></span>
</div>
</div>

</div>

<div class="form-actions center">
<button type="submit" class="btn" style="background-color:#1A5F60; color:white">
<i class="fa fa-check-square-o"></i> Save
</button>
<button type="button" class="btn btn-warning mr-1" onclick="window.location.href='stock_details_view.php'">
<i class="ft-x"></i> Cancel
</button>

</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>


</div>
</div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php include_once("4_footer_name.php");?>
<?php include_once("4_footer.php");?>
<script type="text/javascript">
function ValidateForm()
{
var pd_id = '';
var sd_unitprice = '';
var sd_discount = '';
var sd_min_qty_order = '';
var sd_max_qty_order = '';
var sd_status = '';


pd_id = fieldrequired('pd_id', 'pd_id_error', 'Category');
sd_unitprice = amountval('sd_unitprice', 'sd_unitprice_error', 'Price');
sd_discount = numbers('sd_discount', 'sd_discount_error', 'Discount');
sd_min_qty_order = numbers('sd_min_qty_order', 'sd_min_qty_order_error', 'Min Qty');
sd_max_qty_order = numbers('sd_max_qty_order', 'sd_max_qty_order_error', 'Max Qty');
sd_status = fieldrequired('sd_status', 'sd_status_error', 'Status'); 

if (pd_id == 1 && sd_unitprice == 1  && sd_discount == 1 && sd_min_qty_order == 1 && sd_max_qty_order == 1 && sd_status == 1 ) 
{
return true;
}
else
{
return false;
}
}
</script>
</body>
<!-- END: Body-->

</html>