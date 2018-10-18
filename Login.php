<?php session_start(); 
 include_once './utility/connection.php';
 
 $todays_date=date("Y-m-d");
    $tbl_name="user";// username and password sent from form 
    $db = "test";
    $username=$_POST['username']; 
    $password=$_POST['password']; 

    $hash=$password;// To protect MySQL injection
    $sql="SELECT * FROM $tbl_name WHERE username='".$username."' and password='".$hash."'";
    $result=mysql_query($sql);
    
    $rows=mysql_num_rows($result);// Mysql_num_row is counting table row

        $view=  mysql_fetch_assoc($result);
        $usertype=$view['user_type'];
        $name=$view['first_name']." ".$view['last_name'];
        $user_id= $view['id'];

    if($rows==1)// If result matched $myusername and $mypassword, table row must be 1 row
    {   
        $_SESSION["username"] = $username;
        $_SESSION["login"]=TRUE;
        $_SESSION["usertype"]=$usertype;
        $_SESSION["name"]=$name;
        $_SESSION["id"]=$user_id;
	$_SESSION["db"]=$db;

        header("location:home_map.php");
    }
    else 
    { 
            include_once 'index.php';
            echo "<center><h3 STYLE='color:red'>Wrong Username or Password</h3>"; 

    }
    

?>

