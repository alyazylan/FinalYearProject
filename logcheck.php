<?php

    session_start();
	include 'db_connect.php';
	
	$sql1 = "INSERT INTO log (fingerprint_id) VALUES 
                        (".$_GET["fingerprint_id"].")";
                
    if(mysqli_query($conn,$sql1))
	{
	    echo ("Registered Succesful");
		//header( "refresh:2;url=main.php" );	
	}
	else
	{
	    echo ("Please try again");
		//header( "refresh:2;url=main.php" );
	} 
	   
		mysqli_close($conn);
?>