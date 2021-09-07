<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php include_once("1_metatags.php");?>
<?php include("9_extra_charges.php");?>
<?php include("5_customer_session_data.php");?>    
<style>
 .custom_disable{
  background-color:gainsboro!important;
 } 
 .form-control{
  padding: 10px 20px;
  border: 1px solid #131313;
  border-radius: 0px;
  height: auto;
  outline: 0!important;
 } 
.form-control:focus {
    outline:0!important;
    box-shadow: none;
    border: 1px solid #131313;
} 
</style> 
</head>
<body>
<div class="page-wrapper-blue">
<?php include_once("2_header.php");?>    
<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb-content">
<ul>
<li class="has-child"><a href="index.php">Home</a></li>
<li class="has-child"><a>Shopping Cart</a></li>
</ul>
</div> 
</div>
</div>
</div>
</div>

<div class="page-section pb-40">
<div class="container">
<div class="row">
<div class="col-12">

<!-- Checkout Form s-->
<!--action="product_order_confirmation.php" -->
<form class="checkout-form" method="post" onsubmit="return ValidateForm()" action="product_order_confirmation.php">
<!-- //FOR JSON DATA -->
<input type="hidden" name="itemsJson" id="itemsJson">
<input type="hidden" name="buyNow_itemsJson" id="buyNow_itemsJson">
<input type="hidden" name="cu_id" id="cu_id" value="<?php echo $cu_id;?>">
<input type="hidden" name="order_no" id="order_no" value="<?php echo $order_no;?>">
<input type="hidden" name="order_date" id="order_date" value="<?php echo date('Y-m-d');?>"> 
<div class="row row-40">
<div class="col-lg-7 mb-20">
<!-- Billing Address -->
<div id="billing-form" class="mb-40">
<h4 class="checkout-title">Billing Address</h4>
<div class="row">
<div class="col-12 mb-20">
<label>Fullname</label>
<input type="text" placeholder="" value="<?php echo $fullname;?>" readonly class="custom_disable">
</div>

<input type="hidden" name="customer_type" id="customer_type" value="<?php echo $cu_type?>">
<?php
if($cu_type=="GOVERNMENT" || $cu_type=="EDUCATION")
{
?>
<div class="col-12 mb-20">
<label>Payment Mode</label>
<input type="text" name="payment_mode" id="payment_mode" class="form-control custom_disable" value="BY CHEQUE" readonly>
<span id="payment_mode_error"></span> 
</div>       
<?php
}
if($cu_type=="CUSTOMER")
{ 
?>
<div class="col-12 mb-20">
<label>Select Payment Mode</label>
<select class="form-control" id="payment_mode" name="payment_mode">
<option value="">--SELECT PAYMENT MODE--</option>
<option value="COD">COD</option>
<option value="PHONEPE">PHONEPE</option>  
</select>
<span id="payment_mode_error"></span>
</div>
<?php
}
?>
<div class="col-12 mb-20">
<label>Address</label>
<input type="text" placeholder="Address" name="ci_shipping_address" id="ci_shipping_address">
<span id="ci_shipping_address_error"></span> 
</div>


<div class="col-md-6 col-12 mb-20">
<label>Landmark</label>
<input type="text" placeholder="Landmark" name="ci_landmark" id="ci_landmark">
<span id="ci_landmark_error"></span>
</div>
 
<div class="col-md-6 col-12 mb-20">
<label>Contact Number</label>
<input type="text" placeholder="Contact" name="ci_contact_no" id="ci_contact_no">
<span id="ci_contact_no_error"></span>
</div> 

<div class="col-12 mb-20" id="showTRANID">
<label>Transaction Number</label>
<input type="text" name="transaction_no" id="transaction_no" aria-describedby="last" placeholder="Transaction Number">
<span id="transaction_no_error"></span>
</div>
 
<div class="col-12 mb-20">
<button class="btn btn-success btn-block" type="submit" name="submit">PLACE ORDER</button> 
</div>

 
</div>
</div>
</div>

<div class="col-lg-5">
<div class="row">
<!-- Cart Total -->
<div class="col-12 mb-60">
<center><h4 class="checkout-title">PAYMENT MODE</h4></center>
<div class="">
<div class="payment-method myDiv" id="showCheque">
<div class="payment_list">
<p style="font-size:20px;font-weight:bold;text-align:center;border:1px solid black;padding:20px;border-style: dashed;border-width: 2px;border-color: gray;background-color:#ffffe6">BY CHEQUE</p>
 
