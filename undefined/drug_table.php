<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$errorMessage = "";
$successMessage = "";

// Drug Table Handling
$sql = "SELECT * FROM drugs";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>DRUGS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>List of Drugs</h2>
        <a class="btn btn-primary" href="/users/drug_form.php" role="button">New Drug</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Drug_Name</th>
                    <th>Drug_Company</th>
                    <th>Drug_Formula</th>
                    <th>Drug_Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[Drug_Name]</td>
                        <td>$row[Drug_company]</td>
                        <td>$row[Drug_Formula]</td>
                        <td>$row[Drug_Price]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='drugedit.php?id=$row[Drug_Name]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='drugdelete.php?id=$row[Drug_Name]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

