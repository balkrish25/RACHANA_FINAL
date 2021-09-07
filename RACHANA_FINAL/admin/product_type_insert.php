<?php
require("../6_db_connection.php");
 
$pt_name=$_POST["pt_name"];
$pt_quality=$_POST["pt_quality"];
$pt_date=$_POST["pt_date"];

$sql1=$conn->prepare("SELECT * FROM product_type WHERE pt_name=?");
$sql1->bind_param("s",$pt_name);
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
$sql=$conn->prepare("INSERT INTO product_type(pt_name,pt_quality,pt_date) VALUES (?,?,?)");


$sql->bind_param("sss",$pt_name,$pt_quality,$pt_date);

if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY INSERTED');
window.location='product_type_view.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY  NOT INSERTED');
window.location='product_type_form.php';</script>";
}
}    
?>

