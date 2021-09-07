<?php
session_start();
//fetch_user_chat_history.php
include_once('6_db_connection.php');
include('5_customer_session_data.php');
echo fetch_user_chat_history($cu_id,$_POST['admin_id'],$_POST['admin_name'],$conn);

?>