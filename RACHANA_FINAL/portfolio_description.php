<?php
require("6_db_connection.php");
$output = array();
$sql=$conn->prepare("SELECT * FROM portfolio WHERE pf_id=?");
$sql->bind_param("i",$_POST["pf_id"]);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$output["description"]=$row["pf_description"];
echo json_encode($output);
?>
