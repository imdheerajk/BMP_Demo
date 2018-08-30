<?php

/* 
 * Authour=Ankit Chaurasia	
 * Date=10/6/2015  * 
 */

 define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER','ats_admin');
define('DB_PASSWORD','ats_admin');
$con=mysql_pconnect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
 
