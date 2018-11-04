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
  $purchdate = mysql_real_escape_string($_POST['dateofpur']);
  $purchfrom = mysql_real_escape_string($_POST['purfrom']);
  $purchinvoice = mysql_real_escape_string($_POST['purinv']);
  $purchvalue = mysql_real_escape_string($_POST['purval']);
  $odometer = mysql_real_escape_string($_POST['odo']);
  $warrantydate = mysql_real_escape_string($_POST['dateofexp']);
  $warrantymileage = mysql_real_escape_string($_POST['mileageexp']);
  $deprepercent = mysql_real_escape_string($_POST['deppercent']);
  $depreperiod = mysql_real_escape_string($_POST['periodofdep']);
  $bool = true;
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("search_data") or die("Cannot connect to database"); //Connect to database
  $query = mysql_query("Select * from vehicledata"); //Query the feedbackk table
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
  	$table_feedbackk = $row['registrationnum']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($vehreg == $table_feedbackk) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Vehicle Registration Number already exists. Cannot be the same");</script>'; //Prompts the user
      Print '<script>window.location.assign("purchasedetails.php");</script>'; // redirects to feedback.php
    }
  }
  if($bool) // checks if bool is true
  {
    	mysql_query("INSERT INTO vehicledata (name, registrationnum, dateofpurchase, purchasefrom, purcinvoice, purvalue, odometeratpur, warrantydate, warrantymileage, depreciation, depperiod) VALUES ('$vehname','$vehreg','$purchdate','$purchfrom','$purchinvoice','$purchvalue','$odometer','$warrantydate','$warrantymileage','$deprepercent','$depreperiod')");
/*    mysql_query("UPDATE vehicledata SET dateofpurchase='$purchdate', purchasefrom='$purchfrom', purcinvoice='$purchinvoice', purvalue='$purchvalue', 	odometeratpur='$odometer', warrantydate='$warrantydate', warrantymileage='$warrantymileage', depreciation='$deprepercent', depperiod='$depreperiod' WHERE registrationnum='$vehreg'"); *///Inserts the value to table users
    Print '<script>alert("Successfully Saved!");</script>'; // Prompts the user
    Print '<script>window.location.assign("purchasedetails.php");</script>'; // redirects to register.php
  }
}
?>