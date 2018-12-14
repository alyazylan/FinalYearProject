<?php
		session_start();
		session_unset();
		session_destroy();
		
		if(!$_SESSION['admin_name'])
		{
			header('Location:index.html');
		}
		else
		{
			print "your session is ".$_SESSION['admin_name'];
		}
?>