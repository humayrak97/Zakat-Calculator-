<?php
        //database details. You have created these details in the third step. Use your own.
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
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $query); // assuming $connection is your database connection object

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.html");
        // additional code to handle the error
        } 

        else {
        // email is available, continue with registration
            //This below line is a code to Send form entries to database
        $sql = "INSERT INTO users (name, email, password, title, phone, location, zakat_due) VALUES ('$name', '$email', '$password', '', '', '', '')";
      //fire query to save entries and check it with if statement
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
            header("Location: about.html");
        }
        else{
            header("Location: signup.html");
        }
        }

        
      //connection closed.
        mysqli_close($con);
?>