<?php
$hostname = "us-cdbr-azure-central-a.cloudapp.net";
$username = "bf4cd4b8bbfb2e";
$password = "8d5baa2f";

$conn = mysqli_connect($hostname,$username,$password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
	echo "Connected successfully";
?>
