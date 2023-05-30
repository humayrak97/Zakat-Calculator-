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
<html>

<head>
	<title>Donate Centrally</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="donate_centrally.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script>
        function setSuggestionCookie(foundation) {
            document.cookie = "donation_suggestion=" + encodeURIComponent(foundation) + "; path=/";
        }
    </script>
	
</head>

<body>
	<header>
		<div class="logo">
			<img src="photos/logo.svg" alt="Zakat Calculator Logo">
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
	<div class="container">
		<h1>Donate to a Foundation</h1>
			<div class="foundation-box" onclick="setSuggestionCookie('Foundation A'); window.location.href='donate_fnd.php?org=Foundation A'">
				<img src="photos/foundation-a.jpg" alt="Foundation A Logo">
				<h2>Foundation A</h2>
			</div>
			<div class="foundation-box" onclick="setSuggestionCookie('Foundation B'); window.location.href='donate_fnd.php?org=Foundation B'">
				<img src="photos/foundation-b.jpg" alt="Foundation B Logo">
				<h2>Foundation B</h2>
			</div>
			<div class="foundation-box" onclick="setSuggestionCookie('Foundation C'); window.location.href='donate_fnd.php?org=Foundation C'">
				<img src="photos/foundation-c.jpg" alt="Foundation C Logo">
				<h2>Foundation C</h2>
			</div>
			<div class="foundation-box" onclick="setSuggestionCookie('Foundation D'); window.location.href='donate_fnd.php?org=Foundation D'">
				<img src="photos/foundation-d.jpg" alt="Foundation D Logo">
				<h2>Foundation D</h2>
			</div>
			<div class="foundation-box" onclick="setSuggestionCookie('Foundation E'); window.location.href='donate_fnd.php?org=Foundation E'">
				<img src="photos/foundation-e.jpg" alt="Foundation E Logo">
				<h2>Foundation E</h2>
			</div>
		</div>
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