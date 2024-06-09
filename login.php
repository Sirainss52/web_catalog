<?php
session_start();
include("db_conn.php");
$querykategori = mysqli_query($conn, "SELECT * FROM kategori");

if (isset($_POST['login'])) {
	$take = $conn->prepare("SELECT * FROM pembeli WHERE email = ?");
	$take->bind_param("s", $_POST['email']);
	$take->execute();
	$result = $take->get_result();
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			if ($_POST['password'] == $row['password']) {
				$_SESSION['pembeli'] = $row['nama_pembeli'];
				$_SESSION['email'] = $row['email'];
				echo "<div class='alert alert-info'>Login sukses</div>";
				header("refresh:1; index.php");
			} else {
				echo "<div class='alert alert-error'>Wrong Password</div>";
				header("refresh:1; login.php");
			}
		}
	} else {
		echo "<div class='alert alert-error'>Error: " . $take->error . "</div>";
		header("refresh:1; login.php");
	}
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
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
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
						<li><a href="./products.php">category</a>
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
						<li><a href="contact.php">Contact us</a></li>
						<li><a href="login.php">Login</a></li>
					</ul>
				</nav>
			</div>
		</section>
		<section class="header_text sub">
			<img class="pageBanner" src="themes/images/laga1.jpg">
			<h4><span>Login or Register</span></h4>
		</section>
		<section class="main-content">
			<div class="row">
				<div class="span5">
					<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
					<form method="post">
						<input type="hidden" name="next">
						<fieldset>
							<div class="control-group">
								<label class="control-label">Email</label>
								<div class="controls">
									<input type="email" placeholder="Enter your email" id="email" name="email"
										class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Password</label>
								<div class="controls">
									<input type="password" placeholder="Enter your password" id="password"
										name="password" class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<input tabindex="3" class="btn btn-inverse large" type="submit" name="login"
									value="Sign into your account">
								<hr>
								<p class="reset">Recover your <a tabindex="4" href="#"
										title="Recover your username or password">username or password</a></p>
							</div>
							<div class="input-group">
							</div>
						</fieldset>
					</form>
				</div>
				<div class="span7">
					<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
					<form action="register.php" method="post" class="form-stacked">
						<fieldset>
							<div class="control-group">
								<label class="control-label">Username</label>
								<div class="controls">
									<input type="text" name="username" placeholder="Enter your username" class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Email address:</label>
								<div class="controls">
									<input type="email" name="email" placeholder="Enter your email" class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">phone number:</label>
								<div class="controls">
									<input type="tel" name="phone" placeholder="Enter your phone number" class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Password:</label>
								<div class="controls">
									<input type="password" name="password" placeholder="Enter your password" class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<p></p>
							</div>
							<hr>
							<div class="action">
								<input tabindex="9" class="btn btn-inverse large" type="submit"
									value="Create your account">
								<input tabindex="9" class="btn large" type="reset" value="Clear">
							</div>
						</fieldset>
					</form>
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
				<div class="span5">
					<p class="logo"><img src="themes/images/LagaFooter.png" class="site_logo" alt=""></p>
					<p>You know what makes us proud? That is your satisfaction!.</p>
					<br />
				</div>
			</div>
		</section>
	</div>
</body>

</html>