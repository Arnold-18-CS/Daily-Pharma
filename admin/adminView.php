<?php
// adminView.php

//establish a php session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["userid"]) || !isset($_SESSION["user"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: ../login.html");
    exit;
}

// Get the user information from the session variables
$username = $_SESSION["userid"];
$user = $_SESSION["user"];
$ID = $_SESSION["user"]["Admin_ID"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <title> DailyPharma - Pharmacy Home</title>
</head>
<body class="AdminView">

    <!--Header-->
    <header>
        <div class="logo">
            <a href="index.html">DailyPharma</a>
        </div>

        <div class="navbar">
            <nav class= navbar id="navbar">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="../logout.php" class="btn-login-popup" >Logout</a>                
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
                <a href="../logout.php">Logout</a>
            </div>
        </div>
    </header>

    <!-- Above fold -->
    <div class="image-container" id="about">
        <div class="Overlay-image">
        </div>
        <div class="content">
            <div class="image-slide">
                <div class="image-desc active">
                    <h2>Manage Our Users</h2>
                    <p> Manage the users in our system.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="item"></div>
        <div class="title-text">
            <p>Users</p>
            <h1>Who uses our system?</h1>
        </div>

        <div class="container my-5" id="about">
            <h2>List of Patients</h2>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>SSN</th>       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>                   
                        <th>Age</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require_once("../connect.php");

                    $resultsPerPage = 5;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $resultsPerPage;

                    $countQuery = "SELECT COUNT(*) AS total FROM patients";
                    $countResult = $conn->query($countQuery);
                    $countRow = $countResult->fetch_assoc();
                    $totalResults = $countRow['total'];
                    $totalPages = ceil($totalResults / $resultsPerPage);

                    $sql = "SELECT * FROM patients LIMIT $offset, $resultsPerPage";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[Patient_SSN]</td>                
                            <td>$row[Patient_Name]</td>
                            <td>$row[Patient_Email]</td>
                            <td>$row[Patient_Phone]</td>
                            <td>$row[Patient_Gender]</td>
                            <td>$row[Patient_Age]</td>
                            <td>$row[Status]</td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    $activeClass = ($i == $currentPage) ? 'active' : '';
                    echo "<li class='page-item $activeClass'><a class='page-link' href='adminView.php?page=$i'>$i</a></li>";
                }
                ?>
                </ul>
            </nav>
        </div>

        <div class="item"></div>

        <div class="container my-5" id="about">
            <h2>List of Doctors</h2>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>SSN</th>       
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Speciality</th>
                        <th>Experience</th>                   
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require_once("../connect.php");

                    $resultsPerPage = 5;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $resultsPerPage;

                    $countQuery = "SELECT COUNT(*) AS total FROM doctors";
                    $countResult = $conn->query($countQuery);
                    $countRow = $countResult->fetch_assoc();
                    $totalResults = $countRow['total'];
                    $totalPages = ceil($totalResults / $resultsPerPage);

                    $sql = "SELECT * FROM doctors LIMIT $offset, $resultsPerPage";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[Doctor_SSN]</td>                
                            <td>$row[Doctor_Name]</td>
                            <td>$row[Doctor_Phone]</td>
                            <td>$row[Doctor_Speciality]</td>
                            <td>$row[Doctor_Experience]</td>
                            <td>$row[Status]</td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    $activeClass = ($i == $currentPage) ? 'active' : '';
                    echo "<li class='page-item $activeClass'><a class='page-link' href='adminView.php?page=$i'>$i</a></li>";
                }
                ?>
                </ul>
            </nav>
        </div>

        <div class="item"></div>
        <div class="container my-5" id="about">
            <h2>List of Pharmacies</h2>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>                   
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require_once("../connect.php");

                    $resultsPerPage = 5;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $resultsPerPage;

                    $countQuery = "SELECT COUNT(*) AS total FROM pharmacy";
                    $countResult = $conn->query($countQuery);
                    $countRow = $countResult->fetch_assoc();
                    $totalResults = $countRow['total'];
                    $totalPages = ceil($totalResults / $resultsPerPage);

                    $sql = "SELECT * FROM pharmacy LIMIT $offset, $resultsPerPage";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[Pharmacy_ID]</td>                
                            <td>$row[Pharmacy_Name]</td>
                            <td>$row[Pharmacy_Email]</td>
                            <td>$row[Pharmacy_Phone]</td>
                            <td>$row[Pharmacy_Address]</td>
                            <td>$row[Status]</td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    $activeClass = ($i == $currentPage) ? 'active' : '';
                    echo "<li class='page-item $activeClass'><a class='page-link' href='adminView.php?page=$i'>$i</a></li>";
                }
                ?>
                </ul>
            </nav>
        </div>
        
        <div class="item"></div>
        
        <div class="container my-5" id="about">
            <h2>List of Companies</h2>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require_once("../connect.php");

                    $resultsPerPage = 5;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $resultsPerPage;

                    $countQuery = "SELECT COUNT(*) AS total FROM company";
                    $countResult = $conn->query($countQuery);
                    $countRow = $countResult->fetch_assoc();
                    $totalResults = $countRow['total'];
                    $totalPages = ceil($totalResults / $resultsPerPage);

                    $sql = "SELECT * FROM company LIMIT $offset, $resultsPerPage";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[Company_ID]</td>                
                            <td>$row[Company_Name]</td>
                            <td>$row[Company_Email]</td>
                            <td>$row[Company_Phone]</td>
                            <td>$row[Status]</td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    $activeClass = ($i == $currentPage) ? 'active' : '';
                    echo "<li class='page-item $activeClass'><a class='page-link' href='adminView.php?page=$i'>$i</a></li>";
                }
                ?>
                </ul>
            </nav>
        </div>




    <!--Footer-->
    <section id="footer">
        <div class="title-text">
            <p>CONTACT US</p>
            <h1>Any Queries?</h1>
        </div>

        <div class="footer-row">
            <div class="footer-left">
                <h1>Contact information</h1>
                <div class="contact-link">

                    <div class="contact-info">
                        <i class="uil uil-twitter"></i>
                        <span>@DailyPharma</span>
                    </div>

                    <div class="contact-info">
                        <i class="uil uil-instagram"></i>
                        <span>@TheDailyPharma</span>
                    </div>

                    <div class="contact-info">
                        <i class="uil uil-facebook"></i>
                        <span>@DailyPharma</span>
                    </div>

                    <div class="contact-info">
                        <i class="uil uil-linkedin"></i>
                        <span>@DailyPharma - Medical Website</span>
                    </div>

                    <div class="contact-info">
                        <i class="uil uil-at"></i>
                        <span>DailyPharma@gmail.com</span>
                    </div>

                    <div class="contact-info">
                        <i class="uil uil-calling"></i>
                        <span>0769690000</span>
                    </div>

                </div>
            </div>

            <div class="footer-right">
                <div class="quick-links">
                    <h1>Quick Links</h1>
                    <ul>
                      <li><a href="index.html">Home</a></li>
                      <li><a href="#service">About Us</a></li>
                      <li><a href="#feature">Features</a></li>
                      <li><a href="#">FAQ</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                      <li><a href="#">Terms and Conditions</a></li>
                    </ul>
                  </div>
            </div>
        </div>

        <div class="additional-info">
            <p>&copy; 2023 DailyPharma. All rights reserved.</p>
        </div>
    </section>


    <script src="script.js"></script>
    <script src="script1.js"></script>
    <script src="script4.js"></script>
    
</body>
</html>