<?php
require("../6_db_connection.php");

$stock_details_id=$_GET["id"]; // to fetch PK


$sql=$conn->prepare("DELETE FROM stock_details WHERE sd_id = ? ");
$sql->bind_param("i",$stock_details_id);

if($sql->execute())
{
echo "<script type='text/javascript'>
alert('SUCCESSFULLY DELETED');
window.location='stock_details_view.php';
</script>";
}
else
{
echo "<script type='text/javascript'>
alert('Not Deleted');
window.location='stock_details_view.php';
</script>";
}
?>





