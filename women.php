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
						<li><a href="about.php">about us</a></li>
						<li><a href="contact.html">Contact us</a></li>
						<?php if (isset($_SESSION["pembeli"])): { ?>
								<li><a href="profile.php">welcome
										<?php echo $pecah["nama_pembeli"]; ?>
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

		<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="  Men products">
			<h4><span>New products</span></h4>
		</section>
		<section class="main-content">
		<div class="row">
			<div class="span12">
				<div class="row">
					<?php $take = $conn->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE kategori.nama_kategori = 'women' "); ?>
					<?php while ($perproduk = $take->fetch_assoc()) { ?>
						<div class="span3">
							<div class="product-box">
								<span class="sale_tag"></span>
								<p><a href="product_detail.php?id=<?php echo $perproduk['id_produk']; ?>"><img src="/P_WEB_3312211066/web-catalog/Admin/foto_produk/women/<?php echo $perproduk['foto_produk']; ?>" alt=""></a></p>
								<a href="product_detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="title"><?php echo $perproduk['nama_produk']; ?></a>
								<br />
								<a href="products.php" class="category"><?php echo $perproduk['nama_kategori'] ?></a>
								<p class="price">RP. <?php echo number_format($perproduk['harga']); ?></p>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
		<section id="footer-bar">
			<div class="row">
				<div class="span3">
					<h4>Navigation</h4>
					<ul class="nav">
						<li><a href="./index.php">Homepage</a></li>
						<li><a href="./about.php">About Us</a></li>
						<li><a href="./contact.php">Contac Us</a></li>
						<li><a href="./login.php">Login</a></li>
					</ul>
				</div>
				<div class="span4">
					<h4>My Account</h4>
					<ul class="nav">
						<li><a href="profile.php">My Account</a></li>
						<li><a href="#">Order History(coming soon)</a></li>
						<li><a href="#">Wish List(coming soon)</a></li>
						<li><a href="#">Newsletter(coming soon)</a></li>
					</ul>
				</div>
				<div class="span5">
					<p class="logo"><img src="themes/images/LagaFooter.png" class="site_logo" alt=""></p>
					<p>You know what makes us proud? That is your satisfaction!.</p>
					<br />
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
			<span>Copyright By TokoYughan All right reserved.</span>
		</section>
	</div>
	<script src="themes/js/common.js"></script>
	<script src="themes/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript">
		$(function () {
			$(document).ready(function () {
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
<.php>