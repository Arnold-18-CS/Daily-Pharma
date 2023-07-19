<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve prescription data from the database
$sqlPrescriptions = "SELECT * FROM prescriptions";
$resultPrescriptions = $conn->query($sqlPrescriptions);

if (!$resultPrescriptions) {
    die("Invalid query: " . $conn->error);
}

$prescribedDrugs = array();

while ($prescriptionRow = $resultPrescriptions->fetch_assoc()) {
    $prescribedDrugs[] = $prescriptionRow['Drug_Name'];
}

// Function to check if a drug is prescribed
function isPrescribed($drugName, $prescribedDrugs)
{
    return in_array($drugName, $prescribedDrugs);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Prescription History</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Prescription History</h2>
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
</body>
</html>
