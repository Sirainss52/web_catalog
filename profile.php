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
		<div class="container">
			<div class="card">
				<h1 class="mb-4">Profil Pengguna</h1>
				<p class="lead">Selamat datang,
					<?php echo $pecah['nama_pembeli']; ?>!
				</p>
				<hr>
				<h2 class="mt-4">Informasi Pengguna</h2>
				<form action="update_profile.php" method="POST">
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" id="name" name="name" class="form-control"
							value="<?php echo $pecah['nama_pembeli']; ?>" required>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" id="email" name="email" class="form-control"
							value="<?php echo $pecah['email']; ?>" required>
					</div>
					<div class="mb-3">
						<label for="phone" class="form-label">Nomor Telepon</label>
						<input type="text" id="phone" name="phone" class="form-control"
							value="<?php echo $pecah['phone']; ?>" required>
					</div>
					<div class="mb-3">
						<label for="address" class="form-label">Alamat</label>
						<textarea id="address" name="address" class="form-control"
							required><?php echo $pecah['alamat']; ?></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="logout.php" class="btn btn-outline-primary">Keluar</a>
				</form>
			</div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</div>
</div>
</div>
</div>
</div>
</div>