<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Booking Management</title>
</head>
<body>
    <header>
        <h1>Flight Booking</h1>
    </header>
    <form action="book.php" method="post">
        <input type="text" name="flight_id" placeholder="Flight ID" required>
        <input type="text" name="user_id" placeholder="User ID" required>
        <input type="submit" value="Book Flight">
    </form>
    <footer>
        <p>&copy; 2024 Airline Reservation System</p>
    </footer>
</body>
</html>
