<?php
require("../6_db_connection.php");

if(!empty($_POST["pc_id"])){
	
	$pc_id=$_POST["pc_id"];
    //echo $sms_id;
    $sql=$conn->prepare("SELECT * FROM product_size,product_units WHERE product_size.pu_id=product_units.pu_id AND product_size.pc_id=? ORDER BY product_size.pc_id ASC");
    $sql->bind_param("i",$pc_id);
    $sql->execute();
    $result=$sql->get_result();
    $rowCount=$result->num_rows;
    //State option list
    if($rowCount > 0){
        echo '<option value="">--Select Product Size--</option>';
        while($row = $result->fetch_assoc())
        { 
            echo '<option value="'.$row['ps_id'].'">'.$row['ps_size'].' '.$row['pu_type'].'</option>';
        }
    }else{
        echo '<option value="">Product Size Not Available</option>';
    }	
}
?>