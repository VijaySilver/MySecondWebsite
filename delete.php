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
    mysql_query("DELETE FROM vehicledata WHERE id='$id'");
    header("location: vehicledetails.php");
  }
?>
