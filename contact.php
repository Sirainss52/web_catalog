<?php
session_start();
include "db_conn.php";

$querykategori = mysqli_query($conn, "SELECT * FROM kategori");
$querypembeli = mysqli_query($conn, "SELECT * FROM pembeli");
$pecah = $querypembeli->fetch_assoc();

// Pengecekan apakah ada kata kunci pencarian yang dikirimkan
if (isset($_POST['search'])) {
    $searchKeyword = $_POST['search'];
    // Query pencarian produk berdasarkan nama_produk
    $queryproduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama_produk LIKE '%$searchKeyword%'");
} else {
    // Query tanpa pencarian
    $queryproduk = mysqli_query($conn, "SELECT * FROM produk");
}
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
									<a href="<?php echo $kategori['nama_kategori']; ?>.php">
										<li>
											<?php echo $kategori['nama_kategori']; ?>
										</li>
									</a>
								<?php } ?>
							</ul>
						</li>
						<li><a href="cart.php">about us</a></li>
						<li><a href="contact.php">Contact us</a></li>
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
			<head>
				<meta charset="utf-8">
				<title>Contact Us - Katalog Produk Perusahaan Logistik</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta name="description" content="">
				<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
				<!-- bootstrap -->
				<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
				<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
				
				<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
				
				<!-- global styles -->
				<link href="themes/css/main.css" rel="stylesheet"/>
			
				<!-- scripts -->
				<script src="themes/js/jquery-1.7.2.min.js"></script>
				<script src="bootstrap/js/bootstrap.min.js"></script>				
			</head>
			<body>		
				<div id="wrapper" class="container">
					<section id="contact-header">
						<div class="row">
							<div class="span12">
								<h1>Contact Us</h1>
							</div>
						</div>
					</section>
					<section id="contact-content">
						<div class="row">
							<div class="span6">
								<h2>Get in Touch</h2>
								<form id="contact-form" class="contact-form" method="post" action="#">
									<div class="controls">
										<div class="control-group">
											<label class="control-label" for="name">Name *</label>
											<div class="controls">
												<input type="text" id="name" name="name" required="required" placeholder="Enter your name">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="email">Email Address *</label>
											<div class="controls">
												<input type="email" id="email" name="email" required="required" placeholder="Enter your email address">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="message">Message *</label>
											<div class="controls">
												<textarea id="message" name="message" required="required" placeholder="Enter your message" rows="6"></textarea>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn btn-primary">Send Message</button>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="span6">
								<h2>Contact Information</h2>
								<p>If you have any inquiries or need assistance, please feel free to contact us. Our team is ready to help you.</p>
								<p><strong>Address:</strong> 
									Address: Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam City, Batam City, Riau Archipelago 29461</p>
									<h4>Number Phone and Email (Admin)</h4>
										<p><strong>Ghanni :</strong> +62 822-8459-4344 
									<p>Email  : donquiteghanni5248@gmail.com
								<p><strong>Yudi :</strong> +62 895-8026-93700 
									<p>Email  : yudiachenk123@gmail.com
									<p><strong>Andreas :</strong> +62 878-8345-3134
										<p>Email  : gintingandreas97@gmail.com
				</div>
		</section>
		<section id="footer-bar">
			<div class="row">
				<div class="span3">
					<h4>Navigation</h4>
					<ul class="nav">
						<li><a href="./index.html">Homepage</a></li>  
						<li><a href="./about.html">About Us</a></li>
						<li><a href="./contact.html">Contact Us</a></li>
						<li><a href="./cart.html">Your Cart</a></li>
						<li><a href="./register.html">Login</a></li>	
												
					</ul>					
				</div>
				<div class="span4">
					<h4>My Account</h4>
					<ul class="nav">
						<li><a href="profil.html">My Account</a></li>
						<li><a href="#">Order History</a></li>
						<li><a href="#">Wish List</a></li>
						<li><a href="#">Newsletter</a></li>
					</ul>
				</div>
				<div class="span2">
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
</html>
