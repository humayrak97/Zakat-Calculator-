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
	<title>Zakatable Foundations</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="receiving_foundations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
	<header>
        <div class="logo">
                <img src="photos/logo.svg"alt="Zakat Calculator Logo">
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
	<h1>Zakatable Foundations</h1>
	
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>License Number</th>
                <th>Phone</th>
                <th>Added On</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Islamic Foundation</td>
                <td>hehe@hehe.com</td>
                <td>Bashundhara R/A, Block C, Dhaka, BD</td>
                <td>123456ABCDEF</td>
                <td contenteditable="true">+880 1234567891</td>
                <td contenteditable="true">2022-02-20</td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i></button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Islamic Foundation</td>
                <td>hehe@hehe.com</td>
                <td>Bashundhara R/A, Block C, Dhaka, BD</td>
                <td>123456ABCDEF</td>
                <td contenteditable="true">+880 1234567891</td>
                <td contenteditable="true">2022-02-20</td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i></button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Islamic Foundation</td>
                <td>hehe@hehe.com</td>
                <td>Bashundhara R/A, Block C, Dhaka, BD</td>
                <td>123456ABCDEF</td>
                <td contenteditable="true">+880 1234567891</td>
                <td contenteditable="true">2022-02-20</td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i></button></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Islamic Foundation</td>
                <td>hehe@hehe.com</td>
                <td>Bashundhara R/A, Block C, Dhaka, BD</td>
                <td>123456ABCDEF</td>
                <td contenteditable="true">+880 1234567891</td>
                <td contenteditable="true">2022-02-20</td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i></button></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Islamic Foundation</td>
                <td>hehe@hehe.com</td>
                <td>Bashundhara R/A, Block C, Dhaka, BD</td>
                <td>123456ABCDEF</td>
                <td contenteditable="true">+880 1234567891</td>
                <td contenteditable="true">2022-02-20</td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i></button></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Islamic Foundation</td>
                <td>hehe@hehe.com</td>
                <td>Bashundhara R/A, Block C, Dhaka, BD</td>
                <td>123456ABCDEF</td>
                <td contenteditable="true">+880 1234567891</td>
                <td contenteditable="true">2022-02-20</td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i></button></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Islamic Foundation</td>
                <td>hehe@hehe.com</td>
                <td>Bashundhara R/A, Block C, Dhaka, BD</td>
                <td>123456ABCDEF</td>
                <td contenteditable="true">+880 1234567891</td>
                <td contenteditable="true">2022-02-20</td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i></button></td>
            </tr>
            

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