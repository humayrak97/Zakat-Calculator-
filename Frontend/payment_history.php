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

// Insert a new payment history record
$date = $_POST['date'];
$amount = $_POST['amount'];
$information = $_POST['information'];

$sql = "INSERT INTO payment_history (date, amount, information)
        VALUES ('$date', '$amount', '$information')";

//fire query to save entries and check it with if statement
$rs = mysqli_query($con, $sql);
if($rs)
{
    echo "New payment history record created successfully!";
}
  else{
     echo "Error, record not created. Something's Wrong!"; 
}


// Close the database connection
mysqli_close($conn);
?>
