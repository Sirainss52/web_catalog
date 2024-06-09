<?php
session_start();
include "db_conn.php";
$id_produk = $_GET['id'];
$querykategori = mysqli_query($conn, "SELECT * FROM kategori");

$querykategori2 = mysqli_query($conn, "SELECT * FROM kategori");
$detail2 = $querykategori2->fetch_assoc();

$querypembeli = mysqli_query($conn, "SELECT * FROM pembeli");
$pecah = $querypembeli->fetch_assoc();

$take = $conn->query("SELECT * FROM produk WHERE id_produk=$id_produk");
$detail = $take->fetch_assoc();
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
        <section class="main-content">
            <div class="row">
                <div class="span9">
                    <div class="row">
                        <div class="span6">
                            <a href="/P_WEB_3312211066/web-catalog/Admin/foto_produk/<?php echo str_replace(
                                ' ',
                                '_',
                                $detail2['nama_kategori']
                            ); ?>/<?php echo $detail['foto_produk']; ?>" class="thumbnail" title="Description 1"><img alt="" src="/P_WEB_3312211066/web-catalog/Admin/foto_produk/<?php echo str_replace(
                                    ' ',
                                    '_',
                                    $detail2['nama_kategori']
                                ); ?>/<?php echo $detail['foto_produk']; ?>"></a>
                        </div>
                        <div class="span5">
                            <address>
                                <strong>Name:</strong> <span>
                                    <?php echo $detail['nama_produk']; ?>
                                </span><br>
                                <strong>Category:</strong> <span>
                                    <?php echo $detail2['nama_kategori']; ?>
                                </span><br>
                                <strong>Availability:</strong> <span>
                                    <?php echo $detail['stok_produk'] > 0 ? 'In Stock'
                                        : 'Out of Stock'; ?>
                                </span><br>
                                <strong>Price:</strong> <span>
                                    <?php echo $detail['harga']; ?>
                                </span><br>
                                <a href="https://wa.link/s0gq4h" class="btn btn-primary">Buy</a>
                            </address>

                        </div>
                        <div class="span5">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#desc">Product Details</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="desc">
                                    <p>
                                        <?php echo $detail['deskripsi']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                </div>
            </div>
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