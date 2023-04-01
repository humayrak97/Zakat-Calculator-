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
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $job = $_POST['job'];
        $email = $_POST['email'];
        $organization = $_POST['organizaion'];
        $amount = $_POST['amount'];
        $message = $_POST['message'];
        $currency = $_POST['currency'];
        

        
        //This below line is a code to Send form entries to database
        $sql = "INSERT INTO foundationDonations (name, address, phone, job, email, organization, amount, message, currency) VALUES ('$name', '$address', '$phone', '$job', '$email', '$organization', '$amount', '$message', '$currency')";
        
      //fire query to save entries and check it with if statement
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
            echo "Message has been sent successfully!";
        }
      	else{
         	echo "Error, Message didn't send! Something's Wrong."; 
        }
      //connection closed.
        mysqli_close($con);
?>