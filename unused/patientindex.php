<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title> PATIENTS </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Patients</h2>
        <a class="btn btn-primary" href="/users/patientcreate.php" role="button">New Patient</a>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>SSN</th>       
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>                   
                    <th>D.O.B</th>
                    <th>Physician</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "users";

                $resultsPerPage = 2;
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($currentPage - 1) * $resultsPerPage;

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $countQuery = "SELECT COUNT(*) AS total FROM clients";
                $countResult = $connection->query($countQuery);
                $countRow = $countResult->fetch_assoc();
                $totalResults = $countRow['total'];
                $totalPages = ceil($totalResults / $resultsPerPage);

                $sql = "SELECT * FROM patients LIMIT $offset, $resultsPerPage";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[Patient_SSN]</td>                
                        <td>$row[Patient_Name]</td>
                        <td>$row[Patient_Email]</td>
                        <td>$row[Patient_Phone]</td>
                        <td>$row[Patient_Address]</td>
                        <td>$row[Patient_Ages]</td>
                        <td>$row[Patient_Physician]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='patientedit.php?id=$row[Patient_SSN]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='patientdelete.php?id=$row[Patient_SSN]'>Delete</a>
                        </td>
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
    echo "<li class='page-item $activeClass'><a class='page-link' href='patientindex.php?page=$i'>$i</a></li>";
}
?>

