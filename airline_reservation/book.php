<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Booking Confirmation</title>
    <style>
        .button {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff; /* Primary blue color */
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .confirmation-message, .error-message {
            padding: 15px;
            font-size: 18px;
            margin: 20px 0;
        }

        .confirmation-message {
            color: #2e7d32; /* Green for success */
        }

        .error-message {
            color: #c62828; /* Red for error */
        }

        .center-text {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Booking Confirmation</h1>
    </header>
    <main class="center-text">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $flight_id = $_POST['flight_id'];

            // Check if 'seat_numbers' is set and is an array
            if (!empty($_POST['seat_numbers']) && is_array($_POST['seat_numbers'])) {
                $seat_numbers = $_POST['seat_numbers'];

                // Process each selected seat for booking
                foreach ($seat_numbers as $seat_number) {
                    $sql_seat_update = "UPDATE seats SET is_booked = TRUE WHERE flight_id = $flight_id AND seat_number = '$seat_number'";
                    $conn->query($sql_seat_update);
                }

                echo "<div class='confirmation-message'>";
                echo "<p>Booking successful for seats: <strong>" . implode(", ", $seat_numbers) . "</strong></p>";
                echo "</div>";
            } else {
                echo "<div class='error-message'>";
                echo "<p>No seats selected. Please go back and choose your seats.</p>";
                echo "</div>";
            }
        } else {
            echo "<div class='error-message'>";
            echo "<p>Invalid request. Please try again.</p>";
            echo "</div>";
        }
        ?>
        <div class="back-button">
            <a href="index.php" class="button">Return to Homepage</a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Airline Reservation System</p>
    </footer>
</body>
</html>
