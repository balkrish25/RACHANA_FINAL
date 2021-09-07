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
<h4 class="card-title" style="float:left;">CUSTOMER ORDER DETAILS</h4>
<button type="button" class="btn" style="float:right; margin-right:5%; background-color:#1A5F60; color:white;" onclick="window.location.href='customer_order_placed.php'">BACK</button>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
</ul>
</div>
</div>
<?php
$customer_id=$_POST['cu_id'];
$order_date=$_POST['order_date'];
$order_no=$_POST['order_no'];
$sl=1;             
$sql=$conn->prepare("SELECT * FROM customer_order_details cod,customer c WHERE c.cu_id=cod.cu_id AND cod.cu_id=? AND cod.order_no=?");
$sql->bind_param("ii",$customer_id,$order_no);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$json_array = json_decode($row["order_json"],true);     
//print("<pre>".print_r($json_array,true)."</pre>");                                            
?> 
<div class="card-content collapse show" style="overflow-x:auto;">
<div class="card-body card-dashboard">
<table class="table table-striped table-bordered dom-jQuery-events">
<tr>
    <td style="font-weight:bold;font-size:17px">
        <span style="color:black;text-decoration:underline">Customer Information</span><br>
        <?php echo $row["cu_name"];?><br>
        <?php echo $row["cu_contact"];?><br>
        <?php echo $row["cu_email"];?><br>
    </td>
    <td style="font-weight:bold;font-size:17px" colspan="6">
        <span style="color:black;text-decoration:underline">Shipping Information</span><br>
        <?php echo $json_array["shipping_details"]["shipping_address"];?><br>
        <?php echo $json_array["shipping_details"]["landmark"];?><br>
        <?php echo $json_array["shipping_details"]["contact_no"];?><br>
        <?php echo $json_array["shipping_details"]["payment_mode"];?><br>
        <?php echo $json_array["shipping_details"]["transaction_no"];?><br>
    </td>
</tr>

</table>
<table class="table table-striped table-bordered dom-jQuery-events">
<thead>
<tr><td colspan="6" align="center"><b>Product Order Details</b></td></tr>
<tr>
<td><b>Sl No.</b></td>
<td><b>Image</b></td>
<td><b>Product Name</b></td>
<td align="right"><b>Quantity</b></td>
<td align="right"><b>Unit Price</b></td>                                  
<td align="right"><b>Total</b></td>
</tr>
</thead>
<tbody>

<?php
foreach($json_array["product_details"] as $row) 
{           
?>
<tr>                
<td>
<?php echo $sl++;?>
</td>
<td>
<img src="photos/<?php echo $row["image"]?>" width="80px" height="80px">
</td>
<td>
<?php echo $row['name'];?>
</td>
<td align="right">
<?php echo $row['qty'];?>
</td>
<td align="right">
<?php
if($row['discount_percent']!=0)
{
?>
<strike>&#x20B9;<?php echo currencyFormat($row['price']);?></strike><br>
<span>&#x20B9;<?php echo currencyFormat($row['price']-$row['discount_percent']);?></span>
<?php    
}
else{
?>
<span>&#x20B9;<?php echo currencyFormat($row['price']);?></span>
<?php
}
?>                
</td>                                             
<td align="right">
&#x20B9;<?php echo currencyFormat($row['totalamount']);?>
</td>


</tr>

<?php                
}
?>
<tr><td colspan="5" align="right">Sub Total</td>
<td align="right"><b>&#x20B9;<?php echo currencyFormat($json_array["amount_details"]["total"]);?></b></td></tr>
<tr><td colspan="5" align="right">Tax(%)</td>
<td align="right">&#x20B9;<?php echo currencyFormat($json_array["amount_details"]["tax"]);?></td></tr>
<tr><td colspan="5" align="right">Discount Charge</td>
<td align="right"><b>&#x20B9;<?php echo currencyFormat($json_array["amount_details"]["discount_charges"]);?></b></td></tr>
<tr><td colspan="5" align="right">Grand Total</td>
<td align="right"><b>&#x20B9;<?php echo currencyFormat($json_array["amount_details"]["grand_total"]);?></b></td></tr>
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