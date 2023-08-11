<?php
// Retrieve the user information from the form submission
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Validate the data and store it securely
// (implement your own validation and storage logic here)

// Example code to store the data in a database
$servername = "localhost";
$dbusername = "your_username";
$dbpassword = "your_password";
$dbname = "your_database_name";

// Create a database connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement to insert the user information into a table
$stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $email);
$stmt->execute();

// Close the database connection
$stmt->close();
$conn->close();

// Redirect the user to a success page or perform any other necessary actions
header("Location: success.html");
exit();
?>
