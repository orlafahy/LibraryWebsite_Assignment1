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
	
	//assign a short hand value to the curent users username 
	$U = "$_SESSION[Uname]";
	
	//select all information on Books that have been reserved by the user using an inner join
	$sql = "SELECT * From Books INNER JOIN Reservations ON Books.ISBN = Reservations.ISBN WHERE Reservations.Username = '$U'";
	$result = $conn->query($sql);
		
	//loop to display results
	if ($result->num_rows > 0) 
	{
		echo "Books Reserved by you<br>Click book to unreserve";
		
    	// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			//assign short hand names to the Book title, and the Author 
			$Book = $row["BookTitle"];
			$Author = $row["Author"];
			
			//print links of the reserved books in the form of a list
			echo "<ul>\n"; 
	  		echo "<li>" . "<a  href=\"/WebD/Remove.php?Title=$Book\">"  .$Book . " " . $Author .  "</a></li>\n"; 
	  		echo "</ul>"; 
    	}
	} 
	else 
	{
		//message displayed if not logged in, or if no books have been reserved by the user
	     echo "You have not reserved any books";
	}

?>
</div>

<div id = "footer">
	<!--include php file for footer-->
	<?php include 'Footer.php';?>
</div>

</body>
</html>