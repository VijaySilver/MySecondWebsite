<html>
<head>
<title> Workshop Staff Page </title>
</head>
<?php
  session_start(); //starts the session
  if($_SESSION['worker']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $worker = $_SESSION['worker']; //assigns user value
  ?>
<h1 align="center"><u><i> Welcome Sir </i></u></h1>
<h3>Hello <?php Print "$worker"?>!</h3> <!--Displays user's name-->
<h3 align="right"><a href="logout.php">Click here to logout</a></h3>
<h2> My Tasks</h2>

    <table border="1px" width="100%">
    <caption>Click on view to elaborate</caption>
      <tr>
        <th>Task Number</th>
        <th>Task Description</th>
        <th>Due Date</th>
        <th>Task Status</th>
        <th>View</th>
      </tr>
      <?php
        mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
        mysql_select_db("search_data") or die("Cannot connect to database"); //connect to database
        $query = mysql_query("Select * from workorders where emp_forthistask='$worker'"); // SQL Query
        while($row = mysql_fetch_array($query))
        {
          Print "<tr>";
            Print '<td align="center">'. $row['task_no'] . "</td>";
            Print '<td align="center">'. $row['task_desc'] ."</td>";
            Print '<td align="center">'. $row['duedate'] ."</td>";
            Print '<td align="center">'. $row['task_status'] ."</td>";
            Print '<td align="center"><a href="viewtask.php?id='. $row['id'] .'">View Task</a> </td>';
          Print "</tr>";
        }
      ?>
    </table>


</body>
</html>