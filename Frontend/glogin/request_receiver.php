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
//database details. You have created these details in the third step. Use your own.
        
if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zakat";
 
        //create connection
        $con = mysqli_connect($host, $username, $password, $dbname);
        //check connection if it is working or not
        if (!$con)
        {
            die("Connection failed!" . mysqli_connect_error());
        }

        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $job = $_POST['job'];
        $email = $_POST['email'];
        $nid = $_POST['nid'];
        $income = $_POST['income'];
        $message = $_POST['message'];
        $status = "pending";
        

        
        //This below line is a code to Send form entries to database
        $sql = "INSERT INTO requestForZakatable (name, address, phone, job, email, nid, income, message, status) VALUES ('$name', '$address', '$phone', '$job', '$email', '$nid', '$income', '$message', '$status')";
        
      //fire query to save entries and check it with if statement
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
            echo "Message has been sent successfully!";
        }
      	else{
         	echo "Error, Message didn't send! Something's Wrong."; 
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Request</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="request_receiver.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
	<header>
		<div class="logo">
			<img src="photos/logo.svg" alt="Zakat Calculator Logo">
		</div>
		<!-- navbar -->
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
							<a href="donate_org.php">To a Foundation</a>
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
	<h1>Request to be a Zakatable Person</h1>
	<form action="request_receiver.php", method='POST'>
		<input type="text" name="name" placeholder="Full Name" required>
		<input type="text" name="address" placeholder="Address" required>
		<input type="text" name="phone" placeholder="Phone Number" required>
		<input type="text" name="job" placeholder="Job" required>
		<input type="text" name="nid" placeholder="NID" required>
		<input type="email" name="email" placeholder="Email Address" required>
		<input type="number" name="income" placeholder="Monthly Income" required>
		<input type="text" name="message" placeholder="Message" required>
		
		<input type="submit" value="Donate Now">
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