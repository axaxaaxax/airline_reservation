<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Seat Selection</title>
</head>
<body>
    <header>
        <h1>Select Your Seats</h1>
    </header>
    <main>
        <?php
        if (isset($_GET['flight_id'])) {
            $flight_id = $_GET['flight_id'];

            $sql = "SELECT * FROM seats WHERE flight_id = $flight_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<form action='book.php' method='POST' class='seat-selection-form'>";
                echo "<input type='hidden' name='flight_id' value='$flight_id'>";
                echo "<h2 class='seat-selection-header'>Select your seats:</h2>";

                echo "<div class='seat-list'>";
                while ($row = $result->fetch_assoc()) {
                    $seat_number = $row['seat_number'];
                    $is_booked = $row['is_booked'];

                    if (!$is_booked) {
                        echo "<label class='seat-item'>
                                <input type='checkbox' name='seat_numbers[]' value='$seat_number'> Seat $seat_number
                              </label>";
                    }
                }
                echo "</div>";

                echo "<input type='submit' value='Book Selected Seats' class='book-button'>";
                echo "</form>";
            } else {
                echo "<p>No seats available for this flight.</p>";
            }
        } else {
            echo "<p>Flight ID not provided.</p>";
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Airline Reservation System</p>
    </footer>
</body>
</html>
