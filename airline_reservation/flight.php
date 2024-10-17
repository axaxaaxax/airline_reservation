<?php 
// Include database connection
include 'db.php'; 

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Available Flights</title>
</head>
<body>
    <header>
        <h1>Available Flights</h1>
    </header>
    <main>
        <h2>Your Search Results:</h2>

        <?php
        // Check if required parameters are set
        if (isset($_GET['departure_city']) && isset($_GET['arrival_city']) && isset($_GET['departure_time'])) {
            // Get form inputs
            $departure_city = $_GET['departure_city'];
            $arrival_city = $_GET['arrival_city'];
            $departure_time = $_GET['departure_time'];

            // Validate inputs (simple empty check)
            if (!empty($departure_city) && !empty($arrival_city) && !empty($departure_time)) {
                
                // Prepare SQL statement using prepared statements to prevent SQL injection
                $stmt = $conn->prepare("SELECT * FROM flights WHERE departure_city = ? AND arrival_city = ? AND departure_time >= ?");
                $stmt->bind_param("sss", $departure_city, $arrival_city, $departure_time); // 'sss' means all inputs are strings

                // Execute the statement
                $stmt->execute();

                // Get the result set
                $result = $stmt->get_result();

                // Check if flights are found
                if ($result->num_rows > 0) {
                    // Display the flights in a table
                    echo "<table>";
                    echo "<tr><th>Flight Number</th><th>Departure city</th><th>Arrival city</th><th>Departure Time</th><th>Arrival Time</th><th>Available Seats</th><th>Select</th></tr>";
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['flight_number']}</td>
                                <td>{$row['departure_city']}</td>
                                <td>{$row['arrival_city']}</td>
                                <td>{$row['departure_time']}</td>
                                <td>{$row['arrival_time']}</td>
                                <td>{$row['seats_available']}</td>
                                <td><a href='seat_selection.php?flight_id={$row['id']}'>Select Seats</a></td>
                              </tr>";
                    }
                    echo "</table>";
                } else {
                    // No flights found for the selected criteria
                    echo "<p>No flights available for the selected criteria.</p>";
                }

                // Close the statement
                $stmt->close();

            } else {
                // Handle case where one or more inputs are empty
                echo "<p>Please provide valid input for departure_city, arrival_city, and departure_city time.</p>";
            }

        } else {
            // Handle case where form is not submitted or parameters are missing
            echo "<p>Please fill in the search form to see available flights.</p>";
        }
        ?>

    </main>
    <footer>
        <p>&copy; 2024 Airline Reservation System</p>
    </footer>
</body>
</html>
