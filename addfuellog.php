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
  $dateoffill = mysql_real_escape_string($_POST['dateoffuel']);
  $purchquant = mysql_real_escape_string($_POST['fuelquant']);
  $totcost = mysql_real_escape_string($_POST['costfuel']);
  $costperlit = mysql_real_escape_string($_POST['litrecost']);
  $fuelcard = mysql_real_escape_string($_POST['cardno']);
  $nameofbunk = mysql_real_escape_string($_POST['bunkname']);
  $driver_id = mysql_real_escape_string($_POST['driverid']);
  $bool = true;
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("search_data") or die("Cannot connect to database"); //Connect to database
  mysql_query("INSERT INTO fuelentry (vehiclename, vehicleregnum, date, quantity, totalcost, costperlitre, fuelcardno, nameofbunk, driverid) VALUES ('$vehname','$vehreg','$dateoffill','$purchquant','$totcost','$costperlit','$fuelcard','$nameofbunk','$driver_id')");
/*    mysql_query("UPDATE vehicledata SET dateofpurchase='$purchdate', purchasefrom='$purchfrom', purcinvoice='$purchinvoice', purvalue='$purchvalue', 	odometeratpur='$odometer', warrantydate='$warrantydate', warrantymileage='$warrantymileage', depreciation='$deprepercent', depperiod='$depreperiod' WHERE registrationnum='$vehreg'"); *///Inserts the value to table users
    Print '<script>alert("Fuel entry Successful !");</script>'; // Prompts the user
    Print '<script>window.location.assign("fuellog.php");</script>'; // redirects to register.php
  }
?>