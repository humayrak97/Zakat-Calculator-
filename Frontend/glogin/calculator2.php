<?php

session_start();

$zakat = $_SESSION['zakat'];

if (isset($_POST['saveInfo'])){
		// $dbhost ='localhost';
	    // $dbuser = 'root';
		// $dbpass = '';
		// $dbname = "zakat"; 
		$dbhost  = "localhost";
        $dbuser = "id20779725_zakatitapp";
        $dbpass = "Triplet@jh23";
		$dbname = "id20779725_zakat";

		$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname) ;

		if ($mysqli -> connect_error){
			printf("connection failed",$mysqli-> connect_error);
			exit();
		}

		$name = $_SESSION['username'];
		$savings = $_SESSION['savings'];
	  $expenses = $_SESSION['expenses'];
	  $debt = $_SESSION['debt'];
	  $gold = $_SESSION['gold'];
	  $silver = $_SESSION['silver'];

	  $sql = "INSERT INTO financeHistory (name, savings, expenses, debt, gold, silver, zakat_due) VALUES ('$name', '$savings', '$expenses', '$debt', '$gold', '$silver', '$zakat')";
      //fire query to save entries and check it with if statement
    $rs = mysqli_query($mysqli, $sql);

    // Redirect to the login page
		header("Location: finance-history.php");
    
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
		<form action = 'calculator2.php' method = "POST">

			<table class="output-table">
			  <tr>
			    <td><h3>Payable Zakat: <?php echo $zakat; ?> TK</h3></td>
			  </tr>
			</table>
			<form action = 'calculator2.php' method="POST">
				<a href="landing.php"><input type="submit" name="saveInfo" value="Save Info"></a>
				</form>
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
