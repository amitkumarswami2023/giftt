<?php

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "contact_form_db";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// Insert query
$sql = "INSERT INTO contact_messages 
        (full_name, email, phone, message) 
        VALUES 
        ('$full_name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {

    // Redirect to thank you page
    header("Location: thankyou.html");
    exit();

} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>