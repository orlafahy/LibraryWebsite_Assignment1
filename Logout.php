<?php
session_start();?>

<?php 
	//include php for header
	include 'Assignment.php';
?>

<div id ="pages">
<?php
//distroy the current session
if(session_destroy())
{
	//message to let the user know they have been sucessfully logged out
	echo"Logged out"; 
}
?>
</div>

<div id = "footer">
	<!--include php file for footer-->
	<?php include 'Footer.php';?>
</div>