<?php
require("../6_db_connection.php");
require("6_function.php");
   
$pc_id=$_POST["pc_id"];
$ps_id=$_POST["ps_id"];
$pt_id=$_POST["pt_id"];
$pd_name=$_POST["pd_name"];
$pd_description=$_POST["pd_description"];
$pd_date=$_POST["pd_date"];


$sql1=$conn->prepare("SELECT * FROM product_details WHERE pc_id=? AND ps_id=? AND pt_id=? AND pd_name=?");
$sql1->bind_param("iiis",$pc_id,$ps_id,$pt_id,$pd_name);
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
     
$folder="photos/";
$pd_image1=$_FILES["pd_image1"]["name"];
$tmp_pd_image1=$_FILES["pd_image1"]["tmp_name"];
$pd_image1=upload_image($pd_image1,$tmp_pd_image1,$folder);
        
$sql=$conn->prepare("INSERT INTO product_details(pc_id,ps_id,pt_id,pd_name,pd_image1,pd_description,pd_date)VALUES(?,?,?,?,?,?,?)");
$sql->bind_param("iiissss",$pc_id,$ps_id,$pt_id,$pd_name,$pd_image1,$pd_description,$pd_date);
if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY INSERTED');
window.location='product_details_view.php'
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY NOT INSERTED');
window.location='product_details_form.php'
</script>";
}
}
?>