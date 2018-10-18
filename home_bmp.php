<?php

require './utility/session.php';
include_once 'header.php';
$user_id=$_SESSION["id"];


include_once './utility/connection.php';
if(isset($_GET['pageid']))
{
    echo"<center><h3 style='color: green;'>Booked successfully</h3></center>";
}

if(isset($_GET['pos']))
{
    if($_GET['pos'] == 1)
    {
        
      $PARKING_NAME = "University Parking Ridell Center 1" ;
      $_SESSION['PARKING_NAME'] = $PARKING_NAME;
      $_SESSION['PARKING_ID'] = "2";
    }
    if($_GET['pos'] == 2)
    {
      $PARKING_NAME = "Cornwall Center Parking" ; 
      $_SESSION['PARKING_NAME'] = $PARKING_NAME;
      $_SESSION['PARKING_ID'] = "1";
    }
    if($_GET['pos'] == 3)
    {
      $PARKING_NAME = "University parking Ridell Center 2 " ; 
      $_SESSION['PARKING_NAME'] = $PARKING_NAME;
      $_SESSION['PARKING_ID'] = "3";
    }
    if($_GET['pos'] == 4)
    {
      $PARKING_NAME = "Victoria mall Parking" ; 
      $_SESSION['PARKING_NAME'] = $PARKING_NAME;
      $_SESSION['PARKING_ID'] = "4";
    }
    if($_GET['pos'] == 5)
    {
      $PARKING_NAME = "Harbour Landing Parking" ; 
      $_SESSION['PARKING_NAME'] = $PARKING_NAME;
      $_SESSION['PARKING_ID'] = "5";
    }
    if($_GET['pos'] == 6)
    {
      $PARKING_NAME = "Golden Mile Parking" ; 
      $_SESSION['PARKING_NAME'] = $PARKING_NAME;
      $_SESSION['PARKING_ID'] = "6";
    }
    
}
$PARKING_NAME = $_SESSION['PARKING_NAME'];

$PARKING_LOT = '1';
$CURRENT_TIME = date('Y-m-d H:i:s');
$OCCUPIED = "images/red.PNG";
$AVAILABLE = "images/green.PNG";
$AVAILABLE_SOON = "images/yellow.PNG";
$NO_SENSOR_DATA = "images/no_data.jpg";
$UNDER_CONSTRUCTION = "images/no_data.PNG";
$BOOKED_CONFIRMED = "images/Block.PNG";
$BOOKED = "images/booked.png";
//$OCCUPIED = "OCCUPIED";
//$AVAILABLE = "AVAILABLE";
//$AVAILABLE_SOON = "AVAILABLE SOON";
//$NO_SENSOR_DATA = "NO SENSOR DATA";
//$UNDER_CONSTRUCTION = "BLOCKED";

$PARKING_STATUS = "PARKING_STATUS";
$FIND_ALL_SENSORS = mysql_query("SELECT * FROM `parking_map` WHERE parking_lot='$PARKING_LOT'");
$MAP_ARRAY = array();
$OCUNT = 1;
//echo ${"PARKING_STATUS$OCUNT"};
while($FETCH_SENSORS = mysql_fetch_assoc($FIND_ALL_SENSORS))
{
   
    
    $SPACE_NAME = $FETCH_SENSORS['parking_space'];
    $SENSOR_ID = $FETCH_SENSORS['sensor_id'];
    $MAP_ID = $FETCH_SENSORS['id'];
//    echo $MAP_ID;
    if ($SENSOR_ID == '')
    {
        ${"PARKING_STATUS$OCUNT"} = $AVAILABLE_SOON;
    }
    else 
    {
        
        //Get status from booking table
        
//       $SELCT_BOOKED = "SELECT * FROM `booking_entry` WHERE STATUS = 1";
//       $RUN_BOOKED = mysql_query($SELCT_BOOKED);
//       while($FET_BOOKED = mysql_fetch_assoc($RUN_BOOKED))
//       {
//           $BOOK_ID = $FET_BOOKED['id'];
//           $BOOKED_TIME = $FET_BOOKED['insert_time'];
//           $GET_SENSOR_DATA = "SELECT reading FROM `sensor_data` WHERE insert_time > '$BOOKED_TIME' order by insert_time desc limit 1;";
//           $RUN_SENSOR_DATA_QUERY = mysql_query($GET_SENSOR_DATA);
//           if(mysql_num_rows($RUN_SENSOR_DATA_QUERY) > 0)
//           {
//               $FET_SENSOR_DATA = mysql_fetch_assoc($RUN_SENSOR_DATA_QUERY);
//               
//               $SENSOR_DATA = $FET_SENSOR_DATA['reading'];
//               
//               if($SENSOR_DATA < 20)//parked
//               {
//                   ${"PARKING_STATUS$OCUNT"} = $OCCUPIED;
//               }
//               if($SENSOR_DATA > 20)
//               {
//                   
//                  ${"PARKING_STATUS$OCUNT"} = $BOOKED_CONFIRMED; 
//               }
//           }
//    
//       }
        
        //get the current status from sensor table
        $GET_LATEST_READING = mysql_query("SELECT reading FROM sensor_data where sensor_id='$SENSOR_ID' ORDER by insert_time DESC LIMIT 1");
        $rows=mysql_num_rows($GET_LATEST_READING);
        if($rows == 0)
        {
            ${"PARKING_STATUS$OCUNT"} = $NO_SENSOR_DATA;
        }
        else
        {
            $FETCH_READING = mysql_fetch_assoc($GET_LATEST_READING);
            $READING = $FETCH_READING['reading'];
           $GET_PAEKING_LOT = "SELECT parking_space FROM `parking_map` WHERE sensor_id = '$SENSOR_ID';";
//           echo "$GET_PAEKING_LOT";
           $RUN_QUERY = mysql_query($GET_PAEKING_LOT);
           $FET_SPACE = mysql_fetch_assoc($RUN_QUERY);
           $PAEKING_SPACE = $FET_SPACE['parking_space'];
//            echo $PAEKING_SPACE."---space";
            if($READING < 20)//busy
            {
                ${"PARKING_STATUS$OCUNT"} = $OCCUPIED;
            }
            elseif($READING > 20)
            {
                $CHECK_STATUS = "SELECT status FROM `booking_entry` WHERE parking_space = '$PAEKING_SPACE' ORDER BY insert_time desc limit 1";
              
                $RUN_STAUS = mysql_query($CHECK_STATUS);
                $FET_STATUS = mysql_fetch_assoc($RUN_STAUS);
                $BOOKING_STATUS = $FET_STATUS['status'];
                if($BOOKING_STATUS == '1')
                {
                    ${"PARKING_STATUS$OCUNT"} = $BOOKED;
                }
                else
                {
                    ${"PARKING_STATUS$OCUNT"} = $AVAILABLE;
                }
                

            }
        }
        //${"PARKING_STATUS$OCUNT"} = $AVAILABLE;
    }

    $OCUNT++;
}



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
