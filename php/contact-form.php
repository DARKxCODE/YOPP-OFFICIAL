<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
        $message=$_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','contact-us');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact_details(name, email, message,phone) 
                values(?, ?, ?, ?)");
		$stmt->bind_param("sssi", $name, $email, $message, $phone);
		$execval = $stmt->execute();
		header('Location: ../index.html'); 
		$stmt->close();
		$conn->close();
	}
?>
