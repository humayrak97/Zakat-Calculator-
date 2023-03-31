<?php
$dbhost ='localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = "zakat";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname) ;
if ($mysqli -> connect_error){
	printf("connection failed",$mysqli-> connect_error);
	exit();
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get the input values from the form
  $savings = $_POST['input1'];
  $expenses = $_POST['input2'];
  $debt = $_POST['input3'];
  $gold = $_POST['input4'];
  $silver = $_POST['input5'];

  // Calculate the Zakat based on the input values
  $zakat = 0.025 * ($savings - $expenses - $debt);

  if ($gold > 0) {
    $zakat += 0.025 * $gold;
  }

  if ($silver > 0) {
    $zakat += 0.025 * $silver;
  }

  $query = "INSERT INTO calculator (savings, expense, debt, silver, gold) VALUES ('$savings', '$expenses', '$debt', '$silver', '$gold')";
  if(mysqli_query($mysqli, $query)) {
	echo "Your Zakat amount is: " . $zakat . " TK";
  } else{
	echo "Error: ";
  }
 
  // Output the Zakat amount
  
}
?>


