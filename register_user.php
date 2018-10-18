<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
<title>BMP Register</title>
<meta charset="UTF-8" />

<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
</head>
<style>
    
    
    
    
    
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 30%;
}

th, td {
    padding: 10px;
    
}



</style>
<body>
        <?php
        include_once'./utility/connection.php';
       if(isset($_POST['fname']))
       {
           $FNAME = $_POST['fname'];
           $LNAME = $_POST['lname'];
           $USERNAME = $_POST['uname'];
           $EMAIL = $_POST['email'];
           $PASSWD = $_POST['passwd'];
           $TODAYS_DATE = date("Y-m-d");
          
           $USER_TYPE = "2"; //normal user
           $NAME = $FNAME." ".$LNAME;
           $QUERY = "INSERT INTO `user` (`username`, `password`, `first_name`, `last_name`, `email`, `phone`, `date`, `user_type`) "
                   . "VALUES ('$USERNAME', '$PASSWD', '$FNAME', '$LNAME', '$EMAIL', '00000000', '$TODAYS_DATE', '$USER_TYPE');";
           
           $RUN = mysql_query($QUERY);
           session_start();
            $_SESSION["username"] = $USERNAME;
            $_SESSION["login"]=TRUE;
            $_SESSION["usertype"]=$USER_TYPE;
            $_SESSION["name"]=$NAME;
            
            $SELCT = mysql_query("Select id from user where username = '$USERNAME';");
            $view=  mysql_fetch_assoc($SELCT);
            
            $ID = $view['id'];
            
            $_SESSION["id"]=$ID;
            $db = "test";
            $_SESSION["db"]=$db;

        header("location:home_map.php");
           
       }
        ?>
<center>
<img src="images/logo_bmp.png" alt="BMP Logo" style="height: 100px; width: 100px">
<h1>Book My Parking</h1></center>
<center><h3>City of Regina</h3>
    <form name="reg_form" method="post" action="register_user.php" onSubmit="return validatePassword()">
        
        <fieldset>
            <table style="align-self: center; border-spacing: 5px;" >
                <tr>
                    <td>
                       First Name
                    </td>
                    <td>
                        <input type="text" tabindex="1" placeholder="" name="fname" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Last Name
                    </td>
                    <td>
                        <input type="text" tabindex="2" name="lname" required>
                    </td>
                </tr>
                <tr>
                    <td>
                       Username
                    </td>
                    <td>
                        <input type="text" tabindex="2" name="uname" required>
                    </td>
                </tr>
                <tr>
                    <td>
                       Email 
                    </td>
                    <td>
                       <input type="text" tabindex="2" name="email" required> 
                    </td>
                </tr>
                <tr>
                    <td>
                     <label>Password</label>   
                    </td>
                    <td>
                       <input type="password" tabindex="4" name="passwd" required> 
                    </td>
                </tr>
                
                <tr>
           
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" class="btn" value="Register" tabindex="6" >
                    </td>
            
               
                </tr>
            </table>

          
	</fieldset>
	
</form>
<!--<a href="register_user.php"><strong>New User?</strong></a>-->
</center>
</body>
</html>