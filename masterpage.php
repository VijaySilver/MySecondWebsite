<html>
<head>
<title> Fleet Manager </title>
<link rel="stylesheet" href="cssforpages/TableCSSCode.css" type="text/css"/>
</head>
<style type="text/css">
h1 {
    color: #0033CC;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif
}
h3 {
    color : #990066;
font-family: "Comic Sans MS", cursive, sans-serif
}
</style>
<?php
  session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
  ?>
<body bgcolor="FFFF99">
<h1 align="center"><u><i>Welcome Master</i></u></h1>
<h3>Hello <?php Print "$user"?>!</h3> <!--Displays user's name-->
<h3 align="right"><a href="logout.php">Click here to logout</a></h3>
<div class="CSSTableGenerator" style="width:1000px;height:250px;">
<table style="width:100%" >
<td><h2><u>My Pages</u></h2></td>
<tr>
<td><h3><a href="cars.php" >Vehicle Details</a></h3></td>
<td><h3><a href="purchasedetails.php" target="new">Purchase Details</a></h3></td>
<td><h3><a href="fuelandmaintenance.php" target="new">Fuel and Maintenance</a></h3></td>
<td><h3><a href="fuellog.php" target="new">Fuel Log</a></h3></td>
<td><h3><a href="workordertasks.php" target="new">Work Order Tasks</a></h3></td>
<td><h3><a href="driverdetails.php" target="new">Driver Info</a></h3></td>
</tr>
</table>
</div>
<!--<iframe src="vehicledetails.php" name="pagedisplay" height="400" width="1300" sandbox="allow-same-origin allow-scripts allow-popups allow-top-navigation">
  <p>Your browser does not support iframes.</p>
</iframe> -->

<h3 align="center"><u>Vehicles Purchased</u></h2>
<h5 align="center">Click on "Purchase Details" to enter section</h5>
<div class="CSSTableGenerator" style="width:1000px;height:250px;">
    <table border="1px" width="100%">
      <tr>
        <td>S.No</td>
        <td>Name</td>
        <td>Registration No.</td>
        <td>Purchased From</td>
        <td	>Date of purchase</td>
      </tr>
      <?php
        mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
        mysql_select_db("search_data") or die("Cannot connect to database"); //connect to database
        $query = mysql_query("Select * from vehicledata"); // SQL Query
        while($row = mysql_fetch_array($query))
        {
          Print "<tr>";
            Print '<td align="center">'. $row['id'] . "</td>";
            Print '<td align="center">'. $row['vehiclename'] . "</td>";
            Print '<td align="center">'. $row['registrationnum'] ."</td>";
            Print '<td align="center">'. $row['purchasefrom'] ."</td>";
            Print '<td align="center">'. $row['dateofpurchase'] ."</td>";
          Print "</tr>";
        }
      ?>
    </table>
    </div>

<h3 align="center"><u>Technical Details of vehicles purchased</u></h3>
<h5 align="center">Click on "Vehicle Details" to view section</h5>
<div class="CSSTableGenerator" style="width:1000px;height:250px;">
    <table border="1px" width="100%">
      <tr>
        <td>S.No</td>
        <td>Name of vehicle</td>
        <td>Registration No.</td>
        <td>Manufacturer</td>
        <td>edit</td>
      </tr>
      <?php
        mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
        mysql_select_db("search_data") or die("Cannot connect to database"); //connect to database
        $query = mysql_query("Select * from vehicledata"); // SQL Query
        while($row = mysql_fetch_array($query))
        {
          Print "<tr>";
            Print '<td align="center">'. $row['id'] . "</td>";
            Print '<td align="center">'. $row['vehiclename'] . "</td>";
            Print '<td align="center">'. $row['registrationnum'] ."</td>";
            Print '<td align="center">'. $row['manufacturer'] ."</td>";
            Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
          Print "</tr>";
        }
      ?>
    </table>
    </div>
    
<h3 align="center"><u>Drivers</u></h3>
<h5 align="center">Click on "Driver Details" to view section</h5>
<div class="CSSTableGenerator" style="width:1000px;height:250px;">
    <table border="1px" width="100%">
      <tr>
        <td>S.No</td>
        <td>Name of the Driver</td>
        <td>Driving License No.</td>
      </tr>
      <?php
        mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
        mysql_select_db("search_data") or die("Cannot connect to database"); //connect to database
        $query = mysql_query("Select * from driverinfo"); // SQL Query
        while($row = mysql_fetch_array($query))
        {
          Print "<tr>";
            Print '<td align="center">'. $row['id'] . "</td>";
            Print '<td align="center">'. $row['name'] . "</td>";
            Print '<td align="center">'. $row['license_id'] ."</td>";
          Print "</tr>";
        }
      ?>
    </table>    
    </div>
    
</body>
</html>