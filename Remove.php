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
 	
 	//recieve selected book title from previous page, dependant on which link was clicked
	$Book = $_GET['Title'];
	
	//change the value of reserved to be equal to N in the Books table 
	$sql1 = "UPDATE Books SET Reserved = 'N' Where BookTitle = '$Book'";
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
	   		
	   		
	//Delete book from reservation table using an inner join
	$sql2= "DELETE Reservations FROM Reservations INNER JOIN Books ON Reservations.ISBN = Books.ISBN WHERE Books.BookTitle = '$Book'";
	if ($conn->query($sql2) === TRUE) 
	{	
		//message shown if deletion was made sucessfully 
    	echo " and Deleted successfully";
	} 
	else 
	{
		//error message shown if deletion was not made sucessfully 
	   	echo "Error Reserving record: " . $conn->error;
	}
?>
</div>

<div id = "footer">
	<!--include php file for footer-->
	<?php include 'Footer.php';?>
</div>

</body>
</html>