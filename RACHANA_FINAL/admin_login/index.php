<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<?php include_once("1_meta_tags.php"); ?>
</head>
<body>

<div class="limiter">
<div class="container-login100" style="background-image: url('vendors/images/bg-01.jpg');">
<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
<form action="admin_login_check.php" method="post" onsubmit="return ValidateLoginForm()" enctype="multipart/form-data">  
<span class="login100-form-title p-b-49">
Login
</span>

<div class="form-group" >
<label>Username</label>
<input class="form-control" type="text"  placeholder="Username" id="ad_username" name="ad_username" autocomplete="off">
<span id="ad_username_error"></span>
</div>

<div class="form-group" >
<label>Password</label>
<input class="form-control" type="Password" placeholder="Password" id="ad_password" name="ad_password">
<span id="ad_password_error"></span>
</div>

<div class="text-right p-t-8 p-b-31">

</div>

<div class="container-login100-form-btn">
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
<button class="login100-form-btn">
Login
</button>
</div>
</div>

<div class="text-right p-t-8 p-b-31">
<a href="admin_forgot_pasword.php">
Forgot password?
</a>
</div>

</form>
</div>
</div>
</div>

<div id="dropDownSelect1"></div>
<?php include_once("2_footer_scripts.php"); ?>
<script>
function ValidateLoginForm()
{
var ad_username = '';
var ad_password = '';

ad_username = fieldrequired('ad_username', 'ad_username_error', 'Username');
ad_password = pasword('ad_password', 'ad_password_error', 'Password');

if (ad_username == 1 && ad_password == 1) 
{
return true;
}
else
{
return false;
}
}
</script>
</body>
</html>