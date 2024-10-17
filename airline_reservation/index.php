<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400&family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Caesar Airline</title>
</head>
<body>
    <header>
        <h1>Caesar Airline</h1>
    </header>
    <nav>
        <a href="users.php">User Registration</a>
        <a href="bookings.php">Booking</a>
    </nav>
    <main>
    <h2>Find Your Flight</h2>
    <form action="flight.php" method="GET" class="search-form">
        <div class="input-container">
            <input type="text" name="departure_city" placeholder="Departure" required class="wide-input">
            <input type="text" name="arrival_city" placeholder="Destination" required class="wide-input">
        </div>
        <input type="datetime-local" name="departure_time" required class="wide-input">
        <input type="submit" value="Search Flights" class="search-button">
    </form>
</main>
    <footer>
        <p>&copy; 2024 Airline Reservation System</p>
    </footer>
</body>
</html>
