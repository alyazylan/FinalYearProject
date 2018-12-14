<?php

    session_start();
	include 'db_connect.php';

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $fullname = $_POST['rName'];
        $gender = $_POST['rGender'];
        $ic = $_POST['rIc'];
	    $contact = $_POST['rContact'];
	    $email = $_POST['rEmail'];
		$houseNo = $_POST['rHouseNo'];
		$fingerprint = $_POST['fingerprint_id'];
	            
                $sql1 = "UPDATE ljc_resident SET r_ic='$ic',r_fullname='$fullname',r_gender='$gender',r_contact='$contact',
						r_email='$email',r_house_no='$houseNo',fingerprint_id='$fingerprint' where
						r_ic='$ic'";
                        
                if(mysqli_query($conn,$sql1))
	            {
	                echo ("Edit Succesful");
					header( "refresh:2;url=editByIcForm.php" );	
	            }
		        else
	            {
	                echo ("Failed to edit");
					header( "refresh:2;url=editByIcForm.php" );
		        } 
				
		mysqli_close($conn);
	}
?>