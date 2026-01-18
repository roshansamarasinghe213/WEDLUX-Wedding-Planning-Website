<?php
// Include your database connection file if not already included
require_once("db_connection.php");
?>
<?php

session_start();

if (isset($_SESSION['user_data'])) {
    $userData = $_SESSION['user_data'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Confirmation</title>
    <link rel="icon" type="image/x-icon" href="home_IMG/C_logo2.png">
    <link rel="stylesheet" type="text/css" href="confirmation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Show the popup and overlay
            document.querySelector('.overlay').classList.add('active');
            document.querySelector('.popup').classList.add('active');
        });

        // function closePopup() {
        //     document.querySelector('.overlay').classList.remove('active');
        //     document.querySelector('.popup').classList.remove('active');
        // }

        function refreshPage() {
            location.reload();
        }
    </script>
</head>

<body>

    <div class="overlay"></div>

    <div class="popup">
        <!-- <span class="popup-close" onclick="closePopup()">&times;</span> -->
        <a href="homes.php"><span class="popup-close">&times;</span></a>
        <i class="fa fa-check-circle"></i> <!-- Font Awesome check-circle icon -->
        <h2>Thank you for your payment !</h2>

        <p>Your Payment has been processed successfully. Here are your payment details:</p>

        <ul>
            <li>Name: <?php echo $userData['firstname']; ?></li>
            <li>Email: <?php echo $userData['email']; ?></li>
            <li>Address: <?php echo $userData['address']; ?></li>
            <li>City: <?php echo $userData['city']; ?></li>
            <li>State: <?php echo $userData['state']; ?></li>
            <li>Zip: <?php echo $userData['zip']; ?></li>
        </ul>

        <p>Our team will be contact you soon.Stay alert.</p>

        <button onclick="refreshPage()">OK</button>
    </div>
    
</body>

</html>

<?php
    unset($_SESSION['user_data']); // Clear session data
} else {
    header('Location: payment.html'); // Redirect to the main page if no session data
}
?>
