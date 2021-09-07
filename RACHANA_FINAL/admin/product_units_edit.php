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
<center><h4 class="card-title" id="horz-layout-card-center">PRODUCT UNITS EDIT</h4></center>
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
$product_units_id=$_REQUEST["id"];
$sql=$conn->prepare("SELECT * FROM product_units WHERE pu_id= ?");
$sql->bind_param("i",$product_units_id);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
?>
<form class="form form-horizontal" action="product_units_update.php" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data">
<div class="form-body">

<input type="hidden" id="pu_id" name="pu_id" value="<?php echo $row['pu_id'];?>">

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput1">UNIT TYPE</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="UNIT TYPE" name="pu_type" id="pu_type" value="<?php echo $row['pu_type'];?>">
<span id="pu_type_error"></span>
</div>
</div>


<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput2">DATE</label>
<div class="col-md-9">
<input type="date" class="form-control" name="pu_date" id="pu_date" value="<?php echo date('Y-m-d');?>" readonly>
<span id="pu_date_error"></span>
</div>
</div>

</div>

<div class="form-actions center">
<button type="submit" class="btn" style="background-color:#1A5F60; color:white">
<i class="fa fa-check-square-o"></i> Update
</button>
<button type="button" class="btn btn-warning mr-1" onclick="window.location.href='product_units_view.php'">
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
var pu_type = '';


pu_type = alphabets('pu_type', 'pu_type_error', 'Unit Type');


if (pu_type == 1) 
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