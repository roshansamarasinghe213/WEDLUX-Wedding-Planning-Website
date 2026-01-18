<!-- sending mails -->
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'wedlux.pvt.ltd@gmail.com';
    $mail->Password = 'yzzjnrnqzqinuuqn ';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('wedlux.pvt.ltd@gmail.com');

    $mail->addAddress($_POST["email"]);
    $mail->isHTML(true);

    $mail->Subject = 'Welcome to WEDLUX';

    $body = 'Dear ' . $_POST["first_name"] . ',<br><br>' .
            'Warm greetings from WEDLUX Team! We are thrilled to welcome you to our community of couples embarking on the beautiful journey of wedding planning. <br>
            Feel free to explore our services and portfolio on our website, and do not hesitate to reach out if you have any questions or if there is anything specific you would like assistance with. We look forward to creating magic together! <br>
            Cheers to the exciting journey ahead!<br><br>' .
            'Kind regards<br>' .
            'WEDLUX Event Planners pvt Ltd';

    $mail->Body = $body;

    $mail->send();
}

?>


<?php
// Database configuration
$hostname = "localhost";
$username = "root";
$password = "";
$database = "wedlux";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user inputs
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs with default values if not set
    $first_name = isset($_POST["first_name"]) ? sanitize_input($_POST["first_name"]) : '';
    $last_name = isset($_POST["last_name"]) ? sanitize_input($_POST["last_name"]) : '';
    $email = isset($_POST["email"]) ? sanitize_input($_POST["email"]) : '';
    $password = isset($_POST["password"]) ? password_hash($_POST["password"], PASSWORD_DEFAULT) : '';
    $birthday = isset($_POST["birthday"]) ? sanitize_input($_POST["birthday"]) : '';
    $role = isset($_POST["role"]) ? sanitize_input($_POST["role"]) : '';

    // Validate required fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($birthday) || empty($role)) {
        echo "Please fill in all the required fields.";
        exit();
    }
    
    // Check if the email already exists in the database
    $email_check_query_prof = "SELECT Prof_Email FROM professionals WHERE Prof_Email='$email'";
    $result_prof = $conn->query($email_check_query_prof);

    $email_check_query_user = "SELECT User_Email FROM user WHERE User_Email='$email'";
    $result_user = $conn->query($email_check_query_user);

    if ($result_prof->num_rows > 0 || $result_user->num_rows > 0) {
        header('Location: signup.html?error=exists');
        exit();
    }

    // Insert data into the appropriate table based on the selected role
    if ($role === 'professional') {
        $sql = "INSERT INTO professionals (Prof_Fname, Prof_Lname, Prof_Email, Prof_Password, Prof_Bday) VALUES ('$first_name', '$last_name', '$email', '$password', '$birthday')";
    } elseif ($role === 'client') {
        $sql = "INSERT INTO user (User_Fname, User_Lname, User_Email, User_Password, User_Bday) VALUES ('$first_name', '$last_name', '$email', '$password', '$birthday')";
    } else {
        // Handle other cases or provide an error message
        header('Location: signup.html?error=invalid_role');
        exit();
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: homes.php');
    } else {
        header('Location: signup.html?error=' . urlencode('Error: ' . $sql . '\n' . $conn->error));
    }
}

// Close the database connection
$conn->close();
?>


