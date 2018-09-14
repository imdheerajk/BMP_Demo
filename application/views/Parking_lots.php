<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<style>
.vl {
    border-left: 6px solid green;
    height: 300px;
}
hr.vertical {
    height:100%; /* you might need some positioning for this to work, see other questions about 100% height */
    width:0;
    border:1px solid black;
}



</style>
<center><h3><?php echo $PARKING_NAME; ?></h3></center>
<div style="float:left; margin-left: 200px">
    <a href="make_booking.php?pid=1">
        <canvas id="p01" width="180" height="100" style="border:1px solid #000000;background-image:url('<?php echo $PARKING_STATUS1; ?>')"></canvas>
    </a>
    <br>
    <a href="make_booking.php?pid=2">
        <canvas id="p02" width="180" height="100" style="border:1px solid #000000;background-image:url('<?php echo $PARKING_STATUS2; ?>')"></canvas>
    </a>
    <br>
    <a href="make_booking.php?pid=3">
        <canvas id="p03" width="180" height="100" style="border:1px solid #000000;background-image:url('<?php echo $PARKING_STATUS3; ?>')"></canvas>
    </a>
    <br>
    <a href="make_booking.php?pid=4">
    <canvas id="p04" width="180" height="100" style="border:1px solid #000000;background-image:url('<?php echo $PARKING_STATUS4; ?>')"></canvas>
    </a>
</div>
<div style="float:right; margin-right: 200px">
    <a href="make_booking.php?pid=5">
    <canvas id="p05" width="180" height="100" style="border:1px solid #000000;background-image:url('<?php echo $PARKING_STATUS5; ?>')" ></canvas>
    </a>
    <br>
    <a href="make_booking.php?pid=6">
    <canvas id="p06" width="180" height="100" style="border:1px solid #000000;background-image:url('<?php echo $PARKING_STATUS6; ?>')"></canvas>
    </a>
    <br>
    <a href="make_booking.php?pid=7">
    <canvas id="p07" width="180" height="100" style="border:1px solid #000000;background-image:url('<?php echo $PARKING_STATUS7; ?>')"></canvas>
    </a>
    <br>
    <a href="make_booking.php?pid=8">
    <canvas id="p08" width="180" height="100" style="border:1px solid #000000;background-image:url('<?php echo $PARKING_STATUS8; ?>')"></canvas>   
    </a>
</div>

