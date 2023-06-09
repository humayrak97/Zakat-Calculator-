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
  $username = "id20779725_zakatitapp";
  $password = "Triplet@jh23";
  $dbname = "id20779725_zakat";

  //create connection
  $con = mysqli_connect($host, $username, $password, $dbname);
  //check connection if it is working or not
  if (!$con) {
    die("Connection failed!" . mysqli_connect_error());
  }

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm-password'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $location = $_POST['location'];

  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($con, $query); // assuming $connection is your database connection object

  if (mysqli_num_rows($result) > 0) {
    header("Location: signup.php");
    // additional code to handle the error
  } else {
    // email is available, continue with registration
    //This below line is a code to Send form entries to database
    $sql = "INSERT INTO users (name, email, password, title, phone, location, zakat_due) VALUES ('$name', '$email', '$password', '$gender', '$phone', '$location', '')";
    //fire query to save entries and check it with if statement
    $rs = mysqli_query($con, $sql);
    if ($rs) {
      header("Location: login.php");
    } else {
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zakat Calculator - Signup</title>
  <link rel="stylesheet" href="signup.css">

  <style>
    body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url("photos/bg.png");
  background-size: cover;
  background-position: center;
  height: 100vh;
  display: flex;
  flex-direction: column;

  .container {
  max-width: 500px;
  width: 90%;
  margin: auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position: relative;
  margin-top: auto;
  margin-bottom: auto;
}

h1 {
  font-size: 36px;
  text-align: center;
  margin-top: 30px;
  margin-bottom: 30px;
}


    .gender-options {
      display: block;
      flex-direction: row;
      align-items: center;
      margin: 1em;
    }

    .gender-options label {
      margin-left: 10px;
    }

    .gender-options input {
      margin: 10px;
    }
  </style>
  <script src="https://accounts.google.com/gsi/client" async defer></script>

  <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-auth.js"></script>

  <script type="text/javascript">
    function validateForm() {
      const name = document.forms["myForm"]["name"].value;
      const email = document.forms["myForm"]["email"].value;
      const gender = document.forms["myForm"]["gender"].value;
      const phone = document.forms["myForm"]["phone"].value;
      const location = document.forms["myForm"]["location"].value;
      const password = document.forms["myForm"]["password"].value;
      const confirmPassword = document.forms["myForm"]["confirm-password"].value;

      // Check if name is empty
      if (name === "") {
        alert("Name must be filled out");
        return false;
      }

      // Check if email is valid
      if (!/\S+@\S+\.\S+/.test(email)) {
        alert("Invalid email address");
        return false;
      }

      // Check if gender is selected
      if (gender === "") {
        alert("Please select your gender");
        return false;
      }

      // Check if phone number is valid
      if (!/^\+?\d+$/.test(phone)) {
        alert("Invalid phone number");
        return false;
      }

      // Check if location is selected
      if (location === "") {
        alert("Please provide your location");
        return false;
      }

      // Check if password is valid
      if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
      }

      // Check if confirm password matches password
      if (confirmPassword !== password) {
        alert("Passwords do not match");
        return false;
      }

      return true;
    }

  </script>
</head>

<body>
  <div class="container">
    <h1>Signup</h1>
    <form action="signup.php" name="myForm" onsubmit="return validateForm()" method="POST">
      <label for="name">Name</label>
      <input type="text" id="name" name="name">

      <label for="email">Email</label>
      <input type="email" id="email" name="email">
      <span id="email-error"></span>

      <label for="gender">Gender</label>
      <div class="gender-options">
        <label for="male"> Male </label>
        <input type="radio" id="male" name="gender" value="male">

        <label for="female"> Female </label>
        <input type="radio" id="female" name="gender" value="female">

        <label for="other"> Other </label>
        <input type="radio" id="other" name="gender" value="other">

      </div>

      <label for="phone">Phone</label>
      <input type="text" id="phone" name="phone">
      <span id="email-error"></span>

      <label for="location">Location</label>
      <input type="text" id="location" name="location">
      <span id="email-error"></span>

      <label for="password">Password</label>
      <input type="password" id="password" name="password">

      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm-password">

      <button type="submit">Sign Up</button>
    </form>


    <div class="social-login">
    <?php
   
    require_once 'vendor/autoload.php';
  $clientID = '536728347311-lgdo8820guatd7ifipd63pelpjgn9pnv.apps.googleusercontent.com';
  $clientSecret = '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';
  // use your directory like this
  // $redirectUrl = 'http://localhost/zakat/Frontend/glogin/login.php';
  $redirectUrl = 'http://localhost/Zakat-Calculator-/Frontend/glogin/login.php';

  // Creating client request to google
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUrl);
  $client->addScope('profile');
  $client->addScope('email');
  $query = "SELECT * FROM users WHERE email = '$email'";
  

  if(isset($_GET['code'])){
  $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token);
  //Getting user profile
  $gauth = new Google_Service_Oauth2($client);
  $google_info = $gauth->userinfo->get();
  $email = $google_info->email;
  $name =$google_info->name;
  echo "Welcome ".$name." You're signed up using email:" .$email;

  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $name;

  header('Location: profile.php');

  }
  else{


    $googleLoginUrl = $client->createAuthUrl();

    echo '<div class="social-login">
            <a href="' . $googleLoginUrl . '">
              <button>
                <img src="https://img.icons8.com/color/48/000000/google-logo.png"/>
                <h4>Sign Up with Google</h4>
              </button>
            </a>
          </div>';
  
  
  }
  ?>

      <!--<button onclick="signInWithGoogle()">
        <img src="https://img.icons8.com/color/48/000000/google-logo.png"/>
        <h4>Log In with Google</h4> 
      </button> -->
      <!--<button onclick="signInWithFacebook()">
        <img src="https://img.icons8.com/color/48/000000/facebook.png"/>
        <h4>Log In with Facebook</h4>
      </button> -->
    </div>

    <div class="error-message">
      <!-- Display error message here -->
    </div>
  </div>
  
</body>
<footer>
  <p>&copy; 2023 Zakat Calculator. All rights reserved.</p>
</footer>

</html>