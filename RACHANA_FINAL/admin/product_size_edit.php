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
<center><h4 class="card-title" id="horz-layout-card-center">PRODUCT SIZE EDIT</h4></center>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
</ul>
</div>
</div>
<div class="card-content collpase show">
<div class="card-body">

<?php
$product_size_id=$_REQUEST["id"];
$sql=$conn->prepare("SELECT * FROM product_size WHERE ps_id= ?");
$sql->bind_param("i",$product_size_id);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
?>


<form class="form form-horizontal" action="product_size_update.php" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data">
<div class="form-body">

<input type="hidden" id="ps_id" name="ps_id" value="<?php echo $row['ps_id'];?>"> 
<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput1">CATEGORY</label>
<div class="col-md-9">
<?php 

$sql1=$conn->prepare("SELECT * FROM product_category");
$sql1->execute();
$result1=$sql1->get_result();                 
?>
<select name="pc_id" id="pc_id" class="form-control">
<option value="">--SELECT PRODUCT CATEGORY--</option>
<?php
while($row1=$result1->fetch_assoc())
{ 
?>
<option value="<?php echo $row1["pc_id"];?>"
<?php
if($row1["pc_id"]==$row["pc_id"])
{
    ?>
    selected
    <?php
}?>
><?php echo $row1["pc_name"];?></option>
<?php } ?>
</select>
<span id="pc_id_error"></span>
</div>
</div>
 
<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput1">UNIT TYPE</label>
<div class="col-md-9">
<?php 

$sql1=$conn->prepare("SELECT * FROM product_units");
$sql1->execute();
$result1=$sql1->get_result();                 
?>
<select name="pu_id" id="pu_id" class="form-control">
<option value="">--SELECT UINT TYPE--</option>
<?php
while($row1=$result1->fetch_assoc())
{ 
?>
<option value="<?php echo $row1["pu_id"];?>"
<?php
if($row1["pu_id"]==$row["pu_id"])
{
    ?>
    selected
    <?php
}?>
><?php echo $row1["pu_type"];?></option>
<?php } ?>
</select>
<span id="pu_id_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput1">SIZE</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="VALUE" name="ps_size" id="ps_size" value="<?php echo $row['ps_size'];?>">
<span id="ps_size_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput2">DATE</label>
<div class="col-md-9">
<input type="date" class="form-control" name="ps_date" id="ps_date" value="<?php echo date('Y-m-d');?>" readonly>
<span id="ps_date_error"></span>
</div>
</div>

</div>

<div class="form-actions center">
<button type="submit" class="btn" style="background-color:#1A5F60; color:white">
<i class="fa fa-check-square-o"></i> Update
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
var pu_id = '';
var ps_size = '';
var pc_id = '';
pu_id = fieldrequired('pu_id', 'pu_id_error', 'Unit Type');
ps_size = amount_val('ps_size', 'ps_size_error', 'Value');
pc_id = fieldrequired('pc_id', 'pc_id_error', 'Category');


if (pu_id == 1 && ps_size == 1 && pc_id == 1) 
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