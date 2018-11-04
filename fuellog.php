<html>
<head>
<title> Fuel Log Entry </title>
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
<h1>Fuel Log Entry</h1>
<p><a href="http://www.w3schools.com">Back to home page!</a></p>
<form action="addfuellog.php" method="POST">
<h3><u>Fuel and Maintenance</u></h3><br>
Vehicle Name: <input type="text" name="vname" value="" required="required"></input>
Vehicle Registration: <input type="text" name="vnum" value="" required="required"></input> <br><br>
<h3><u>Fuelling Info</u></h3> <br>
Date: <input type="date" id="datepicker" name='dateoffuel' size='9' value="" />
Quantity: <input type="text" name="fuelquant" value="" /><br/><br/>
Total Cost: <input type="text" name="costfuel" value="" /> 
Cost per litre: <input type="text" name="litrecost" value="" /><br/><br/>
Fuel Card No: <input type="text" name="cardno" value="" />
Name of bunk: <input type="text" name="bunkname" value="" /><br/><br/>
Driver ID: <input type="text" name="driverid" value="" /><br/><br/>
<input type="submit" value="Save"/><br><br>
</form>
</body>
</html>

