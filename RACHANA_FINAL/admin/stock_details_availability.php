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
<!-- DOM - jQuery events table -->
<section id="dom">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="card-title" style="float:left;">STOCK AVAILABILITY DETAILS</h4>
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
<th>EDIT</th> 
<th>NAME</th>
<th>PRICE</th>
<th>DISCOUNT</th>
<th>MIN QTY ORDER</th>
<th>MAX QTY ORDER</th>
<th>STATUS</th>
<th>DATE</th>
</tr>
</thead>
<tbody>
<?php 
$sd_status="NOT AVAILABLE"; 
$sql=$conn->prepare("SELECT * FROM stock_details,product_details WHERE stock_details.pd_id=product_details.pd_id AND stock_details.sd_status=? ORDER BY product_details.pd_id DESC");
$sql->bind_param("s",$sd_status); 
$sql->execute();
$result=$sql->get_result();
$sno=1;
while($row=$result->fetch_assoc())
{
?>
<tr>
<td><?php echo $sno++;?></td>
<td>
<a class="btn btn-primary" href="stock_details_edit.php?id=<?php echo $row['sd_id'];?>">EDIT</a>
</td>
<td><?php echo $row['pd_name'];?></td>
<td><?php echo $row['sd_unitprice'];?></td>
<td><?php echo $row['sd_discount'];?></td>
<td><?php echo $row['sd_min_qty_order'];?></td>
<td><?php echo $row['sd_max_qty_order'];?></td>
<td style="color:red;font-weight:bold"><?php echo $row['sd_status'];?></td>
<td><?php echo $row['sd_date'];?></td>
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