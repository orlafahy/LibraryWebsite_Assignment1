<?php
	session_start();
?>

<?php 
	//include php for header
	include 'Assignment.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reserve</title>
	<!--include css style sheet-->
	<link rel="Stylesheet" type="text/css" href="Assignment.css"/>
</head>
<body>

<div id ="pages">
<?php
//information needed to connect with database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Book";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
	//error message if failure to connect
     die("Connection failed: " . $conn->connect_error);
}
	
	//recieve selected book title from previous page to be removed from reservations
	$Title = $_GET['Title'];
	
	//change the value of reserved to be equal to Y in the Books table 
	$sql1 = "UPDATE Books SET Reserved = 'Y' Where BookTitle = '$Title'";
	if ($conn->query($sql1) === TRUE) 
	{	
    	//message shown if change was made sucessfully 
    	echo "Record Updated";
	} 
	else 
	{
		//error message shown if change was not made sucessfully 
	   	echo "Error Updating record: " . $conn->error;
	}
	   		
	   		
	//Retrieve all information from the Books table, on the currently selected book
	$sql2 = "SELECT * from Books where BookTitle = '$Title'";
	$result = $conn->query($sql2);

	if ($result->num_rows > 0) 
	{
    	// Find the ISBN from the selected book
		while($row = $result->fetch_assoc()) 
		{
			$theISBN = $row["ISBN"];
    	}
	} 
	else
	{
		//error message shown if ISBN was not found
		echo "Not found";
	}
	
	//retrieve the username, of who is currently signed in
	$name = $_SESSION["Uname"];
	//retrieve todays current date for reservation time stamp
	$date = date('20y/m/d');
		
	//makes a new insertion into the Reservations table, using the information collected
	$sql3= "INSERT INTO Reservations (ISBN, Username, ReservedDate) VALUES ('$theISBN', '$name', '$date')";
	if ($conn->query($sql3) === TRUE) 
	{	
    	//message shown if reservation was made sucessfully 
    	echo ", and Reserved successfully\n";
	} 
	else 
	{
		//error message shown if reservation was not made sucessfully 
	   	echo "Error Reserving record: " . $conn->error;
	}
?>
</div>

</body>
</html>