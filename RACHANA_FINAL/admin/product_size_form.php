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
<center><h4 class="card-title" id="horz-layout-card-center">PRODUCT SIZE FORM</h4></center>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
</ul>
</div>
</div>
<div class="card-content collpase show">
<div class="card-body">

<form class="form form-horizontal" action="product_size_insert.php" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data">
<div class="form-body">
<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput1">CATEGORY</label>
<div class="col-md-9">
<?php 

$sql=$conn->prepare("SELECT * FROM product_category");
$sql->execute();
$result=$sql->get_result();                 
?>
<select name="pc_id" id="pc_id" class="form-control">
<option value="">--SELECT PRODUCT CATEGORY--</option>
<?php
while($row=$result->fetch_assoc())
{ 
?>
<option value="<?php echo $row["pc_id"];?>"><?php echo $row["pc_name"];?></option>
<?php } ?>
</select>
<span id="pc_id_error"></span>
</div>
</div> 
<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput1">UNIT TYPE</label>
<div class="col-md-9">
<?php 

$sql=$conn->prepare("SELECT * FROM product_units");
$sql->execute();
$result=$sql->get_result();                 
?>
<select name="pu_id" id="pu_id" class="form-control">
<option value="">--SELECT UINT TYPE--</option>
<?php
while($row=$result->fetch_assoc())
{ 
?>
<option value="<?php echo $row["pu_id"];?>"><?php echo $row["pu_type"];?></option>
<?php } ?>
</select>
<span id="pu_id_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput1">SIZE</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="VALUE" name="ps_size" id="ps_size">
<span id="ps_size_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput2">DATE</label>
<div class="col-md-9">
<input type="date" class="form-control" name="ps_date" id="ps_date" value="<?php echo date('Y-m-d');?>" readonly>
<span id="ps_date_error"></span>
</div>
</div>

</div>

<div class="form-actions center">
<button type="submit" class="btn" style="background-color:#1A5F60; color:white">
<i class="fa fa-check-square-o"></i> Save
</button>
<button type="button" class="btn btn-warning mr-1" onclick="window.location.href='product_size_view.php'">
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
var pc_id = '';
var pu_id = '';
var ps_size = '';



pc_id = fieldrequired('pc_id', 'pc_id_error', 'Category');
pu_id = fieldrequired('pu_id', 'pu_id_error', 'Unit Type');
ps_size = amount_val('ps_size', 'ps_size_error', 'Value');


if (pc_id==1 && pu_id == 1 && ps_size == 1) 
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