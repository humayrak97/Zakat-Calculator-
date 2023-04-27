<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: profile.php');
    exit;
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        
          $email = $_POST['email'];
          $password = $_POST['password'];

          $query = "SELECT * FROM users WHERE email = '$email'";
          $result = mysqli_query($con, $query); // assuming $connection is your database connection object

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $name = $row["name"];
          $title = $row["title"];
          $location = $row["location"];
          $email = $row["email"];
          $phone = $row["phone"];
          $zakat_due = $row["zakat_due"];

          // Set the session variables and redirect to the profile page
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $name;

          header("Location: profile.php");
        } 

        else {
          header("Location: login.php");
        }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zakat Calculator - Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form action="login.php" method="POST">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Log In</button>
    </form>

    <div class="social-login">
      <button onclick="signInWithGoogle()">
        <img src="https://img.icons8.com/color/48/000000/google-logo.png"/>
        <h4>Log In with Google</h4>
      </button>
      <button onclick="signInWithFacebook()">
        <img src="https://img.icons8.com/color/48/000000/facebook.png"/>
        <h4>Log In with Facebook</h4>
      </button>
    </div>

    <div class="error-message">
      <!-- Display error message here -->
    </div>
  </div>

  <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-auth.js"></script>

  <footer>
    <p>&copy; 2023 Zakat Calculator. All rights reserved.</p>
  </footer>
</body>
</html>
