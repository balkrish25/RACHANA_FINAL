<?php
session_start();
require('../6_db_connection.php');

    $ad_username=$_POST["ad_username"];
    $ad_password=$_POST["ad_password"];

    $sql=$conn->prepare("SELECT * FROM admin WHERE ad_username=?");
    $sql->bind_param("s",$ad_username);
    $sql->execute();
    $result=$sql->get_result();
    
if($result->num_rows > 0)
{
    $row=$result->fetch_assoc();
    if($ad_password == base64_decode($row['ad_password']))
    {
        $_SESSION["admin_username"]=$ad_username;
        header("Location:../admin/index.php");
        
    }
    else
    {
        echo "<script type='text/javascript'>
        alert('INVALID  PASSWORD');
        window.location='index.php';
        </script>";
    }
}
else
{
    echo "<script type='text/javascript'>
        alert('INVALID USERNAME');
        window.location='index.php';
        </script>";
}

?>
