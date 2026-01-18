<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Function to send update notification email
function sendUpdateEmail($email, $firstName)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'wedlux.pvt.ltd@gmail.com';
    $mail->Password = 'yzzjnrnqzqinuuqn ';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('wedlux.pvt.ltd@gmail.com');
    $mail->addAddress($email);
    $mail->isHTML(true);

    $mail->Subject = 'Account Update Alert';

    $body = 'Dear ' . $firstName . ',<br><br>' .
            'Your Professional Account has successfully updated! Feel free to walk through our website and make an eye-catching profile. If you did not update your profile, please contact us.<br><br>' .
            'Kind regards<br>' .
            'WEDLUX Event Planners pvt Ltd';

    $mail->Body = $body;

    $mail->send();
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedlux";

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["Prof_ID"])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the session
$id = $_SESSION["Prof_ID"];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["Prof_Fname"];
    $lastName = $_POST["Prof_Lname"];
    $jobRole = $_POST["Prof_Jobrole"];
    $email = $_POST["Prof_Email"];
    $phoneNumber = $_POST["Prof_PhoneNumber"];
    $bio = $_POST["Prof_BIO"];

    // Handle image upload
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $targetDir = "uploads/"; // Specify your target directory
        $targetFile = $targetDir . basename($_FILES['img']['name']);

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFile)) {
            // Update database with the image path
            $stmt = $conn->prepare("UPDATE professionals 
                                    SET Prof_Fname = ?, Prof_Lname = ?, Prof_Jobrole = ?,
                                        Prof_Email = ?, Prof_PhoneNumber = ?, Prof_BIO = ?, Prof_image = ?
                                    WHERE Prof_ID = ?");
            $stmt->bind_param("sssssssi", $firstName, $lastName, $jobRole, $email, $phoneNumber, $bio, $targetFile, $id);

            $result = $stmt->execute();

            // Close the statement
            $stmt->close();

            if ($result) {
                // Send update notification email
                sendUpdateEmail($email, $firstName);

                // Redirect to the profile page with success message
                header("Location: profesional_profile.php?update=success");
                exit();
            } else {
                echo "Error updating record in the database.";
            }
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        // Handle the case where no image is uploaded
        echo "No image uploaded.";
    }
}

// Close the database connection
$conn->close();

?>
