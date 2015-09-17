<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>BorrowBooks</title>
	<!--include css style sheet-->
	<link rel="Stylesheet" type="text/css" href="Assignment.css"/>
</head>

<body>

<div id ="header">
	<!--Display the page title/website name-->
	<h1 style="margin-left:30px; margin-top:10px;">BorrowBooks</h1>
</div>

<div id ="header2">
</div>

<div id="search">
	<!--search bar displayed as part of the header-->
	<form  method="post" action="search.php?go"  id="searchform"> 
	    <input  type="text" name="name"> 
	    <input  type="submit" name="submit" value="Search"> 
	</form>  
</div>
 
<div id ="menu">
	<!--Main menu displayed in header-->
	<a class="ex1" href="/WebD/Assignment.php">Home</a>
	<a class="ex1" href="/WebD/Reserved.php">Reserved</a>
	<a class="ex1" href="/WebD/Login.php">Login/</a>
	<a class="ex1" href="/WebD/Logout.php">Logout</a>
	<a class="ex1" href="/WebD/Regester.php">Register</a>
</div>

<div id ="Username">
<?php 
	//display username when signed in
	$Uname = $_SESSION["Uname"];
	echo "$Uname";
?>
</div>

</body>
</html>