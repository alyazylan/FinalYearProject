<?php

    session_start();
	include 'db_connect.php';
	
    if($_SERVER['REQUEST_METHOD']=='POST')
    {		
		$fullname = $_POST['rName'];
        $gender = $_POST['rGender'];
	    $contact = $_POST['rContact'];
	    $email = $_POST['rEmail'];
		$houseNo = $_POST['rHouseNo'];
	            
                $sql1 = "UPDATE ljc_resident SET r_fullname='$fullname',r_gender='$gender',r_contact='$contact',
						r_email='$email',r_house_no='$houseNo'";
                        
                if(mysqli_query($conn,$sql1))
	            {
	                echo ("Edit Succesful");
					header( "refresh:2;url=viewByIcForm.php" );	
	            }
		        else
	            {
	                echo ("Failed to edit");
					header( "refresh:2;url=editinfo.php" );
		        } 
				
		mysqli_close($conn);
	}
?>