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

if(isset($_GET['page']) )
{
    if($_GET['page'] == 2)
    {
        $BOOKING_ID = $_GET['id'];
        $UPDATE_ENTRY = "UPDATE `booking_entry` SET `status` = '3' WHERE `id` = '$BOOKING_ID'; ";
//                echo $UPDATE_ENTRY."--";
        $RUN_UPDATE = mysql_query($UPDATE_ENTRY);
    }
}


$STATUS = '1';

$SELECT = "SELECT duration, insert_time, parking_space, parking_lot_id, id FROM `booking_entry` WHERE user_id ='$user_id' and status = '$STATUS'";

$RUN_SELECT = mysql_query($SELECT);
if(mysql_num_rows($RUN_SELECT) > 0)
{
    ?>
<div class='table-responsive' >
    <center>
        <table class='table table-bordered' style="width:70%">
            <tr>
                <th colspan="5" style="text-align: center">Booking History</th>
            </tr> 
            <tr>
                <th>Sr. no</th>
                <th>Parking Area</th>
                <th>Spot No.</th>
                <th>Booking time</th>
                <th>Cancel Booking?</th>
                
            </tr>
<?php
    $COUNT = 1;
    while($FETCH_ENTRY = mysql_fetch_assoc($RUN_SELECT))
    {
       $INSERT_TIME =  $FETCH_ENTRY['insert_time'];
       $PARKING_SPACE = $FETCH_ENTRY['parking_space'];
       $LOT_ID = $FETCH_ENTRY['parking_lot_id'];
       
       $SELECT_INFO = mysql_query("SELECT name FROM `parking_lot_info` where id='$LOT_ID'");
       $FET_info = mysql_fetch_assoc($SELECT_INFO);
       $BOOKING_ID = $FETCH_ENTRY['id'];
       $LOT_NAME = $FET_info['name'];
       
       ?>

            <tr>
                <td><?php echo $COUNT; ?></td>
                <td><?php echo $LOT_NAME; ?></td>
                <td><?php echo $PARKING_SPACE; ?></td>
                <td><?php echo date("jS M H:i",  strtotime($INSERT_TIME)); ?></td>
                <td><input type="button" class="btn-primary" value="Cancel Booking" onclick="go()"/></td>
            </tr>
<?php
       
    $COUNT++;   
       
    }
    ?>
                    </table>
    </center>
</div>
<script>
    function go()
    {
        var answer = confirm("Are you sure?")
if (answer) {
    window.location.replace("cancel_parking.php?page=2&id=<?php echo $BOOKING_ID;  ?>");
}
else {
    //some code
}
    }
</script>
            <?php
}
 else {
    echo "<h2> No Bookings to cancel</h2>";
     
 }