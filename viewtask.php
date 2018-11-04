<html>
  <head>
    <title>View My Tasks</title>
  </head>
  <?php
  session_start(); //starts the session
  if($_SESSION['worker']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $worker = $_SESSION['worker']; //assigns user value
  $id_exists = false;
  ?>
  <body>
    <h2>View My Tasks</h2>
    <p>Hello <?php Print "$worker"?>!</p> <!--Displays user's name-->
    <a href="workershome.php">Back to my home page</a><br/><br/>
    <a href="logout.php">Click here to logout</a><br/><br/>
    <h2 align="center">Currently Selected</h2>
    <table border="1px" width="100%">
      <tr>
        <th>Name of Vehicle</th>
        <th>Registration Num</th>
        <th>Status</th>
      </tr>
      <?php
        if(!empty($_GET['id']))
        {
          $id = $_GET['id'];
          $_SESSION['id'] = $id;
          $id_exists = true;
          mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
          mysql_select_db("search_data") or die("Cannot connect to database"); //connect to database
          $query = mysql_query("Select * from workorders Where id='$id'"); // SQL Query
          $count = mysql_num_rows($query);
          if($count > 0)
          {
            while($row = mysql_fetch_array($query))
            {
              Print "<tr>";
                Print '<td align="center">'. $row['task_no'] . "</td>";
            Print '<td align="center">'. $row['task_desc'] ."</td>";
            Print '<td align="center">'. $row['duedate'] ."</td>";             
              Print "</tr>";
            }
          }
          else
          {
            $id_exists = false;
          }
        }
      ?>
    </table>
    <br/><br/><br/>
    <?php
    if($id_exists)
    {
          mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
          mysql_select_db("search_data") or die("Cannot connect to database"); //connect to database
          $query = mysql_query("Select * from workorders Where id='$id'"); // SQL Query
            while($row = mysql_fetch_array($query))
            {
            	?>
              <form action="respondtotask.php" method="POST">
              
<table border="1" >
<tr>
<th> Task Number </th> <th><?php echo $row['task_no']; ?></th>
</tr>
<tr>
<th> Task Status </th><th><?php echo $row['task_status']; ?></th>
</tr>
<tr>
<th> Task Description </th> <th> <?php echo $row['task_desc']; ?></th> 
</tr>
<tr>
<th> Vehicle Name </th> <th> <?php echo $row['vehicle_name']; ?></th>
</tr>
<tr>
<th> Vehicle Reg No </th> <th> <?php echo $row['registrationnum']; ?></th>
</tr>
<tr>
<th> Due Date </th> <th> <?php echo $row['duedate']; ?></th>
</tr>
<tr>
<th> Scheduled Date </th> <th> <?php echo $row['sch_date']; ?></th>
</tr>
<tr>
<th> Requirement </th> <th> <?php echo $row['spare_part']; ?></th>
</tr>
<tr>
<th> Quantity </th> <th> <?php echo $row['spare_quant']; ?></th>
</tr>
</table>               
              
<br/><br/>
<h3><u>Respond to the Work Order</u></h3>
Change Status to: <select name="status">
<option value="Accepted">Accepted</option>
<option value="Work Started">Work Started</option>
<option value="Pending">Pending</option>
<option value="Completed">Completed</option>
</select><br/><br/>
<input type="submit" value="Update List"/><br><br>
</form>
         <?php  
          }
    }
    else
    {
      Print '<h2 align="center">There is no data to be edited.</h2>';
    }
    ?>
  </body>
</html>

<?php
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
    mysql_select_db("search_data") or die("Cannot connect to database"); //Connect to database
    $vehname = mysql_real_escape_string($_POST['vname']);
$id = $_SESSION['id'];
  $vehreg = mysql_real_escape_string($_POST['vnum']);
  $vehmanuf = mysql_real_escape_string($_POST['manuf']);
  $year = mysql_real_escape_string($_POST['yearofman']);
  $vehmodel = mysql_real_escape_string($_POST['model']);
  $vehser = mysql_real_escape_string($_POST['serial']);
  $vehclass = mysql_real_escape_string($_POST['class']);
  $vehstatus = mysql_real_escape_string($_POST['status']);
    
    mysql_query("UPDATE vehicledata SET manufacturer='$vehmanuf', year='$year', model='$vehmodel', serial='$vehser', class='$vehclass', curstatus='$vehstatus' WHERE id='$id'") ;
    header("location: masterpage.php");
  }
?>
