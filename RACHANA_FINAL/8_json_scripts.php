<?php require("9_extra_charges.php");?>
<script type="text/javascript">
// Find out the cart_ra items from localStorage
localStorage.removeItem("buynow_ra");    
if (localStorage.getItem('cart_ra') == null) {
    var cart_ra = {};
    var items = { product_details: {} };// initially empty
    cart_ra=items;
}
else{
    cart_ra = JSON.parse(localStorage.getItem('cart_ra'));
    updateCart(cart_ra);
}
    $('.cart').on('click',function(){
    var pd_id = this.id.toString();    
    var order_description=fieldrequired("order_description"+pd_id,"order_description_error"+pd_id,"Content"); 
    if(order_description==1)
    {
      
      if (cart_ra["product_details"][pd_id] != undefined)
      {
          //qty = cart_ra[pd_id][0] + 1;
          alert("Record Exists in Cart");
      } else 
      {
          var order_description = document.getElementById("order_description"+pd_id).value;                     
          var qty = document.getElementById("qty"+pd_id).value;                
          var name=document.getElementById("pd_name"+pd_id).value;        
          var pd_quality=document.getElementById("pd_quality"+pd_id).value;        
          var pd_size=document.getElementById("pd_size"+pd_id).value;        
          var price=document.getElementById("pd_price"+pd_id).value;
          var discount=document.getElementById("pd_discount"+pd_id).value;                
          var min_qty_allowed=document.getElementById("min_qty_allowed"+pd_id).value;     
          var max_qty_allowed=document.getElementById("max_qty_allowed"+pd_id).value;     
          var total_price=price-discount;
          var image=document.getElementById("pd_image"+pd_id).value;                
          var total_amount=qty*total_price;                
          cart_ra["product_details"][pd_id]={"id":parseInt(pd_id),"name":name,"pd_quality":pd_quality,"pd_size":pd_size,"qty":qty,"image":image,"price":parseInt(price),"discount_percent":parseInt(discount),"totalamount":parseInt(total_amount),"max_qty_allowed":parseInt(max_qty_allowed),"min_qty_allowed":parseInt(min_qty_allowed),"order_content":order_description};
          alert("Record Added to Cart");
      }
          updateCart(cart_ra);
    }
});


function updateCart(cart_ra) {
    var keys = Object.keys(cart_ra["product_details"]);  
    localStorage.setItem('cart_ra', JSON.stringify(cart_ra));
    document.getElementById('cart_ra_icon').innerHTML = keys.length; // For Cart Count    
}   
</script>

<script type="text/javascript">
if (localStorage.getItem('buynow_ra') == null) {
    var buynow_ra = {};    
    var items = { product_details: {} };// initially empty
    buynow_ra=items;

} 
else{
    buynow_ra = JSON.parse(localStorage.getItem('buynow_ra'));       
}
    var totalPrice = 0;
    $('.buyNow').on('click',function(){
    var pd_id = this.id.toString();  
    var order_description=fieldrequired("order_description"+pd_id,"order_description_error"+pd_id,"Content"); 
    if(order_description==1)
    {
    if (buynow_ra["product_details"][pd_id] != undefined)
    {
    alert("Record Exists in Cart");
    }        
    else
    {      

          var order_description = document.getElementById("order_description"+pd_id).value;                     
          var qty = document.getElementById("qty"+pd_id).value;                
          var name=document.getElementById("pd_name"+pd_id).value;        
          var pd_quality=document.getElementById("pd_quality"+pd_id).value;        
          var pd_size=document.getElementById("pd_size"+pd_id).value;        
          var price=document.getElementById("pd_price"+pd_id).value;
          var discount=document.getElementById("pd_discount"+pd_id).value;                
          var min_qty_allowed=document.getElementById("min_qty_allowed"+pd_id).value;     
          var max_qty_allowed=document.getElementById("max_qty_allowed"+pd_id).value;     
          var total_price=price-discount;
          var image=document.getElementById("pd_image"+pd_id).value;                
          var total_amount=qty*total_price;                
          buynow_ra["product_details"][pd_id]={"id":parseInt(pd_id),"name":name,"pd_quality":pd_quality,"pd_size":pd_size,"qty":qty,"image":image,"price":parseInt(price),"discount_percent":parseInt(discount),"totalamount":parseInt(total_amount),"max_qty_allowed":parseInt(max_qty_allowed),"min_qty_allowed":parseInt(min_qty_allowed),"order_content":order_description};
          localStorage.setItem('buynow_ra', JSON.stringify(buynow_ra));        
     
        //var qty = $('#qty option:selected').val();        
//        var qty = document.getElementById("qty"+pd_id).value;                
//        var name=document.getElementById("pd_name"+pd_id).value;        
//        var price=document.getElementById("pd_price"+pd_id).value;
//        var discount=document.getElementById("pd_discount"+pd_id).value; 
//        var max_qty_allowed=document.getElementById("max_qty_allowed"+pd_id).value;  
//        var total_price=price-discount;
//        var image=document.getElementById("pd_image"+pd_id).value;                
//        var total_amount=qty*total_price;                
//
//        buynow_ra["product_details"][pd_id]={"id":parseInt(pd_id),"name":name,"qty":qty,"image":image,"price":parseInt(price),"discount_percent":parseInt(discount),"totalamount":parseInt(total_amount),"max_qty_allowed":max_qty_allowed};
        

//ADD AFTER        
        var product_keys=buynow_ra["product_details"];        
        for (var items in product_keys) {           
        var pd_id = product_keys[items]["id"];
        var pd_name =product_keys[items]["name"];
        var pd_qty = product_keys[items]["qty"];
        var pd_image =product_keys[items]["image"];
        var pd_price =product_keys[items]["price"];
        var pd_discount =product_keys[items]["discount_percent"];
        var pd_total_amount =product_keys[items]["totalamount"];
        var total_price=pd_price-pd_discount;

        var keys = Object.keys(buynow_ra["product_details"]);          
        totalPrice = totalPrice + pd_qty* total_price;
        }
//FOR AMOUNT DETAILS
var discount_charges=0;
var tax=document.getElementById('ec_tax').value;
var ec_discount=document.getElementById('ec_discount').value;
var min_amount=document.getElementById('ec_min_amount').value;
if(totalPrice>parseInt(min_amount))
{
    discount_charges=ec_discount;
    var sub_total=totalPrice-discount_charges;     
    var tax_percent=Math.round(sub_total*(tax/100));
    var total_amount=sub_total+tax_percent;    
}
else
{
    discount_charges=0;
    var sub_total=totalPrice-discount_charges; 
    var tax_percent=Math.round(sub_total*(tax/100));
    var total_amount=sub_total+tax_percent;         
}
buynow_ra["amount_details"] = {"total":totalPrice,"sub_total":sub_total,"tax":tax_percent,"discount_charges":discount_charges,"grand_total":total_amount};
localStorage.setItem('buynow_ra', JSON.stringify(buynow_ra));
window.location.href = "products_shopping_cart_buynow.php"; 
} 
}
});
</script>