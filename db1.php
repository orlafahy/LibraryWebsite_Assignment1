<?php
//file to connect to the database
$db1 = mysql_connect('localhost', 'root', 'root');

//check for connection problems and display error messages
if ( $db1 === FALSE ) die('Fail message');
if ( mysql_select_db("Book") === FALSE) die("Fail message");
?>
