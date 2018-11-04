<?php
  session_start();
  $workerusername = mysql_real_escape_string($_POST['workerempid']);
  $workerpassword = mysql_real_escape_string($_POST['workerpassw']);
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("search_data") or die("Cannot connect to database"); //Connect to database
  $workerquery = mysql_query("SELECT * from workshopstaff WHERE empid='$workerusername'"); //Query the users table if there are matching rows equal to $username
  $workerexists = mysql_num_rows($workerquery); //Checks if username exists
  $table_workers = "";
  $table_worker_name="";
  $table_worker_password = "";
  if($workerexists > 0) //IF there are no returning rows or no existing username
  {
    while($row = mysql_fetch_assoc($workerquery)) //display all rows from query
    {
    	$table_worker_name = $row['Name'];
      $table_workers = $row['empid']; // the first username row is passed on to $table_users, and so on until the query is finished
      $table_worker_password = $row['passwd']; // the first password row is passed on to $table_users, and so on until the query is finished
    }
    if(($workerusername == $table_workers) && ($workerpassword == $table_worker_password)) // checks if there are any matching fields
    {
        if($workerpassword == $table_worker_password)
        {
          $_SESSION['worker'] = $table_worker_name; //set the username in a session. This serves as a global variable
          header("location: workershome.php"); // redirects the user to the authenticated home page
        }

    }
    else
    {
      Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
      Print '<script>window.location.assign("index.php");</script>'; // redirects to login.php
    }
  }
  else
  {
    Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
    Print '<script>window.location.assign("index.php");</script>'; // redirects to login.php
  }
?>
