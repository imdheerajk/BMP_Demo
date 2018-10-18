<?php


include_once './utility/connection.php';
include_once 'header.php';
$user_id=$_SESSION["id"];
$pass=$_POST["currentPassword"];
$newpass=$_POST["confirmPassword"];
$sql="SELECT * FROM user WHERE id='".$user_id."' and password='".$pass."'";

$result=mysql_query($sql);
$view=  mysql_fetch_assoc($result);
$count=mysql_num_rows($result);       
 if($count==1)
            {
             mysql_query("UPDATE user set password='" .$newpass. "' WHERE id='" . $user_id . "'");
             $message = "Password Changed";   
            }
        else 
            { 
                    $message = "Current Password is not correct";
               
            }      
echo "<div class='row' ><div class='col-lg-12' style='height:500px'><center><h2> ".$message."</h2></center></div></div>  ";

