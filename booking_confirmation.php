<?php

require_once './utility/session.php';
require_once './utility/connection.php';
$PARKING_LOT = $_SESSION['PARKING_ID'];
$PID = "P0".$_POST['pid'];
$STATUS = "1"; //BOOKED/BLOCKED
$USER_ID = $_SESSION['id'];
$DURATION = $_POST['duration'];
$CURRENT_TIME = date('Y-m-d H:i:s');
$OUT_TIME = date('Y-m-d H:i:s', strtotime('+'.$DURATION .' hours'));

echo $CURRENT_TIME."==".$OUT_TIME;


$INSERT_QUERY = "INSERT INTO `booking_entry` (`user_id`, `duration`, `insert_time`, `out_time`, `status`, `parking_space`, `parking_lot_id`) "
        . "VALUES ('$USER_ID', '$DURATION', '$CURRENT_TIME', '$OUT_TIME', '$STATUS', '$PID', '$PARKING_LOT');";

$RUN_INSERT = mysql_query($INSERT_QUERY);
header('Location: home_bmp.php?pageid=1');

