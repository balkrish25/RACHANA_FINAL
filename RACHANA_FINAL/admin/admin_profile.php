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
<center><h4 class="card-title" id="horz-layout-card-center">ADMIN PROFILE</h4></center>
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
$ad_username=$_SESSION["admin_username"];
$sql=$conn->prepare("SELECT * FROM admin WHERE ad_username=?");
$sql->bind_param("s",$ad_username);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();                                
?>

<form class="form form-horizontal" action="admin_update.php" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data">
<div class="form-body">
<input type="hidden" id="ad_id" name="ad_id" value="<?php echo $row['ad_id'];?>">
<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput1">NAME</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="NAME" name="ad_name" id="ad_name" value="<?php echo $row['ad_name'];?>">
<span id="ad_name_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput3">ADDRESS</label>
<div class="col-md-9">
<textarea type="text" class="form-control" placeholder="ADDRESS" name="ad_address" id="ad_address"><?php echo $row['ad_address'];?>
</textarea>
<span id="ad_address_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput2">CONTACT</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="CONTACT" name="ad_contact" id="ad_contact" value="<?php echo $row['ad_contact'];?>">
<span id="ad_contact_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput4">EMAIL</label>
<div class="col-md-9">
<input type="text"  class="form-control" placeholder="EMAIL" name="ad_email" id="ad_email" value="<?php echo $row['ad_email'];?>">
<span id="ad_email_error"></span>
</div>
</div>



<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput5">DATE</label>
<div class="col-md-9">
<input type="date"  class="form-control" placeholname="password" id="ad_date" name="ad_date" value="<?php echo date('Y-m-d');?>" readonly>
<span id="ad_date_error"></span>
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
            
            var ad_name = '';
            var ad_address = '';
            var ad_contact = '';
            var ad_email = '';
            var ad_username = '';
            ad_name = alphabets('ad_name', 'ad_name_error', 'Name');
            ad_address = fieldrequired('ad_address', 'ad_address_error', 'Address');
            ad_contact = phoneno('ad_contact', 'ad_contact_error', 'Contact No.');
            ad_email=fieldrequired('ad_email','ad_email_error','EMAILID')
            
            if (ad_name == 1 && ad_address == 1 && ad_contact == 1 && ad_email == 1 ) 
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