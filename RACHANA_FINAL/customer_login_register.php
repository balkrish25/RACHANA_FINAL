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
<div class="col-sm-12 col-md-12 col-xs-12 col-lg-5 mb-30">
<!-- Login Form s-->
<div class="login-form">
<h4 class="login-title">Login</h4>
<form action="customer/customer_login_check.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateLoginForm()">
<?php 
if(isset($_POST["product_details_url"])){
?>
<input type="hidden" name="product_details_url" value="<?php echo $_POST['product_details_url'];?>">                                
<?php
}else
{
?>                                
<input type="hidden" name="product_details_url" value="NAN">                                 
<?php
}
?> 
<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Enter Username</label>
<input type="text" name="cu_username_login"placeholder="Username" id="cu_username_login" class="mb-0" autocomplete="off">
<span id="cu_username_login_error"></span> 
</div>
<div class="col-12 mb-20">
<label>Enter Password</label>
<input type="password" name="cu_password_login" placeholder="Password" id="cu_password_login" class="mb-0">
<span id="cu_password_login_error"></span>
</div>
<div class="col-md-12">
<button class="register-button mt-0" type="submit">Login</button>
</div>
<div class="col-md-5 mt-10 mb-20 text-left text-md-right">
<a href="customer_forgot_password.php"> Forgotten pasward?</a>
</div> 
</div>
</form> 
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-7 col-xs-12">
<form action="customer/customer_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
<div class="login-form">
<h4 class="login-title">Register</h4>
<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Fullname</label>
<input type="text" name="cu_name" placeholder="FullName" id="cu_name" class="mb-0">
<span id="cu_name_error"></span>
</div>
<div class="col-md-6 col-12 mb-20">
<label>Contact</label>
<input type="text" name="cu_contact" placeholder="Contact" id="cu_contact" class="mb-0">
<span id="cu_contact_error"></span>
</div>
<div class="col-md-6 col-12 mb-20">
<label>Email</label>
<input type="text" name="cu_email" placeholder="EMail" id="cu_email" class="mb-0">
<span id="cu_email_error"></span>
</div>
 
<div class="col-md-6 col-6 mb-20">
<label>Address</label>
<input type="text" id="cu_address" name="cu_address" class="mb-0" placeholder="Address">
<span id="cu_address_error"></span>
</div>
<div class="col-md-6 col-6 mb-20">
<label>Type</label>
<select name="cu_type" id="cu_type" class="form-control">
 <option value="">--SELECT TYPE--</option>
 <option value="GOVERNMENT">GOVERNMENT</option>
 <option value="EDUCATION">EDUCATION</option>
 <option value="CUSTOMER">CUSTOMER</option>
</select>
<span id="cu_type_error"></span>
</div> 
<div class="col-md-6 mb-20">
<label>Username</label>
<input type="text" name="cu_username" placeholder="Username" id="cu_username" class="mb-0">
<span id="cu_username_error"></span>
</div>
<div class="col-md-6 mb-20">
<label>Password</label>
<input type="password" name="cu_password" placeholder="Password" id="cu_password" class="mb-0">
<span id="cu_password_error"></span>
</div>
<div class="col-12">
<button class="register-button mt-0" type="submit">Register</button>
</div>
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
<script type="text/javascript">
function ValidateForm()
{
var cu_name = '';
var cu_contact = '';
var cu_email = '';
var cu_address = '';
var cu_username = '';
var cu_password = '';                
var cu_type = '';                

cu_name = alphabets('cu_name', 'cu_name_error', 'Name');
cu_contact = phoneno('cu_contact', 'cu_contact_error', 'Contact Number');
cu_email = emailid('cu_email', 'cu_email_error', 'Email');
cu_address = fieldrequired('cu_address', 'cu_address_error', 'Address');
cu_username = fieldrequired('cu_username', 'cu_username_error', 'Username');
cu_password = pasword('cu_password', 'cu_password_error', 'Password');
cu_type = fieldrequired('cu_type', 'cu_type_error', 'Type');

if (cu_name == 1 && cu_contact == 1 && cu_email == 1 && cu_address == 1 && cu_username == 1 && cu_password == 1 && cu_type==1) 
{
    return true;
}
else
{
    return false;
}
}
</script>
   
    <script type="text/javascript">
        function ValidateLoginForm()
        {
            var cu_username_login = '';
            var cu_password_login = '';                            

            cu_username_login = fieldrequired('cu_username_login', 'cu_username_login_error', 'Username');
            cu_password_login = pasword('cu_password_login', 'cu_password_login_error', 'Password');

            if (cu_username_login == 1 && cu_password_login == 1) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>
 
<?php include_once("8_json_scripts.php");?> 
</body>
</html>