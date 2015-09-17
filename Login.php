<?php
	$a = 20;
	function myf($b) 
	{
		$a = 30;
		global $a, $c;
		return $c = ($b + $a);	
	}
	print myf(40)+$c;
?>
