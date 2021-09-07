<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
<?php include_once("1_metatags.php");?>
<style>
hr {
    margin-top: 2px;
    margin-bottom: 2px;
 }
</style> 
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
<!-- DOM - jQuery events table -->
<section id="dom">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="card-title" style="float:left;">PRODUCT DETAILS</h4>
<button type="button" class="btn" style="float:right; margin-right:5%; background-color:#1A5F60; color:white;" onclick="window.location.href='product_details_form.php'">NEW</button>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
</ul>
</div>
</div>
<div class="card-content collapse show" style="overflow-x:auto;">
<div class="card-body card-dashboard">
<table class="table table-striped table-bordered dom-jQuery-events">
<thead>
<tr>
<th>SL.NO</th>
<th>DETAILS</th>
<th>IMAGE1</th>
<th>DESCRIPTION</th>
<th>DATE</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>
</thead>
<tbody>

<?php
$sql=$conn->prepare("SELECT * from product_details,product_category,product_type,product_size,product_units WHERE product_details.pc_id=product_category.pc_id AND product_details.pt_id=product_type.pt_id AND product_details.ps_id=product_size.ps_id AND product_size.pu_id=product_units.pu_id ORDER BY product_details.pd_id DESC");
$sql->execute();
$result=$sql->get_result();
$sno=1;
while($row=$result->fetch_assoc())
{
?>

<tr>
<td><?php echo $sno++; ?></td>
<td>
<b><?php echo $row["pc_name"];?></b><br>
<?php echo $row["pd_name"];?><br><hr>
<b>SIZE &nbsp;:</b>&nbsp;<?php echo $row["ps_size"];?><?php echo $row["pu_type"];?><br>
<b>TYPE :</b>&nbsp;<?php echo $row["pt_name"];?> 
</td>
<td><img src="photos/<?php echo $row["pd_image1"];?>" alt="NO IMAGE" height="100" width="100"></td>
<td><a class="btn btn-success" href="product_description_view.php?id=<?php echo $row["pd_id"];?>">VIEW DESCRIPTION</a></td>
<td><?php echo $row["pd_date"];?></td>
<td><a class="btn btn-primary" href="product_details_edit.php?id=<?php echo $row['pd_id'];?>">EDIT</a></td>
<td><a class="btn btn-danger" href="product_details_delete.php?id=<?php echo $row['pd_id'];?>" onclick="return confirm('Do You Really Want To Delete ?')">DELETE</a></td>
</tr>
<?php
}
?>
</tbody>
</table>
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
</body>
<!-- END: Body-->

</html>