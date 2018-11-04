<?php
  session_start(); //starts the session
  if($_SESSION['worker']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  if($_SERVER['REQUEST_METHOD'] == "GET")
  {
    mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
    mysql_select_db("search_data") or die("Cannot connect to database"); //Connect to database
    $id = $_GET['id'];
    $selectquery = mysql_query("SELECT * FROM vehicledata WHERE id='$id'");
    while($row = mysql_fetch_array($selectquery))
    {
    	$_POST['wsn'] = $row['Name'];
    	$workshopstaff_empid = $row['empid'];
    	}
    header("location: workordertasks.php");
  }
?>