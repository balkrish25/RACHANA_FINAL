<?php
require("../6_db_connection.php");

$ps_id=$_POST["ps_id"]; 
$pc_id=$_POST["pc_id"];
$pu_id=$_POST["pu_id"];
$ps_size=$_POST["ps_size"];
$ps_date=$_POST["ps_date"];

$sql1=$conn->prepare("SELECT * FROM product_size WHERE pc_id=? AND pu_id=? AND ps_size=? AND ps_id!=?");
$sql1->bind_param("iidi",$pc_id,$pu_id,$ps_size,$ps_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
echo"<script type='text/javascript'>
alert('PRODUCT VALUE ALREADY EXISTS!!!!');
history.back();
</script>";    
}   
else
{
$sql=$conn->prepare("UPDATE product_size SET pc_id=?,pu_id=?,ps_size=?,ps_date=? WHERE ps_id=?");
$sql->bind_param("iidsi",$pc_id,$pu_id,$ps_size,$ps_date,$ps_id);

if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY UPDATED');
window.location='product_size_view.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY  NOT UPDATED');
window.location='product_size_form.php';</script>";
}
}    
?>

