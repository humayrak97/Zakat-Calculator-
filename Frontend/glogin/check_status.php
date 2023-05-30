<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zakat";

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    printf("Connection failed: %s", $mysqli->connect_error);
    exit();
}

$name = $_POST['name']; // Assume you have sent user id in your AJAX request
echo $name;

$sql = "SELECT status FROM requestForZakatable WHERE name = $name";

?>