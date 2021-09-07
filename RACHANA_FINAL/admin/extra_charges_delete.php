<?php
require("../6_db_connection.php");

    $extra_charges_id=$_REQUEST["id"]; // to fetch PK

    $sql=$conn->prepare("DELETE FROM extra_charges WHERE ec_id = ? ");
    $sql->bind_param("i",$extra_charges_id);

    if($sql->execute())
    {
        echo "<script type='text/javascript'>
    alert('SUCCESSFULLY DELETED');
    window.location='extra_charges_view.php';
</script>";
    }
    else
    {
        echo "<script type='text/javascript'>
    alert('Not Deleted');
    window.location='extra_charges_form.php';
</script>";
    }
?>





