<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    $sql = "INSERT INTO users (name, password, email) VALUES ('$name', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: index.php"); // Redirect to homepage
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
