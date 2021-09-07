<?php
require("../6_db_connection.php");

$customer_id=$_POST["cu_id"]; // to fetch PK

$sql=$conn->prepare("DELETE FROM customer WHERE cu_id = ? ");
$sql->bind_param("i",$customer_id);

if($sql->execute())
{
echo "<script type='text/javascript'>
alert('Successfully Deleted');
window.location='customer_view.php';
</script>";
}
else
{
echo "<script type='text/javascript'>
alert('Not Deleted');
window.location='customer_view.php';
</script>";
}
?>