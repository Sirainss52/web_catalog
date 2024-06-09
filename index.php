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
									<a href="<?php echo $kategori['nama_kategori']; ?>.php">
										<li>
											<?php echo $kategori['nama_kategori']; ?>
										</li>
									</a>
								<?php } ?>
							</ul>
						</li>
						<li><a href="about.php">about us</a></li>
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
		<section class="homepage-slider" id="home-slider">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<img src="themes/images/carousel/banner-1.png" alt="" />
					</li>
					<li>
						<img src="themes/images/carousel/banner-2.jpg" alt="" />
						<div class="intro">
							<h1>Mid season sale</h1>
							<p><span>Up to 50% Off</span></p>
							<p><span>On selected items online and in stores</span></p>
						</div>
					</li>
					<li>
						<img src="themes/images/carousel/banner-3.jpg" alt="" />
						<div class="intro">
							<h1>Mid season sale</h1>
							<p><span>Up to 50% Off</span></p>
							<p><span>On selected items online and in stores</span></p>
						</div>
					</li>
				</ul>
			</div>
		</section>
		<section class="header_text">
			We stand for top quality shoes,clothes, and pants. Let's buy our products because the others are not
			necessarily quality.
			<br />Don't miss to latest product.
		</section>
		<section class="main-content">
			<div class="row">
				<div class="span12">
					<div class="row">
						<div class="span12">
							<h4 class="title">
								<span class="pull-left"><span class="text"><span class="line">Feature
											<strong>Products</strong></span></span></span>
								<span class="pull-right">
									<a class="left button" href="#myCarousel" data-slide="prev"></a>
									<a class="right button" href="#myCarousel" data-slide="next"></a>
								</span>
							</h4>
							<div id="myCarousel" class="myCarousel carousel slide">
								<div class="carousel-inner">
									<?php
									$take = $conn->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori");
									$counter = 0;
									$active = 'active';

									while ($perproduk = $take->fetch_assoc()) {
										if ($counter % 4 == 0) {
											echo '<div class="item ' . $active . '"><ul class="thumbnails">';
											$active = '';
										}
										?>
										<li class="span3">
											<div class="product-box">
												<span class="sale_tag"></span>
												<p>
													<a
														href="product_detail.php?id=<?php echo $perproduk['id_produk']; ?>">
														<img src="/P_WEB_3312211066/web-catalog/Admin/foto_produk/<?php echo str_replace(' ', '_', $perproduk['nama_kategori']); ?>/<?php echo $perproduk['foto_produk']; ?>"
															alt="">
													</a>
												</p>
												<a href="product_detail.php?id=<?php echo $perproduk['id_produk']; ?>"
													class="title">
													<?php echo $perproduk['nama_produk']; ?>
												</a>
												<br />
												<a href="categori.php" class="category">
													<?php echo $perproduk['nama_kategori']; ?>
												</a>
												<p class="price">RP.
													<?php echo $perproduk['harga']; ?>
												</p>
											</div>
										</li>
										<?php
										$counter++;
										if ($counter % 4 == 0) {
											echo '</ul></div>';
										}
									}

									if ($counter % 4 != 0) {
										echo '</ul></div>';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Latest
									<strong>Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button"
								href="#myCarousel-2" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel-2" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<?php
							$take = $conn->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori");
							$counter = 0;
							$active = 'active';

							while ($perproduk = $take->fetch_assoc()) {
								if ($counter % 4 == 0) {
									echo '<div class="item ' . $active . '"><ul class="thumbnails">';
									$active = '';
								}
								?>
								<li class="span3">
									<div class="product-box">
										<span class="sale_tag"></span>
										<p>
											<a href="product_detail.php?id=<?php echo $perproduk['id_produk']; ?>">
												<img src="/P_WEB_3312211066/web-catalog/Admin/foto_produk/<?php echo str_replace(' ', '_', $perproduk['nama_kategori']); ?>/<?php echo $perproduk['foto_produk']; ?>"
													alt="">
											</a>
										</p>
										<a href="product_detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="title">
											<?php echo $perproduk['nama_produk']; ?>
										</a>
										<br />
										<a href="categori.php" class="category">
											<?php echo $perproduk['nama_kategori']; ?>
										</a>
										<p class="price">RP.
											<?php echo $perproduk['harga']; ?>
										</p>
									</div>
								</li>
								<?php
								$counter++;
								if ($counter % 4 == 0) {
									echo '</ul></div>';
								}
							}

							if ($counter % 4 != 0) {
								echo '</ul></div>';
							}
							?>
						</div>
					</div>
					<div class="row feature_box">
						<div class="span4">
							<div class="service">
								<div class="responsive">
									<img src="themes/images/feature_img_2.png" alt="" />
									<h4>MODERN <strong>DESIGN</strong></h4>
									<p>It has an attractive and futuristic design</p>
								</div>
							</div>
						</div>
						<div class="span4">
							<div class="service">
								<div class="customize">
									<img src="themes/images/feature_img_1.png" alt="" />
									<h4>FREE <strong>SHIPPING</strong></h4>
									<p>free shipping to anywhere.</p>
								</div>
							</div>
						</div>
						<div class="span4">
							<div class="service">
								<div class="support">
									<img src="themes/images/feature_img_3.png" alt="" />
									<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
									<p>customer service non-stop and fast morethan other CS OLSHOP .</p>
								</div>
							</div>
						</div>
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
					</ul>
				</div>
				<div class="span4">
				</div>
				<div class="span5">
					<p class="logo"><img src="themes/images/LagaFooter.png" class="site_logo" alt=""></p>
					<p>You know what makes us proud? That is your satisfaction!.</p>
					<br />
					<span class="social_icons">
					</span>
				</div>
			</div>
		</section>
		<section id="copyright">
			<span>Copyright TokoYughan</span>
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

</html>