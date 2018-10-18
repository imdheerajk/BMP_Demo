<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
<title>BMP login</title>
<meta charset="UTF-8" />

<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
</head>

<body>

<center>
   
<img src="images/logo_bmp.png" alt="BMP Logo" style="height: 80px; width: 80px">
<h1>Book My Parking</h1></center>
<center><h2>City of Regina</h2></center>
    <form class="box login" method="post" action="Login.php">
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input type="text" tabindex="1"  name="username" required>
	  <!--<label>
-->   <a href="mailto:someone@example.com?Subject=Hi%20please%20update%20me%20with%20new%20password?To=BMP.support@gmail.com" class="rLink" tabindex="5">Forgot password?
   </a>Password</label>
	  <input type="password" tabindex="2" name="password" required>
	</fieldset>
	<footer>
	  <!--<label><input type="checkbox" tabindex="3">Keep me logged in</label>-->
            <label> <a href="register_user.php" style="color: red"><strong>New User?</strong></a></label>
	  <input type="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
</form>
<!--<a href="register_user.php"><strong>New User?</strong></a>-->

</body>
</html>