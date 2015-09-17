<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<!--include css style sheet-->
	<link rel="Stylesheet" type="text/css" href="Assignment.css"/>
</head>
<body>

<?php
//Include php file for header
include 'Assignment.php';
//connect to database 
require_once "db1.php";

//check to see if all fields in the form have been entered
if ( isset($_POST['UserID']) && isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['CPassword']) 
&& isset($_POST['FirstName']) && isset($_POST['Surname']) && isset($_POST['AddressLine1']) 
&& isset($_POST['AddressLine2']) && isset($_POST['City']) && isset($_POST['Telephone']) && isset($_POST['Mobile'])) 
{

	//assign shorthand values to user input
	$id = mysql_real_escape_string($_POST['UserID']);
	$u = mysql_real_escape_string($_POST['Username']);
	$p = mysql_real_escape_string($_POST['Password']);
	$cp = mysql_real_escape_string($_POST['CPassword']);
	$f = mysql_real_escape_string($_POST['FirstName']);
	$s = mysql_real_escape_string($_POST['Surname']); 
	$a1 = mysql_real_escape_string($_POST['AddressLine1']); 
	$a2 = mysql_real_escape_string($_POST['AddressLine2']); 
	$c = mysql_real_escape_string($_POST['City']); 
	$t = mysql_real_escape_string($_POST['Telephone']); 
	$m = mysql_real_escape_string($_POST['Mobile']); 
	
	//insure mobile number isall numbers, and 10 characters in length 
	if((preg_match("/^[0-9]/", $m)) && strlen($m) == 10)
	{
		//insure password, and conformation password are the same, and of length 6
		if($p == $cp && strlen($p) == 6)
		{
			//insert new values into the user table
			$sql = "INSERT INTO Users (UserID, Username, Password, FirstName, Surname, AddressLine1, AddressLine2, City, Telephone, Mobile) VALUES ('$id', '$u', '$p', '$f', '$s', '$a1', '$a2', '$c', '$t', '$m')";
			mysql_query($sql);
			echo "<br><br><br><br>You have been sucessfully regestered!"; 
		}
		else if($p != $cp)
		{
			//error message if passwords do not match
			echo"<br><br><br><br>Password does not match";
		}
		else if($p == $cp && $length != 6)
		{
			//error password if password is linger than 6 characters
			echo"<br><br><br><br>Password must be 6 characters in length";
		}
	}
	else
	{
		//error message for incorrectly entered mobile number
		echo"<br><br><br><br>Invalid phone number";
	}
}
?>

<div id = "Register">
	<!--All fields in user regestration form either type text, or password-->
	<p>Add A New User</p>
	<form method="post">
		<p>UserID:
			<input type="text" name="UserID"></p>
		<p>Username:
			<input type="text" name="Username"></p>
		<p>Password:
			<input type="password" name="Password"></p>
		<p>Confirm Password:
			<input type="password" name="CPassword"></p>
		<p>First Name:
			<input type="text" name="FirstName"></p>
		<p>Surname:
			<input type="text" name="Surname"></p>
		<p>Address Line1:
			<input type="text" name="AddressLine1"></p>
		<p>Address Line2:
			<input type="text" name="AddressLine2"></p>
		<p>City:
			<input type="text" name="City"></p>
		<p>Telephone:
			<input type="text" name="Telephone"></p>
		<p>Mobile:
			<input type="text" name="Mobile"></p>
	<!--Submit and cancel button for regestration form-->
	<p><input type="submit" value="Add New"/> <a href="Assignment2.php">Cancel</a></p>
	</form>
</div>

<div id = "Footer2">
	<!--Include php file for footer-->
	<?php include 'Footer.php';?>
</div>

</body>
</html>