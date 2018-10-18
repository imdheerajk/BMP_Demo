<?php
include_once './header.php';
$user_id=$_SESSION["id"];


include_once './utility/connection.php';



?>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</head>
<body><center>
    <form name="frmChange" method="post" action="changePassSuccess.php" onSubmit="return validatePassword()">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table style="alignment-adjust: center" class='table table-bordered'>
    <tr>
        <td colspan="2" style="text-align: center"><strong>Change Password</strong></td>
</tr>
<tr>
    <td width="40%" ><label>Current Password</label></td>
<td width="60%"><input class="form-control" type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr>
<td><label>New Password</label></td>
<td><input class="form-control" type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><label>Confirm Password</label></td>
<td><input class="form-control" type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
    <td colspan="2" style="text-align: center"><input type="submit" name="submit" value="Submit" class='btn btn-default'></td>
</tr>
    </table>
</div>
</form></center>

</body></html>
