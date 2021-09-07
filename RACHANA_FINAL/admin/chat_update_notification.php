<?php

//insert_chat.php

include('../6_db_connection.php');
$notify=0;
$sql=$conn->prepare("UPDATE chat_message SET notify=? WHERE from_user_id=?");
$sql->bind_param("ii",$notify,$_POST["customer_id"]);
$sql->execute();
?>