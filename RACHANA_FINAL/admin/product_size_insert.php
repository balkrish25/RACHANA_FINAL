<?php
require("../6_db_connection.php");
 
$pc_id=$_POST["pc_id"];
$pu_id=$_POST["pu_id"];
$ps_size=$_POST["ps_size"];
$ps_date=$_POST["ps_date"];

$sql1=$conn->prepare("SELECT * FROM product_size WHERE pc_id=? AND pu_id=? AND ps_size=?");
$sql1->bind_param("iid",$pc_id,$pu_id,$ps_size);
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
$sql=$conn->prepare("INSERT INTO product_size (pc_id,pu_id,ps_size,ps_date) VALUES (?,?,?,?)");
$sql->bind_param("iids",$pc_id,$pu_id,$ps_size,$ps_date);
if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY INSERTED');
window.location='product_size_view.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY  NOT INSERTED');
window.location='product_size_form.php';</script>";
}
}    
?>

