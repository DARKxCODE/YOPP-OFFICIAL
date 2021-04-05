<?php
	$email= $_POST['email'];
    	// Database connection
	$conn = new mysqli('localhost','root','','contact-us');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into subscriber_list(email) 
                values(?)");
		$stmt->bind_param("s", $email);
		$execval = $stmt->execute();
		//echo $execval;
		header('Location: ../index.html'); 
		$stmt->close();
		$conn->close();
        //echo '<script>alert("SUBSCRIBED SUCCESSFULLY!!")</script>';
	}
?>