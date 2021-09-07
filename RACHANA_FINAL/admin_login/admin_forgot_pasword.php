<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<?php include_once("1_meta_tags.php"); ?>
</head>
<body>

<div class="limiter">
<div class="container-login100" style="background-image: url('vendors/images/bg-01.jpg');">
<!--CONTACT FORM-->
<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" id="contactShow"> 
<form id="contact_form" method="post" enctype="multipart/form-data"> 
<span class="login100-form-title p-b-49">
Forgot Password
</span>

<div class="form-group" >
<input class="form-control" type="hidden" name="type" id="type" value="CONTACT">
<label>Enter Mobile Number</label>
<input class="form-control" type="text"  placeholder="Enter Mobile Number" id="ad_contact" name="ad_contact">
</div>
<span id="ad_contact_error"></span>
<div class="text-right p-t-8 p-b-31">

</div>

<div class="container-login100-form-btn">
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
<button class="login100-form-btn">
SEND OTP
</button>
</div>
</div>
</form>
</div>
<!--END CONTACT FORM-->


<!--CHANGE PASSWORD-->
<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" id="changePassoword">
<form id="change_password" method="post" enctype="multipart/form-data">
<span class="login100-form-title p-b-49">
Change Password
</span>

 <input class="form-control" type="hidden" name="type" id="type" value="CHANGEPASSWORD">
 
<div class="form-group">
<label>Enter OTP</label>
<input class="form-control" type="text"  placeholder="Enter OTP" id="otp" name="otp">
<span id="otp_error"></span>
</div>

<div class="form-group" >
<label>New Password</label>
<input class="form-control" type="text" placeholder="New Password" id="new_password" name="new_password">
<span id="new_password_error"></span>
</div>

<div class="form-group" >
<label>Confirm Password</label>
<input class="form-control" type="text" placeholder="Confirm Password" id="confirm_password" name="confirm_password">
<span id="confirm_password_error"></span>
</div>

<div class="text-right p-t-8 p-b-31">

</div>

<div class="container-login100-form-btn">
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
<button class="login100-form-btn">
Change Password
</button>
</div>
</div>


</form>
</div>
<!--END CHANGE PASSWORD-->
</div>
</div>

<div id="dropDownSelect1"></div>
<?php include_once("2_footer_scripts.php"); ?>
<script type="text/javascript">    
$(document).ready(function(){
$('#changePassoword').hide();    
$(document).on('submit', '#contact_form', function(event) {
event.preventDefault(); 
var ad_contact = '';
var formData = new FormData($('#contact_form')[0]);    
ad_contact = phoneno('ad_contact', 'ad_contact_error', 'Contact Number');
if (ad_contact == 1) 
{
 $.ajax({
    url: "admin_forgot_password_check.php",
    method: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    dataType: "json",    
    success: function(data)
    {
        if(data.message_error==1)
        {
            alert("Contact Number Not Found!!");    
        }
        if(data.message_error==0)
        {
            $('#contactShow').hide();
            $('#changePassoword').show();    
        }
    }
});   
}
});
    
$(document).on('submit', '#change_password', function(event) {
event.preventDefault(); 
var otp = '';
var new_password = '';
var confirm_password = '';
var formData = new FormData($('#change_password')[0]);    
otp = fieldrequired('otp', 'otp_error', 'Otp');
new_password = pasword('new_password', 'new_password_error', 'New Password');    
confirm_password = pasword('confirm_password', 'confirm_password_error', 'Confirm Password');
if (otp == 1 && new_password == 1 && confirm_password == 1) 
{
 $.ajax({
    url: "admin_forgot_password_check.php",
    method: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    dataType: "json",    
    success: function(data)
    {
        if(data.message_error==1)
        {
            alert("NEW & CONFIRM PASSWORD DOES NOT MATCH");    
        }
        else if(data.message_error==2)
        {
            alert("INVALID OTP");    
        }
        if(data.message_error==0)
        {
            alert("PASSWORD CHANGED SUCCESSFULLY");    
            window.location.href = "index.php";   
        }
    }
});   
}
});    
});       
</script>       
</body>
</html>