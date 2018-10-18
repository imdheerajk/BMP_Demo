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
$STATUS = '2';

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

$CHECK_CAR = "SELECT * FROM `booking_entry` where user_id = '$user_id' and status = '1'";

$RUN_Q = mysql_query($CHECK_CAR);
$FET_Q = mysql_fetch_assoc($RUN_Q);
$STATUS_SPOT = $FET_Q['status'];
$PARKING_SPACE = $FET_Q['parking_space'];
$BOOKING_ID = $FET_Q['id'];

$GET_SENSOR = mysql_query("SELECT sensor_id FROM `parking_map` where parking_space = '$PARKING_SPACE'");
$FET_SENSOR = mysql_fetch_assoc($GET_SENSOR);
$SENSOR_ID = $FET_SENSOR['sensor_id'];

$GET_LATEST_READING = mysql_query("SELECT reading FROM `sensor_data` where sensor_id = '$SENSOR_ID' order by insert_time desc limit 1");
$FET_READING = mysql_fetch_assoc($GET_LATEST_READING);
$LATEST_READ = $FET_READING['reading'];

if($STATUS_SPOT == 1)
{
    if($LATEST_READ < 21)
    {
        $UPDATE_STATUS = "UPDATE `booking_entry` SET `status` = '2' WHERE `id` = '$BOOKING_ID';";
        $RUN_UPDATE = mysql_query($UPDATE_STATUS);
    }
}

$SELECT = "SELECT duration, insert_time, parking_space, parking_lot_id, id FROM `booking_entry` WHERE user_id ='$user_id' and status = '$STATUS'";

$RUN_SELECT = mysql_query($SELECT);
if(mysql_num_rows($RUN_SELECT) > 0)
{
    ?>
<div class='table-responsive' >
    <center>
        <table class='table table-bordered' style="width:70%">
            <tr>
                <th colspan="4" style="text-align: center">Current Booking</th>
            </tr> 
            <tr>
                <th>Parking Area</th>
                <th>Spot No.</th>
                <th>Booking time</th>
                <th>Exit?</th>
            </tr>
<?php
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
                <td><?php echo $LOT_NAME; ?></td>
                <td><?php echo $PARKING_SPACE; ?></td>
                <td><?php echo date("jS M H:i",  strtotime($INSERT_TIME)); ?></td>
                <td><input type="button" class="btn-primary" value="Exit" onclick="go()"/></td>
            </tr>
        
<?php
   
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
    window.location.replace("current_booking.php?page=2&id=<?php echo $BOOKING_ID;  ?>");
}
else {
    //some code
}
    }
</script>
            <?php
}
 else {
    echo "<h2> No Currently parked vehicles</h2>";
     
 }