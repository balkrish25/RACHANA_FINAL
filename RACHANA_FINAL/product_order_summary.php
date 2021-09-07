<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php require("1_metatags.php"); ?>
<?php require("8_convert_price.php"); ?>
</head>
<body>
<div class="page-wrapper-blue"> 
<?php require("2_header.php"); ?>
<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb-content">
<ul>
<li class="has-child"><a href="index.php">Home</a></li>
<li>Order Summary</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="page-section pb-40">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30">
<div class="cart-table table-responsive mb-40">
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Sl No.</th>
<th>Name</th>
<th>Order Date</th>
<th>Order Details</th>
<th>Order Status</th>
<th>ACTION</th>
</tr>
</thead>
<tbody>
<?php
$sql=$conn->prepare("SELECT * FROM customer c,customer_order_details cod WHERE c.cu_id=cod.cu_id AND c.cu_id=? ORDER BY cod.cod_id DESC");
$sql->bind_param("i",$cu_id);    
$sql->execute();
$result=$sql->get_result();
$sno=1;
while($row=$result->fetch_assoc()){
$json_array = json_decode($row["order_json"],true);
//print("<pre>".print_r($json_array,true)."</pre>");
?>
<tr style="text-align:left">
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
<td>        
<?php if($row['order_status'] == 'ORDER CONFIRMED'){?>    
<button type="submit" class="btn btn-success" style="width:100%;" disabled>ORDER CONFIRMED</button> 
<?php } ?> 
</td>                   
<td>
<form action="product_order_summary_details.php" method="post">
<input type="hidden" name="cu_id" value="<?php echo $row['cu_id']?>">
<input type="hidden" name="order_date" value="<?php echo $row['order_date']?>">
<input type="hidden" name="order_no" value="<?php echo $row['order_no']?>">
<button type="submit" class="btn btn-sm btn-primary" style="width:100%;">ORDER DETAILS</button> 
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
<?php require("3_footer.php"); ?>
</div> 
<?php require("4_footer_scripts.php"); ?>
<?php include_once("8_json_scripts.php");?>  
</body>
</html>