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

    $body = 'Dear ' . $_POST["firstname"] . ',<br><br>' .
            'Your payment request is successfully received. If there is any issue please contact us! Thank you for using our service. Please wait for one of our representatives to contact you for more information about your requirement..<br><br>' .
            'Kind regards<br>' .
            'WEDLUX Event Planners pvt Ltd';

    $mail->Body = $body;

    $mail->send();
}

?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include('db_connection.php');

    // Retrieve and sanitize form data
    $firstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING);
    $paymentMethod = filter_input(INPUT_POST, 'fav_language', FILTER_SANITIZE_STRING);
    $cardName = filter_input(INPUT_POST, 'cardname', FILTER_SANITIZE_STRING);
    $cardNumber = filter_input(INPUT_POST, 'cardnumber', FILTER_SANITIZE_STRING);
    $expMonth = filter_input(INPUT_POST, 'expmonth', FILTER_SANITIZE_NUMBER_INT);
    $expYear = filter_input(INPUT_POST, 'expyear', FILTER_SANITIZE_NUMBER_INT);
    $cvv = filter_input(INPUT_POST, 'cvv', FILTER_SANITIZE_NUMBER_INT);

    // Insert data into the 'payment' table
    $sql = "INSERT INTO payment (Pay_category, Pay_type, Pay_Date, Pay_Full_name, Pay_Email, Pay_Address, Pay_City, Pay_State, Pay_zip, Pay_Card_name, Pay_card_num, Pay_CEX_Month, Pay_CEX_year, Pay_CVV) VALUES ('$paymentMethod', '$paymentMethod', NOW(), '$firstName', '$email', '$address', '$city', '$state', '$zip', '$cardName', '$cardNumber', '$expMonth', '$expYear', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        // Store user data in session
        $_SESSION['user_data'] = [
            'firstname' => $firstName,
            'email' => $email,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'payment_method' => $paymentMethod
        ];

        $_SESSION['payment_status'] = 1;
        header('Location: profile.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
