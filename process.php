<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $train_number = htmlspecialchars($_POST["train_number"]);
    $berth_preference = htmlspecialchars($_POST["berth_preference"]);
    $num_passengers = htmlspecialchars($_POST["num_passengers"]);
    $travel_date = htmlspecialchars($_POST["travel_date"]);

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = ""; // Default for XAMPP
    $dbname = "train_tickets";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    $sql = "INSERT INTO ticket (name, email, phone, train_number, berth_preference, num_passengers, travel_date)
            VALUES ('$name', '$email', '$phone', '$train_number', '$berth_preference', $num_passengers, '$travel_date')";

    if ($conn->query($sql) === TRUE) {
        echo "
            <div>
                <h2>Ticket Booking Successful!</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Train Number:</strong> $train_number</p>
                <p><strong>Berth Preference:</strong> $berth_preference</p>
                <p><strong>Number of Passengers:</strong> $num_passengers</p>
                <p><strong>Travel Date:</strong> $travel_date</p>
            </div>
        ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
