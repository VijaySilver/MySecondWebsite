<html>
<head>
<title> Work Order Tasks </title>
<link rel="stylesheet" href="cssforpages/TableCSSCode.css" type="text/css"/>
<link rel="stylesheet" href="cssforpages/table.css" type="text/css"/>
</head>
<?php
  session_start();
  if($_SESSION['user']){
  }
  else{
    header("location:index.php");
  }
?>
<body bgcolor="#E6E6FA">

<h1>Work Order Tasks</h1>

<p><a href="masterpage.php">Back to home page!</a></p>
<form action="addtask.php" method="POST">
<h3><u>Task Details</u></h3><br>
Task No: <input type="text" name="taskno" value="<?php echo(mt_rand(150,10000)); ?>" required="required" />
Service/Maintenance Task:<select name="partofvh" required="required">
<option value="Change the engine oil">Change the engine oil</option>
<option value="Replace the oil filter">Replace the oil filter</option>
<option value="Replace the air filter">Replace the air filter</option>
<option value="Replace the fuel filter">Replace the fuel filter</option>
<option value="Replace the spark plugs">Replace the spark plugs</option>
<option value="Tune the engine">Tune the engine</option>
<option value="Top up windscreen washer fluid">Top up windscreen washer fluid</option>
<option value="Top up coolant levels and check strength and condition">Top up coolant levels and check strength and condition</option>
<option value="Check shock absorbers">Check shock absorbers</option>
<option value="Check level and refill brake fluid">Check level and refill brake fluid</option>
<option value="Check level and refill power steering fluid">Check level and refill power steering fluid</option>
<option value="Check level and refill Automatic Transmission Fluid">Check level and refill Automatic Transmission Fluid</option>
<option value="Grease and lubricate components">Grease and lubricate components</option>
<option value="Inspect and replace the timing belt if needed">Inspect and replace the timing belt if needed</option>
<option value="Check tyres (tread & pressure)">Check tyres (tread & pressure)</option>
<option value="Inspect Clutch">Inspect Clutch</option>
<option value="Inspect Gearbox">Inspect Gearbox</option>
<option value="Test Car Battery">Test Car Battery</option>
<option value="Inspect Engine components">Inspect Engine components</option>
</select>
<br/><br/>
Vehicle Name: <input type="text" name="vname" value="" required="required"></input>
Vehicle Registration: <input type="text" name="vid" value="" required="required"></input><br/><br/>
<h3><u>Task Management </u></h3>
<div class="CSS_Table_Example" style="width:800px;height:150px;display: inline-block;">

<table border="1" >
<tr>
<td> Due Date </td>
<td> Scheduled Date </td>
<td> Assigned Employee </td>
<td> Employee ID </td>
</tr>
<tr>
<th><input type="date" id="datepicker" name='dateofcomp' size='9' value="" required="required"/> </th>
<th> <input type="date" id="datepicker" name='datefixed' size='9' value="" required="required"/> </th>
<th> <input type="text" name="assemp" value="" required="required"/> </th> 
<th> <input type="text" name="empid" value="" required="required"/></th>
</tr>
</table> 
</div>
<div class="CSSTableGenerator" style="width:300px;height:250px;float: left;">
<table border="1px" >
      <tr>
        <td>Name</td>
        <td>Emp ID</td>
        <td>Select Employee</td>
              </tr>
      <?php
        mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
        mysql_select_db("search_data") or die("Cannot connect to database"); //connect to database
        $query = mysql_query("Select * from workshopstaff"); // SQL Query
        while($row = mysql_fetch_array($query))
        {
          Print "<tr>";
            Print '<td align="center">'. $row['Name'] . "</td>";
            Print '<td align="center">'. $row['empid'] . "</td>";
            Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">Select</a> </td>';
				Print "</tr>";
        }
      ?>
    </table>
    </div>
    <br/><br/>
    <br/>



<h3><u>Spares Required/ Other Requirements</u></h3>
Spare Part/ Others: <input type="text" name="part" value="" /><br/><br/>
Quantity: <input type="text" name="quant" value="" /><br/><br/>
<br/><br/>
<input type="submit" name="sendtask" value="Assign Task" />

</form>
</body>
</html>
<script>
      function myFunction(id)
      {
      var r=confirm("Are you sure you want to Select this employee?");
      if (r==true)
        {
          window.location.assign("selectworkerfortask.php?id=" + id);
        }
      }
    </script>
