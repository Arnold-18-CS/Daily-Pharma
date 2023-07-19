<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

$search_ssn = $_GET['search_ssn'];

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$searchQuery = "SELECT * FROM patients WHERE Patient_SSN = '$search_ssn'";
$searchResult = $connection->query($searchQuery);

if ($searchResult->num_rows > 0) {
    echo "<h2>Search Results</h2>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>SSN</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Phone</th>";
    echo "<th>Address</th>";
    echo "<th>D.O.B</th>";
    echo "<th>Physician</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $searchResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>$row[Patient_SSN]</td>";
        echo "<td>$row[Patient_Name]</td>";
        echo "<td>$row[Patient_Email]</td>";
        echo "<td>$row[Patient_Phone]</td>";
        echo "<td>$row[Patient_Address]</td>";
        echo "<td>$row[Patient_Ages]</td>";
        echo "<td>$row[Patient_Physician]</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No results found for the provided SSN.</p>";
}

$connection->close();
?>
