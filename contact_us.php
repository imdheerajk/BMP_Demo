<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require './utility/session.php';
include_once 'header.php';
$user_id=$_SESSION["id"];


include_once './utility/connection.php';
echo '<center><h3>Our Team</h3></center>';
//echo "<b>Dheeraj</b><br> dbk858@uregina.ca<br> 306-209-5997";
?>
<center>
<table style="border-collapse: separate; border-spacing: 80px;">
    <tr><td><b>Dheeraj</b><br> dbk858@uregina.ca<br> 306-209-5997</td>
        <td><b>Nikhil</b><br> dbk858@uregina.ca<br> 306-209-5997</td>
        <td><b>Abhijit</b><br> dbk858@uregina.ca<br> 306-209-5997</td></tr>
</table>
</center>
