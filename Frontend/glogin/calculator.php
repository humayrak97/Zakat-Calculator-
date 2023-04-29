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




$zakat=0.0;


// Check if the form was submitted
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the input values from the form

	{
  $savings = 0.0;
  $expenses = 0.0;
  $debt = 0.0;
  $gold = 0.0;
  $silver = 0.0;

  $savings = $savings + $_POST['input1'];
  $expenses = $expenses + $_POST['input2'];
  $debt = $debt + $_POST['input3'];
  $gold = $gold + $_POST['input4'];
  $silver = $silver + $_POST['input5'];

  // Calculate the Zakat based on the input values
  $zakat = 0.025 * ($savings - $expenses - $debt);

  if ($gold > 0) {
    $zakat += 0.025 * $gold;
  }

  if ($silver > 0) {
    $zakat += 0.025 * $silver;
  }

  $_SESSION['savings'] = $savings;
  $_SESSION['expenses'] = $expenses;
  $_SESSION['debt'] = $debt;
  $_SESSION['gold'] = $gold;
  $_SESSION['silver'] = $silver;
  $_SESSION['zakat'] = $zakat;

  header("Location: calculator2.php");
}

}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
  <link rel="stylesheet" type="text/css" href="calculator.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

				<form action = 'calculator.php' method="POST">
				<li><a href="login.php"><input type="submit" name="logout" value="Sign Out"></a></li>
				</form>
			</ul>
			
		</nav>
	
		<!-- navbar -->
	</header>

	<!-- Form -->
	<div class="notebook">
		<h1>Zakat Calculator</h1>
		<form  method = "POST">
			<label for="input1">Savings (in TK):</label>
			<input type="number" id="input1" name="input1">

			<label for="input2">Expenses (in TK):</label>
			<input type="number" id="input2" name="input2">

			<label for="input3">Debt (in TK):</label>
			<input type="number" id="input3" name="input3">

			<label for="input4">Gold (in gm):</label>
			<input type="number" id="input4" name="input4">

			<label for="input5">Silver (in gm):</label>
			<input type="number" id="input5" name="input5">

			<a href="calculator2.php"><input type="submit" value="Submit"></a>
			
		</form>
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
