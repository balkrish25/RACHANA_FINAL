<?php
require("../6_db_connection.php");
$pt_id=$_POST["pt_id"]; 
$pt_name=$_POST["pt_name"];
$pt_quality=$_POST["pt_quality"];
$pt_date=$_POST["pt_date"];

$sql1=$conn->prepare("SELECT * FROM product_type WHERE pt_name=? AND pt_id!=?");
$sql1->bind_param("si",$pt_name,$pt_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
echo"<script type='text/javascript'>
alert('PRODUCT TYPE ALREADY EXISTS!!!!');
history.back();
</script>";    
}   
else
{

$sql=$conn->prepare("UPDATE product_type SET pt_name=?, pt_quality=?, pt_date=? WHERE pt_id=?");


$sql->bind_param("sssi",$pt_name,$pt_quality,$pt_date,$pt_id);

if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY UPDATED');
window.location='product_type_view.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY  NOT UPDATED');
window.location='product_type_form.php';</script>";
}
}    
?>