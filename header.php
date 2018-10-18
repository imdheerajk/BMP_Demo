<?php 
       
    require_once './utility/session.php';
    
    
?>

<?php 
$user_id=$_SESSION['id'];
//echo $user_id;
include_once './utility/connection.php';
 
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>BMP</title>


<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/sb-admin.css" rel="stylesheet">
<link href="css/plugins/morris.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<link href="css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <div id="wrapper"style="background-color: #ffffff" >
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #ffffff" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <font size="6"><a style="color: #000 "   class="navbar-brand" href="home_map.php">BooK My Parking</a></font> 
                <img src="images/logo_bmp.png" alt="BMP Logo" style="height: 50px; width: 50px">
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
          
               
                <li class="dropdown">
                    <a style="color: #000" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                                            <?php
                                            
                                            echo $_SESSION['name'];
                                            
                                            ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
<!--                        <li>
                            <a href="./profileEdit.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
-->                          <li>
                            <a href="user_profile.php"><i class="fa fa-fw fa-user"></i> View Profile</a>
                        </li><!--
-->                        <li>
                            <a href="chngPass.php"><i class="fa fa-fw fa-gear"></i> Edit Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
         
           
      </nav>
     
     <div class="navbar navbar-inverse">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"></a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul  class="nav navbar-nav">
                                <li class=""  ><a href="home_map.php"><strong>Home</strong></a>
                                    
                                </li>
                                <!--<li class=""><a href="#"  class="dropdown-toggle" data-toggle="dropdown"><strong>Tickets<b class="caret"></strong></b></a>-->
<!--                                    <ul class="dropdown-menu">
                                        <li><a href="search.php">Search By TicketID</a>
                                        </li>
                                        <li><a href="searchDateInterface.php">Search Between Dates</a>
                                        </li>
                                        
                                    </ul>-->
<li class="<?php //echo $c ?>"  ><a href="contact_us.php"><strong>Contact Us</strong></a>
                                </li>
                                <li class="<?php //echo $d ?>"  ><a href="about_us.php"><strong>About Us</strong></a>
                                </li>
<!--                                <li class="<?php //echo $d ?>"  ><a href="view_work.php"><strong>View Work</strong></a>
                                </li>-->
                               
                               
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
     <div id="page-wrapper">

            <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    
                                    <div class="col-xs-9 ">
                                        <div class="huge    " class="pull-left">Book Parking</div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <a href="home_map.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Click here</span>
                                     <span class="pull-right"><i class="fa fa-arrow-circle-o-down"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                      
                      <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    
                                    <div class="col-xs-9 text-left">
                                        <div class="huge">Current Booking</div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <a href="current_booking.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Click here</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-o-down"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                       
                    </div>
                      
                      
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    
                                    <div class="col-xs-9 ">
                                        <div class="huge">View History</div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <a href="parking_history.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Click here</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-o-down"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    
                                    <div class="col-xs-9 ">
                                        <div class="huge">Cancel Bookings</div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <a href="cancel_parking.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Click here</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-o-down"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
 
                </div>
                <div class="row" >
                    <div class="col-lg-12">
                        <div class="panel panel-default" height="350px">
<!--                            <div class="panel-heading">
                                <h3 class="panel-title">hiijiahai </h3>
                            </div>-->
                            <div class="panel-body" >
                                <div class="panel-body" >
                                    

           
             
              <script type="text/javascript">
// create the back to top button
$('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

var amountScrolled = 300;

$(window).scroll(function() {
	if ($(window).scrollTop() > amountScrolled) {
		$('a.back-to-top').fadeIn('slow');
	} else {
		$('a.back-to-top').fadeOut('slow');
	}
});

$('a.back-to-top, a.simple-back-to-top').click(function() {
	$('body').animate({
		scrollTop: 0
	}, 'fast');
	return false;
});
</script>                    

             
        
   