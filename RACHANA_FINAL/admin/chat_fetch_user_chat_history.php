<?php
session_start();
//fetch_user_chat_history.php
require("../6_db_connection.php");
$sql1=$conn->prepare("SELECT * FROM admin WHERE ad_username=?");
$sql1->bind_param("s",$_SESSION["admin_username"]);
$sql1->execute();
$result1=$sql1->get_result();
$row1=$result1->fetch_assoc();
echo fetch_user_chat_history_admin($row1["ad_id"],$_POST['customer_id'],$_POST['customer_name'],$conn);

?>