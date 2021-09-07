<?php
require("../6_db_connection.php");
 
    $ec_tax=$_POST["ec_tax"];
    $ec_discount=$_POST["ec_discount"];
    $ec_min_amount=$_POST["ec_min_amount"];

    $ec_date=$_POST["ec_date"];
   

    $sql=$conn->prepare("INSERT INTO extra_charges(ec_tax,ec_discount,ec_min_amount,ec_date)VALUES(?,?,?,?)");
    $sql->bind_param("iiis",$ec_tax,$ec_discount,$ec_min_amount,$ec_date);

    if($sql->execute())
    {
    echo"<script type='text/javascript'>
    alert('SUCCESSFULLY INSERTED');
    window.location='extra_charges_view.php';
    </script>";
    }
    else
    {
    echo"<script type='text/javascript'>
    alert('SUCCESSFULLY  NOT INSERTED');
    window.location='extra_charges_form.php';</script>";
    }
?>