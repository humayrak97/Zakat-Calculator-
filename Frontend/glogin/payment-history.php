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

$dbhost ='localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = "zakat";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname) ;

if ($mysqli -> connect_error){
	printf("connection failed",$mysqli-> connect_error);
	exit();
}

$name = $_SESSION['username'];
$message = $_SESSION['message'];
$amount = $_SESSION['amount'];

echo $name.$message.$amount;

$referrer = $_GET['referrer'];
if($referrer == 'http://localhost/zakat/Frontend/glogin/success.php')
{
	echo '<script>alert("The Transaction Was Successful!");
	var url = window.location.href;
                    url = removeURLParameter(url, "?referrer");
                    window.location.href = url;
                    
                    function removeURLParameter(url, parameter) {
					let result = url.split(parameter)[0];

                        return result;
                    }
                    </script>';

                    //This below line is a code to Send form entries to database
        $sql = "INSERT INTO donateCentrally (name, address, phone, job, email, amount, message) VALUES ('$name', '', '', '', '', '$amount', '$message')";
        
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

if (isset($_POST['search'])){

	$_SESSION['search'] = $_POST['searchh'];

	header('Location: payment_result.php');
    exit;
}

		$sql = "SELECT amount, message from donateCentrally where name = '$name' and status = 'complete' ";

		$rs = mysqli_query($mysqli, $sql);

		$sql = "SELECT amount, message from foundationDonations where name = '$name' and status = 'complete' ";

		$rs2 = mysqli_query($mysqli, $sql);

		$serial = 1;


?>

<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
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
	<h1>Payment History</h1>  

	<div>
		<form action = "payment-history.php" method = "POST">
		  <label for="search">Search:</label>
		  <input type="search" id="searchh" name="searchh">
		  <input type="submit" name="search" value="Search">
		</form>
	</div>
	
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