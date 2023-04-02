<!DOCTYPE html>
<html>

<head>
	<title>Donate Centrally</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="donate_centrally.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
	<header>
		<div class="logo">
			<img src="photos/logo.png" alt="Zakat Calculator Logo">
		</div>
		<!-- navbar -->
		<nav>
			<ul>
				<li><a href="landing.html">Home</a></li>
				<li><a href="calculator.html">Calculator</a></li>
				<li>
					<div class="dropdown">
						<button class="dropbtn">Donate</button>
						<div class="dropdown-content">
							<a href="donate_centrally.html">Centrally</a>
							<a href="donate_org.html">To a Foundation</a>
						</div>
					</div>
				</li>
				<li><a href="request_receiver.html">Request</a></li>
				<li>
					<div class="dropdown">
						<button class="dropbtn">History</button>
						<div class="dropdown-content">
							<a href="payment-history.html">Payment</a>
							<a href="finance-history.html">Finance</a>
						</div>
					</div>
				</li>
				<li><a href="profile.html">Profile</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="login.html">Sign Out</a></li>
			</ul>
		</nav>
		<!-- navbar -->
	</header>
	<div class="container">
		<h1>Donate to a Foundation</h1>
		<div class="foundation-list">
			<div class="foundation-box" onclick="window.location.href='donate_org.html?org=Foundation A'">
				<img src="photos/-a.jpg" alt="Foundation A Logo">
				<h2>Foundation A</h2>
			</div>
			<div class="foundation-box" onclick="window.location.href='donate_org.html?org=Foundation B'">
				<img src="photos/foundation-b.jpg" alt="Foundation B Logo">
				<h2>Foundation B</h2>
			</div>
			<div class="foundation-box" onclick="window.location.href='donate_org.html?org=Foundation C'">
				<img src="photos/foundation-c.jpg" alt="Foundation C Logo">
				<h2>Foundation C</h2>
			</div>
			<div class="foundation-box" onclick="window.location.href='donate_org.html?org=Foundation D'">
				<img src="photos/foundation-d.jpg" alt="Foundation D Logo">
				<h2>Foundation D</h2>
			</div>
			<div class="foundation-box" onclick="window.location.href='donate_org.html?org=Foundation E'">
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