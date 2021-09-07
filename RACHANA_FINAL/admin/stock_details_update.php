<?php
require("../6_db_connection.php");

$sd_id=$_POST["sd_id"];
$pd_id=$_POST["pd_id"];
$sd_unitprice=$_POST["sd_unitprice"];
$sd_discount=$_POST["sd_discount"];
$sd_min_qty_order=$_POST["sd_min_qty_order"];
$sd_max_qty_order=$_POST["sd_max_qty_order"];
$sd_status=$_POST["sd_status"];
$sd_date=$_POST["sd_date"];

if($sd_min_qty_order>$sd_max_qty_order){
 echo"<script type='text/javascript'>
 alert('Minimum Amount Cannot be Greater than Maximum Amount');
 window.history.back();
 </script>";
}
else{
$sql1=$conn->prepare("SELECT * FROM stock_details WHERE pd_id=? AND sd_id!=?");
$sql1->bind_param("ii",$pd_id,$sd_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0){
 echo"<script type='text/javascript'>
 alert('Stock Exists!!');
 window.history.back();
 </script>"; 
}
else{
$sql=$conn->prepare("UPDATE stock_details SET pd_id=?,sd_unitprice=?,sd_discount=?,sd_min_qty_order=?,sd_max_qty_order=?,sd_status=?,sd_date=? WHERE sd_id=?");
$sql->bind_param("iiiiissi",$pd_id,$sd_unitprice,$sd_discount,$sd_min_qty_order,$sd_max_qty_order,$sd_status,$sd_date,$sd_id);
if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY UPDATED RECORD');
window.location='stock_details_view.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('RECORD NOT UPDATED');
window.location='stock_details_view.php';
</script>";
}
}
} 
?>