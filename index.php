<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="cssforpages/TableCSSCode.css" type="text/css"/>
</head>
<style type="text/css">
.textbox { 
    border: 1px dotted #000000; 
    outline:0; 
    height:25px; 
    width: 275px; 
  } 
</style>
<body background="fleet-06.png">
<h1 align="center" style="color:blue"><u><i>Welcome to your Conveyance Manager</i></u></h1>
<h3 align="center" style="color:blue"><u>About the team</u></h3>
<p style="color:blue">  Our System will overlook and record the details pertaining to the vehicles and concerns of the driver, 
for best possible management. The system will feature the use of some secure features to avoid unauthorized access and secure 
driver data, which would turn out to be useful for the organization.
</p> 
<h3><u>Fleet Staff Login</u></h3>
<form action="checklogin.php" method="POST">
<div class="CSSTableGenerator" style="width:330px;height:250px;">
<table border="1">
<tr>
<td> Enter Emp ID: </td>
<td> <input class="textbox" type="text" name="empid" required="required" /> </td>
</tr>
<tr>
<td>Enter password: </td>
<td> <input class="textbox" type="password" name="passw" required="required" /> </td>
</tr>
<tr>
<td> Click --> </td>
<td> <input type="submit" value="Login"/> </td>
</tr>
</table>
</div>
</form> <br/><br/>
    
    
<h3><u>Workshop Staff Login</u></h3>
<form action="checkwslogin.php" method="POST">
<table border="1">
<tr>
<th>Enter Emp ID: </th>
<th><input type="text" name="workerempid" required="required" /></th>
</tr>
<tr>
<th>Enter password:</th>
<th><input type="password" name="workerpassw" required="required" /></th>
</tr>
<tr><th>Click -></th>
<th><input type="submit" value="Login"/></th></tr>
</table>
</form>
</body>
</html>
