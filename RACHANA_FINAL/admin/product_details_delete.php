<?php
require("../6_db_connection.php");

    $product_details_id=$_GET["id"]; // to fetch PK

    $sql=$conn->prepare("DELETE FROM product_details WHERE pd_id = ? ");
    $sql->bind_param("i",$product_details_id);

    if($sql->execute())
    {
        echo "<script type='text/javascript'>
    alert('SUCCESSFULLY DELETED');
    window.location='product_details_view.php';
</script>";
    }
    else
    {
        echo "<script type='text/javascript'>
    alert('Not Deleted');
    window.location='product_details_view.php';
</script>";
    }
?>