</div>
</div>
 
<div class="payment-method myDiv" id="showCOD">
<div class="payment_list">
<img src="assets/cod.jpg" width="100%">  
</div>
</div>
<div class="payment-method myDiv" id="showPHONEPE">
<div class="payment_list">
<img src="assets/phonepe.jpg">   
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</form>

</div>
</div>
</div>
</div>

<!--====================  End of page content  ====================-->

<!--====================  End of page content  ====================-->
<!--====================  End of page content  ====================-->
<?php include_once("3_footer.php");?>
</div> 
<?php include_once("4_footer_scripts.php");?>
<script>
$(document).ready(function()
{
var customer_type=document.getElementById("customer_type").value;
if(customer_type=="GOVERNMENT" || customer_type=="EDUCATION")
{
$("div.myDiv").hide();
$("#showTRANID").hide();
$("#showCOD").hide();    
$("#showCheque").show();    
}
if(customer_type=="CUSTOMER"){
$("div.myDiv").hide();
$("#showTRANID").hide();
$("#showCOD").show();   
}
 
$('#payment_mode').on('change', function(){
var value = $(this).val();                     

if(value=="PHONEPE"){

$("#showPHONEPE").show();   
$("#showTRANID").show();
$("#showCOD").hide();   
}
if(value=="COD"){

$("#showPHONEPE").hide();   
$("#showCOD").show();   
$("#showTRANID").hide();
}

});
});

function ValidateForm()
{
var payment_mode=document.getElementById("payment_mode").value;

var payment_mode = '';
var ci_shipping_address = '';
var ci_landmark = '';                
var transaction_no='';
var ci_contact_no='';
var payment=document.getElementById('payment_mode').value;
 
if(payment=="BY CHEQUE"){
transaction_no ="1";    
}
if(payment=="COD"){
transaction_no ="1";    
}
if(payment=="PHONEPE"){
transaction_no = phonepe('transaction_no', 'transaction_no_error', 'Transaction No');    
}
payment_mode = alphabets('payment_mode', 'payment_mode_error', 'Payment Mode');  
ci_shipping_address = fieldrequired('ci_shipping_address', 'ci_shipping_address_error', 'Address');
ci_landmark = fieldrequired('ci_landmark', 'ci_landmark_error', 'Landmark');                
ci_contact_no=phoneno('ci_contact_no', 'ci_contact_no_error', 'Contact');                

if(payment_mode == 1 && ci_shipping_address == 1 && ci_landmark == 1 && transaction_no == 1 && ci_contact_no == 1) 
{
var cu_id=document.getElementById("cu_id").value;
var shipping_address=document.getElementById("ci_shipping_address").value;
var landmark=document.getElementById("ci_landmark").value;
var contact_no=document.getElementById("ci_contact_no").value;
var payment_mode=document.getElementById("payment_mode").value;
var transaction_no=0;
if(payment_mode=="COD")
{
    transaction_no=0;
}
else if(payment_mode=="BY CHEQUE")
{
  transaction_no=0;
} 
else
{
    transaction_no=document.getElementById("transaction_no").value;
}


if (localStorage.getItem('cart_ra') == null) {
    var cart_ra = {};
} 
else {
    cart_ra = JSON.parse(localStorage.getItem('cart_ra'));

    cart_ra["shipping_details"] = {"shipping_address":shipping_address,"landmark":landmark,"contact_no":contact_no,"payment_mode":payment_mode,"transaction_no":transaction_no};
    cart_ra["customer_id"]={"customer_id":cu_id,};
    localStorage.setItem('cart_ra', JSON.stringify(cart_ra));
    $('#itemsJson').val(JSON.stringify(cart_ra));
    return true;
    }
        
if (localStorage.getItem('buynow_ra') == null) {
    var buynow_ra = {};
} 
else {
    buynow_ra = JSON.parse(localStorage.getItem('buynow_ra'));

    buynow_ra["shipping_details"] = {"shipping_address":shipping_address,"landmark":landmark,"contact_no":contact_no,"payment_mode":payment_mode,"transaction_no":transaction_no};
    buynow_ra["customer_id"]={"customer_id":cu_id,};
    localStorage.setItem('buynow_ra', JSON.stringify(buynow_ra));
    $('#buyNow_itemsJson').val(JSON.stringify(buynow_ra));
    return true;
    }    
}
else
{
return false;
}
}
</script> 
</body>
</html>