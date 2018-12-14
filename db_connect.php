<?php

	$host = "192.168.137.1";
	$user = "ljc";
	$password = "12345";
	$db = "ljc2";
	
	$conn = mysqli_connect($host,$user,$password,$db);
	
	if(!$conn)
	{
		die("Unable to connect to the database" . mysqli_connect_error());
	}
	
?>