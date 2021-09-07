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
//       print("<pre>".print_r($json_array,true)."</pre>");                                            
?> 
<table class="table table-bordered track_tbl">
<thead>
<tr><td colspan="7" align="center"><b>Product Order Details</b></td></tr>

<tr>
<td><b>Sl No.</b></td>
<td><b>Image</b></td>
<td><b>Product Name</b></td>
<td><b>Product Description</b></td>
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
<img src="admin/photos/<?php echo $row["image"]?>" width="80px" height="80px">
</td>
<td>
<?php echo $row['name'];?><br><?php echo $row['pd_size'];?><br><?php echo $row['pd_quality'];?>
</td>
<td>
<?php echo $row['order_content'];?>
</td>
<td align="right">
<?php echo $row['qty'];?>
</td>
<td align="right">
<?php
if($row['discount_percent']!=0)
{
?>
<strike>&#8377;<?php echo currencyFormat($row['price']);?></strike><br>
<span>&#8377;<?php echo currencyFormat($row['price']-$row['discount_percent']);?></span>
<?php    
}
else{
?>
<span>&#8377;<?php echo currencyFormat($row['price']);?></span>
<?php
}
?>                
</td>                                             
<td align="right">
&#8377;<?php echo currencyFormat($row['totalamount']);?>
</td>


</tr>

<?php                
}
?>
<tr><td colspan="6" align="right">Total</td>
<td align="right"><b>&#8377;<?php echo currencyFormat($json_array["amount_details"]["total"]);?></b></td></tr>
<tr><td colspan="6" align="right">Discount</td>
<td align="right"><b>&#8377;<?php echo currencyFormat($json_array["amount_details"]["discount_charges"]);?></b></td></tr>
 
<tr><td colspan="6" align="right">Sub Total</td>
<td align="right"><b>&#8377;<?php echo currencyFormat($json_array["amount_details"]["sub_total"]);?></b></td></tr>
<tr><td colspan="6" align="right">TAX(%)</td>
<td align="right">&#8377;<?php echo currencyFormat($json_array["amount_details"]["tax"]);?></td></tr>
<tr><td colspan="6" align="right">Grand Total</td>
<td align="right"><b>&#8377;<?php echo currencyFormat($json_array["amount_details"]["grand_total"]);?></b></td></tr>
</tbody>
</table>
 <br><br><br><br><br><br>   
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