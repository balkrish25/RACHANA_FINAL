<?php
require("../6_db_connection.php");

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
 $sql1=$conn->prepare("SELECT * FROM stock_details WHERE pd_id=?");
 $sql1->bind_param("i",$pd_id);
 $sql1->execute();
 $result1=$sql1->get_result();
 if($result1->num_rows>0){
  echo"<script type='text/javascript'>
  alert('Stock Exists!!');
  window.history.back();
  </script>"; 
 }
 else{
 $sql=$conn->prepare("INSERT INTO stock_details(pd_id,sd_unitprice,sd_discount,sd_min_qty_order,sd_max_qty_order,sd_status,sd_date)VALUES(?,?,?,?,?,?,?)");
 $sql->bind_param("iiiiiss",$pd_id,$sd_unitprice,$sd_discount,$sd_min_qty_order,$sd_max_qty_order,$sd_status,$sd_date);
 if($sql->execute())
 {
 echo"<script type='text/javascript'>
 alert('SUCCESSFULLY INSERTED');
 window.location='stock_details_view.php';
 </script>";
 }
 else
 {
 echo"<script type='text/javascript'>
 alert('SUCCESSFULLY INSERTED');
 window.location='stock_details_form.php';
 </script>";
 }
 }
} 
?>