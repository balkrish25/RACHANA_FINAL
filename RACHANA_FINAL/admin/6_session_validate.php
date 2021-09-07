<?php 
session_start();
if(!isset($_SESSION["admin_username"]) || $_SESSION["admin_username"] == "")
{
?>
<script type="text/javascript">
//alert ("SESSION EXPIRED");
document.location="../index.php";
</script> 
<?php                 
}
else if(isset($_SESSION['admin_username']))
{
    $admin_session=TRUE;
    $sql=$conn->prepare("SELECT * FROM admin WHERE ad_username=?");
    $sql->bind_param("s",$_SESSION["admin_username"]);
    $sql->execute();
    $result=$sql->get_result();
    $row=$result->fetch_assoc();
    $admin_name=$row["ad_name"];
    $admin_contact=$row["ad_contact"];
    $admin_id=$row['ad_id'];
    $password_enc=$row['ad_password'];
    $password=base64_decode($password_enc);
}
else
{
    $admin_session=FALSE;
} 
?>