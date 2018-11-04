<html>
  <head>
    <title>My first PHP website</title>
  </head>
  <?php
  session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
  $id_exists = false;
  ?>
  <body>
    <h2>Home Page</h2>
    <p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
    <a href="logout.php">Click here to logout</a><br/><br/>
    <a href="vehicledetails.php" >Return to Vehicles Info page</a>
    <h2 align="center">Currently Selected</h2>
    <table border="1px" width="100%">
      <tr>
        <th>ID</th>
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
          $query = mysql_query("Select * from vehicledata Where id='$id'"); // SQL Query
          $count = mysql_num_rows($query);
          if($count > 0)
          {
            while($row = mysql_fetch_array($query))
            {
              Print "<tr>";
                Print '<td align="center">'. $row['id'] . "</td>";
                Print '<td align="center">'. $row['name'] . "</td>";
                Print '<td align="center">'. $row['registrationnum']. "</td>";
					 Print '<td align="center">'. $row['curstatus']. "</td>";             
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
    <br/>
    <?php
    if($id_exists)
    {
          mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
          mysql_select_db("search_data") or die("Cannot connect to database"); //connect to database
          $query = mysql_query("Select * from vehicledata Where id='$id'"); // SQL Query
            while($row = mysql_fetch_array($query))
            {
            	?>
              <form action="edit.php" method="POST">
<h3><u>Vehicle Details</u></h3><br>
Vehicle Name: <input type="text" name="vname" value="<?php echo( htmlspecialchars( $row['name'] ) ); ?>" disabled />
Vehicle Registration: <input type="text" name="vnum" value="<?php echo( htmlspecialchars( $row['registrationnum'] ) ); ?>" disabled /><br><br>
<h3><u>Manufacturer Details</u></h3> <br>
Manufacturer: <input type="text" name="manuf" value="<?php echo( htmlspecialchars( $row['manufacturer'] ) ); ?>" />
Year : <input type="text" name="yearofman" value="<?php echo( htmlspecialchars( $row['year'] ) ); ?>"/><br><br>
Model: <input type="text" name="model" value="<?php echo( htmlspecialchars( $row['model'] ) ); ?>"/>
Product Serial#:<input type="text" name="serial" value="<?php echo( htmlspecialchars( $row['serial'] ) ); ?>"/><br><br>
Class:<input type="text" name="class" value="<?php echo( htmlspecialchars( $row['class'] ) ); ?>"/><br><br>
<h3>Current Details</h3><br>
Status: <select name="status">
<option value="Under Maintenance">Under Maintanence</option>
<option value="Active">Active</option>
</select><br><br>
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
