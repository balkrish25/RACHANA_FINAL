<?php
    require("../6_db_connection.php");
    require("10_SMS_API.php");

    $orderno=$_POST['orderno'];
    $customer_id=$_POST['cu_id'];    
    $customer_contact=$_POST['cu_contact'];    
    $customer_name=$_POST['cu_name'];    
    $grand_total=$_POST['grand_total'];    
    $order_status="ORDER CONFIRMED";   
    
    $sql=$conn->prepare("UPDATE customer_order_details SET order_status=? WHERE cu_id=? AND order_no=?");
    $sql->bind_param("sii",$order_status,$customer_id,$orderno);
    if($sql->execute()){
        
    $msg="$customer_name Your Order Has Been Confirmed of Rs. $grand_total (Order No.: $orderno), Will Be Delivered Within 4 to 6 Days.";
    sendSMS($customer_contact,$msg);
//    $data=urlencode($msg);
//    $sms="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=Inn0vic$201908&sender=INVSIT&phone=$customer_contact&text=$data&priority=ndnd&stype=normal";
//    $content = file_get_contents($sms);

    echo"<script type='text/javascript'>
    alert('ORDER CONFIRMED');
    window.location='customer_order_placed.php';
    </script>";
    }
    else
    {
        echo"<script type='text/javascript'>
    alert('NOT CONFIRMED');
    window.location='customer_order_placed.php';
    </script>";
    }    
    
?>  