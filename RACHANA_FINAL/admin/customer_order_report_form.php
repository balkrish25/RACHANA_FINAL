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
<center><h4 class="card-title" id="horz-layout-card-center">CUSTOMER INNOVICE</h4></center>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
</div>
<div class="card-content collpase show">
<div class="card-body">
<form class="form form-horizontal" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data" action="customer_order_report_generate.php">
<div class="form-body">
<div class="form-group">
<label for="timesheetinput1">FROM DATE</label>
<input type="date" class="form-control" name="from_date" id="from_date">
<span id="from_date_error"></span>
</div>

<div class="form-group">
<label for="timesheetinput1">TO DATE</label>
<input type="date" class="form-control" name="to_date" id="to_date">
<span id="to_date_error"></span>
</div>

</div>

<div class="form-actions center">
<button type="submit" class="btn btn-success">
 GENERATE
</button>
<button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">
 Cancel
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

<?php include_once("4_footer.php");?>
<script type="text/javascript">
function ValidateForm()
{
var from_date = '';
var to_date = '';

from_date = fieldrequired('from_date', 'from_date_error', 'FROM DATE');
to_date = fieldrequired('to_date', 'to_date_error', 'TO DATE');

if (from_date == 1 && to_date == 1) 
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