<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
<?php include_once("1_metatags.php");?>
<?php include_once("8_convert_price.php");?>
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
<h4 class="card-title" style="float:left;">CUSTOMER ORDER REQUEST</h4>
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
<th>Sl No.</th>
<th>Name</th>
<th>Order Date</th>
<th>Amount <br>Order No. <br>Payment Mode</th>
<th>Order Status</th>
<th>ACTION</th>
</tr>
</thead>
<tbody>
<?php
$sql=$conn->prepare("SELECT * FROM customer c,customer_order_details cod WHERE c.cu_id=cod.cu_id ORDER BY cod.cod_id DESC");
$sql->execute();
$result=$sql->get_result();
$sno=1;
while($row=$result->fetch_assoc()){
$json_array = json_decode($row["order_json"],true);
//print("<pre>".print_r($json_array,true)."</pre>");
?>
<tr>
<td><?php echo $sno++;//$row['ad_id'];?> </td>
<td><?php echo $row['cu_name']?></td>
<td><?php echo $row['order_date'];?></td>
<td><b>AMT : </b><?php echo currencyFormat($json_array['amount_details']['grand_total']);?><br><br><b>ORD NO : </b><?php echo $row['order_no'];?>
<br><br>
<?php if($json_array['shipping_details']['payment_mode'] == "COD")
{    
?>
<b><?php echo $json_array['shipping_details']['payment_mode'];?></b>
<?php 
}
else
{ 
?>
<b><?php echo $json_array['shipping_details']['payment_mode'];?></b><br>
<?php echo $json_array['shipping_details']['transaction_no'];?>
<?php 
} 
?>
</td>                      
<td><?php if($row['order_status'] == 'ORDER PLACED'){
?>               
<form action="customer_order_confirm.php" method="post">
<input type="hidden" name="cu_id" value="<?php echo $row['cu_id']?>">
<input type="hidden" name="orderno" value="<?php echo $row['order_no']?>">
<input type="hidden" name="cu_name" value="<?php echo $row['cu_name']?>">
<input type="hidden" name="cu_contact" value="<?php echo $row['cu_contact']?>">
<input type="hidden" name="grand_total" value="<?php echo $json_array['amount_details']['grand_total'];?>">
<button type="submit" class="btn btn-sm btn-success" style="width:100%;">CONFIRM</button><br><br>
</form>    
    
<form action="customer_order_cancel.php" method="post">
<input type="hidden" name="cod_id" value="<?php echo $row['cod_id']?>">
<input type="hidden" name="orderno" value="<?php echo $row['order_no']?>">
<input type="hidden" name="cu_name" value="<?php echo $row['cu_name']?>">
<input type="hidden" name="cu_contact" value="<?php echo $row['cu_contact']?>">
<button type="submit" class="btn btn-sm btn-danger" style="width:100%;">CANCEL ORDER</button>
</form>         
<?php 
}
?>    
    
<?php if($row['order_status'] == 'ORDER CONFIRMED'){?> 
<button type="submit" class="btn btn-sm btn-warning" style="width:100%;color:white" disabled>ORDER CONFIRMED</button> 
<?php } ?>

</td>                   
<td>
<form action="customer_order_details.php" method="post">
<input type="hidden" name="cu_id" value="<?php echo $row['cu_id']?>">
<input type="hidden" name="order_date" value="<?php echo $row['order_date']?>">
<input type="hidden" name="order_no" value="<?php echo $row['order_no']?>">
<button type="submit" class="btn btn-sm btn-primary" style="width:100%;">ORDER DETAILS</button> 
</form>
<br>
<form action="customer_order_invoice.php" method="post">
<input type="hidden" name="cod_id" value="<?php echo $row['cod_id']?>">
<input type="hidden" name="cu_id" value="<?php echo $row['cu_id']?>">
<input type="hidden" name="ci_date" value="<?php echo $row['date']?>">
<input type="hidden" name="ci_orderno" value="<?php echo $row['order_no']?>">
<button type="submit" class="btn btn-sm btn-info" style="width:100%;">GENERATE BILL</button>
</form>
</td>                   
</tr>
<?php } ?>
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