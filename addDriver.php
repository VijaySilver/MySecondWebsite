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
  $dname = mysql_real_escape_string($_POST['drname']);
  $initpwd = mysql_real_escape_string($_POST['initpass']);
  $fname = mysql_real_escape_string($_POST['fname']);
  $lname = mysql_real_escape_string($_POST['lname']);
  $dlicense = mysql_real_escape_string($_POST['license']);
  $addr = mysql_real_escape_string($_POST['address']);
  $city = mysql_real_escape_string($_POST['city']);
  $state = mysql_real_escape_string($_POST['state']);
  $zip = mysql_real_escape_string($_POST['zip']);
  $phone = mysql_real_escape_string($_POST['phone']);
  $email = mysql_real_escape_string($_POST['email']);
  $image = mysql_real_escape_string($_FILES["fileToUpload"]["name"]);
  $bool = true;
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("search_data") or die("Cannot connect to database"); //Connect to database
  $query = mysql_query("Select * from driverinfo"); //Query the feedbackk table
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
  	$table_license = $row['license_id']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($dlicense == $table_license) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Drivers license number already exists. Cannot be the same");</script>'; //Prompts the user
      Print '<script>window.location.assign("driverdetails.php");</script>'; // redirects to feedback.php
    }
  }
  if($bool) // checks if bool is true
  {
    	mysql_query("INSERT INTO driverinfo (name, password, fname, lname, license_id, address, city, state, zip, phone, email, photo) 
    	VALUES ('$dname','$initpwd','$fname','$lname','$dlicense','$addr','$city','$state','$zip','$phone','$email','$image')");
/*    mysql_query("UPDATE vehicledata SET dateofpurchase='$purchdate', purchasefrom='$purchfrom', purcinvoice='$purchinvoice', purvalue='$purchvalue', 	odometeratpur='$odometer', warrantydate='$warrantydate', warrantymileage='$warrantymileage', depreciation='$deprepercent', depperiod='$depreperiod' WHERE registrationnum='$vehreg'"); *///Inserts the value to table users
    Print '<script>alert("Successfully Saved!");</script>'; // Prompts the user
    Print '<script>window.location.assign("driverdetails.php");</script>'; // redirects to register.php
  }
}
?>