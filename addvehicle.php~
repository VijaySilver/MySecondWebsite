<?php
  session_start();
  if($_SESSION['user']){
  }
  else{
    header("location:index.php");
  }
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $vehname = mysql_real_escape_string($_POST['vname']);
  $vehreg = mysql_real_escape_string($_POST['vnum']);
  $vehmanuf = mysql_real_escape_string($_POST['manuf']);
  $year = mysql_real_escape_string($_POST['yearofman']);
  $vehmodel = mysql_real_escape_string($_POST['model']);
  $vehser = mysql_real_escape_string($_POST['serial']);
  $vehclass = mysql_real_escape_string($_POST['class']);
  $vehstatus = mysql_real_escape_string($_POST['status']);
  $bool = true;
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("search_data") or die("Cannot connect to database"); //Connect to database
  $query = mysql_query("Select * from vehicledata "); //Query the feedbackk table
  while($row = mysql_fetch_array($query)) //display all rows from query
  { /*
   $table_vehreg = $row['registrationnum']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($vehreg != $table_vehreg) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("No such Vehicle Registration Number exists");</script>'; //Prompts the user
      Print '<script>window.location.assign("vehicledetails.php");</script>'; // redirects to feedback.php
    }
  } */
  if($bool) // checks if bool is true
  {
   	mysql_query("UPDATE vehicledata SET manufacturer='$vehmanuf', year='$year', model='$vehmodel', serial='$vehser', class='$vehclass', curstatus='$vehstatus' WHERE registrationnum='$vehreg'");
   //  mysql_query("INSERT INTO vehicledata (name, registrationnum, manufacturer, year, model, serial, class, curstatus) VALUES ('$vehname','$vehreg','$vehmanuf','$year','$vehmodel','$vehser','$vehclass','$vehstatus')"); //Inserts the value to table users
    Print '<script>alert("Successfully Saved!");</script>'; // Prompts the user
    Print '<script>window.location.assign("vehicledetails.php");</script>'; // redirects to register.php
  }
 }
}
?>