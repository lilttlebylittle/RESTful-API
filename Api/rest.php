<?php

	require('config.php');

	$method = $_SERVER['REQUEST_METHOD'];
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	}

	if($method == "GET" && isset($id) &&!isset($action)) {

		$sql = "SELECT * FROM customers where id = $id";
		$result = $conn->query($sql) or die ("Error:" . mysqli_error($conn));
		$customer = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)) {
        	echo "id: " . $customer["id"]. " - username: " . $customer["username"]. " - email: " . $customer["email"]. " - password" . $customer["password"]. " - Profile Name: " . $customer["profilename"];
		} else {
	    	echo "0 results";
		}
		$conn->close();

	} elseif($method == "POST" && $action == "add") {

		$data = file_get_contents ("php://input");
	    $json = json_decode($data, true);
	    $username = $json["username"];
	    $email = $json["email"];
	    $password = $json["password"];
	    $profilename = $json["profilename"];


		$sql = "INSERT INTO customers (username, email, password, profilename) values ('$username', '$email', '$password', '$profilename')";
		if($conn->query($sql) === true) {
			echo "Customer Added!";	
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

	}elseif ($method == "PUT" && $action == "update") {
		$data = file_get_contents ("php://input");
	    $json = json_decode($data, true);
	    $username = $json["username"];
	    $email = $json["email"];
	    $password = $json["password"];
	    $profilename = $json["profilename"];

	    $sql = "UPDATE customers SET username = '$username', email = '$email', password = '$password', profilename = '$profilename' where id = $id";
	    if($conn->query($sql) === true) {
	    	echo "Customer Updated";
	    } else {
	    	echo "Error Updating Customer " . $conn->error;
	    }
	    $conn->close();
	} elseif($method == "DELETE" && $action == "del") {

		$sql = "DELETE FROM customers where id = $id";

		if($conn->query($sql) === true) {
			echo "Customer Deleted!";
		} else {
			echo "Error Deleting Record: " . $conn->error;
		}

		$conn->close();

	}
?>