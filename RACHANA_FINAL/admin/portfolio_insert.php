<?php
require("../6_db_connection.php");
require("6_function.php");


$pf_name=$_POST["pf_name"];
$pf_description=$_POST["pf_description"];
$pf_date=$_POST["pf_date"];

$sql1=$conn->prepare("SELECT * FROM portfolio WHERE  pf_name=?");
$sql1->bind_param("s",$pf_name);
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

$folder="photos/portfolio/";

$pf_image=$_FILES["pf_image"]["name"];
$tmp_pf_image=$_FILES["pf_image"]["tmp_name"];
$pf_image=upload_image($pf_image,$tmp_pf_image,$folder);


$sql=$conn->prepare("INSERT INTO portfolio(pf_name, pf_description, pf_image, pf_date)VALUES(?,?,?,?)");

$sql->bind_param("ssss",$pf_name,$pf_description,$pf_image,$pf_date);


if($sql->execute())
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY INSERTED');
window.location='portfolio_view.php'
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('SUCCESSFULLY INSERTED');
window.location='portfolio_form.php'
</script>";
}
}
?>