<?php
include_once('6_db_connection.php');
$notify=0;
$sender="ADMIN";
$sql=$conn->prepare("SELECT * FROM admin ORDER BY ad_id ASC LIMIT 1");
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$data = array(
    'id'     => $row["ad_id"],
    'name'   => $row["ad_name"]
);

$sql1=$conn->prepare("UPDATE chat_message SET notify=? WHERE from_user_id=? AND to_user_id=? AND sender=?");
$sql1->bind_param("iiis",$notify,$row["ad_id"],$_POST["customer_id"],$sender);
$sql1->execute();

echo json_encode($data);
?>