<?php

//insert_chat.php
session_start();
include('../6_db_connection.php');
$from_user_id=$_POST["customer_id"];
$to_user_id=$_POST["customer_id"];
$sql11=$conn->prepare("DELETE FROM chat_message WHERE from_user_id=? OR to_user_id=?");
$sql11->bind_param("ii",$from_user_id,$to_user_id);
$sql11->execute();
?>