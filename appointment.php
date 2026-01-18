<?php
session_start();

// Check if payment status is not set or indicates payment hasn't been made
if (!isset($_SESSION['payment_status']) || $_SESSION['payment_status'] != 1) {
    header("Location: appo_Pay.html");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wedlux";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the appointment date from the form
    $appointmentDate = $_POST["Appo_Date"];

    // SQL query to insert the appointment date into the 'appointment' table
    $sql = "INSERT INTO appointment (Appo_Date) VALUES (?)";
    
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $appointmentDate);

    // Execute the statement
    if ($stmt->execute()) {
        session_unset();
        session_destroy();
        echo "<script>
                alert('Thank you for scheduling an appointment!');
                window.location.href = 'professionals.html'; // Redirect to profile.php after showing the alert
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
