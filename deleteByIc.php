<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Resident By IC</title>
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
            <li class="current"><a href="deleteByIcForm.php">DELETE</a></li>
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
    <form name="form1" method="post" action="deleteByIcCheck.php">
		<center>
		<fieldset>
		<legend>RESIDENT'S INFO</legend>
		<?php

		include 'db_connect.php';
		$search=$_REQUEST["txtSearch"];
		$sql = "select * from ljc_resident where r_ic = '$search'"; 
		$result = mysqli_query($conn,$sql);
	  
		if(mysqli_num_rows($result))
	    {
	        while($row=mysqli_fetch_assoc($result))
		    { ?>
		<table border="0">
		<tr>
			<td align='center'>&nbsp; IC &nbsp;</td>
			<td align='center'>&nbsp; FULLNAME &nbsp;</td>
			<td align='center'>&nbsp; GENDER &nbsp;</td>
			<td align='center'>&nbsp; CONTACT NUMBER &nbsp;</td>
			<td align='center'>&nbsp; EMAIL &nbsp;</td>
			<td align='center'>&nbsp; HOUSE NUMBER &nbsp;</td>
			<td align='center'>&nbsp; FINGERPRINT ID &nbsp;</td>
		</tr>
		<tr>
			<td align='center'>&nbsp; <?php echo $row['r_ic']; ?> &nbsp;</td>
			<td align='center'>&nbsp; <?php echo $row['r_fullname']; ?> &nbsp;</td>
			<td align='center'>&nbsp; <?php echo $row['r_gender']; ?> &nbsp;</td>
			<td align='center'>&nbsp; <?php echo $row['r_contact']; ?> &nbsp;</td>
			<td align='center'>&nbsp; <?php echo $row['r_email']; ?> &nbsp;</td>
			<td align='center'>&nbsp; <?php echo $row['r_house_no']; ?> &nbsp;</td>
			<td align='center'>&nbsp; <?php echo $row['fingerprint_id']; ?> &nbsp;</td>
		</tr>
		
	
		</table>
		<a href="deleteByIcCheck.php?r_ic=<?php print ($row['r_ic']);?>"><input type="submit" name="submit" value="DELETE"></a>
		<?php } ?>
		<?php 
		} mysqli_close($conn);?>
		</fieldset>
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