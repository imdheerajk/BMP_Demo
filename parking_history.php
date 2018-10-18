<?php

require './utility/session.php';
include_once 'header.php';
$user_id=$_SESSION["id"];
include_once './utility/connection.php';
$STATUS = '3';

$SELECT = "SELECT duration, insert_time, parking_space, parking_lot_id, id FROM `booking_entry` WHERE user_id ='$user_id' and status = '$STATUS'";

$RUN_SELECT = mysql_query($SELECT);
if(mysql_num_rows($RUN_SELECT) > 0)
{
    ?>
<div class='table-responsive' >
    <center>
        <table class='table table-bordered' style="width:70%">
            <tr>
                <th colspan="4" style="text-align: center">Booking History</th>
            </tr> 
            <tr>
                <th>Sr. no</th>
                <th>Parking Area</th>
                <th>Spot No.</th>
                <th>Booking time</th>
                
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
            </tr>
<?php
       
    $COUNT++;   
       
    }
    ?>
                    </table>
    </center>
</div>
            <?php
}
 else {
    echo "<h2> No History</h2>";
     
 }