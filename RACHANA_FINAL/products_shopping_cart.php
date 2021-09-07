<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<style>
 .cart-table .table tbody tr td{
  padding:0px!important;
 }
 .align_right{
  float: right;
  padding:6px;
 }
</style> 
<?php include_once("1_metatags.php");?>
<?php include("9_extra_charges.php");?>
<?php include("5_customer_session_data.php");?>    
</head>
<body>
<div class="page-wrapper-blue">
<?php include_once("2_header.php");?>    
<div class="breadcrumb-area pt-10 pb-10 border-bottom">
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
<h1 id="items"></h1><!--TO SHOW EMPTY CART MESSAGE-->
<div class="container" id="hideDiv"><!--TO HIDE DIV FOR EMPTY CART-->         
<center><h3><span style="color:#232f3e">SHOPPING CART</span></h3></center>
<div class="cart-table table-responsive mb-40">
<table class="table table-bordered table-hover">
<thead>
<tr>
 <th>#</th>
 <th>DELETE</th>
 <th>IMAGE</th>
 <th>DESCRIPTION</th>
 <th>NAME</th>
 <th>UNIT PRICE</th>
 <th>QTY</th>
 <th>TOTAL PRICE</th>
</tr>
</thead>
<tbody id="table_id">
<!-- DYNAMICALLY LOADS FROM JAVASCRIPT -->                
</tbody>
</table>
 <?php
if(isset($_SESSION['customer']))
{
?>
<a href="7_checkout_validate.php" class="btn btn-primary btn-block checkout_items">PROCEED TO CHECKOUT</a>
<?php 
} 
else
{
?>
<div align="center">
<form method="post" action="customer_login_register.php">
<?php 
include_once('5_current_page_url.php');
?>
<input type="hidden" name="product_details_url" id="product_details_url" value="<?php echo $current_link;?>">
<input type="submit" class="btn btn-sm btn-success btn-rounded btn-block" value="Login/Register to Order Products">
</form>
</div>  
<?php } ?> 
 
