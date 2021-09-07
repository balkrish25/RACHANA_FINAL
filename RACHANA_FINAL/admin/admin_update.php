<?php
require("../6_db_connection.php");
$admin_id=$_POST["ad_id"];
$admin_name=$_POST["ad_name"];
$admin_contact=$_POST["ad_contact"];
$admin_email=$_POST["ad_email"];
$admin_address=$_POST["ad_address"];
$admin_date=$_POST["ad_date"];

$sql=$conn->prepare("UPDATE admin SET ad_name=?,ad_contact=?,ad_email=?,ad_address=?,ad_date=? WHERE ad_id=?");


$sql->bind_param("sisssi",$admin_name,$admin_contact,$admin_email,$admin_address,$admin_date,$admin_id);

if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY UPDATED');
window.location='admin_profile.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY UPDATED');
window.location='admin_profile.php';
</script>";
}
?>