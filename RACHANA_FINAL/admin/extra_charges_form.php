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
<center><h4 class="card-title" id="horz-layout-card-center">EXTRA CHARGES FORM</h4></center>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
</ul>
</div>
</div>
<div class="card-content collpase show">
<div class="card-body">

<form class="form form-horizontal" action="extra_charges_insert.php" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data">
<div class="form-body">
<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput1">TAX</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="TAX" name="ec_tax" id="ec_tax">
<span id="ec_tax_error"></span>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput2">DISCOUNT</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="DISCOUNT" name="ec_discount" id="ec_discount">
<span id="ec_discount_error"></span>
</div>
</div>
 
 <div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput2">MINIMUM AMOUNT</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="MINIMUM AMOUNT" name="ec_min_amount" id="ec_min_amount">
<span id="ec_min_amount_error"></span>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput5">DATE</label>
<div class="col-md-9">
<input type="date"  class="form-control" name="ec_date" id="ec_date" value="<?php echo date('Y-m-d');?>" readonly>
<span id="ec_date_error"></span>
</div>
</div>

</div>

<div class="form-actions center">
<button type="submit" class="btn" style="background-color:#1A5F60; color:white">
<i class="fa fa-check-square-o"></i> Save
</button>
<button type="button" class="btn btn-warning mr-1" onclick="window.location.href='extra_charges_view.php'">
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
var ec_tax = '';
var ec_discount = '';
var ec_min_amount = '';


ec_tax=numbers('ec_tax','ec_tax_error','TAX');
ec_discount=numbers('ec_discount','ec_discount_error','DISCOUNT');
ec_min_amount=numbers('ec_min_amount','ec_min_amount_error','MINIMUM AMOUNT');



if (ec_tax == 1  && ec_discount == 1 && ec_min_amount==1) 
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