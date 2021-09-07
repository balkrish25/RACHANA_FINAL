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
<center><h4 class="card-title" id="horz-layout-card-center">PORTFOLIO EDIT</h4></center>
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
$portfolio_id=$_REQUEST["id"];
$sql=$conn->prepare("SELECT * FROM portfolio WHERE pf_id= ?");
$sql->bind_param("i",$portfolio_id);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
?>
<form class="form form-horizontal" action="portfolio_update.php" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data">
<div class="form-body">
<input type="hidden" id="pf_id" name="pf_id" value="<?php echo $row['pf_id'];?>">

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput1">NAME</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="NAME" name="pf_name" id="pf_name" value="<?php echo $row['pf_name'];?>">
<span id="pf_name_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput3">DESCRIPTION</label>
<div class="col-md-9">
<textarea type="text" class="form-control" placeholder="DESCRIPTION" name="pf_description" id="pf_description"><?php echo $row['pf_description'];?>
</textarea>
<span id="pf_description_error"></span>
<script>
CKEDITOR.replace('pf_description');
</script>
</div>
</div>


<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput5">IMAGE</label>
<div class="col-md-9">
<img src="photos/portfolio/<?php echo $row['pf_image'];?>" alt="NO IMAGE" height="100" width="100">

<input type="hidden" name="old_pf_image" id="old_pf_image1" value="<?php echo $row['pf_image'];?>">

<input type="file" class="form-control" placeholder="IMAGE" name="pf_image" id="pf_image">
<span id="pf_image_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput5">DATE</label>
<div class="col-md-9">
<input type="date" class="form-control" placeholder="DATE" name="pf_date" id="pf_date" value="<?php echo date('Y-m-d');?>" readonly>
<span id="pf_date_error"></span>
</div>
</div>




</div>

<div class="form-actions center">
<button type="submit" class="btn" style="background-color:#1A5F60; color:white">
<i class="fa fa-check-square-o"></i> Save
</button>
<button type="button" class="btn btn-warning mr-1" onclick="window.location.href='portfolio_view.php'">
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
var pf_name = '';
var pf_description = '';
var pf_image = '';


pf_name = alphabets('pf_name', 'pf_name_error', 'Name');
pf_description = ckeditor_val('pf_description', 'pf_description_error', 'Description');
    
if(document.getElementById('pf_image').value == "")
{
pf_image=1;
}
else
{
pf_image = imagename('pf_image', 'pf_image_error', 'Image');
}

if (pf_name == 1 && pf_description == 1 && pf_image == 1) 
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