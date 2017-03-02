<?php

$dbhost 	= "localhost";
$user		= "root";
$password 	= "";
$dbname 	= "my_db";

$conn = mysqli_connect($dbhost, $user, $password, $dbname);

if(!$conn) {
	die("Connect Failed: " . $conn->connect_error);
}
//echo ("Connected Succefully!");
?>