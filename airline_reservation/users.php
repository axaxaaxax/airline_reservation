<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>User Registration</title>
</head>
<body>
    <header>
        <h1>User Registration</h1>
    </header>
    <form action="register.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Register">
    </form>
    <footer>
        <p>&copy; 2024 Airline Reservation System</p>
    </footer>
</body>
</html>
