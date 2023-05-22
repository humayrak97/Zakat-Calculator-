<?php

$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("zakat644c03e6c44b8");
$store_passwd=urlencode("zakat644c03e6c44b8@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

	echo "\nStatus: ".$status."\r\nTransaction Date: ".$tran_date."\r\nTransaction ID: ".$tran_id."\r\nStore Amount: ".$store_amount;
/*
$host = "localhost";
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

$sql = "UPDATE donateCentrally SET status = 'complete' WHERE transaction_id = '$tran_id' ";
        
//fire query to save entries and check it with if statement
$rs = mysqli_query($con, $sql);
if($rs)
{
    echo "Message has been sent successfully!";
}
	else{
 	echo "Error, Message didn't send! Something's Wrong."; 
}



	header('Location: payment-history.php?referrer=http://localhost/zakat/Frontend/glogin/success.php');
    exit;

} else {

	echo "Failed to connect with SSLCOMMERZ";
}
?>

