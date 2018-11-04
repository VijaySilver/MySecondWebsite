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
    <a href="vehicledetails.php" >Return to Purchase Info page</a>
    <h2 align="center">Currently Selected</h2>
    <table border="1px" width="100%">
      <tr>
        <th>ID</th>
        <th>Name of Vehicle</th>
        <th>Registration Num</th>
        <th>Date of Purchase</th>
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
					 Print '<td align="center">'. $row['dateofpurchase']. "</td>";             
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
              <form action="editpurchasedetails.php" method="POST">
<h3><u>Vehicle Details</u></h3><br>
Vehicle Name: <input type="text" name="vname" value="<?php echo( htmlspecialchars( $row['name'] ) ); ?>" disabled />
Vehicle Registration: <input type="text" name="vnum" value="<?php echo( htmlspecialchars( $row['registrationnum'] ) ); ?>" disabled /><br><br>
<h3><u>Purchase Details</u></h3><br/>
Purchase Date: <input type="date" id="datepicker" name='dateofpur' size='9' value="<?php echo( htmlspecialchars( $row['dateofpurchase'] ) ); ?>" />
Purchased From: <input type="text" name="purfrom" value="<?php echo( htmlspecialchars( $row['purchasefrom'] ) ); ?>"/><br/><br/>
Purchase Invoice: <input type="text" name="purinv" value="<?php echo( htmlspecialchars( $row['purcinvoice'] ) ); ?>"/>
Purchase Value: <input type="text" name="purval" value="<?php echo( htmlspecialchars( $row['purvalue'] ) ); ?>"/><br/><br/>
Odometer at Purchase:<input type="text" name="odo" value="<?php echo( htmlspecialchars( $row['odometeratpur'] ) ); ?>"/>
<h3><u>Warranty Expiry</u></h3>
Date: <input type="date" id="datepicker" name='dateofexp' size='9' value="<?php echo( htmlspecialchars( $row['warrantydate'] ) ); ?>" />
[or]Mileage: <input type="text" name="mileageexp" value="<?php echo( htmlspecialchars( $row['warrantymileage'] ) ); ?>"/><br/><br/>
<input type="submit" value="Save"/><br><br>
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
  $purchdate = mysql_real_escape_string($_POST['dateofpur']);
  $purchfrom = mysql_real_escape_string($_POST['purfrom']);
  $purchinvoice = mysql_real_escape_string($_POST['purinv']);
  $purchvalue = mysql_real_escape_string($_POST['purval']);
  $odometer = mysql_real_escape_string($_POST['odo']);
  $warrantydate = mysql_real_escape_string($_POST['dateofexp']);
  $warrantymileage = mysql_real_escape_string($_POST['mileageexp']);
    
    mysql_query("UPDATE vehicledata SET dateofpurchase='$purchdate', purchasefrom='$purchfrom', purcinvoice='$purchinvoice', purvalue='$purchvalue', odometeratpur='$odometer', warrantydate='$warrantydate' warrantymileage='$warrantymileage' WHERE id='$id'") ;
    header("location: puchasedetails.php");
  }
?>
