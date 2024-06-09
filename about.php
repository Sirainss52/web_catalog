<?php
session_start();
include "db_conn.php";

$querykategori = mysqli_query($conn, "SELECT * FROM kategori");
$querypembeli = mysqli_query($conn, "SELECT * FROM pembeli");
$pecah = $querypembeli->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>TokoYughan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<!-- bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

	<link href="themes/css/bootstrappage.css" rel="stylesheet" />

	<!-- global styles -->
	<link href="themes/css/flexslider.css" rel="stylesheet" />
	<link href="themes/css/main.css" rel="stylesheet" />

	<!-- scripts -->
	<script src="themes/js/jquery-1.7.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="themes/js/superfish.js"></script>
	<script src="themes/js/jquery.scrolltotop.js"></script>
	<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/php5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<div id="top-bar" class="container">
		<section class="navbar main-menu">
			<div class="span4">
				<form method="POST" class="search_form">
					<input type="text" class="input-block-level search-query" Placeholder="eg. T-shirt">
				</form>
			</div>
			<div class="navbar-inner main-menu">
				<a href="index.php" class="logo pull-left"><img src="themes/images/lagaresize.png" class="site_logo"
						alt=""></a>
				<nav id="menu" class="pull-right">
					<ul>
						<li><a href="index.php">home</a></li>
						<li><a href="categori.php">category</a>
							<ul>
								<?php while ($kategori = mysqli_fetch_array($querykategori)) { ?>
									<a href="products.php?kategori=<?php echo $kategori['nama_kategori']; ?>">
										<li>
											<?php echo $kategori['nama_kategori']; ?>
										</li>
									</a>
								<?php } ?>
							</ul>
						</li>
						<li><a href="about.php">about us</a></li>
						<li><a href="contact.html">Contact us</a></li>
						<?php if (isset($_SESSION["pembeli"])): { ?>
								<li><a href="profile.php">welcome
								<?php echo $_SESSION['pembeli'] ?>
									</a></li>
								<li><a href="logout.php">Logout</a></li>
							<?php } ?>
						<?php else: { ?>
								<li><a href="login.php">Login</a></li>
							<?php } ?>
						<?php endif ?>
					</ul>
				</nav>
			</div>
		</section>

<body>
  <title>About Us - Logistics Company Product Catalog Application</title>
  <style>
    /* Styling for black background */
    body {
      background-color: white;
      color: black;
    }
    
    /* Styling for content on the page */
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 50px;
    }
    
    /* Styling for the logo in the center of the page */
    .logo-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 200px;
    }
    
    /* Styling for text on the page */
    h1, h2, p {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
          </header>
        <h2>ABOUT US</h2>
      </header>
    
    <main>
      <div class="logo-container">
        <img src="themes/images/lagaresize.jpg" alt="Store Logo">
      </div>
      <section>
        <h2>Logistics Company YUGHAN</h2>
        <p>YUGHAN Logistics Company takes pride in offering top-quality logistics solutions. Our product catalog application provides easy access to comprehensive information about our available products. Customers can conveniently browse and search for products, with detailed descriptions, specifications, pricing, and availability at their fingertips. With advanced search and filtering options, our application streamlines the procurement process, delivering a seamless and user-centric experience. Choose YUGHAN Logistics for efficient and reliable logistics solutions.</p>
    </section>
    <section id="footer-bar">
        <div class="row">
			<div class="span3">
				<h4>Navigation</h4>
				<ul class="nav">
					<li><a href="./index.php">Homepage</a></li>  
					<li><a href="./about.php">About Us</a></li>
					<li><a href="./contact.php">Contac Us</a></li>
					<li><a href="./register.php">Login</a></li>							
				</ul>					
			</div>
			<div class="span4">
			</div>
			<div class="span5">
				<p class="logo"><img src="themes/images/LagaFooter.png" class="site_logo" alt=""></p>
				<p>You know what makes us proud? That is your satisfaction!.</p>
				<br/>
				<span class="social_icons">
					<a class="facebook" href="#">Facebook</a>
					<a class="twitter" href="#">Twitter</a>
					<a class="skype" href="#">Skype</a>
					<a class="vimeo" href="#">Vimeo</a>
				</span>
			</div>					
		</div>
    </section>
    <section id="copyright">
        <span>Copyright By TokoYughan  All right reserved.</span>
    </section>
</div>
<script src="themes/js/common.js"></script>
<script src="themes/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 4000,
                animationSpeed: 600,
                controlNav: false,
                directionNav: true,
                controlsContainer: ".flex-container" // the container that holds the flexslider
            });
        });
    });
</script>
</body>

