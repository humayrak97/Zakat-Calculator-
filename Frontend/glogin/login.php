<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: profile.php');
    exit;
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        /*$host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zakat"; */
        $host = "localhost";
  $username = "id20779725_zakatitapp";
  $password = "Triplet@jh23";
  $dbname = "id20779725_zakat";
 
        //create connection
        $con = mysqli_connect($host, $username, $password, $dbname);
        //check connection if it is working or not
        if (!$con)
        {
            die("Connection failed!" . mysqli_connect_error());
        }
        
          $email = $_POST['email'];
          $password = $_POST['password'];

          $query = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
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
      /*
  require_once 'vendor/autoload.php';
  $clientID = '536728347311-lgdo8820guatd7ifipd63pelpjgn9pnv.apps.googleusercontent.com';
  $clientSecret = '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';
  // use your directory like this
  $redirectUrl = 'http://localhost/482L/Zakat-Calculator-/Frontend/glogin/login.php';

  // Creating client request to google
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUrl);
  $client->addScope('profile');
  $client->addScope('email');

  if(isset($_GET['code'])){
  $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token);
  //Getting user profile
  $gauth = new Google_Service_Oauth2($client);
  $google_info = $gauth->userinfo->get();
  $email = $google_info->email;
  $name =$google_info->name;
  
  echo "Welcome ".$name." You're registered using email:" .$email;

  }
  else{


    $googleLoginUrl = $client->createAuthUrl();

    echo '<div class="social-login">
            <a href="' . $googleLoginUrl . '">
              <button>
                <img src="https://img.icons8.com/color/48/000000/google-logo.png"/>
                <h4>Log In with Google</h4>
              </button>
            </a>
          </div>';
  
   // echo "<a href= '".$client->createAuthUrl()."'>Login with Google</a>";
  }
*/

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

  if(isset($_GET['code'])){
  $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token);
  //Getting user profile
  $gauth = new Google_Service_Oauth2($client);
  $google_info = $gauth->userinfo->get();
  $email = $google_info->email;
  $name =$google_info->name;
  
  echo "Welcome ".$name." You're logged in using email:" .$email;

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
                <h4>Log In with Google</h4>
              </button>
            </a>
          </div>';
  
   // echo "<a href= '".$client->createAuthUrl()."'>Login with Google</a>";
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

  <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-auth.js"></script>

  <footer>
    <p>&copy; 2023 Zakat Calculator. All rights reserved.</p>
  </footer>
</body>
</html>
