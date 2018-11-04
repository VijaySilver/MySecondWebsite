<html>
<head>
<title> Fuel Maintanence </title>
</head>
<?php
  session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
  ?> 
<body bgcolor="#E6E6FA">
<h1>Fuel and Maintenance</h1>
<form action="addfueldetails.php" method="POST">
<br>
Vehicle Name: <input type="text" name="vname" value="" required="required"></input>
Vehicle Registration: <input type="text" name="vnum" value="" required="required"></input> <br><br>
<h3><u>Analysis Info</u></h3> <br>
Primary Odometer: <input type="text" name="primmeter" value="" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Start Odometer:<input type="text" name="startodo" value="" />
<h3><u>Fuel Details</u></h3> <br>
Fuel Used:<select name="fuel">
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
</select>
Fuel Tank Capacity:<input type="text" name="tankcap" value="" />
<h3><u>Preventive Maintenance</u></h3> <br>
Schedule: <select name="sch"> <option value="quarter">Quarterly</option>
<option value="half">Half-Yearly</option>
<option value="month">Monthly</option></select>
Current Mileage:<input type="text" name="currmil" value="" /><br/><br/>
Base Mileage: <input type="text" name="basemil" value="" />
Recorded Date: <input type="date" id="datepicker" name='dateofrec' size='9' value="" /><br/><br/>
<input type="submit" value="Save"/><br><br>
</form>
</body>
</html>