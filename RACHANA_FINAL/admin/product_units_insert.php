<?php
require("../6_db_connection.php");
 
$pu_type=$_POST["pu_type"];
$pu_date=$_POST["pu_date"];

$sql1=$conn->prepare("SELECT * FROM product_units WHERE pu_type=?");
$sql1->bind_param("s",$pu_type);
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
$sql=$conn->prepare("INSERT INTO product_units(pu_type,pu_date) VALUES (?,?)");


$sql->bind_param("ss",$pu_type,$pu_date);

if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY INSERTED');
window.location='product_units_view.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY  NOT INSERTED');
window.location='product_units_form.php';</script>";
}
}    
?>