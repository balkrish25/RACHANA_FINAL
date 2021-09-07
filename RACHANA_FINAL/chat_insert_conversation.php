<?php

//insert_chat.php
session_start();
include('6_db_connection.php');
include('5_customer_session_data.php');
$status="";
//$is_deleted=1;
$is_deleted=0;
$notify=1;
$sql1=$conn->prepare("SELECT * FROM admin ORDER BY ad_id ASC LIMIT 1");
$sql1->execute();
$result1=$sql1->get_result();
$row1=$result1->fetch_assoc();
$name=$row1["ad_name"];
$sender="CUSTOMER";

$sql=$conn->prepare("INSERT INTO chat_message(sender,from_user_id,to_user_id,chat_message,is_deleted,notify)VALUES(?,?,?,?,?,?)");
$sql->bind_param("siisii",$sender,$cu_id,$_POST['admin_id'],$_POST['chat_message'],$is_deleted,$notify);
if($sql->execute())
{
	echo fetch_user_chat_history($cu_id, $_POST['admin_id'],$name,$conn);
}

?>