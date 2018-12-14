<?php

    session_start();
	include 'db_connect.php';
	
	$sql1 = "INSERT INTO fingerprint (fingerprint_id, r_ic) VALUES 
                        (".$_GET["fingerprint_id"].", ".$_GET["r_ic"].")";
                
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