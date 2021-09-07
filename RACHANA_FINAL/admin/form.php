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
<center><h4 class="card-title" id="horz-layout-card-center">TABLE NAME</h4></center>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
</ul>
</div>
</div>
<div class="card-content collpase show">
<div class="card-body">
<form class="form form-horizontal" action="#" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data">
<div class="form-body">
<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput1">FULLNAME</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="FULLNAME" name="name" id="name">
<span id="name_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput3">ADDRESS</label>
<div class="col-md-9">
<textarea type="text" class="form-control" placeholder="ADDRESS" name="address" id="address">
</textarea>
<span id="address_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput2">CONTACT</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="CONTACT" name="contact" id="contact">
<span id="contact_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput4">EMAIL</label>
<div class="col-md-9">
<input type="text"  class="form-control" placeholder="EMAIL" name="email" id="email">
<span id="email_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput5">USERNAME</label>
<div class="col-md-9">
<input type="text"  class="form-control" placeholder="USERNAME" name="username" id="username">
<span id="username_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput5">PASSWORD</label>
<div class="col-md-9">
<input type="text"  class="form-control" placeholder="PASSWORD" name="password" id="password">
<span id="password_error"></span>
</div>
</div>


<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput5">IMAGE</label>
<div class="col-md-9">
<input type="file" class="form-control" placeholder="FULLNAME" name="image" id="image">
<span id="image_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput5">GENDER</label>
<div class="col-md-9">
<select name="gender" id="gender" class="form-control">
<option value="">--Select--</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
<span id="gender_error"></span>
</div>
</div>


</div>

<div class="form-actions center">
<button type="submit" class="btn" style="background-color:#1A5F60; color:white">
<i class="fa fa-check-square-o"></i> Save
</button>
<button type="button" class="btn btn-warning mr-1">
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
var fullname = '';
var address = '';
var contact = '';
var email = '';
var image = '';
var username = '';
var password = '';
var gender = '';

fullname = alphabets('name', 'name_error', 'Name');
address = fieldrequired('address', 'address_error', 'Address');
contact = phoneno('contact', 'contact_error', 'Contact No.');
email = emailid('email', 'email_error', 'Email Id');
image = imagename('image', 'image_error', 'Image');
username = fieldrequired('username', 'username_error', 'Username');
password = pasword('password', 'password_error', 'Password');
gender = fieldrequired('gender', 'gender_error', 'Gender');

if (fullname == 1 && address == 1 && contact == 1 && email == 1 && image == 1 && username == 1 && password == 1 && gender == 1 ) 
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