</div>
</div>
<!--=======  End of cart table  =======-->
</div>
</div>
</div>
</div>
<br><br><br><br>
<!--====================  End of page content  ====================-->
<!--====================  End of page content  ====================-->
<?php include_once("3_footer.php");?>
</div> 
<?php include_once("4_footer_scripts.php");?>
<script>
if (localStorage.getItem('cart_ra') == null){
    var cart_ra = {};
    var mystr = `<p>Your cart is empty, please add some items to your cart before checking out!</p>`
    $('#items').append(mystr);    
    $('#hideDiv').hide();
    localStorage.clear();
} 
else {    
cart_ra = JSON.parse(localStorage.getItem('cart_ra'));        
var product_keys=cart_ra["product_details"];            
if ($.isEmptyObject(product_keys))
{    
    var mystr = `<p>Your cart is empty, please add some items to your cart before checking out!</p>`
    $('#items').append(mystr);    
    $('#hideDiv').hide();
    localStorage.clear();
}    
var sum = 0;
var slno = 0;
var totalPrice = 0;
     for (var items in product_keys) {                   
        var pd_id = product_keys[items]["id"];
        var pd_name =product_keys[items]["name"];
        var pd_quality =product_keys[items]["pd_quality"];
        var pd_size =product_keys[items]["pd_size"];
        var order_content =product_keys[items]["order_content"];
        var pd_qty = product_keys[items]["qty"];
        var pd_image =product_keys[items]["image"];
        var pd_price =product_keys[items]["price"];
        var pd_discount =product_keys[items]["discount_percent"];
        var pd_total_amount =product_keys[items]["totalamount"];
        var min_qty_allowed =product_keys[items]["min_qty_allowed"];
        var max_qty_allowed =product_keys[items]["max_qty_allowed"];
        var total_price=pd_price-pd_discount;

        slno=slno+1;
        var keys = Object.keys(cart_ra["product_details"]);          
        totalPrice = totalPrice + pd_qty* total_price;
        mystr='<tr>';
        mystr+='<td>'+slno++;+'</td>';
        mystr+='<td><button class="btn btn-danger delete" id="'+pd_id+'"><i class="fa fa-trash"></i></button></td>';
        mystr+='<td><img src="admin/photos/'+pd_image+'" alt="" style="width:100px; height:100px"></td>'; 
        mystr+='<td>'+order_content+'</td>';
        mystr+='<td>'+pd_name+'<br>'+pd_size+'<br>'+pd_quality+'</td>';
        if(pd_discount!=0)
        {
          
        mystr+='<td align="center">';
        mystr+='<strike><span class="new-price">&#8377;'+pd_price+'</span></strike><br>';
        mystr+='<h4>&#8377;'+formatIntAmount(total_price)+'</h4>';
        mystr+='</td>';
        }
        else
        {
            mystr+='<td><h4>&#8377;'+formatIntAmount(total_price)+'</h4></td>';
        }
        
        mystr+='<td><select name="qty" id="'+pd_id+'" class="CheckQty form-control">';
        for(var i=min_qty_allowed;i<=max_qty_allowed;i++)
        {          
            mystr+='<option value="'+i+'"';
                if(pd_qty==i)
                {
                    mystr+='selected';
                }
                mystr+='>'+i+'</option>';
        }      
        mystr+='</select>';
        mystr+='</td>';
        mystr+='<td><h4>&#8377;'+formatIntAmount(pd_total_amount)+'</h4></td>';       
        mystr+='</tr>';  
        $('#table_id').append(mystr);
    }
        mystr_cart="";
        mystr_cart+='<tr>';
        mystr_cart+='<td colspan="7"><span style="float:right">Total Amount</span></td>'; 
        mystr_cart+='<td colspan="2"><h4><span class="align_right" id="total_price"></span></h4></td>';         
        mystr_cart+='</tr>';
        mystr_cart+='<tr>';
        mystr_cart+='<td colspan="7"><span style="float:right">Discount</span></td>'; 
        mystr_cart+='<td colspan="2"><h4><span class="align_right" id="discount"></span></h4></td>';  
        mystr_cart+='</tr>';
        mystr_cart+='<tr>';
        mystr_cart+='<td colspan="7"><span style="float:right">SubTotal</span></td>'; 
        mystr_cart+='<td colspan="2"><h4><span class="align_right" id="sub_total"></span></h4></td>';  
        mystr_cart+='</tr>';
        mystr_cart+='<tr>';
        mystr_cart+='<td colspan="7"><span style="float:right">Tax(%)</span></td>'; 
        mystr_cart+='<td colspan="2"><h4><span class="align_right" id="tax_total"></span></h4></td>';  
        mystr_cart+='</tr>'; 
        mystr_cart+='<tr>';
        mystr_cart+='<td colspan="7"><span style="float:right">Grand Total</span></td>'; 
        mystr_cart+='<td colspan="2"><h4><span class="align_right" id="grand_total"></span></h4></td>';  
        mystr_cart+='</tr>';
    $('#table_id').append(mystr_cart);
    
    $('.CheckQty').on('change', function(){
     var selectionId=$(this).attr('id');  
     var selectionValue=$(this).val();
     var product_keys=cart_ra["product_details"];        
     for (var items in product_keys) {  
            if(product_keys[items]["id"]==selectionId)
            {                   
                product_keys[items]["qty"]=parseInt(selectionValue);                    
                product_keys[items]["totalamount"]=parseInt(selectionValue)*(product_keys[items]["price"]-product_keys[items]["discount_percent"]);
                localStorage.setItem('cart_ra', JSON.stringify(cart_ra));
                location.reload();
            }
        }            
    });


    $('.delete').on('click', function(){

        var deleteId=$(this).attr('id');                   
        var keys = Object.keys(cart_ra["product_details"]);
        var product_keys=cart_ra["product_details"];        
       
        for(var i=0;i<keys.length;i++)
        {  
            if(keys[i]==deleteId)
            {
                var record=keys[i];
                delete cart_ra["product_details"][record];   
                localStorage.setItem('cart_ra', JSON.stringify(cart_ra));                
            }
        }
       alert("Product Removed From Cart Successfully");
       location.reload();        
       
    });

var discount_charges=0;
var tax=document.getElementById('ec_tax').value;
var ec_discount=document.getElementById('ec_discount').value;
var min_amount=document.getElementById('ec_min_amount').value;
if(totalPrice>parseInt(min_amount))
{
    discount_charges=ec_discount;
    var sub_total=totalPrice-discount_charges; 
    var tax_percent=sub_total*(tax/100);
    var total_amount=sub_total+tax_percent;    
    document.getElementById('total_price').innerHTML="&#8377;"+formatIntAmount(totalPrice);
    document.getElementById('sub_total').innerHTML="&#8377;"+formatIntAmount(sub_total);
    document.getElementById('tax_total').innerHTML="&#8377;"+formatIntAmount(tax_percent);
    document.getElementById('discount').innerHTML="&#8377;"+formatIntAmount(discount_charges);
    document.getElementById('grand_total').innerHTML="&#8377;"+formatIntAmount(total_amount);;
}
else
{
    discount_charges=0;
    var sub_total=totalPrice-discount_charges;     
    var tax_percent=Math.round(sub_total*(tax/100));
    var total_amount=sub_total+tax_percent;    
     
    document.getElementById('total_price').innerHTML="&#8377;"+formatIntAmount(totalPrice);
    document.getElementById('sub_total').innerHTML="&#8377;"+formatIntAmount(sub_total);
    document.getElementById('tax_total').innerHTML="&#8377;"+formatIntAmount(tax_percent);
    document.getElementById('discount').innerHTML="&#8377;"+formatIntAmount(discount_charges);
    document.getElementById('grand_total').innerHTML="&#8377;"+formatIntAmount(total_amount);;
}

document.getElementById('cart_ra_icon').innerHTML = keys.length;

$('.checkout_items').on("click",function(){

cart_ra["amount_details"] = {"total":totalPrice,"sub_total":sub_total,"tax":tax_percent,"discount_charges":discount_charges,"grand_total":total_amount};
localStorage.setItem('cart_ra', JSON.stringify(cart_ra));

});
}
</script>  
 
</body>
</html>