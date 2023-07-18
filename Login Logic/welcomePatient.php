<?php
session_start();

$username = $_SESSION['user']['Patient_Name']; 

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['userid']) || empty($_SESSION['userid'])) {
    header("Location: index.html");
    exit;
}

// Handle logout request
if (isset($_GET['logout'])) {
    // Clear the session variables
    session_unset();
    session_destroy();
    // Check if there is a login error flag set and set to false to prevent recurring error in case of previous errors
    if (isset($_SESSION['login_error_flag']) && $_SESSION['login_error_flag'] === true) {
        $_SESSION['login_error_flag'] = false;
    }
    // Redirect to the index.html page
    header("Location: index.html");
    exit;
}

//followed by contents of the welcome page for the patient
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="welcomePatient.css">
    <title>Welcome</title>
</head>
<body class="body">

    <nav>
        <div class="logo"><p>DailyPharma</p></div>
        <div class="user"><?php echo $username?></div>
        <form class="form" action="welcomePatient.php" method="GET">
            <input type="hidden" name="logout" value="true">
            <button class="logoutbtn" type="submit">Logout</button>
        </form>
    </nav>

<div class="content">
    <h1>Hello, <?php echo $username?> </h1>
    <p>Welcome to the Patients Home page!</p>
</div>

<script src="script.js"></script>
</body>
</html>