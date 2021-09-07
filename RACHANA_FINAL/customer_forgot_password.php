<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php include_once("1_metatags.php");?>
</head>
<body>
<div class="page-wrapper-blue"> 
<?php include_once("2_header.php");?>

<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
<div class="container">
<div class="row">
<div class="col-lg-12">
<!--=======  breadcrumb content  =======-->
<div class="breadcrumb-content">
<ul>
<li class="has-child"><a href="index.html">Home</a></li>
<li>Login Register</li>
</ul>
</div>

<!--=======  End of breadcrumb content  =======-->
</div>
</div>
</div>
</div>

<!--====================  End of breadcrumb area  ====================-->

<!--==================== page content ====================-->

<div class="page-section pb-40">
<div class="container">
<div class="row">
<div class="offset-4 col-sm-12 col-md-12 col-xs-12 col-lg-4 mb-30" id="contactShow" style="border:1px solid black">
<form class="login_form row" method="POST" id="contact_form" enctype="multipart/form-data">
<div class="login-form">
<h4 class="login-title">FORGOT PASSWORD?</h4>
<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Enter Registered Mobile Number</label>
<input class="form-control" type="hidden" name="type" id="type" value="CONTACT">
<input class="form-control" type="text" placeholder="Enter Registered Contact Number" name="cu_contact" id="cu_contact">
<span id="cu_contact_error"></span>
</div>    
<div class="col-md-12">
<button class="btn btn-success btn-block" type="submit">SEND OTP</button>
</div>
<br><br><br><br><br>
</div>
</div>
</form>
</div>
    
<div class="offset-4 col-sm-12 col-md-12 col-xs-12 col-lg-4 mb-30" id="changePassoword" style="border:1px solid black">
<form class="login_form row" method="POST" id="change_password" enctype="multipart/form-data">
<input class="form-control" type="hidden" name="type" id="type" value="CHANGEPASSWORD">
    
<div class="login-form">
<h4 class="login-title">ENTER OTP</h4>
<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Enter OTP</label>
<input class="form-control" type="text" placeholder="Enter OTP" name="otp" id="otp" value="<?php echo  $_SESSION['otp_generated'];?>">
<span id="otp_error"></span>
</div>    
<div class="col-md-12 col-12 mb-20">
<label>Enter New Password</label>
<input class="form-control" type="text" placeholder="Enter New Password" name="new_password" id="new_password">
<span id="new_password_error"></span>
</div>        
<div class="col-md-12 col-12 mb-20">
<label>Enter Confirm Password</label>
<input class="form-control" type="text" placeholder="Enter Confirm Password" name="confirm_password" id="confirm_password">
<span id="confirm_password_error"></span>
</div>            
<div class="col-md-12">
<button class="btn btn-success btn-block" type="submit">CHANGE PASSWORD</button>
</div>
<br><br><br><br><br>
</div>
</div>
</form>
</div>

</div>
</div>
</div>

<!--====================  End of page content  ====================-->

<br><br><br><br><br>
<!--====================  footer area ====================-->
<?php include_once("3_footer.php");?>
</div>
<?php include_once("4_footer_scripts.php");?>
<?php include_once("8_json_scripts.php");?> 
<script type="text/javascript">    
$(document).ready(function(){
$('#changePassoword').hide();    
$(document).on('submit', '#contact_form', function(event) {
event.preventDefault(); 
var cu_contact = '';
var formData = new FormData($('#contact_form')[0]);    
cu_contact = phoneno('cu_contact', 'cu_contact_error', 'Contact Number');
if (cu_contact == 1) 
{
 $.ajax({
    url: "customer/forgot_contact_check.php",
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
    url: "customer/forgot_contact_check.php",
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