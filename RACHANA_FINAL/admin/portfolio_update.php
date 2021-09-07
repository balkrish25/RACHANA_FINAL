<?php
require("../6_db_connection.php");
require("6_function.php");

$pf_id=$_POST["pf_id"];
$pf_name=$_POST["pf_name"];
$pf_description=$_POST["pf_description"];
$pf_date=$_POST["pf_date"];


$sql1=$conn->prepare("SELECT * FROM portfolio WHERE  pf_name=? AND pf_id!=?");
$sql1->bind_param("si",$pf_name,$pf_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
echo"<script type='text/javascript'>
alert('PORTFOLIO ALREADY EXISTS!!!!');
history.back();
</script>";    
}

else
{

$folder="photos/";
$pf_image=$_FILES["pf_image"]["name"];
$tmp_pf_image=$_FILES["pf_image"]["tmp_name"];
if (empty( $product_details_image1))
{
$pf_image=$_POST["old_pf_image"];
}
else
{
$pf_image=upload_image($pf_image,$tmp_pf_image,$folder);
}


$sql=$conn->prepare("UPDATE portfolio SET pf_name=?, pf_description=?, pf_image=?,pf_date=? WHERE pf_id=?");

$sql->bind_param("ssssi",$pf_name,$pf_description,$pf_image,$pf_date,$pf_id);


if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY UPDATED');
window.location='portfolio_view.php'
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY UPDATED');
window.location='portfolio_form.php'
</script>";
}
}
?>