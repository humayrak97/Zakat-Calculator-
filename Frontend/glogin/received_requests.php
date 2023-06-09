<?php
        /*$dbhost ='localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = "zakat"; */

        $dbhost = "localhost";
		$dbuser = "id20779725_zakatitapp";
		$dbpass = "Triplet@jh23";
		$dbname = "id20779725_zakat";

        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname) ;

        if ($mysqli -> connect_error){
            printf("connection failed",$mysqli-> connect_error);
            exit();
        }


        $sql = "SELECT * from requestForZakatable";

        $rs1 = mysqli_query($mysqli, $sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Received Requests</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="received_requests.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
	<header>
		<div class="logo">
                <img src="photos/logo.png"alt="Zakat Calculator Logo">
                </div>
		<nav>
            <ul>
                <li><a href="received_payments.php">Received Payments</a></li>
                
                <li><a href="received_requests.php">Received Requests</a></li>
                
                <li><a href="receiving_people.php">Zakatable People</a></li>
                <li><a href="receiving_foundations.php">Zakatable Foundations</a></li>
                <form action = 'profile.php' method="POST">
                <li><a href="login.php"><input type="submit" name="logout" value="Sign Out"></a></li>
                </form>
            </ul>
        </nav>
	</header>
	<div class="container">
	<h1>Pending Requests</h1>
	
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>NID Number</th>
                <th>Phone</th>
                <th>Monthly Income</th>
                <th>Job</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($rs1)) { ?>
              <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['nid']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['income']; ?></td>
                <td><?php echo $row['job']; ?></td>
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