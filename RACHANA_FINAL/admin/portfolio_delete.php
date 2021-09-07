<?php
require("../6_db_connection.php");

$portfolio_id=$_GET["id"]; // to fetch PK

$sql=$conn->prepare("DELETE FROM portfolio WHERE pf_id = ? ");
$sql->bind_param("i",$portfolio_id);

if($sql->execute())
{
echo "<script type='text/javascript'>
alert('SUCCESSFULLY DELETED');
window.location='portfolio_view.php';
</script>";
}
else
{
echo "<script type='text/javascript'>
alert('NOT DELETED');
window.location='portfolio_view.php';
</script>";
}
?>