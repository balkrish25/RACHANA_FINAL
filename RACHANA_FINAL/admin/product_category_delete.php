<?php
require("../6_db_connection.php");

    $product_category_id=$_REQUEST["id"]; // to fetch PK
    $sql1=$conn->prepare("SELECT * FROM product_details WHERE pc_id=?");
$sql1->bind_param("i",$product_category_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
echo"<script type='text/javascript'>
alert('RECORD NOT DELETED REFFERENCED..!');
history.back();
</script>";    
}   
else
{
    $sql=$conn->prepare("DELETE FROM product_category WHERE pc_id = ? ");
    $sql->bind_param("i",$product_category_id);

    if($sql->execute())
    {
    echo "<script type='text/javascript'>
    alert('SUCCESSFULLY DELETED');
    window.location='product_category_view.php';
    </script>";
    }
    else
    {
    echo "<script type='text/javascript'>
    alert('SUCCESSFULLY NOT DELETED');
    window.location='product_category_view.php';
    </script>";
    }
}
?>





