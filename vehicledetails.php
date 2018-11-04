<!DOCTYPE html>
<html>
<head><title>Vehicle Details</title>
</head>
<!--<meta http-equiv="refresh" content="10" > -->
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
<form action="addvehicle.php" method="POST">
<h3><u>Vehicle Details</u></h3><br>
Vehicle Name: <input type="text" name="vname" value="" required="required" placeholder="Enter vehicle's name"></input>
Vehicle Registration: <input type="text" name="vnum" value="" required="required"></input> <br><br>
<h3><u>Manufacturer Details</u></h3> <br>
Manufacturer: <input type="text" name="manuf" value="" />
Year : <input type="text" name="yearofman" value=""></input><br><br>
Model: <input type="text" name="model" value=""></input>
Product Serial#:<input type="text" name="serial" value=""></input><br><br>
Class:<input type="text" name="class" value=""></input><br><br>
<h3>Current Details</h3><br>
Status: <select name="status">
<option value="Under Maintenance">Under Maintanence</option>
<option value="Active">Active</option>
</select><br><br>
<input type="submit" value="Save"/><br><br>
</form>

<form action="uploadfile.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>

<h3 align="center"><u>My list of vehicles</u></h2>
    <table border="1px" width="100%">
      <tr>
        <th>S.No</th>
        <th>Name of vehicle</th>
        <th>Registration No.</th>
        <th>Status</th>
        <th>edit</th>
      </tr>
      <?php
        mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
        mysql_select_db("search_data") or die("Cannot connect to database"); //connect to database
        $query = mysql_query("Select * from vehicledata"); // SQL Query
        while($row = mysql_fetch_array($query))
        {
          Print "<tr>";
            Print '<td align="center">'. $row['id'] . "</td>";
            Print '<td align="center">'. $row['name'] . "</td>";
            Print '<td align="center">'. $row['registrationnum'] ."</td>";
            Print '<td align="center">'. $row['curstatus'] ."</td>";
            Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
          Print "</tr>";
        }
      ?>
    </table>
 </html>