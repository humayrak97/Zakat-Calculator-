<?php

session_start();

// Check if the user is already logged in
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] === true) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy(); // destroy all session data


	// Redirect to the login page
	header("Location: login.php");
    exit;
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zakat";

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    printf("Connection failed: %s", $mysqli->connect_error);
    exit();
}

$name = $_SESSION['username'];

// Retrieve the user information from the database

$sql = "SELECT * FROM users WHERE name = '$name'";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row["name"];
    $title = $row["title"];
    $location = $row["location"];
    $email = $row["email"];
    $phone = $row["phone"];
    $zakat_due = $row["zakat_due"];
} else {
    echo "User not found";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>

	<header>

			<div class="logo">
				<img src="photos/logo.png"alt="Zakat Calculator Logo">
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
	</header>

	<main>

		
		<div class="container">
			
			<div class="user-info">
				<h1><?php echo "$title $name"; ?></h1>
				<ul>
					<li><span class="icon"><i class="fa fa-map-marker"></i></span><?php echo $location; ?></li>
					<li><span class="icon"><i class="fa fa-envelope"></i></span><?php echo $email; ?></li>
					<li><span class="icon"><i class="fa fa-phone"></i></span><?php echo $phone; ?></li>
				</ul>
			</div>
			<div class="user-stats">
				<div class="stat">
					<div class="value"><?php echo $zakat_due; ?></div>
					<div class="label">Zakat Due</div>
				</div>
				<div class="stat">
					<div class="value">6 Months</div>
					<div class="label">Until Next Zakat Cycle</div>
				</div>

			</div>
		</div>
	</main>

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
