<?php
session_start();
require('../6_db_connection.php');

    $old_password=$_POST["old_password"];
    $new_password=$_POST["new_password"];
    $confirm_password=$_POST["confirm_password"];
        
   
    $ad_username=$_SESSION["admin_username"];
    $sql=$conn->prepare("SELECT * FROM admin WHERE ad_username=?");
    $sql->bind_param("s",$ad_username);
    $sql->execute();
    $result=$sql->get_result();
    
if($result->num_rows > 0)
{
    $row=$result->fetch_assoc();
    if($old_password == base64_decode($row['ad_password']))
    
    {
        
        
         if ($new_password == $confirm_password)
        {

             $sql1=$conn->prepare("UPDATE admin SET ad_password=? WHERE ad_username=?");
             
              $new_password = base64_encode($new_password);
                  
             $sql1->bind_param("ss",$new_password,$ad_username);
             
             
            if($sql1->execute())
                {
                echo"<script type='text/javascript'>
                alert('SUCCESSFULLY UPDATED');
                window.location='index.php'
                </script>";
                }
             
             
             
             
        }
        else
        {
            echo"<script type='text/javascript'>
    alert('NEW AND CONFIRM PASSWORD DOESNT MATCH');
    history.back();
    </script>";
        }
    }
   else
   {
      echo"<script type='text/javascript'>
    alert('OLD PASSWORD DOESNT MATCH');
    history.back();
    </script>" ;
   }
    
    
}
    
    ?>