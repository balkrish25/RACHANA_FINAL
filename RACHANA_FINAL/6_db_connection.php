<?php
//database_connection.php
$conn="";
$servername="localhost";
$username="root";
$password="";
$dbname="rachana_arts";

$conn=new mysqli($servername,$username,$password,$dbname);
date_default_timezone_set('Asia/Kolkata');

if($conn->connect_errno)
{
    echo "FAILED TO CONNECT :";
    die;
}

function fetch_user_last_activity($user_id,$conn)
{
    $sql=$conn->prepare("SELECT * FROM login WHERE user_id=? ORDER BY last_activity DESC LIMIT 1");
    $sql->bind_param("i",$user_id);
    $sql->execute();
    $result=$sql->get_result();
    $row=$result->fetch_assoc();        
    return $row['last_activity'];	
}

function fetch_user_chat_history($from_user_id, $to_user_id,$name,$conn)
{
    $sql=$conn->prepare("SELECT * FROM chat_message WHERE (from_user_id=? AND to_user_id=?)OR(from_user_id=? AND to_user_id=?) ORDER BY timestamp ASC");
    $sql->bind_param("iiii",$from_user_id,$to_user_id,$to_user_id,$from_user_id);
    $sql->execute();
    $result=$sql->get_result(); 
    $output ="";
    if($result->num_rows!=0)
    {
	   while($row=$result->fetch_assoc())
	   {    
         if($row["from_user_id"]==$to_user_id && $row["sender"]!="CUSTOMER"){        
               $output.='<div class="incoming_msg">              
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p style="word-wrap: break-word">'.$row["chat_message"].'</p>
                       <span class="time_date">'.$row["timestamp"].'</span></div>
                  </div>
                </div>';
        }
        else{

                $output.='<div class="outgoing_msg">
                <div class="sent_msg">
                    <p>'.$row["chat_message"].'</p>
                    <span class="time_date">'.$row["timestamp"].'</span></div>
                </div>';     

            }  
	   }	
    }    
    else
    {
            $output.='<div class="incoming_msg">              
              <div class="received_msg">
                <div class="received_withd_msg">
                <p style="word-wrap: break-word">Hello, Im '.$name.', How May i Help You??</p>
                <span class="time_date">'.date("d-m-y h:m:s").'</span>
              </div>
            </div>';
        
    }
    $sql1=$conn->prepare("UPDATE chat_message SET is_deleted=0 WHERE from_user_id=? AND to_user_id=? AND is_deleted=1");
    $sql1->bind_param("ii",$to_user_id,$from_user_id);
    $sql1->execute();   
	return $output;
}

function get_user_name($user_id, $conn)
{
    $sql=$conn->prepare("SELECT username FROM login WHERE user_id=?");
    $sql->bind_param("i",$user_id);
    $sql->execute();
    $result=$sql->get_result();
    $row=$result->fetch_assoc();
		return $row['username'];	
}

function count_unseen_message($from_user_id, $to_user_id, $conn)
{
    $sql=$conn->prepare("SELECT * FROM chat_message WHERE from_user_id =? AND to_user_id = ? AND is_deleted = '1'");
    $sql->bind_param("ss",$from_user_id,$to_user_id);
    $sql->execute();
    $result=$sql->get_result();    
	$output = '';
	if($result->num_rows > 0)
	{
		$output = '<span class="label label-success">'.$result->num_rows.'</span>';
	}
	return $output;
}

function fetch_user_chat_history_admin($from_user_id, $to_user_id,$admin_name,$conn)
{        
    $sql=$conn->prepare("SELECT * FROM chat_message WHERE (from_user_id=? AND to_user_id=?)OR(from_user_id=? AND to_user_id=?) ORDER BY timestamp ASC");
    $sql->bind_param("iiii",$from_user_id,$to_user_id,$to_user_id,$from_user_id);
    $sql->execute();
    $result=$sql->get_result();     
    $message="";    
    while($row=$result->fetch_assoc())
    {
    $sql1=$conn->prepare("SELECT * FROM customer WHERE cu_id=?");
    $sql1->bind_param("i",$row["from_user_id"]);
    $sql1->execute();
    $result1=$sql1->get_result();
    $row1=$result1->fetch_assoc();
        
    if($row["from_user_id"]==$to_user_id && $row["sender"]!="ADMIN"){                
     
    $message.='<div class="chat chat-left">
    <div class="chat-avatar">
    <a class="incoming_msg_img" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">'.$row1['cu_name'][0].'</a>
    </div>
    <div class="chat-body">
    <div class="chat-content">
    <p style="word-wrap: break-word">'.$row["chat_message"].'</p>
    <span class="time_date">'.$row["timestamp"].'</span>
    </div>
    </div>
    </div>';
    }
    else
    {
     $message.='<div class="chat">
     <div class="chat-avatar">
     <a class="incoming_msg_img" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">A</a>
     </div>
     <div class="chat-body">
     <div class="chat-content">
     <p>'.$row["chat_message"].'</p>
     <span class="time_date">'.$row["timestamp"].'</span>
     </div>
     </div>
     </div>';

     }      
    } 
    return $message;
	
}
?>
