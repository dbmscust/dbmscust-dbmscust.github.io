<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$re_password = $_POST['re_password'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('sql6.freesqldatabase.com','rD5PxN3JSr','','sql6502288');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, password, re_password) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $password, $re_password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
