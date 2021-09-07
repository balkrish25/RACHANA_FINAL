<?php
$is_deleted_record="";
//insert_chat.php
session_start();
include('../6_db_connection.php');
$sql11=$conn->prepare("SELECT * FROM admin WHERE ad_username=?");
$sql11->bind_param("s",$_SESSION["admin_username"]);
$sql11->execute();
$result11=$sql11->get_result();
$row11=$result11->fetch_assoc();
$admin_id=$row11["ad_id"];

$sql1=$conn->prepare("SELECT * FROM customer WHERE cu_id=?");
$sql1->bind_param("i",$_POST["customer_id"]);
$sql1->execute();
$result1=$sql1->get_result();
$row1=$result1->fetch_assoc();
$name=$row1["cu_name"];
$is_deleted_record=0;
$notify=1;
$sender="ADMIN";

$sql=$conn->prepare("INSERT INTO chat_message(sender,from_user_id,to_user_id,chat_message,is_deleted,notify)VALUES(?,?,?,?,?,?)");
$sql->bind_param("siisii",$sender,$admin_id,$_POST["customer_id"],$_POST['chat_message'],$is_deleted_record,$notify);
if($sql->execute())
{
	echo fetch_user_chat_history_admin($admin_id,$_POST["customer_id"],$name,$conn);
}

?>