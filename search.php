<?php 
	//include php for header
	include 'Assignment.php';
?>

<div id ="pages">
<?php 
$j = 0;
$i = 5;
$n = 1;
//check if the search button was pressed
if(isset($_POST['submit']))
{ 
	//check if text was entered into the search bar
  	if(isset($_GET['go']))
   	{ 
   		//ensure there was numeric value entered into the search bar
	 	if(preg_match("/^[  a-zA-Z]+/", $_POST['name']))
	  	{ 
	  		//assign short hand variable to user input
	  		$name=$_POST['name']; 
	  		$_SESSION["search"] = $name;
		 	//connect to yout database
			require_once "db1.php";
	  		
	  		//select booktitle, author, reserved information from the Books table where the title or author is, or is partially, the user input
	 	 	$sql="SELECT BookTitle, Author, Reserved FROM Books WHERE BookTitle LIKE '%" . $name .  "%' OR Author LIKE '%" . $name ."%' LIMIT $j, $i";
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
  			
	 	 	//select all information on the books, using an inner join with the category table, used when the user searches by category 
 	 		$sql2="SELECT * From Books INNER JOIN Category ON Books.Category = Category.CategoryID WHERE Category.CategoryDescription = '$name'";	
 	 		$result2=mysql_query($sql2);
	 	 
	 	 	//loop through second result set 
	 	 	while($row2=mysql_fetch_array($result2))
	 	 	{ 
	 	 		//assign short hand names to the results
	     	    $BookTitle = $row2['BookTitle'];
				$Author = $row2['Author']; 
				$Reserved = $row2['Reserved'];
			
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
	  	}
	  	
	  	$j = $i;
	  	$i;
	  	echo "<a  href=\"/WebD/search2.php?one=$j&two=$i&three=$n\"> page>></a>\n";
	}
	else
	{ 
		//error message if nothing has been entered to the search box
		echo  "<p>Please enter a search query</p>"; 
	}
} 
?> 
</div>

<div id = "footer">
	<!--include php file for footer-->
	<?php include 'Footer.php';?>
</div>