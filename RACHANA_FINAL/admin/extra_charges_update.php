<?php
require("../6_db_connection.php");

    $ec_id=$_POST["ec_id"];
    $ec_tax=$_POST["ec_tax"];
    $ec_discount=$_POST["ec_discount"];
    $ec_min_amount=$_POST["ec_min_amount"];
    $ec_date=$_POST["ec_date"];
   

    $sql=$conn->prepare("UPDATE extra_charges SET ec_tax=?,ec_discount=?,ec_min_amount=?,ec_date=? WHERE ec_id=?");


    $sql->bind_param("iiisi",$ec_tax,$ec_discount,$ec_min_amount,$ec_date,$ec_id);

    if($sql->execute())
    {
    echo"<script type='text/javascript'>
    alert('SUCCESSFULLY UPDATED');
    window.location='extra_charges_view.php';
    </script>";
    }
    else
    {
    echo"<script type='text/javascript'>
    alert('SUCCESSFULLY  NOT UPDATED');
    window.location='extra_charges_form.php';</script>";
    }
?>