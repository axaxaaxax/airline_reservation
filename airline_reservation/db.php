<?php
$servername = "localhost";
$name = "root"; // Use your database username
$password = ""; // Use your database password
$dbname = "airline_reservation";

// Create connection
$conn = new mysqli($servername, $name, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
