<?php
//establish a php session
session_start();

//establish a connection
require_once("../connect.php");

//creating a variable to hold errors that may occur upon login
$error = '';

//first if to prevent injection of data into the search bar, security
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pharmacyID = trim($_POST['Pharmacy_ID']);
    $password = trim($_POST['Password']);

    //if no error has occurred, retrieve user from the database
    if (empty($error)) {

        //retrieve user details from the database
        if ($query = $conn->prepare("SELECT * FROM `pharmacy` WHERE `Pharmacy_ID` = '?' AND `Status` = 'active'")) {
            $query->bind_param('i', $pharmacyID);
            $query->execute();
            $row = $query->get_result()->fetch_assoc();

            if ($row) {

                //tests if the entered password matches that in the database
                if (hash_equals($password, $row['Password'])) {
                    $_SESSION["userid"] = $row['Pharmacy_Name'];
                    $_SESSION["user"] = $row;
            
                    //close them to prevent further action upon them
                    $query->close();
                    $conn->close();
            
                    // Redirect to the welcome page if all conditions have been satisfied
                    header("Location: pharmacyView.php");
                    exit;
                } else {
                    $error .= 'The password is not valid.';
                }
            } else {
                $error .= 'No user exists with that Pharmacy ID or Account has been deactivated. Please try again or contact us via DailyPharma@gmail.com';
            }
        }
    }
}

// Check if there is an error, and if so, display an alert
if (!empty($error)) {
    echo "<script>alert('$error');</script>";
    echo "<script>window.location.href = 'login.html';</script>";
    exit;
}

?>

<?php
// pharmacyView.php

//establish a php session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["userid"]) || !isset($_SESSION["user"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.html");
    exit;
}

// Get the user information from the session variables
$username = $_SESSION["userid"];
$user = $_SESSION["user"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title> DailyPharma - Pharmacy Home</title>
</head>
<body class="PharmacyView">

    <!--Header-->
    <header>
        <div class="logo">
            <a href="index.html">DailyPharma</a>
        </div>

        <div class="navbar">
            <nav class="navbar" id="navbar">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="logout.php" class="btn-login-popup" >Logout</a>
            </nav>

            <?php
                echo '<div class="profile">';
                echo '<a href="profile.html">';
                echo '<i class="uil uil-user"></i>' . $username . '';
                echo '</a>';
                echo ' </div>';
            ?>

        </div>

        <i class="uil uil-bars navbar-toggle" onclick="toggleOverlay()"></i>

        <div id="menu" onclick="toggleOverlay()">
            <div id="menu-content">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="profile.html">Profile</a><!--Place username here-->
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>

    <!-- Above fold -->
    <div class="image-container" id="about">
        <!-- ... (previous content of image-container section remains unchanged) -->
    </div>

    <!-- Drugs -->
    <div class="item">
        <!-- ... (previous content of item section remains unchanged) -->
    </div>

    <div class="drug_section">
        <!-- ... (previous content of drug_section section remains unchanged) -->
    </div>

    <!-- Prescription History -->
    <div class="category-content" id="Prescription-History">
        <div class="container my-5">
            <h2>Prescription History</h2>
            <form method="GET" action="#">
                <div class="search-container">
                    <label for="patient_ssn">Search Prescription by Patient SSN:</label>
                    <input type="text" id="patient_ssn" name="patient_ssn" required>
                    <input type="submit" value="Search">
                </div>
            </form>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Drug_Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($prescribedDrugs as $drugName) {
                        echo "
                        <tr>
                            <td>$drugName</td>
                            <td>Prescribed</td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ... (remaining content sections remain unchanged) -->

    <!--Footer-->
    <section id="footer">
        <!-- ... (previous footer section remains unchanged) -->
    </section>

    <!-- ... (remaining scripts remain unchanged) -->
    <script src="script.js"></script>
    <script src="script1.js"></script>
    <script src="script4.js"></script>
</body>
</html>
