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


if (isset($_POST['logout'])) {
    session_destroy(); // destroy all session data

    // Set the cookie variables
	setcookie('loggedin', false, time() - 3600); // set value to an empty string and set the expiration time to a time in the past
	setcookie('username', '', time() - 3600); // set value to an empty string and set the expiration time to a time in the past

	// Redirect to the login page
	header("Location: login.php");
    exit;
}

if(isset($_COOKIE['donation_suggestion'])) {
    $foundation = $_COOKIE['donation_suggestion'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Learn about Zakat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
	<link rel="stylesheet" type="text/css" href="about.css">
</head>
<body>
	<header>
		<div class="logo">
			<img src="photos/logo.png" alt="Zakat Calculator Logo">
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
    <div class= "container">     
    <h1>Learn about Zakat</h1>
	<!-- <nav class ="content">
			<ul>
				<li><a href="#">What is Zakat?</a></li>
				<li><a href="#">Who pays Zakat?</a></li>
				<li><a href="#">How is Zakat calculated?</a></li>
				<li><a href="#">Zakat vs. Sadaqah</a></li>
			</ul>
		</nav>
		-->
	 
	<main>
		<section>
			<h2>What is Zakat?</h2>
			<p>Zakat is one of the Five Pillars of Islam, and it is an obligatory charitable giving that is meant to purify one's wealth and help those in need. It is typically calculated as 2.5% of one's annual savings and investments.</p>
		</section>
		<section>
			<h2>Who pays Zakat?</h2>
			<p>Zakat is required of all Muslims who meet certain criteria of wealth, such as having savings above a certain threshold or owning a certain amount of assets. It is not required of those who are poor or in debt.</p>
		</section>
		<section>
			<h2>How is Zakat calculated?</h2>
			<p>Zakat is typically calculated as 2.5% of one's annual savings and investments. There are also specific guidelines for how to calculate Zakat on various types of assets, such as gold and silver.</p>
		</section>
		<section>
			<h2>Zakat vs. Sadaqah</h2>
			<p>Zakat is different from Sadaqah, which is voluntary charitable giving that is encouraged but not obligatory. While Zakat is required of all eligible Muslims, Sadaqah is a personal choice and can be given in any amount and at any time.</p>
		</section>
	</main>
	<p>Donate to <?php echo $foundation;?> Today!</p>
    </div>

	<footer>
		<div class="container-f">
			<div class="social-links">
					<a href="#"><i class="fa fa-facebook-f"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-linkedin-in"></i></a>
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


