<?php
session_start();
$notification="";
$output="";
$notify="1";
require("6_db_connection.php");
require("5_customer_session_data.php");

$sql1=$conn->prepare("SELECT * FROM customer c, chat_message cm WHERE c.cu_id=cm.from_user_id AND c.cu_id=?");
$sql1->bind_param("i",$cu_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
    $sender="CUSTOMER";
    $sql=$conn->prepare("SELECT m1.*,c.cu_id
    FROM customer c,chat_message m1 LEFT JOIN chat_message m2
     ON (m1.from_user_id = m2.from_user_id AND m1.chat_message_id < m2.chat_message_id)
    WHERE m2.chat_message_id IS NULL AND c.cu_id=? AND m1.to_user_id=? AND m1.is_deleted!=2 AND m1.sender!=?");
    $sql->bind_param("iis",$cu_id,$cu_id,$sender);
    $sql->execute();
    $result=$sql->get_result();

    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        if($row["notify"]==1)
        {
            $output.='<button type="button" class="bottom_right start_chat" data-toggle="modal" data-target="#myModal" id='.$cu_id.'><i class="fa fa-comments"></i>';   
            $output.='<b style="color:black;background-color:white;border-radius:50%;padding:2px">&nbsp;'.$notify.'&nbsp;</b>';
            $output.='<input type="hidden" id="notification" value="1">';        
            $output.='</button>';

//            $sql1=$conn->prepare("SELECT * FROM admin ORDER BY ad_id ASC LIMIT 1");
//            $sql1->execute();
//            $result1=$sql1->get_result();
//            $row1=$result1->fetch_assoc();
//            $ad_id=$row1["ad_id"];
//
//            $notify=2;
//            $sql2=$conn->prepare("UPDATE chat_message SET notify=? WHERE from_user_id=? AND to_user_id=? AND is_deleted!=2");
//            $sql2->bind_param("iii",$notify,$ad_id,$cu_id);  
//            $sql2->execute();   
        }
        else
        {
        $output.='<button type="button" class="bottom_right start_chat" data-toggle="modal" data-target="#myModal" id='.$cu_id.'><i class="fa fa-comments"></i>';     
        $output.='<input type="hidden" id="notification" value="2">';        
        $output.='</button>';            
        }
//        if($row["notify"]==2)
//        {
//            $output.='<button type="button" class="bottom_right start_chat" data-toggle="modal" data-target="#myModal" id='.$cu_id.'><i class="fa fa-comments"></i>';  
//            $output.='<b style="color:black;background-color:white;border-radius:50%;padding:2px">&nbsp;'.$notify.'&nbsp;</b>';
//            $output.='<input type="hidden" id="notification" value="2">';        
//            $output.='</button>';    
//        }
//        else
//        {
//            $output.='<button type="button" class="bottom_right start_chat" data-toggle="modal" data-target="#myModal" id='.$cu_id.'><i class="fa fa-comments"></i>';  
//            $output.='<input type="hidden" id="notification" value="2">';        
//            $output.='</button>';    
//        }    
    }
    else
    {
        $output.='<button type="button" class="bottom_right start_chat" data-toggle="modal" data-target="#myModal" id='.$cu_id.'><i class="fa fa-comments"></i>';     
        $output.='<input type="hidden" id="notification" value="2">';        
        $output.='</button>';            
    }    
}
else
{
        $output.='<button type="button" class="bottom_right start_chat" data-toggle="modal" data-target="#myModal" id='.$cu_id.'><i class="fa fa-comments"></i>';     
        $output.='<input type="hidden" id="notification" value="2">';        
        $output.='</button>';    
}
echo $output;