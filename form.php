<?php # Script 13.6 - post_message.php
require 'mysqli_connect.php';
function redirect_user($page = 'index.html'){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $url = rtrim($url, '/\\');
    $url .= '/'.$page;
    header("Location: $url");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
	// Connect to the database:
	//$dbc = mysqli_connect('localhost', 'username', 'password');

	// Make the query:
	$q = 'INSERT INTO queries (name, email, phone, city, province, subject, description) VALUES (?, ?, ?, ?, ?, ?, ?)';

	// Prepare the statement:
	$stmt = $mysqli->prepare($q);

	// Bind the variables:
	$stmt->bind_param('sssssss', $user, $email, $phone, $city, $province, $sub, $desc);

	// Assign the values to variables:
	$user = strip_tags($_POST['uname']);
	$email = strip_tags($_POST['email']);
    $phone = strip_tags($_POST['phone']);
	$city = strip_tags($_POST['city']);
	$province = strip_tags($_POST['province']);
    $sub = strip_tags($_POST['subject']);
    $desc = strip_tags($_POST['description']);

	// Execute the query:
	$stmt->execute();
     
	// Print a message based upon the result:
	if ($stmt->affected_rows == 1) {
		echo '<script>alert("Successfully registered your request. We will get back to you at the earliest.")</script>';
		redirect_user('guides.html');
	} else {
		echo '<script>alert("Failed to register your request. Please try again!")</script>';
	}

	// Close the statement:
	$stmt->close();
    unset($stmt);
	// Close the connection:
	$mysqli->close();
    unset($mysqli);
} // End of submission IF.

// Display the form:
?>