<?php
  session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  if($_SERVER['REQUEST_METHOD'] == "GET")
  {
    mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
    mysql_select_db("search_data") or die("Cannot connect to database"); //Connect to database
    $id = $_GET['id'];
    $query = mysql_query("Select * from vehicledata Where id='$id'"); // SQL Query
            while($row = mysql_fetch_array($query))
            {
          ?>
              <form method="POST">
<h3><u>Vehicle Details</u></h3><br>
Vehicle Name: <input type="text" name="vname" value="<?php echo( htmlspecialchars( $row['Name'] ) ); ?>" disabled />
Vehicle Registration: <input type="text" name="empid" value="<?php echo( htmlspecialchars( $row['empid'] ) ); ?>" disabled /><br><br>
  </form>  
  <?php 
  }
  }
?>
