<html>
<head>
<title> Purchase Details </title>
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
<form action="addpurchasedata.php" method="POST">
<h1><u>Purchase Details</u></h1>
<p><a href="http://www.w3schools.com">Back to home!</a></p>
Vehicle Name: <input type="text" name="vname" value="" required="required"></input>
Vehicle Registration: <input type="text" name="vnum" value="" required="required"></input> <br/><br/>
<h3><u>Purchase Details</u></h3><br/>
Purchase Date: <input type="date" id="datepicker" name='dateofpur' size='9' value="" />
Purchased From: <input type="text" name="purfrom" value=""></input><br/><br/>
Purchase Invoice: <input type="text" name="purinv" value=""></input>
Purchase Value: <input type="text" name="purval" value=""></input><br/><br/>
Odometer at Purchase:<input type="text" name="odo" value=""></input>
<h3><u>Warranty Expiry</u></h3>
Date: <input type="date" id="datepicker" name='dateofexp' size='9' value="" />
[or]Mileage: <input type="text" name="mileageexp" value=""/><br/><br/>
<h3><u>Financial Details</u></h3>
Depreciation in %:<select name="deppercent">
<option value="15%">15 %</option>
<option value="7.5%">7.5%</option>
</select>
Depreciation Period:<select name="periodofdep">
<option value="3 years">3 years</option>
<option value="5 years">5 years</option>
</select><br><br>
<input type="submit" value="Save"/><br><br>
</form>
</body>
<h3 align="center"><u>Details of vehicles</u></h2>
    <table border="1px" width="100%">
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Registration No.</th>
        <th>Purchased From</th>
        <th>Date of purchase</th>
        <th>Edit</th>
        <th>Delete</th>
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
            Print '<td align="center">'. $row['purchasefrom'] ."</td>";
            Print '<td align="center">'. $row['dateofpurchase'] ."</td>";
            Print '<td align="center"><a href="editpurchasedata.php?id='. $row['id'] .'">edit</a> </td>';
            Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
          Print "</tr>";
        }
      ?>
    </table>
 </html>
 <script>
      function myFunction(id)
      {
      var r=confirm("Are you sure you want to delete this record?");
      if (r==true)
        {
          window.location.assign("deletevehicle.php?id=" + id);
        }
      }
    </script>
