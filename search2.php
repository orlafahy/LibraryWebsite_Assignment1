<?php
	session_start();
?>

<?php 
	//include php for header
	include 'Assignment.php';
?>

<div id ="pages">
<?php 
$j = $_GET['one'];
$i = $_GET['two'];
$n = $_GET['three'];
$n = $n + 1;
$search = $_SESSION["search"];
	  		
		 	//connect to yout database
			require_once "db1.php";
	  		
	  		//select booktitle, author, reserved information from the Books table where the title or author is, or is partially, the user input
	 	 	$sql="SELECT BookTitle, Author, Reserved FROM Books WHERE BookTitle LIKE '%" . $search .  "%' OR Author LIKE '%" . $search ."%' LIMIT $j, $i";
	 	 	$result=mysql_query($sql);
	 	 		
	 	 	//loop through first result set 
	 	 	while($row=mysql_fetch_array($result))
	 		{ 
	 			//assign short hand names to the Book title, and the Author
	       		$BookTitle = $row['BookTitle'];
				$Author = $row['Author']; 
				$Reserved = $row['Reserved'];
		
  				//check if book has been reserved 
  				if("$Reserved" == 'N')
  				{  			
  					//displays reults as link if not reserved, and when clicked sends the book title to the next page
  					echo "<ul>\n"; 
  					echo "<li>" . "<a  href=\"/WebD/Reserve.php?Title=$BookTitle\">"   .$BookTitle . " " . $Author .  "</a></li>\n"; 
  					echo "</ul>"; 
  				}
  				else
  				{
  					//displays reserved books not as a link, not allowing the user to resere these
  					echo "<ul>\n"; 
  					echo "<li> Reserved: $BookTitle by $Author </li>\n"; 
  					echo "</ul>";  
  				}
  			} 
  			
	 	
	  	$j = $i * $n;
	  	echo "<a  href=\"/WebD/search2.php?one=$j&two=$i&three=$n\"> page>></a>\n";
?> 
</div>

<div id = "footer">
	<!--include php file for footer-->
	<?php include 'Footer.php';?>
</div>