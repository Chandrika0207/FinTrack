<?php
$servername = "localhost";      // XAMPP runs MySQL on localhost
$username = "root";             // Default username for XAMPP
$password = "";                 // Default password is empty
$dbname = "finance_tracking_system"; // Replace with your actual DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Optional: Uncomment if you want to test connection message
// echo "Connected successfully";
?>