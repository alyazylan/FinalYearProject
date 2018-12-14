<!DOCTYPE html>

<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<link rel="icon" href="images1/favicon.ico">
<link rel="shortcut icon" href="images1/favicon.ico">
<link rel="stylesheet" href="css1/style.css">
<link rel="stylesheet" href="css1/slider.css">
<script src="js1/jquery.js"></script>
<script src="js1/jquery-migrate-1.1.1.js"></script>
<script src="js1/superfish.js"></script>
<script src="js1/jquery.equalheights.js"></script>
<script src="js1/jquery.easing.1.3.js"></script>
<script src="js1/tms-0.4.1.js"></script>
<script>
$(window).load(function () {
    $('.slider')._TMS({
        show: 0,
        pauseOnHover: false,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 800,
        preset: 'fade',
        pagination: true, //'.pagination',true,'<ul></ul>'
        pagNums: false,
        slideshow: 8000,
        numStatus: false,
        banners: true,
        waitBannerAnimation: false,
        progressBar: false
    })
});
</script>
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
            <li class="current"><a href="main.php">HOME</a></li>
            <li class="with_ul"><a>VIEW</a>
			<ul>
                <li><a href="viewAllResidentForm.php">All Residents</a></li>
                <li><a href="viewByIcForm.php">By IC</a></li>
                <li><a href="viewByHouseForm.php">By House Number</a></li>
				<li><a href="log.php">Time In/Out</a></li>
            </ul>
			</li>
            <li><a href="deleteByIcForm.php">DELETE</a></li>
		    <li><a href="logout.php"><img src="images1/logout.png" alt="" height = "25" width = "25"></a></li>

          </ul>
        </nav>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</header>
<div class="top_block">
  <div class="slider-relative">
    <div class="slider-block">
      <div class="slider">
        <ul class="items">
          <li><img src="images1/gateljc.png" alt="">
            <div class="banner">The experience<br>
              You May Trust</div>
          </li>
          <li><img src="images1/gateljc.jpg" alt="">
            <div class="banner">Make a right<br>
              Choise</div>
          </li>
          <li><img src="images1/gateljc.jpg" alt="">
            <div class="banner">We will show you the<br>
              way to success!</div>
          </li>
          <li><img src="images1/gateljc.jpg" alt="">
            <div class="banner">Well being of our<br>
              clients first!</div>
          </li>
        </ul>
      </div>
    </div>
  </div>
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
