<!DOCTYPE html>
<html>
<head><title>Driver Details</title>
</head>
<!--<meta http-equiv="refresh" content="10" > -->
<?php
  session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
  ?>
<body bgcolor="#E6E6FA">
<?php
    if(isset($_GET['action'])=='submitfunc') {
        submitfunc();
    }
    else
    //show form
    ?>
<form action="addDriver.php" method="POST" action="?action=uploadfunc" enctype="multipart/form-data" >
<h3><u>Driver Details</u></h3><br>
Name: <input type="text" name="drname" value="" required="required" placeholder="Enter Driver's name"></input>
Initial Password: <input type="text" name="initpass" value="" required="required"></input> <br><br>
First Name: <input type="text" name="fname" value="" />
Last Name : <input type="text" name="lname" value=""/><br><br>
Driver's License: <input type="text" name="license" value=""/><br/><br/>
Address: <textarea name="address" rows="5" cols="40"></textarea>
City :<input type="text" name="city" value=""/><br><br>
State:<input type="text" name="state" value=""></input><br><br>
zip: <input type="text" name="zip" value=""/><br><br>
Phone: <input type="text" name="phone" value=""/>
Email: <input type="text" name="email" value=""/><br/>	
Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit"><br/>
<input type="submit" value="Save"/><br><br>
</form>

<?php

        function submitfunc() {
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk	 = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
        }
    ?>
<!--<form action="uploadfile.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>-->

</body>

<h3 align="center"><u>My list of vehicles</u></h2>
    <table border="1px" width="100%">
      <tr>
        <th>S.No</th>
        <th>Name of Driver</th>
        <th>Driver's License</th>
        <th>edit</th>
      </tr>
      <?php
        mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
        mysql_select_db("search_data") or die("Cannot connect to database"); //connect to database
        $query = mysql_query("Select * from driverinfo"); // SQL Query
        while($row = mysql_fetch_array($query))
        {
          Print "<tr>";
            Print '<td align="center">'. $row['id'] . "</td>";
            Print '<td align="center">'. $row['name'] . "</td>";
            Print '<td align="center">'. $row['license_id'] ."</td>";
            Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
          Print "</tr>";
        }
      ?>
    </table>
 </html>