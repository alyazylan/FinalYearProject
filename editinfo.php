<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Resident by IC</title>
<meta charset="utf-8">
<link rel="icon" href="images1/favicon.ico">
<link rel="shortcut icon" href="images1/favicon.ico">
<link rel="stylesheet" href="css1/style.css">
<link rel="stylesheet" href="css1/slider.css">
<link rel="stylesheet" href="assets/css/styles.css" />


<script src="js1/jquery.js"></script>
<script src="js1/jquery-migrate-1.1.1.js"></script>
<script src="js1/superfish.js"></script>
<script src="js1/jquery.equalheights.js"></script>
<script src="js1/jquery.easing.1.3.js"></script>
<script src="js1/tms-0.4.1.js"></script>
<script src="assets/js/script.js"></script>




<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<header>
  <div class="container_12">
    <div class="grid_12">
      <h1><a href="main.php"><img src="images1/ljc1.png" alt=""></a> </h1>
      <div class="clear"></div>
      <div class="menu_block">
        <nav>
          <ul class="sf-menu">
            <li><a href="main.php">HOME</a></li>
            <li class="with_ul"><a>VIEW</a>
			<ul>
                <li><a href="viewAllResidentForm.php">All Residents</a></li>
                <li><a href="viewByIcForm.php">By IC</a></li>
                <li><a href="viewByHouseForm.php">By House Number</a></li>
				<li><a href="log.php">Time In/Out</a></li>
            </ul>
			</li>
            <li class="with_ul"><a href="deleteByIcForm.php">DELETE</a></li>
		    <li><a href="logout.php"><img src="images1/logout.png" alt="" height = "25" width = "25"></a></li>

          </ul>
        </nav>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</header>
<div class="top_block tb1">
	
	<?php
		include 'db_connect.php';
		
        //edit data
		$editIc = $_GET['r_ic'];
		$sql = "SELECT * FROM  ljc_resident where r_ic='$editIc'";
		$result = mysqli_query($conn,$sql);
         
		if(mysqli_num_rows($result))
	    {
	        while($row=mysqli_fetch_assoc($result))
		    {
				$edtName= $row['r_fullname'];
				$edtGender=$row['r_gender'];
				$edtContact= $row['r_contact'];
				$edtEmail=$row['r_email'];
				$edtHouseNo=$row['r_house_no'];
			
		
		/*$sql2 = "select * from ljc_resident"; 
		$result2 = mysqli_query($conn,$sql2);
	  
		if(mysqli_num_rows($result2))
	    {
	        while($row=mysqli_fetch_assoc($result2))
		    {*/
	?>


	
	<form name="booking" action="editinfocheck.php" method="POST">
	<center>
		<fieldset>
		<legend>EDIT RESIDENT'S INFO</legend>
		<table border="0">
		<tr>
			<td>IC</td>
			<td> <name="rIc">: <?php echo $row['r_ic']; ?></td>
		</tr>
		<tr>
			<td>FULLNAME</td>
			<td>: <input type="text1" name="rName" id="fulllname" value="<?php echo $edtName; ?>" required/></td>
		</tr>
		<tr>
			<td>GENDER</td>
			<td>: <input type="radio" name="rGender" value="MALE"> Male<br>
				&nbsp; <input type="radio" name="rGender" value="FEMALE" > Female </td>
		</tr>
		<tr>
			<td>CONTACT NO.</td>
			<td>: <input type="text1" name="rContact" id="contact" value="<?php echo $edtContact; ?>" required/></td>
		</tr>
		<tr>
			<td>EMAIL</td>
			<td>: <input type="email" name="rEmail" value="<?php echo $edtEmail; ?>" required/></td>
		</tr>
		<tr>
			<td>HOUSE NO.</td>
			<td>: <input type="text1" name="rHouseNo" value="<?php echo $edtHouseNo; ?>" required/></td>
		</tr>
		<tr>
			<td>FINGERPRINT ID</td>
			<td>: <?php echo $row['fingerprint_id']; ?></td>
		</tr>
		
		</table>
		</fieldset>
	<input type="submit" name="submit" value="SUBMIT">
	
	<?php } ?>
		<?php } mysqli_close($conn);?>
	</center>
	</form>
	
</div>

<footer>
  <div class="container_12">
    <div class="grid_12">
      <p>Langat Jaya Condominium &copy; 2017</p>
      <address>
      Langat Jaya Condominium, Jalan Datuk Alias, Kampung Melaka, 43200 Batu 9 Cheras, Selangor.<br>
      TELEPHONE: +6033553553
      </address>
    </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>