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
<center><h4 class="card-title" id="horz-layout-card-center">CHANGE PASSWORD</h4></center>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
</ul>
</div>
</div>
<div class="card-content collpase show">
<div class="card-body">

<form class="form form-horizontal" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data" action="change_password_update.php">
<div class="form-body">

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput1">OLD PASSWORD</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="OLD PASSWORD" name="old_password" id="old_password">
<span id="old_password_error"></span>
</div>
</div>


<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput2">NEW PASSWORD</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="NEW PASSWORD" name="new_password" id="new_password">
<span id="new_password_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput4">CONFIRM PASSWORD</label>
<div class="col-md-9">
<input type="text"  class="form-control" placeholder="CONFIRM PASSWORD" name="confirm_password" id="confirm_password">
<span id="confirm_password_error"></span>
</div>
</div>
</div>

<div class="form-actions center">
<button type="submit" class="btn" style="background-color:#1A5F60; color:white">
<i class="fa fa-check-square-o"></i> Save
</button>
<button type="button" class="btn btn-warning mr-1" onclick="window.location.href='index.php'">
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

var old_password = '';
var new_password = '';
var confirm_password = '';


old_password = pasword('old_password', 'old_password_error', 'Old Password');
confirm_password = pasword('confirm_password', 'confirm_password_error', 'Confirm Password');
new_password = pasword('new_password', 'new_password_error', 'New Password');

if (confirm_password == 1 && old_password == 1 && new_password == 1)
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