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
<center><h4 class="card-title" id="horz-layout-card-center">PRODUCT TYPE EDIT</h4></center>
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
$product_type_id=$_REQUEST["id"];
$sql=$conn->prepare("SELECT * FROM product_type WHERE pt_id= ?");
$sql->bind_param("i",$product_type_id);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
?>

<form class="form form-horizontal" action="product_type_update.php" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data">
<div class="form-body">

<input type="hidden" id="pt_id" name="pt_id" value="<?php echo $row['pt_id'];?>">
<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput1">TYPE</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="TYPE" name="pt_name" id="pt_name" value="<?php echo $row["pt_name"];?>">
<span id="pt_name_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput1">QUALITY</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="QUALITY" name="pt_quality" id="pt_quality" value="<?php echo $row["pt_quality"];?>">
<span id="pt_quality_error"></span>
</div>
</div>


<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput2">DATE</label>
<div class="col-md-9">
<input type="date" class="form-control" name="pt_date" id="pt_date" value="<?php echo date('Y-m-d');?>" readonly>
<span id="pt_date_error"></span>
</div>
</div>

</div>

<div class="form-actions center">
<button type="submit" class="btn" style="background-color:#1A5F60; color:white">
<i class="fa fa-check-square-o"></i> Update
</button>
<button type="button" class="btn btn-warning mr-1" onclick="window.location.href='product_type_view.php'">
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
var pt_name = '';
var pt_quality = '';


pt_name = alphabets('pt_name', 'pt_name_error', 'Type');
pt_name = alphabets('pt_quality', 'pt_quality_error', 'Quality');


if (pt_name == 1 && pt_name == 1) 
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