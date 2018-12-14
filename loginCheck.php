 <?php

include 'db_connect.php';
session_start(); 							//session_start(); 							

$username = $_POST['username']; 					// assign textbox to variable
$password = $_POST['pass'];

$query = "SELECT * FROM ljc_admin where admin_username='$username' AND admin_password='$password'"; 
$result = mysqli_query($conn,$query); 	// SQL statement for checking
 if(mysqli_num_rows($result) <= 0)   			// check either result found or not
	   {
	   header("location:index.html");			// redirect to another page (data not found!)
	   }
	   else
	   {
		$info = mysqli_fetch_array($result); 	// returns a row from a recordset
	    $_SESSION['admin_name']=$info['admin_name'];	// assign field in username to session [user]	   
		header("location:main.php");
	   }

?>