<?php
require("../6_db_connection.php");
require("6_function.php");
$pd_id=$_POST["pd_id"];
$pc_id=$_POST["pc_id"];
$pt_id=$_POST["pt_id"];
$ps_id=$_POST["ps_id"];
$pd_name=$_POST["pd_name"];
$pd_description=$_POST["pd_description"];
$pd_date=$_POST["pd_date"];
$folder="photos/";

$sql1=$conn->prepare("SELECT * FROM product_details WHERE pc_id=? AND pt_id=? AND ps_id=? AND pd_name=? AND pd_id!=?");
$sql1->bind_param("iiisi",$pc_id,$pt_id,$ps_id,$pd_name,$pd_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
echo"<script type='text/javascript'>
alert('PRODUCT ALREADY EXISTS!!!!');
history.back();
</script>";    
}

else
{
     
$pd_image1=$_FILES["pd_image1"]["name"];
$tmp_pd_image1=$_FILES["pd_image1"]["tmp_name"];
if (empty( $pd_image1))
{
  $pd_image1=$_POST["old_pd_image1"];
}
else
{
$pd_image1=upload_image($pd_image1,$tmp_pd_image1,$folder);
}

$sql=$conn->prepare("UPDATE product_details SET pc_id=?,ps_id=?,pt_id=?,pd_name=?,pd_image1=?,pd_description=?,pd_date=? WHERE pd_id=?");
$sql->bind_param("iiissssi",$pc_id,$ps_id,$pt_id,$pd_name,$pd_image1,$pd_description,$pd_date,$pd_id);
if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY UPDATED');
window.location='product_details_view.php'
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY UPDATED');
window.location='product_details_form.php'
</script>";
}
}
?>