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
<h4 class="card-title" style="float:left;">PRODUCT UNITS</h4>
<button type="button" class="btn" style="float:right; margin-right:5%; background-color:#1A5F60; color:white;" onclick="window.location.href='product_units_form.php'">NEW</button>
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
<th>UNIT TYPE</th>
<th>DATE</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>
</thead>
<tbody>

<?php
$sql=$conn->prepare("SELECT * from product_units");
$sql->execute();
$result=$sql->get_result();
$sno=1;
while($row=$result->fetch_assoc())
{
?>

<tr>
<td><?php echo $sno++; ?></td>
<td><?php echo $row["pu_type"];?></td>
<td><?php echo $row["pu_date"];?></td>
<td><a class="btn btn-primary" href="product_units_edit.php?id=<?php echo $row['pu_id'];?>">EDIT</a></td>
<td><a class="btn btn-danger" href="product_units_delete.php?id=<?php echo $row['pu_id'];?>" onclick="return confirm('Do You Really Want To Delete ?')">DELETE</a></td>
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