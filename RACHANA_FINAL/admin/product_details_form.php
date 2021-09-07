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
<center><h4 class="card-title" id="horz-layout-card-center">PRODUCT DETAILS FORM</h4></center>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
</ul>
</div>
</div>
<div class="card-content collpase show">
<div class="card-body">
<form class="form form-horizontal" action="product_details_insert.php" method="post" onsubmit="return ValidateForm();" enctype="multipart/form-data">
<div class="form-body">

<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput1">PRODUCT CATEGORY</label>
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
<label class="col-md-2 label-control" for="eventRegInput1">PRODUCT SIZE</label>
<div class="col-md-9">
<select name="ps_id" id="ps_id" class="form-control">
<option value="">--SELECT CATEGORY FIRST--</option>
</select>
<span id="ps_id_error"></span>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput1">PRODUCT TYPE</label>
<div class="col-md-9">
<?php 

$sql=$conn->prepare("SELECT * FROM product_type");
$sql->execute();
$result=$sql->get_result();                 
?>
<select name="pt_id" id="pt_id" class="form-control">
<option value="">--SELECT PRODUCT TYPE--</option>
<?php
while($row=$result->fetch_assoc())
{ 
?>
<option value="<?php echo $row["pt_id"];?>"><?php echo $row["pt_name"];?></option>
<?php } ?>
</select>
<span id="pt_id_error"></span>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput2">PRODUCT NAME</label>
<div class="col-md-9">
<input type="text" class="form-control" placeholder="PRODUCT NAME" name="pd_name" id="pd_name">
<span id="pd_name_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput4">IMAGE1</label>
<div class="col-md-9">
<input type="file"  class="form-control" placeholder="IMAGE1" name="pd_image1" id="pd_image1">
<span id="pd_image1_error"></span>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput3">DESCRIPTION</label>
<div class="col-md-9">
<textarea type="text" class="form-control" placeholder="DESCRIPTION" name="pd_description" id="pd_description">
</textarea>
<span id="pd_description_error"></span>
<script>
CKEDITOR.replace('pd_description');
</script>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 label-control" for="eventRegInput4">DATE</label>
<div class="col-md-9">
<input type="date"  class="form-control" name="pd_date" id="pd_date" value="<?php echo date('Y-m-d');?>" readonly>
<span id="pd_date_error"></span>
</div>
</div>

</div>

<div class="form-actions center">
<button type="submit" class="btn" style="background-color:#1A5F60; color:white">
<i class="fa fa-check-square-o"></i> Save
</button>
<button type="button" class="btn btn-warning mr-1" onclick="window.location.href='product_details_view.php'">
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
            var ps_id = '';
            var pt_id = '';
            var pd_name = '';
            var pd_image1 = '';
           
            
            var pd_description = ''; 
            
pd_name = alphabets('pd_name', 'pd_name_error', 'Name');         
pc_id = fieldrequired('pc_id', 'pc_id_error', 'CATEGORY');
ps_id = fieldrequired('ps_id', 'ps_id_error', 'PRODUCT SIZE');
pt_id = fieldrequired('pt_id', 'pt_id_error', 'PRODUCT TYPE');

pd_image1 = imagename('pd_image1', 'pd_image1_error', 'IMAGE1');


pd_description = ckeditor_val('pd_description','pd_description_error','DESCRIPTION');
            

            if (pd_name == 1  && pc_id == 1 && ps_id == 1 && pt_id == 1 && pd_image1 == 1 && pd_description==1) 
            {
                
                return true;
            }
            else
            {
               
                return false;
            }
        }
</script>
<script type="text/javascript"> 
	$(document).ready(function() {
        $('#pc_id').on('change', function() {
            var pc_id = $(this).val();
            if (pc_id) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxProductSize.php',
                    data: {pc_id: pc_id},
                    success: function(html) {
                        $('#ps_id').html(html);
                    }
                });
            } else {
                $('#ps_id').html('<option value="">Select Category First</option>');
               
            }
        });
    });
</script> 
</body>
<!-- END: Body-->

</html>