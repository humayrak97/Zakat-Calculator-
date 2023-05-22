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

$dbhost = "localhost";
		$dbuser = "id20779725_zakatitapp";
		$dbpass = "Triplet@jh23";
		$dbname = "id20779725_zakat";
		

		//$dbhost ='localhost';
		//$dbuser = 'root';
		//$dbpass = '';
		//$dbname = "zakat";

		$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname) ;

		if ($mysqli -> connect_error){
			printf("connection failed",$mysqli-> connect_error);
			exit();
		}

		$x = $_SESSION['search'];

		$name = $_SESSION['username'];


		$sql = "SELECT * from donateCentrally where amount = '$x' and name ='$name'";

		$rs = mysqli_query($mysqli, $sql);

		$serial = 1;

		$sql = "SELECT * from foundationDonations where amount = '$x' and name ='$name'";

		$rs2 = mysqli_query($mysqli, $sql);

		$serial = 1;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment History</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="payment-history.css">
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
	<div class="container">
	<h1>Search</h1>  

	
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Amount</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($rs)) { ?>
		      <tr>
		        <td><?php echo $serial++; ?></td>
				<td><?php echo $row['amount']; ?></td>
				<td><?php echo $row['message']; ?></td>
		      </tr>
            
		     <?php } ?>

		     <?php while ($row = mysqli_fetch_assoc($rs2)) { ?>
		      <tr>
		        <td><?php echo $serial++; ?></td>
				<td><?php echo $row['amount']; ?></td>
				<td><?php echo $row['message']; ?></td>
		      </tr>
            
		     <?php } ?>

        </tbody>
    </table>
    <script>
        const deleteButtons = document.querySelectorAll('.delete-row');
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                button.closest('tr').remove();
            });
        });
    </script>

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