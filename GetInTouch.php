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

    $mail->Subject = 'Thank You';

    $body = 'Dear ' . $_POST["name"] . ',<br><br>' .
            'Many thanks for getting in touch. One of the team will be in touch shortly to talk through your event requirements.<br><br>' .
            'Kind regards<br>' .
            'WEDLUX Event Planners pvt Ltd';

    $mail->Body = $body;

    $mail->send();
}




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedlux";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST["phoneNumber"]);

    // Handling multiple selections for service checkboxes
    $services = isset($_POST["service"]) ? implode(", ", $_POST["service"]) : "";

    // Handling multiple selections for city checkboxes
    $cities = isset($_POST["city"]) ? implode(", ", $_POST["city"]) : "";

    $budget = mysqli_real_escape_string($conn, $_POST["budget"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $stmt = $conn->prepare("INSERT INTO get_in_touch (name, email, phoneNumber, service, city, budget, date, description) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssss", $name, $email, $phoneNumber, $services, $cities, $budget, $date, $description);

    if ($stmt->execute()) {
        header("Location: GetInTouch.html?success=Record inserted successfully");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
