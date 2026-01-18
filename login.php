<?php
session_start();

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


        // Re direct to location
        function redirect($location) {
            header("Location: $location");
            exit();
        }
    
        //show alert
        function showAlert($message) {
            echo '<script>alert("' . $message . '");</script>';
        }

    // Check if it's a user login
    if (isset($_POST["User_Email"]) && isset($_POST["User_Password"])) {
        $user_email = $_POST["User_Email"];
        $user_password = $_POST["User_Password"];
    
        $stmt_prof = $conn->prepare("SELECT User_ID, User_Password FROM user WHERE User_Email = ?");
        $stmt_prof->bind_param("s", $user_email);
        $stmt_prof->execute();
        $result_prof = $stmt_prof->get_result();
    
        if ($result_prof->num_rows > 0) {
            $row = $result_prof->fetch_assoc();
    
            if (password_verify($user_password, $row["User_Password"])) {
                // Login successful for users
                showAlert("Login successful for user. Email: $user_email");
                $_SESSION["User_ID"] = $row["User_ID"];
                redirect("professionals.html");
            } else {
                showAlert("Invalid email or password");
            }
        } else {
            showAlert("Invalid email or password");
        }
        $stmt_prof->close();
    }



    // Check if it's a professional login
if (isset($_POST["Prof_Email"]) && isset($_POST["Prof_Password"])) {
    $prof_email = $_POST["Prof_Email"];
    $prof_password = $_POST["Prof_Password"];

    $stmt_prof = $conn->prepare("SELECT Prof_ID, Prof_Password FROM professionals WHERE Prof_Email = ?");
    $stmt_prof->bind_param("s", $prof_email);
    $stmt_prof->execute();
    $result_prof = $stmt_prof->get_result();

    if ($result_prof->num_rows > 0) {
        $row = $result_prof->fetch_assoc();

        if (password_verify($prof_password, $row["Prof_Password"])) {
            // Login successful for professional
            showAlert("Login successful for professional. Email: $prof_email");
            $_SESSION["Prof_ID"] = $row["Prof_ID"];
            redirect("Profesional_profile.php");
        } else {
            showAlert("Invalid email or password");
        }
    } else {
        showAlert("Invalid email or password");
    }
    $stmt_prof->close();
}

    $error_message = "Invalid email or password";
    $conn->close();
}
?>
