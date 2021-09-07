<?php
require("../6_db_connection.php");
 
$pc_name=$_POST["pc_name"];
$pc_date=$_POST["pc_date"];

$sql1=$conn->prepare("SELECT * FROM product_category WHERE pc_name=?");
$sql1->bind_param("s",$pc_name);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
echo"<script type='text/javascript'>
alert('PRODUCT CATEGORY ALREADY EXISTS!!!!');
history.back();
</script>";    
}   
else
{

$sql=$conn->prepare("INSERT INTO product_category(pc_name,pc_date)VALUES(?,?)");


$sql->bind_param("ss",$pc_name,$pc_date);

if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY INSERTED');
window.location='product_category_view.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY  NOT INSERTED');
window.location='product_category_form.php';</script>";
}
}    
?>