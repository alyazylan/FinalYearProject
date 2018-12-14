<?php

    session_start();
	include 'db_connect.php';

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $deleteIc = $_POST['r_ic'];
	            
        $sql = "Delete * from ljc_resident where r_ic = '$deleteIc'";
                        
        if(mysqli_query($conn,$sql))
		{
			echo ("Delete Succesful");
			//header( "refresh:2;url=deleteByIcForm.php" );
			}
		else
		{
			echo ("Please try again");
			//header( "refresh:2;url=deleteByIcForm.php" );
			}
			
		mysqli_close($conn);
	}
?>