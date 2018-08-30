<html>
    <head>
<title>BMP login</title>
<meta charset="UTF-8" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/structure.css">
</head>
<body>

<center>
   
<img src="<?php echo base_url(); ?>images/logo_bmp.png" alt="BMP Logo" style="height: 80px; width: 80px">
<h1>Book My Parking</h1></center>
<center><h2>City of Regina</h2>
    </center>
    <?php echo validation_errors(); 
    echo form_open("LoginController/checkLogin", "class='box login'");
    ?>
    
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input type="text" name="username">
	  <!--<label>
-->   <a href="mailto:someone@example.com?Subject=Hi%20please%20update%20me%20with%20new%20password?To=BMP.support@gmail.com" class="rLink" tabindex="5">Forgot password?
   </a>Password</label>
	  <input type="password" name="password">
	</fieldset>
	<footer>
	  <!--<label><input type="checkbox" tabindex="3">Keep me logged in</label>-->
            <label> <a href="#" style="color: red"><strong>New User?</strong></a></label>
            <input type="submit" name="submit" class="btnLogin" value="Login">
	</footer>
<?php echo form_close(); ?>
<!--<a href="register_user.php"><strong>New User?</strong></a>-->

</body>
