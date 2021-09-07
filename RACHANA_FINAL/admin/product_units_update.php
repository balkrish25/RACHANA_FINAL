<?php
require("../6_db_connection.php");
$pu_id=$_POST["pu_id"]; 
$pu_type=$_POST["pu_type"];
$pu_date=$_POST["pu_date"];

$sql1=$conn->prepare("SELECT * FROM product_units WHERE pu_type=? AND pu_id!=?");
$sql1->bind_param("si",$pu_type,$pu_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
echo"<script type='text/javascript'>
alert('PRODUCT UNITS ALREADY EXISTS!!!!');
history.back();
</script>";    
}   
else
{

$sql=$conn->prepare("UPDATE product_units SET pu_type=?,pu_date=? WHERE pu_id=?");


$sql->bind_param("ssi",$pu_type,$pu_date,$pu_id);

if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY UPDATED');
window.location='product_units_view.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY  NOT UPDATED');
window.location='product_units_form.php';</script>";
}
}    
?>