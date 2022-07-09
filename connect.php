<?php
	$fullname = $_POST['fullname'];
	$subject = $_POST['subject'];
	$phonenumber = $_POST['phonenumber'];
	$altphonenumber = $_POST['altphonenumber'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','message');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into message(fullname, subject, phonenumber, altphonenumber, address, email, message) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiisss", $fullname, $subject, $phonenumber, $altphonenumber, $address, $email, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>