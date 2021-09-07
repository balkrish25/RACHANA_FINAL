<?php
require("../6_db_connection.php");  
$output="";
$sql=$conn->prepare("SELECT m1.*,c.cu_name,c.cu_id
FROM customer c,chat_message m1 LEFT JOIN chat_message m2
 ON (m1.from_user_id = m2.from_user_id AND m1.chat_message_id < m2.chat_message_id)
WHERE m2.chat_message_id IS NULL AND c.cu_id=m1.from_user_id AND m1.is_deleted!=2 ORDER BY m1.chat_message_id DESC");  
$sql->execute();
$result=$sql->get_result();
$notify="";
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
$timeStamp = date("d-m-Y",strtotime($row["timestamp"])); 
 
$output.='<a href="#" class="media border-0">
<div class="media-left pr-1">
<span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="../chat_scripts/default.jpg">
</span>
</div>
<div class="media-body w-100">
  <h5>'.$row["cu_name"];
  if($row["notify"]==1)
  {
      $notify=1;
      $output.='&nbsp;<sup style="width: 20px;height: 20px;border-radius: 30%;line-height:30px;text-align: center;background-color: gray;color: white;">&nbsp;'.$row["notify"].'&nbsp;</sup>';
  }
  $output.='<span class="chat_date" style="float:left">'.$timeStamp.'</span></h5><br>
  <button type="button" class="btn btn-info btn-xs start_chat" data-customerid="'.$row["cu_id"].'" data-customername="'.$row["cu_name"].'">Start Chat</button>
  <button type="button" class="btn btn-warning btn-xs close_chat" id="'.$row["cu_id"].'">Close Chat</button>
  </div>
  </a>';
}
echo $output;
}
else
{
    echo '<center><h3>No Chats Found!!!</h3></center>';
}    
