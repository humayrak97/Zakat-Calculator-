<?php
session_start();

// Check if the user is already logged in
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] === true) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['logout'])) {
	session_unset();
    session_destroy(); // destroy all session data


	// Redirect to the login page
	header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="landing.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<body>
	<header>
		<div class="logo">
			<img src="photos/logo.svg" alt="Zakat Calculator Logo" loading="lazy">
		</div>
		<!-- navbar -->
		<nav>
			<ul>
				<li><a href="landing.php">Home</a></li>
				<li><a href="calculator.php">Calculator</a></li>
				<li>
					<div class="dropdown">
						<button class="dropbtn">Donate</button>
						<div class="dropdown-content">
							<a href="donate_centrally.php">Centrally</a>
							<a href="foundations.php">To a Foundation</a>
						</div>
					</div>
				</li>
				<li><a href="request_receiver.php">Request</a></li>
				<li>
					<div class="dropdown">
						<button class="dropbtn">History</button>
						<div class="dropdown-content">
							<a href="payment-history.php">Payment</a>
							<a href="finance-history.php">Finance</a>
						</div>
					</div>
				</li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="about.php">About</a></li>
				<form action = 'profile.php' method="POST">
				<li><a href="login.php"><input type="submit" name="logout" value="Sign Out"></a></li>
				</form>
			</ul>
		</nav>
		<!-- navbar -->
	</header>
	<section class="hero" loading="lazy">
		<div class="hero-overlay"></div>
		<div class="hero-content">
			<h1>Welcome to Zakat It</h1>
			<h4>Narrated Abu Huraira:

				Allah's Apostle said, "Whoever is made wealthy by Allah and does not pay the Zakat of his wealth, then on the Day of Resurrection his wealth will be made like a bald-headed poisonous male snake with two black spots over the eyes. The snake will encircle his neck and bite his cheeks and say, 'I am your wealth, I am your treasure.' " Then the Prophet recited the holy verses:-- 'Let not those who withhold . . .' (to the end of the verse). (3.180)..</h4>
			<br>
				<h4>- Al- Bukhari (Volume 2, Book 24, Number 486)</h4>	
			<br>
			<a href="#" class="btn-primary">Calculate Zakat</a>
		</div>
	</section>

	<section class="services">
		<div class="service-box">
			<i class="fas fa-laptop-code"></i>
			<h2>Zakat Calculator</h2>
			<p>Easily calculate your zakat with our zakat calculator interface.</p>
		</div>

		<div class="service-box">
			<i class="fas fa-mobile-alt"></i>
			<h2>Pay Zakat</h2>
			<p>Pay your zakat from home through our website.</p>
		</div>

		<div class="service-box">
			<i class="fas fa-paint-brush"></i>
			<h2>Request Zakat</h2>
			<p>Need assistance? Let us know and we will reach you.</p>
		</div>
	</section>

	<section class="about" loading="lazy">
		<h2>About Us</h2>
		<p>We handle zakat money under ... and distribute it to those who are eligible.</p>
	</section>
	<footer loading="lazy">
	<div class="container-f">
		<div class="social-links">
				<a href="#"><i class="fa fa-facebook-f"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				
			</div>
			<div class="contact-info">
				
		  <p><b>Contact Us</b></p>
				<p><i class="fa fa-phone"></i> +880 1852828239</p>
				<p><i class="fa fa-envelope"></i> info@zakatwebsite.com</p>
			</div>
		<p>&copy; 2023 Zakat Calculator. All rights reserved.</p>
	  </div>
		</footer>

</body>
</html>
