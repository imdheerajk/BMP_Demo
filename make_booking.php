<?php

require './utility/session.php';
include_once 'header.php';
$user_id=$_SESSION["id"];
$PID = $_GET['pid'];
$PARKING_SPACE = "P0".$PID;
include_once './utility/connection.php';
//echo "SELECT status from booking_entry where parking_space = '$PARKING_SPACE' order by insert_time desc limit 1;";
$GET_STATUS = mysql_query("SELECT status from booking_entry where parking_space = '$PARKING_SPACE' order by insert_time desc limit 1;");
$FET_STATUS = mysql_fetch_assoc($GET_STATUS);
$SPACE_STATUS = $FET_STATUS['status'];
if($SPACE_STATUS == 1 || $SPACE_STATUS == 2)
{
    echo "<h3>Slot is already booked, Please select another block</h3>";
}
else
{
    
    if($SPACE_STATUS == "")
    {
        echo "<h3>Slot is disabled, Please select another block</h3>";
    }
    else 
    {
         $GET_SENSOR_ID = mysql_query("SELECT sensor_id FROM `parking_map` where parking_space = '$PARKING_SPACE'");
         $FET_ID = mysql_fetch_assoc($GET_SENSOR_ID);
         $SENSOR_ID = $FET_ID['sensor_id'];
        $CHECK_SENSOR = mysql_query("SELECT id FROM `sensor_data` where sensor_id ='$SENSOR_ID' order by insert_time desc limit 1");
    if(mysql_num_rows($CHECK_SENSOR) == 1)
    {



    ?>
    <script>
        var price = '';
        var price_per_hour = '2';
        function duration_function()
        {

            var duration = document.getElementById("duration").value;
            price = duration * price_per_hour;
    //      alert (price);
          document.getElementById("response_price").innerHTML = "CAD "+price;
        }

        function validate1()
        {

          var duration = document.getElementById("duration").value;

          var card_name = document.getElementById("card_name").value;
          var ccno = document.getElementById('ccno').value;
          var exp_day = document.getElementById("exp_day").value;
          var exp_month = document.getElementById("exp_month").value;
          var cvv = document.getElementById("cvv").value;

          var error="";
          if(duration == '')
          {
              error ="Please Select duration\n";
          }
          if(card_name == '')
          {
              error += "Enter Name on card\n";
          }
          if(ccno == '')
          {
               error += "Enter card no.\n";
          }
          if(exp_day == '')
          {
               error += "Enter card expiry day\n";
          }
          if(exp_month == '')
          {
               error += "Enter card expiry month no.\n";
          }
          if(cvv == '')
          {
               error += "Enter card CVV no.\n";
          }


          if (error!="")
            {
                alert(error);
                return false;
            }

            if(error == "")
            {
                document.book_form.action="booking_confirmation.php";
                document.book_form.method="POST";
                document.book_form.submit();
            }

        }

    </script>

    <center>
        <form name="book_form" id ="book_form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="pid" id="pid" value="<?php echo $PID; ?>"
    <div style="width:500px;">
    <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
    <table style="alignment-adjust: center;width: 60%" class='table table-bordered'>
        <tr>
            <td colspan="2" style="text-align: center"><strong>Book Parking Space P0<?php echo $_GET['pid']; ?></strong></td>
    </tr>
    <tr>
        <td style="width: 40%" ><label>Duration</label><p style="color: red; display:inline;">*</p></td>
    <td width="60%">
        <select class="form-control" name="duration" id="duration" onchange="duration_function()">
          <option value="">Select</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
          <option value="4">Four</option>
        </select>
    </td>
    </tr>
    <tr>
    <td><label>Total Price</label></td>
    <td><div id="response_price">CAD</div>
        <?php

    ?>
        <!--<script>document.write(price);</script></td>-->
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">
            <b>Payment Details</b>
        </td>
    </tr>
    <tr>
    <td><label>Name on Card</label><p style="color: red; display:inline;">*</p></td>
    <td><input class="form-control" type="text" name="card_name" id="card_name" class="txtField" /></td>
    </tr>
    <tr>
    <td><label>Credit/Debit card no.</label><p style="color: red; display:inline;">*</p></td>
    <td><input class="form-control" type="number" name="ccno" id="ccno" class="txtField" maxlength="16"/></td>
    </tr>
    <tr>
    <td><label>Expiry date</label><p style="color: red; display:inline;">*</p></td>
    <td>
        <select  name="exp_month" id="exp_month">
          <option value="">Exp month</option>
          <option value="1">Jan</option>
          <option value="2">Feb</option>
          <option value="3">Mar</option>
          <option value="4">Apr</option>
          <option value="4">May</option>
          <option value="4">Jun</option>
          <option value="4">Jul</option>
          <option value="4">Aug</option>
          <option value="4">Sept</option>
          <option value="4">Oct</option>
          <option value="4">Nov</option>
          <option value="4">Dec</option>
        </select>
        <select  name="exp_day" id="exp_day">
          <option value="">Exp Year</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
          <option value="2026">2026</option>
          <option value="2027">2027</option>
          <option value="2028">2028</option>

        </select>

    </td>
    </tr>
    <tr>
    <td><label>CVV</label><p style="color: red; display:inline;">*</p></td>
    <td><input class="form-control" type="cvv" name="cvv" id="cvv" class="txtField" maxlength="16"/></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">
            <input class='btn btn-default' type="button" name="Submit" value="Submit" onclick="validate1()" />
            <!--<input type="submit" name="submit" value="Submit" class='btn btn-default' >-->
        </td>
    </tr>
        </table>
    </div>
    </form></center>
    <b>Note: &nbsp</b><p style="color: red; display:inline;">*</p>&nbsp Compulsory Fields
    <?php
    }
    else
    {
       echo "<h3>Under construction, Please select another block</h3>"; 
    }
     }

}

?>