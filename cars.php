<?php
###########################################################
/*
GuestBook Script
Copyright (C) 2014 StivaSoft ltd. All rights Reserved.


This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/gpl-3.0.html.

For further information visit:
http://www.phpjabbers.com/
info@phpjabbers.com

Version:  1.0
Released: 2014-08-26
*/
###########################################################

error_reporting(0);
include("options.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Car flip cards</title>
<link href='cars.css' rel='stylesheet' />

</head>


<body>
<?php
	$sql = "SELECT * FROM ".$SETTINGS["CARS"]."";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);

?>
	
<div class="container">
	<?php while ($row = mysql_fetch_assoc($sql_result)) { ?>
    <div class="card-container">
        <div class="card">
            <div class="front">
                <div class="cover">
					<img src="images/<?php echo $row['photo'] ?>">
				</div>
				<div class="content">
                    <div class="main">
                        <h3 class="name"><?php echo $row['title'] ?></h3>
                       
                        <div class="first float_left">
                        	<span class="icon_mileage"></span><?php echo $row['mileage'] ?>&nbsp;km
                        </div>
                        <div class="first">
                        	<span class="icon_power"></span><?php echo $row['top_speed'] ?>&nbsp;km/h
                        </div>
                        <div class="second float_left">
                        	<span class="icon_fuel"></span><?php echo $row['fuel'] ?>
                        </div>
                        
                        <div class="second">
                        	<span class="icon_gearbox"></span><?php echo $row['gearbox'] ?>
                        </div>
                    </div>
                    <div class="price">
                    	&euro;<?php echo $row['price'] ?>
                    </div> 
                </div>
            </div> <!-- end front panel -->
            <div class="back">
                <p>
                	<label class="title">Type</label>
                	<span class="value"><?php echo $row['car_type'] == 'new' ? 'New car' : 'Used car'?></span>
                </p>
                <p>
                	<label class="title">Make</label>
                	<span class="value"><?php echo stripcslashes($row['make']) ?></span>
                </p>
                <p>
                	<label class="title">Model</label>
                	<span class="value"><?php echo stripcslashes($row['model']) ?></span>
                </p>
                 <p>
                	<label class="title">Year</label>
                	<span class="value"><?php echo stripcslashes($row['year']) ?></span>
                </p>
                <p>
                	<label class="title">Mileage</label>
                	<span class="value"><?php echo stripcslashes($row['mileage']) ?></span>
                </p>
                <p>
                	<label class="title">Power</label>
                	<span class="value"><?php echo stripcslashes($row['power']) ?> hp</span>
                </p>
                <p>
                	<label class="title">Emission Class</label>
                	<span class="value"><?php echo stripcslashes($row['emission_class']) ?></span>
                </p>
                <p>
                	<label class="title">Color</label>
                	<span class="value"><?php echo stripcslashes($row['color']) ?></span>
                </p>
                <p>
                	<label class="title">Doors</label>
                	<span class="value"><?php echo stripcslashes($row['doors']) ?></span>
                </p>
                <p>
                	<label class="title">Fuel</label>
                	<span class="value"><?php echo stripcslashes($row['fuel']) ?></span>
                </p>
                <p>
                	<label class="title">Gearbox</label>
                	<span class="value"><?php echo stripcslashes($row['gearbox']) ?></span>
                </p>
                <p>
                	<label class="title">Number of seats</label>
                	<span class="value"><?php echo stripcslashes($row['number_of_seats']) ?></span>
                </p>
                <p>
                	<label class="title">Vehicle Type</label>
                	<span class="value"><?php echo stripcslashes($row['vehicle']) ?></span>
                </p>
                
                
            </div> <!-- end back panel -->
        </div> <!-- end card -->
    </div> <!-- end card-container -->
    <?php } ?>
</div>
</body>
</html>